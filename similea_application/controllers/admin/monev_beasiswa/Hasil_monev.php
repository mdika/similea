<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_monev extends MY_Controller{ 
    	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["monev_hasil"] = $this->monev_hasil_model->getAll();
        $data["subtitle"] = "Data Hasil Monev Beasiswa";
        $data["view"] = "monev_beasiswa/hasil_monev";
        $this->load->view("admin/view", $data);
    }    
}