<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation extends MY_Model {
	
	public $table = 'navigation';
    public $column_order = array('title','slug','icon');
	public $column_search = array('title','slug','icon');
	public $order = array('id' => 'desc');
	public $column_select = 'id, parent_id, hasChild, title, slug, icon, order';

}

/* End of file Category.php */
/* Location: ./application/modules/blog/models/Category.php */