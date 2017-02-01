<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller {

	public function main($data = NULL) {
		$data['view_file'] = Modules::run('siteFunctions/getView', $data);
		$this->load->view('main/index', $data);
	}

	public function headerMain($data = NULL) {
		$this->load->view('main/header', $data);
	}
	
	public function navMain($data = NULL) {
		$this->load->view('main/nav', $data);
	}
	
	public function sidebarMain($data = NULL) {
		$this->load->view('main/sidebar', $data);
	}

	public function footerMain($data = NULL) {
		$this->load->view('main/footer', $data);
	}
	
	public function admin($data = NULL) {
		$data['view_file'] = Modules::run('siteFunctions/getView', $data);
		$this->load->view('admin/index', $data);
	}
	
	public function headerAdmin($data = NULL) {
		$this->load->view('admin/header', $data);
	}
	
	public function navAdmin($data = NULL) {
		$this->load->view('admin/nav', $data);
	}

	public function footerAdmin($data = NULL) {
		$this->load->view('admin/footer', $data);
	}
	
	public function mainNoSidebar($data = NULL) {
		$data['view_file'] = Modules::run('siteFunctions/getView', $data);
		$this->load->view('main/indexNoSidebar', $data);
	}

}

/* End of file templates.php */
/* Location: ./application/modules/templates/controllers/templates.php */