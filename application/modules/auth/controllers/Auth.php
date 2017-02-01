<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('user');
	}
	
	/** Performs login logic **/
	function login() {
		$login = $this->input->post('login');
		if(isset($login)) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $this->user->getByUsername($username);
			if(empty($user)) redirect(site_url());
			foreach($user as $row) {
				$user_username = $row->username;
				$user_firstName = $row->firstName;
				$user_lastName = $row->lastName;
				$user_role = $row->role;
				$user_password = $row->password;
				$user_id = $row->id;
			}
			
			$verifyPass = password_verify($password, $user_password);
			
			if($username === $user_username && $verifyPass) {
				$data['username'] = $user_username;
				$data['firstName'] = $user_firstName;
				$data['lastName'] = $user_lastName;
				$data['role'] = $user_role;
				$data['user_id'] = $user_id;
				$this->session->set_userdata($data);
				redirect(site_url('admin'));
			} else {
				redirect(site_url());
			}
		} else {
			redirect(site_url());
		}
	}
	
	/** Performs logout logic **/
	function logout() {
		$this->session->sess_destroy();
		redirect(site_url());
	}
	
	/** (Admin) View all users **/
	function users() {
		$data['module'] = 'auth';
		$data['view_file'] = 'users';
		$data['modal'] = true;
		$data['model'] = 'user';
		echo Modules::run('templates/Templates/admin', $data);
	}
	
	function profile($id) {
		$this->editUser($id);
	}
	
	/** View registration page **/
	function registration() {
		$data['module'] = 'auth';
		$data['view_file'] = 'registration';
		$data['categories'] = Modules::run('blog/getCategories');
		echo Modules::run('templates/Templates/mainNoSidebar', $data);
	}
	
	/** Performs registration logic **/
	function register() {
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('messageType', 'danger');
			redirect(site_url('registration'));
		} else {
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->hash($this->input->post('password'));
			
			$this->user->add($data);
		}
	}
	
	/** hashes a password **/
	function hash($password) {
		$options = [
			'cost' => 10,
		];
		return password_hash($password, PASSWORD_BCRYPT, $options);
	}

}

/* End of file auth.php */
/* Location: ./application/modules/auth/controllers/auth.php */