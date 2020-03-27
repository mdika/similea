<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends MY_Controller{ 
    	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $username = $this->session->userdata('username');
        
        $data["username"] = $username;
        $data["monev"] = $this->monev_hasil_model->getByUsername($username);
        $data["view"] = "monev_beasiswa/hasil";
        
        $this->load->view("user/view", $data);
    }    
}