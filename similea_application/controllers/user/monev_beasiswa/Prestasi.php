<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_sert_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $username = $this->session->userdata('username');
        
        $data["username"] = $username;
        $data["monev"] = $this->monev_sert_model->getByUsername($username);
        $data["view"] = "monev_beasiswa/prestasi_view";
        
        $this->load->view("user/view", $data);
    }
    
    public function edit($id=null){
        if ($this->check_session()){
                if (!isset($id)) redirect('user/home');
                
                $this->do_upload();
                
                $sert = $this->monev_sert_model;
                $validation = $this->form_validation;
                        $validation->set_rules('nilai_sert', 'Prestasi', array('numeric', 'required'));
                        if (empty($_FILES['file_sert']['name']))
                        {
                            $this->form_validation->set_rules('file_sert', 'Document', 'required');
                        }
                        
                if ($validation->run()) {
                    $sert->edit();
                    $this->monev_hasil_model->update_monev_sert_hasil($id);
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    
                    redirect('user/monev_beasiswa/prestasi');
                }
                
                $data["monev"] = $sert->getById($id);
                        if (!$data["monev"]) show_404();
                $data["sert_nilai"] = $sert->getNilaiSert();
                $data["view"] = "monev_beasiswa/prestasi_edit";        
                
                $this->load->view("user/view", $data);
        } else {
                $username = $this->session->userdata('username');
                
                $data["username"] = $username;
                $data["monev"] = $this->monev_sert_model->getByUsername($username);
                $data["view"] = "beasiswa/session";
                
                $this->load->view("user/view", $data);
        }
            
    }
    
    public function do_upload()
        {
            $id_monev = $this->input->post('id');
            $nama_file = str_replace(".","_",$id_monev);
            
                $config['upload_path']          = './uploads/file_sert';
                $config['allowed_types']        = 'pdf';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['file_name']            = $nama_file."_sert";
                $config['overwrite']			= true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file_sert'))
                {
                        false;
                }
                else
                {
                        $this->monev_sert_model->upload_sert();
                }
        }
}