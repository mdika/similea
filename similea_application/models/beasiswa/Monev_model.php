<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_model extends CI_Model {

	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('mahasiswa_akademik mhs_ak', 'mhs_ak.nim=mhs.nim');
		$this->db->join('mahasiswa_beasiswa mhs_be', 'mhs_be.nim=mhs.nim');
			$this->db->join('beasiswa_jenis be_jenis', 'be_jenis.id_beasiswa=mhs_be.id_beasiswa');
		$this->db->join('akademik_fakultas ak_fak', 'ak_fak.id_fakultas=mhs_ak.id_fakultas');
		$this->db->join('akademik_prodi ak_prodi', 'ak_prodi.id_prodi=mhs_ak.id_prodi');
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
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
		$this->db->join('mahasiswa_akademik mhs_ak', 'mhs_ak.nim=mhs.nim');
		$this->db->join('mahasiswa_beasiswa mhs_be', 'mhs_be.nim=mhs.nim');
			$this->db->join('beasiswa_jenis be_jenis', 'be_jenis.id_beasiswa=mhs_be.id_beasiswa');
		$this->db->join('akademik_fakultas ak_fak', 'ak_fak.id_fakultas=mhs_ak.id_fakultas');
		$this->db->join('akademik_prodi ak_prodi', 'ak_prodi.id_prodi=mhs_ak.id_prodi');
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.id_monev',$id);
		$this->db->order_by('monev.id_monev','asc');        
		
		$query = $this->db->get(); 
		
		return $query->row();
/*		
		if($query->num_rows() != 0)
		{
			return $query->row();
			// return $query->result_array();
		}
		else
		{
			return false;
		}
*/		
	}

}