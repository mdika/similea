<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
/*	public function __construct()
	{
		parent::__construct();
	}
*/	
	
	public function index()
	{
		if($this->session->userdata('user_status') == TRUE)
		{
			redirect('user/home');
		}
			elseif($this->session->userdata('admin_status') == TRUE)
		{
			redirect('admin/dashboard');
		}
			else
		{
			$this->load->view('login');
		}		
	}
		
	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run())
		{
			//true
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$this->load->model('account/account_model');
			if($this->account_model->login_users($username, $password))
			{
				$session_data_users = array(
					'username' => $username,
					'password' => $password,
					'login_status' => TRUE,
					'admin_status' => FALSE,
					'user_status' => TRUE
				);
				$this->session->set_userdata($session_data_users);
				redirect('user/home');
//				redirect(base_url('login/enter'));
			}
			elseif($this->account_model->login_admins($username, $password))
			{
				$session_data_admins = array(
					'username' => $username,
					'password' => $password,					
					'login_status' => TRUE,
					'admin_status' => TRUE,
					'user_status' => FALSE
				);
				$this->session->set_userdata($session_data_admins);
				redirect('admin/dashboard');
//				redirect(base_url('login/enter'));
			}
			else
			{
				$this->session->set_flashdata('error', 'Wrong Username or Password');
				redirect('login');
			}				
		} else {
			//false
			redirect('login');
		}
	}
	
	function enter()
	{
		if($this->session->userdata('username') != '')
		{
//			redirect(base_url('user/home'));
			echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
			echo '<label><a href="'.base_url().'login/logout">Logout</a></label>';
		}
		else
		{
			redirect('login');
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('login_status');
		$this->session->unset_userdata('user_status');
		$this->session->unset_userdata('admin_status');
		redirect('login');
	}
}