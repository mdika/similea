<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_pelanggaran_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $username = $this->session->userdata('username');
        
        $data["username"] = $username;
        $data["monev"] = $this->monev_pelanggaran_model->getByUsername($username);
        $data["view"] = "monev_beasiswa/pelanggaran_view";
        
        $this->load->view("user/view", $data);
    }
}