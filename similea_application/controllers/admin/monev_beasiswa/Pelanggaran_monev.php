<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran_monev extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_pelanggaran_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["monev_pelanggaran"] = $this->monev_pelanggaran_model->getAll();
        $data["subtitle"] = "Data Pelanggaran Monev Beasiswa";
        $data["view"] = "monev_beasiswa/pelanggaran_monev";
        $this->load->view("admin/view", $data);
    }
    
    public function edit($id=null){
        if (!isset($id)) redirect('admin/dashboard');
        
        $pelanggaran = $this->monev_pelanggaran_model;
        $validation = $this->form_validation;
                $validation->set_rules('nilai_pelanggaran', 'Pelanggaran', array('numeric', 'required'));
                
        if ($validation->run()) {
            $pelanggaran->edit();
            $this->monev_hasil_model->update_monev_pelanggaran_hasil($id);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('admin/monev_beasiswa/pelanggaran_monev');
        }
        
        $data["username"] = $this->session->userdata('username');
        $data["monev_pelanggaran"] = $pelanggaran->getById($id);
                if (!$data["monev_pelanggaran"]) show_404();
        $data["pelanggaran_nilai"] = $pelanggaran->getNilaiPelanggaran();
        $data["subtitle"] = "Data Pelanggaran Monev Beasiswa";
        $data["view"] = "monev_beasiswa/pelanggaran_edit_monev";        
        
        $this->load->view("admin/view", $data);
    }
/*    
    public function verifikasi_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_pelanggaran_model->verifikasi_valid($id);
        }
        
        redirect('admin/monev_beasiswa/pelanggaran_monev');
    }
    
    public function verifikasi_tidak_valid($id=null){
        if (!isset($id)) {
            show_404();
        } else {
            $this->monev_pelanggaran_model->verifikasi_tidak_valid($id);
        }
        
        redirect('admin/monev_beasiswa/pelanggaran_monev');
    }
*/
}