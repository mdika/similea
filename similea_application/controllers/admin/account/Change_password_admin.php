<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password_admin extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("account/account_model");
    }
    
	public function index(){		

		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldpassword', 'OldPassword', 'required');
		$this->form_validation->set_rules('newpassword1', 'NewPassword', 'required');
        $this->form_validation->set_rules('newpassword2', 'NewPassword', 'required');
		
		if($this->form_validation->run())
		{
			//true
            $username = $this->session->userdata('username');
			$oldpassword = $this->input->post('oldpassword');
            $newpassword1 = $this->input->post('newpassword1');
            $newpassword2 = $this->input->post('newpassword2');
			
            if($this->account_model->change_password_admins($username, $oldpassword, $newpassword1, $newpassword2))
			{
                $this->session->set_flashdata('error', 'Berhasil Mengubah Password');
				redirect('admin/account/change_password_admin');
			} else {
                $this->session->set_flashdata('error', 'Gagal Mengubah Password');
				redirect('admin/account/change_password_admin');
            }
        } else {
			//false			
			$data["username"] = $this->session->userdata('username');
			$data["subtitle"] = "Ganti Password";
			$data["view"] = "account/change_password";
			$this->load->view("admin/view", $data);
		}
    }
    
    public function show_data_admin(){
        echo $username = $this->session->userdata('username');
		echo "<br>";
        echo $password = $this->account_model->get_password_admins($username);
    }		
}