<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_pelanggaran_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
			$this->db->join('monev_pelanggaran_nilai pelanggaran_nilai', 'pelanggaran_nilai.nilai_pelanggaran=pelanggaran.nilai_pelanggaran');
			$this->db->join('monev_pelanggaran_ver pelanggaran_ver', 'pelanggaran_ver.ver_pelanggaran=pelanggaran.ver_pelanggaran');
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
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
			$this->db->join('monev_pelanggaran_nilai pelanggaran_nilai', 'pelanggaran_nilai.nilai_pelanggaran=pelanggaran.nilai_pelanggaran');
			$this->db->join('monev_pelanggaran_ver pelanggaran_ver', 'pelanggaran_ver.ver_pelanggaran=pelanggaran.ver_pelanggaran');
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
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
			$this->db->join('monev_pelanggaran_nilai pelanggaran_nilai', 'pelanggaran_nilai.nilai_pelanggaran=pelanggaran.nilai_pelanggaran');
			$this->db->join('monev_pelanggaran_ver pelanggaran_ver', 'pelanggaran_ver.ver_pelanggaran=pelanggaran.ver_pelanggaran');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.nim',$username);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getNilaiPelanggaran(){
		$this->db->select('*');
		$this->db->from('monev_pelanggaran_nilai');
		$this->db->order_by('nilai_pelanggaran','asc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function edit()
    {
        $post = $this->input->post();		
		
		$id_monev = $post["id"];
        $nilai_pelanggaran = $post["nilai_pelanggaran"];
        $skor_pelanggaran = $post["skor_pelanggaran"];
        $ket_pelanggaran = $post["ket_pelanggaran"];
        $ver_pelanggaran = 2;
		
		$pelanggaran = array(
			'nilai_pelanggaran' => $nilai_pelanggaran,
			'skor_pelanggaran' => $skor_pelanggaran,
			'ket_pelanggaran' => $ket_pelanggaran,
			'ver_pelanggaran' => $ver_pelanggaran
			); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_pelanggaran', $pelanggaran);
    }
	
	public function verifikasi_valid($id){
		$id_monev = $id;
		
		$ver_pelanggaran = 2;
		
		$ver = array('ver_pelanggaran' => $ver_pelanggaran); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_pelanggaran', $ver); 
	}
	
	public function verifikasi_tidak_valid($id){
		$id_monev = $id;
		
		$ver_pelanggaran = 1;
		
		$ver = array('ver_pelanggaran' => $ver_pelanggaran); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_pelanggaran', $ver); 
	}
	
	
}