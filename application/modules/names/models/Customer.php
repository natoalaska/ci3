<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Model {
	
	public $table = 'customers';
	public $column_order = array('firstName','middleName','lastName');
	public $column_search = array('firstName','middleName','lastName');
	public $order = array('id' => 'desc');
	public $column_select = 'id, firstName, lastName, middleName, prefix_id, suffix_id, dob';

}

/* End of file Category.php */
/* Location: ./application/modules/blog/models/Category.php */