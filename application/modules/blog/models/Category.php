<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Model {
	
	public $table = 'categories';
	public $column_order = array('title');
	public $column_search = array('title');
	public $order = array('id' => 'desc');
	public $column_select = 'id, title';
	
// 	function getCategory($id) {
// 		echo $id;
// 		if(empty($id)) return false;
// 		else {
// 			$this->db->select('title');
// 			$query = $this->db->get_where($this->table, array('id' => $id));
// 			$results = $query->result();
// 			return $results[0]->title;
// 		}
// 	}

}

/* End of file Category.php */
/* Location: ./application/modules/blog/models/Category.php */