<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_skam_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
			$this->db->join('monev_skam_nilai skam_nilai', 'skam_nilai.nilai_skam=skam.nilai_skam');
			$this->db->join('monev_skam_ver skam_ver', 'skam_ver.ver_skam=skam.ver_skam');
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
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
			$this->db->join('monev_skam_nilai skam_nilai', 'skam_nilai.nilai_skam=skam.nilai_skam');
			$this->db->join('monev_skam_ver skam_ver', 'skam_ver.ver_skam=skam.ver_skam');
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
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
			$this->db->join('monev_skam_nilai skam_nilai', 'skam_nilai.nilai_skam=skam.nilai_skam');
			$this->db->join('monev_skam_ver skam_ver', 'skam_ver.ver_skam=skam.ver_skam');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.nim',$username);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getNilaiSkam(){
		$this->db->select('*');
		$this->db->from('monev_skam_nilai');
		$this->db->order_by('nilai_skam','desc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function edit()
    {
        $post = $this->input->post();		
		
		$id_monev = $post["id"];
        $nilai_skam = $post["nilai_skam"];
        $ket_skam = $post["ket_skam"];
        $ver_skam = 0;
		
		$skam = array(
			'nilai_skam' => $nilai_skam,
			'ket_skam' => $ket_skam,
			'ver_skam' => $ver_skam
			); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skam', $skam);
    }
	
	public function upload_skam()
	{
		$post = $this->input->post();
		
		$id_monev = $post["id"];
		$nama_file = str_replace(".","_",$post["id"]);
        	$file_skam = $nama_file."_skam.pdf";
		
		$skam = array('file_skam' => $file_skam);
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skam', $skam);
	}
	
	public function verifikasi_valid($id){
		$id_monev = $id;
		
		$ver_skam = 2;
		
		$ver = array('ver_skam' => $ver_skam); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skam', $ver); 
	}
	
	public function verifikasi_tidak_valid($id){
		$id_monev = $id;
		
		$ver_skam = 1;
		
		$ver = array('ver_skam' => $ver_skam); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skam', $ver); 
	}
	
	
}