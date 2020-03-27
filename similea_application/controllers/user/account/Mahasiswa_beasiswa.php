<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_beasiswa extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("mahasiswa/mahasiswa_beasiswa_model");
    }

    public function index(){
        $data["username"] = $this->session->userdata('username');
        $data["mahasiswa_beasiswa"] = $this->mahasiswa_beasiswa_model->getAll();
        $data["subtitle"] = "Data Beasiswa Mahasiswa";
        $data["view"] = "mahasiswa/mahasiswa_beasiswa";
        $this->load->view("admin/view", $data);
    }
    
    public function edit($id=null){
        if (!isset($id)) redirect('admin/mahasiswa/mahasiswa_beasiswa');
                
            $mahasiswa_beasiswa = $this->mahasiswa_beasiswa_model;
            $validation = $this->form_validation;
                $validation->set_rules('id_beasiswa', 'Jenis Beasiswa', 'required');
                        
            if ($validation->run()) {
                $mahasiswa_beasiswa->edit();
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    
                redirect('admin/mahasiswa/mahasiswa_beasiswa');
            }
            
            $data["username"] = $this->session->userdata('username');            
            $data["mahasiswa_beasiswa"] = $mahasiswa_beasiswa->getById($id);
                if (!$data["mahasiswa_beasiswa"]) show_404();
            $data["beasiswa_jenis"] = $mahasiswa_beasiswa->getJenisBeasiswa($id);
            $data["subtitle"] = "Data Beasiswa Mahasiswa";
            $data["view"] = "mahasiswa/mahasiswa_beasiswa_edit";
                
            $this->load->view("admin/view", $data);
    }
}