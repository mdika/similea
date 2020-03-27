<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mentoring_monev extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_skam_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["monev_skam"] = $this->monev_skam_model->getAll();
        $data["subtitle"] = "Data Mentoring Monev Beasiswa";
        $data["view"] = "monev_beasiswa/mentoring_monev";
        $this->load->view("admin/view", $data);
    }
    
    public function verifikasi_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_skam_model->verifikasi_valid($id);
            $this->monev_hasil_model->update_monev_skam_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/mentoring_monev');
    }
    
    public function verifikasi_tidak_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_skam_model->verifikasi_tidak_valid($id);
            $this->monev_hasil_model->update_monev_skam_hasil($id);
        }
        
        redirect('admin/monev_beasiswa/mentoring_monev');
    }
}