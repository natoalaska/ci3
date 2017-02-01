<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Model {
	
	public $table = 'posts';
	public $column_order = array('title','status','date');
	public $column_search = array('title','content','tags','status','date');
	public $order = array('id' => 'desc');
	public $column_select = 'id, category_id, title, author, image, date, blurb, content, tags, status';
	
// 	function getSearch($search) {
// 		$this->db->like('tags',$search);
// 		$query = $this->db->get('posts');
// 		if($query->num_rows() == 0) {
// 			return 0;
// 		}
// 		return $query->result();
// 	}
	
// 	function getPostTitle($id) {
// 		echo $id;
// 		if(empty($id)) return false;
// 		else {
// 			$this->db->select('title');
// 			$query = $this->db->get_where($this->table, array('id' => $id));
// 			$results = $query->result();
// 			return $results[0]->title;
// 		}
// 	}
	
// 	function getAllByCategory($id) {
// 		$query = $this->db->get_where($this->table, array('category_id' => $id));
// 		return $query->result();
// 	}
	
// 	function getImage($id) {
// 		$this->db->select('image');
// 		$query = $this->db->get_where($this->table, array('id' => $id));
// 		$results = $query->result();
// 		return $results[0]->image;
// 	}

}

/* End of file Post.php */
/* Location: ./application/modules/blog/models/Post.php */