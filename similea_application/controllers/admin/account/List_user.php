<?php defined('BASEPATH') OR exit('No direct script access allowed');

class List_user extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("account/account_model");
	}
	
	public function index()
	{
		$this->list_user();
	}
	
	public function list_user()
	{
		$data["username"] = $this->session->userdata('username');
		$data["users"] = $this->account_model->getAllUsers();
		$data["subtitle"] = "Data User";
		$data["view"] = "account/list_user";
        $this->load->view("admin/view", $data);
	}
	
	public function reset_password_user($id=null){
        if (!isset($id)) {
            show_404();
        } else {
			$username = $id;
			
            $this->account_model->reset_password_users($username);
        }
        
        redirect('admin/account/list_user');
    }
}
