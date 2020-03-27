<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_monev extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_khs_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["monev_khs"] = $this->monev_khs_model->getAll();
        $data["subtitle"] = "Data IP Monev Beasiswa";
        $data["view"] = "monev_beasiswa/ip_monev";
        $this->load->view("admin/view", $data);
    }
    
    public function verifikasi_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_khs_model->verifikasi_valid($id);
            $this->monev_hasil_model->update_monev_khs_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/ip_monev');
    }
    
    public function verifikasi_tidak_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_khs_model->verifikasi_tidak_valid($id);
            $this->monev_hasil_model->update_monev_khs_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/ip_monev');
    }
}