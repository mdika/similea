<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_sert_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
			$this->db->join('monev_sert_nilai sert_nilai', 'sert_nilai.nilai_sert=sert.nilai_sert');
			$this->db->join('monev_sert_ver sert_ver', 'sert_ver.ver_sert=sert.ver_sert');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		if($query->num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
    }
	
	public function getById($id){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
			$this->db->join('monev_sert_nilai sert_nilai', 'sert_nilai.nilai_sert=sert.nilai_sert');
			$this->db->join('monev_sert_ver sert_ver', 'sert_ver.ver_sert=sert.ver_sert');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.id_monev',$id);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getByUsername($username){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
			$this->db->join('monev_sert_nilai sert_nilai', 'sert_nilai.nilai_sert=sert.nilai_sert');
			$this->db->join('monev_sert_ver sert_ver', 'sert_ver.ver_sert=sert.ver_sert');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.nim',$username);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getNilaiSert(){
		$this->db->select('*');
		$this->db->from('monev_sert_nilai');
		$this->db->order_by('nilai_sert','desc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function edit()
    {
        $post = $this->input->post();
		
		$id_monev = $post["id"];
        $nilai_sert = $post["nilai_sert"];
        $internasional = $post["internasional"];
        $nasional = $post["nasional"];
        $provinsi = $post["provinsi"];
        $kabupaten = $post["kabupaten"];
        $ket_sert = $post["ket_sert"];
        $ver_sert = 0;
		
		$sert = array(
			'nilai_sert' => $nilai_sert,
			'internasional' => $internasional,
			'nasional' => $nasional,
			'provinsi' => $provinsi,
			'kabupaten' => $kabupaten,
			'ket_sert' => $ket_sert,
			'ver_sert' => $ver_sert
			); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_sert', $sert);
    }
	
	public function upload_sert()
	{
		$post = $this->input->post();
		
		$id_monev = $post["id"];
		$nama_file = str_replace(".","_",$post["id"]);
        	$file_sert = $nama_file."_sert.pdf";
		
		$sert = array('file_sert' => $file_sert);
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_sert', $sert);
	}
	
	public function verifikasi_valid($id){
		$id_monev = $id;
		
		$ver_sert = 2;
		
		$ver = array('ver_sert' => $ver_sert); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_sert', $ver); 
	}
	
	public function verifikasi_tidak_valid($id){
		$id_monev = $id;
		
		$ver_sert = 1;
		
		$ver = array('ver_sert' => $ver_sert); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_sert', $ver); 
	}
	
	
}