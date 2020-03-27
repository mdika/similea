<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi_monev extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_skao_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["monev_skao"] = $this->monev_skao_model->getAll();
        $data["subtitle"] = "Data Organisasi Monev Beasiswa";
        $data["view"] = "monev_beasiswa/organisasi_monev";
        $this->load->view("admin/view", $data);
    }
    
    public function verifikasi_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_skao_model->verifikasi_valid($id);
            $this->monev_hasil_model->update_monev_skao_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/organisasi_monev');
    }
    
    public function verifikasi_tidak_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_skao_model->verifikasi_tidak_valid($id);
            $this->monev_hasil_model->update_monev_skao_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/organisasi_monev');
    }
}