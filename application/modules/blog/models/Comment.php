<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Model {
	
	public $table = 'comments';
	public $column_order = array('author','status','date');
	public $column_search = array('author','status','date');
	public $order = array('id' => 'desc');
	public $column_select = 'id, post_id, author, email, content, status, date';
	
// 	function changeStatus($status,$id) {
// 		$data['status'] = $status;
// 		$this->db->where('id', $id);
// 		$this->db->update($this->table, $data);
// 	}
	
// 	function getAllByPostId($id) {
// 		$query = $this->db->get_where($this->table, array('post_id' => $id,'status' => 'Approved'));
// 		return $query->result();
// 	}

}

/* End of file Post.php */
/* Location: ./application/modules/blog/models/Post.php */