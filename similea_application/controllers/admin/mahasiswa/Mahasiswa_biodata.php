<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_biodata extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("mahasiswa/mahasiswa_biodata_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["mahasiswa_biodata"] = $this->mahasiswa_biodata_model->getAll();
        $data["subtitle"] = "Data Pribadi Mahasiswa";
        $data["view"] = "mahasiswa/mahasiswa_biodata";
        $this->load->view("admin/view", $data);
    }
}