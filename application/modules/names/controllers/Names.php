<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Names extends MY_Controller {
    
    function __construct() {
		parent::__construct();
		
		/* Load Models */
		$this->load->model('names/customer');
		$this->load->model('names/fix');
	}
	
	/** View all (pre/suf)fixes **/
	function fixes() {
		$data['module'] = 'names';
		$data['view_file'] = 'fixes';
		$data['modal'] = true;
		$data['model'] = 'fix';
		$data['fixes'] = $this->fix->select();
		echo Modules::run('templates/Templates/admin', $data);
	}
    
    /** View all customers **/
	function customers() {
		$data['module'] = 'names';
		$data['view_file'] = 'customers';
		$data['modal'] = true;
		$data['model'] = 'customer';
		$data['customers'] = $this->customer->select();
        $data['prefixes'] = $this->fix->select_where(array('type' => 'prefix'),'code ASC');
        $data['suffixes'] = $this->fix->select_where(array('type' => 'suffix'),'code ASC');
		echo Modules::run('templates/Templates/admin', $data);
	}
    
}

/* End of file auth.php */
/* Location: ./application/modules/blog/controllers/Blog.php */