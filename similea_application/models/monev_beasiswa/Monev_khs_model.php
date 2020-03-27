<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_khs_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
			$this->db->join('monev_khs_ver khs_ver', 'khs_ver.ver_khs=khs.ver_khs');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		if($query->num_rows() != 0)
		{
			return $query->result();
			// return $query->result_array();
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
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
			$this->db->join('monev_khs_ver khs_ver', 'khs_ver.ver_khs=khs.ver_khs');
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
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
			$this->db->join('monev_khs_ver khs_ver', 'khs_ver.ver_khs=khs.ver_khs');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.nim',$username);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function edit()
    {
        $post = $this->input->post();
		
		$id_monev = $post["id"];
        $nilai_khs = $post["nilai_khs"];
        $ket_khs = $post["ket_khs"];
        $ver_khs = 0;
		
		$khs = array(
			'nilai_khs' => $nilai_khs,
			'ket_khs' => $ket_khs,
			'ver_khs' => $ver_khs
			); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_khs', $khs);
    }
	
	public function upload_khs()
	{
		$post = $this->input->post();
		
		$id_monev = $post["id"];
		$nama_file = str_replace(".","_",$post["id"]);
        	$file_khs = $nama_file."_khs.pdf";
		
		$khs = array('file_khs' => $file_khs);
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_khs', $khs);
	}
	
	public function verifikasi_valid($id){
		$id_monev = $id;
		
		$ver_khs = 2;
		
		$ver = array('ver_khs' => $ver_khs); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_khs', $ver); 
	}
	
	public function verifikasi_tidak_valid($id){
		$id_monev = $id;
		
		$ver_khs = 1;
		
		$ver = array('ver_khs' => $ver_khs); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_khs', $ver); 
	}
	
	
}