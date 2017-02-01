<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fix extends MY_Model {
	
	public $table = 'fixes';
	public $column_order = array('type','code','description');
	public $column_search = array('type','code','description');
	public $order = array('id' => 'desc');
	public $column_select = 'id, type, code, description';

}

/* End of file Category.php */
/* Location: ./application/modules/blog/models/Category.php */