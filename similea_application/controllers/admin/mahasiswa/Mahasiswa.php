<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("mahasiswa/mahasiswa_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["mahasiswa"] = $this->mahasiswa_model->getAll();
        $data["subtitle"] = "Data Mahasiswa";
        $data["view"] = "mahasiswa/mahasiswa";
        $this->load->view("admin/view", $data);
    }
}