<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiteFunctions extends MX_Controller {

	/*
	 *	Display copy right year(s)
	 */
	function getCopyYear($year = 'auto') {
		if(intval($year) == 'auto') $year = date('Y');
		if(intval($year) == date('Y')) return intval($year);
		if(intval($year) < date('Y')) return intval($year) . ' - ' . date('Y');
		if(intval($year) > date('Y')) return date('Y');
	}

	function getView($data) {
		$view_file = $data['view_file'];
		$module = $data['module'];
		
		if (!isset($data['view_file'])) {
			$view_file = "";
		}

		if (!isset($data['module'])) {
			if($this->uri->segment(1) == "") {
				$uri = $this->uri->rsegment_array();
				$module = $uri[1];
			} else {
				$module = $this->uri->segment(1);
			}
		}

		if (($view_file != "") && ($module != "")) {
			$path = $module . "/" . $view_file;
			return $path;
		}
	}
	
	function createTableData($data = NULL) {
		$this->load->view('dataTablesJavascript', $data);
	}

}

/* End of file siteFunctions.php */
/* Location: ./application/modules/siteFunctions/controllers/siteFunctions.php */