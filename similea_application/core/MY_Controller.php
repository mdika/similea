<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('login_status') == FALSE)
		{
			redirect('login');
		}
	}
	
	public function is_user()
	{
		if($this->session->userdata('user_status') == TRUE)
		{
			//$this->load->view('user/home');
			return true;
		}
		elseif($this->session->userdata('admin_status') == TRUE)
		{
			redirect('admin/dashboard');
		}
		else
		{
			redirect('login');
		}
	}
	
	public function still_user()
	{
		echo "Still User";
	}
	
	public function is_admin()
	{
		if($this->session->userdata('admin_status') == TRUE)
		{
			//$this->load->view('admin/dashboard');
			return true;
		}
		elseif($this->session->userdata('user_status') == TRUE)
		{
			redirect('user/home');
		}
		else
		{
			redirect('login');
		}
	}	
	
	public function still_admin()
	{
		echo "Still Admin";
	}
	
	public function getID(){
		return $username = $this->session->set_flashdata('id');
	}
	
	public function check_session(){
		$this->load->model("beasiswa/beasiswa_session_model");
		$session = $this->beasiswa_session_model->getMonevSession();
		
		if($session==1){
			return true;
		} else {
			return false;
		}
	}

/*		public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('login_status') == FALSE)
		{
			redirect('login');
		} elseif($this->session->userdata('user_status') == TRUE)
		{
			redirect('user/home');
		} elseif($this->session->userdata('admin_status') == TRUE)
		{
			redirect('admin/dashboard');
		} else {
			redirect('login');
		}
	}
*/
}
