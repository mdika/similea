<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_akademik extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("mahasiswa/mahasiswa_akademik_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["mahasiswa_akademik"] = $this->mahasiswa_akademik_model->getAll();
        $data["subtitle"] = "Data Akademik Mahasiswa";
        $data["view"] = "mahasiswa/mahasiswa_akademik";
        $this->load->view("admin/view", $data);
    }
}