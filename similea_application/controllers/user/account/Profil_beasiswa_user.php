<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_beasiswa_user extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("mahasiswa/mahasiswa_beasiswa_model");
    }

    public function index(){
        $username = $this->session->userdata('username');
        
        $data["username"] = $username;
        $data["monev"] = $this->mahasiswa_beasiswa_model->getById($username);
        $data["mahasiswa_beasiswa"] = $this->mahasiswa_beasiswa_model->getById($username);
        $data["view"] = "account/mahasiswa_beasiswa";
        
        $this->load->view("user/view", $data);
    }
    
    public function edit($id=null){
        if (!isset($id)) redirect('user/account/profil_beasiswa_user');
                
            $mahasiswa_beasiswa = $this->mahasiswa_beasiswa_model;
            $validation = $this->form_validation;
                $validation->set_rules('id_beasiswa', 'Jenis Beasiswa', 'required');
                        
            if ($validation->run()) {
                $mahasiswa_beasiswa->edit();
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    
                redirect('user/account/profil_beasiswa_user');
            }
            
            $username = $this->session->userdata('username');
        
            $data["username"] = $username;
            $data["monev"] = $this->mahasiswa_beasiswa_model->getById($username);
            $data["mahasiswa_beasiswa"] = $mahasiswa_beasiswa->getById($id);
                if (!$data["mahasiswa_beasiswa"]) show_404();
            $data["beasiswa_jenis"] = $mahasiswa_beasiswa->getJenisBeasiswa($id);
            $data["subtitle"] = "Data Beasiswa Mahasiswa";
            $data["view"] = "account/mahasiswa_beasiswa_edit";
            
            $this->load->view("user/view", $data);
    }
}