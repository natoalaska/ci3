<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatables extends MX_Controller {
	    
    public function __construct() {
        parent::__construct();
    }
    
    public function ajax_list($module, $model) {
		$this->load->model($module . '/' .$model);
        $list = $this->{$model}->get_datatables();
        $data = array();
        $no = $_POST['start'];
		$columns = $this->{$model}->get_datatable_columns();
        foreach ($list as $table) {
            $no++;
			$row = array();
			foreach ($columns as $column) {
				if($column == 'icon') {
					$row[] = '<i class="fa fa-'.$table->{$column}.'"></i> '.$table->{$column};
				} else {
					$row[] = $table->{$column};
				}
			}
            
            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="View" onclick="create_modal('."'view'".','."'".$table->id."'".')"><i class="fa fa-search"></i></a> <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="create_modal('."'edit'".','."'".$table->id."'".')"><i class="fa fa-pencil"></i></a> <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_record('."'".$table->id."'".')"><i class="fa fa-times"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->{$model}->count_all(),
            "recordsFiltered" => $this->{$model}->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function ajax_edit($module, $model, $id) {
		$this->load->model($module . '/' .$model);
        $data = $this->{$model}->get_by_id($id);
        echo json_encode($data);
    }
    
    public function ajax_add($module, $model) {
		$this->load->model($module . '/' .$model);
		$data = $this->input->post();
		unset($data->id);
        
        $insert = $this->{$model}->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_update($module, $model) {
		$this->load->model($module . '/' .$model);
		$data = $this->input->post();
		unset($data->id);
		if(isset($data['password'])) {
			$data['password'] = Modules::run('auth/hash', $this->input->post('password'));
		}
		
        $this->{$model}->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete($module, $model, $id) {
		$this->load->model($module . '/' .$model);
        $this->{$model}->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
}