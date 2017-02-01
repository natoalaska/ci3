<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Model {
	
	public $table = 'users';
	public $column_order = array('firstName','lastName','role');
	public $column_search = array('firstName','lastName','role');
	public $order = array('id' => 'desc');
	public $column_select = 'id, username, password, firstName, lastName, email, role';
	
	function role($role,$id) {
		$data['role'] = $role;
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	
	function getByUsername($username) {
		$query = $this->db->get_where($this->table, array('username' => $username));
		return $query->result();
	}
	
	function getRandSalt() {
		$this->db->select('randSalt');
		$query = $this->db->get($this->table);
		return $query->result();
	}

}

/* End of file User.php */
/* Location: ./application/modules/auth/models/User.php */