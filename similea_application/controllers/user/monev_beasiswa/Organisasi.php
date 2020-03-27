<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->model("monev_beasiswa/monev_skao_model");
        $this->load->model("monev_beasiswa/monev_hasil_model");
    }

    public function index(){
        $username = $this->session->userdata('username');
        
        $data["username"] = $username;
        $data["monev"] = $this->monev_skao_model->getByUsername($username);
        $data["view"] = "monev_beasiswa/organisasi_view";
        
        $this->load->view("user/view", $data);
    }
    
    public function edit($id=null){
        if ($this->check_session()){
                if (!isset($id)) redirect('user/home');
                
                $this->do_upload();
                
                $skao = $this->monev_skao_model;
                $validation = $this->form_validation;
                        $validation->set_rules('nilai_skao', 'Organisasi', array('numeric', 'required'));
                        $validation->set_rules('id_ormawa', 'Nama Organisasi', 'required');
                        $validation->set_rules('id_jabatan', 'Jabatan', 'required');
                        if (empty($_FILES['file_skao']['name']))
                        {
                            $this->form_validation->set_rules('file_skao', 'Document', 'required');
                        }
                        
                if ($validation->run()) {
                    $skao->edit();
                    $this->monev_hasil_model->update_monev_skao_hasil($id);
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    
                    redirect('user/monev_beasiswa/organisasi');
                }
                
                $data["monev"] = $skao->getById($id);
                        if (!$data["monev"]) show_404();
                $data["skao_nilai"] = $skao->getNilaiSkao();
                $data["ormawa"] = $skao->getOrmawa();
                $data["jabatan"] = $skao->getJabatan();
                $data["view"] = "monev_beasiswa/organisasi_edit";        
                
                $this->load->view("user/view", $data);
        } else {
                $username = $this->session->userdata('username');
        
                $data["username"] = $username;
                $data["monev"] = $this->monev_skao_model->getByUsername($username);
                $data["view"] = "beasiswa/session";
                
                $this->load->view("user/view", $data);
        }
    }
    
    public function do_upload()
        {
            $id_monev = $this->input->post('id');
            $nama_file = str_replace(".","_",$id_monev);
            
                $config['upload_path']          = './uploads/file_skao';
                $config['allowed_types']        = 'pdf';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['file_name']            = $nama_file."_skao";
                $config['overwrite']			= true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file_skao'))
                {
                        false;
                }
                else
                {
                        $this->monev_skao_model->upload_skao();
                }
        }
}