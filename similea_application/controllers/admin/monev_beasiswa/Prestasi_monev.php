<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_monev extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_sert_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["monev_sert"] = $this->monev_sert_model->getAll();
        $data["subtitle"] = "Data Prestasi Monev Beasiswa";
        $data["view"] = "monev_beasiswa/prestasi_monev";
        $this->load->view("admin/view", $data);
    }
    
    public function verifikasi_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_sert_model->verifikasi_valid($id);
            $this->monev_hasil_model->update_monev_sert_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/prestasi_monev');
    }
    
    public function verifikasi_tidak_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_sert_model->verifikasi_tidak_valid($id);
            $this->monev_hasil_model->update_monev_sert_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/prestasi_monev');
    }
}