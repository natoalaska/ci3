<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('admin/navigation');
	}
	
	function index() {
		$data['view_file'] = 'dashboard';
		$data['post_count'] = Modules::run('blog/count','post');
		$data['user_count'] = Modules::run('auth/count','user');
		$data['comment_count'] = Modules::run('blog/count','comment');
		$data['category_count'] = Modules::run('blog/count','category');
		$data['chartData'] = $this->createChartElements();
		echo Modules::run('templates/Templates/admin', $data);
	}
	
	function navigation() {
		$data['view_file'] = 'navigation';
		$data['module'] = 'admin';
// 		$data['modal'] = true;
// 		$data['model'] = 'navigation';
		$data['navigation'] = $this->navigation->select('order ASC');
		echo Modules::run('templates/Templates/admin', $data);
	}
	
	function navActive($string) {
		$uri = uri_string();
		$match = fnmatch($string, $uri);
		if ($match) return 'class="active"';
		else return '';
	}
	
	function navExpand($string) {
		$uri = uri_string();
		$match = fnmatch($string, $uri);
		if ($match) return 'class="expand collapse in"';
		else return 'class="collapse"';
	}
	
	function createChartElements() {
		$data[] = ['Active Posts', Modules::run('blog/count','post',array('status'=>'published'))];
		$data[] = ['Draft Posts', Modules::run('blog/count','post',array('status'=>'draft'))];
		$data[] = ['Categories', Modules::run('blog/count','category')];
		$data[] = ['Admin Users', Modules::run('auth/count','user',array('role'=>'admin'))];
		$data[] = ['Subscribers', Modules::run('auth/count','user',array('role'=>'subscriber'))];
		$data[] = ['Approved Comments', Modules::run('blog/count','comment',array('status'=>'approved'))];
		$data[] = ['Unapproved Comments', Modules::run('blog/count','comment',array('status'=>'unapproved'))];
		$chartData = '';
		foreach($data as $row) {
			$chartData .= "['$row[0]',$row[1]],";
		}

		return $chartData;
	}
	
	function saveNew() {
		$item = $this->input->post('item');
		foreach($item as $key => $value) {
			if($value == 0) {
				$data = array();
				$data['order'] = $key;
				$data['title'] = 'New Item';
				$data['icon'] = 'plus';
				$data['parent_id'] = 0;
				$this->navigation->save($data);
			}
		}
	}
	
	function verifySort() {
		$item = $this->input->post('item');
		$i = 0;
		print_r($item);
		foreach($item as $key => $value) {
			if($key == 0) {
				$data = array();
				$data['order'] = $i;
				$data['title'] = 'New Item';
				$data['icon'] = 'plus';
				$data['parent_id'] = $value;
				$this->navigation->save($data);
			} else {
				if($value > 0) {
					$this->navigation->update(array('id' => $value), array('hasChild' => 1));
				}
				$this->navigation->update(array('id' => $key), array('order' => $i, 'parent_id' => $value));
			}
			$i++;
		}
	}
	
	function createList() {
		$navigation = $this->navigation->select('order ASC');
		echo json_encode($navigation);
	}
	
	function createOptions($id) {
		$options = $this->navigation->select_where(array('id' => $id));
		echo json_encode($options);
	}
	
	function updateOption() {
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$field = $this->input->post('field');
		$this->navigation->update(array('id' => $id), array($field => $value));
		echo true;
	}
	
	function delete($id) {
		$this->navigation->delete_by_id($id);
		echo true;
	}
	
	function createNavigation($hasChild = null) {
		if(isset($hasChild)) {
			$nav = $this->navigation->select_where(array('parent_id' => $hasChild), 'order ASC');
		} else {
			$nav = $this->navigation->select('order ASC');
		}
		return $nav;
	}
}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */