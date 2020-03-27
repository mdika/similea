<?php defined('BASEPATH') OR exit('No direct script access allowed');

class List_admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("account/account_model");
	}
	
	public function index()
	{
		$this->list_admin();
	}
	
	public function list_admin()
	{
		$data["username"] = $this->session->userdata('username');
		$data["admins"] = $this->account_model->getAllAdmins();
		$data["subtitle"] = "Data Admin";
		$data["view"] = "account/list_admin";
        $this->load->view("admin/view", $data);
	}
	
	public function reset_password_admin($id=null){
        if (!isset($id)) {
            show_404();
        } else {
			$username = $id;
			
            $this->account_model->reset_password_admins($username);
        }
        
        redirect('admin/account/list_admin');
    }
}
