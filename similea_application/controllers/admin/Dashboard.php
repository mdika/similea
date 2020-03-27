<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function index()
	{
		if($this->is_admin()){
			$data["username"] = $this->session->userdata('username');
			$data["subtitle"] = "Dashboard";
			$data["view"] = "dashboard/dashboard";
        	$this->load->view("admin/view", $data);
		}
	}
}
