<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_akademik_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('mahasiswa mhs');
			$this->db->join('mahasiswa_akademik mhs_ak', 'mhs_ak.nim=mhs.nim');
				$this->db->join('akademik_fakultas ak_fak', 'ak_fak.id_fakultas=mhs_ak.id_fakultas');
				$this->db->join('akademik_prodi ak_prodi', 'ak_prodi.id_prodi=mhs_ak.id_prodi');
		$this->db->order_by('mhs.nim','asc');
		
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
}