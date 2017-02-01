<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('blog/post');
    }
    
    public function index() {
		$this->load->view('posts');
    }
    
}
