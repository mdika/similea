<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mahasiswa extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("mahasiswa/data_mahasiswa_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["data_mahasiswa"] = $this->data_mahasiswa_model->getAll();
        $data["subtitle"] = "Data Keseluruhan Mahasiswa";
        $data["view"] = "mahasiswa/data_mahasiswa";
        $this->load->view("admin/view", $data);
    }
}