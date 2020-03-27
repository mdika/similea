<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa_session extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("beasiswa/beasiswa_session_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["session"] = $this->beasiswa_session_model->getSession();
        $data["subtitle"] = "Monev Session";
        $data["view"] = "beasiswa/beasiswa_session";
        $this->load->view("admin/view", $data);
    }
    
    public function verifikasi_valid(){
        $this->beasiswa_session_model->verifikasi_valid();
        redirect('admin/beasiswa/beasiswa_session');
    }
    
    public function verifikasi_tidak_valid(){
        $this->beasiswa_session_model->verifikasi_tidak_valid();        
        redirect('admin/beasiswa/beasiswa_session');
    }
}