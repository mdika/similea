<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_biodata_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('mahasiswa mhs');
			$this->db->join('mahasiswa_biodata mhs_bio', 'mhs_bio.nim=mhs.nim');
				$this->db->join('biodata_jk bio_jk', 'bio_jk.id_jk=mhs_bio.id_jk');
				$this->db->join('biodata_provinsi bio_prov', 'bio_prov.id_provinsi=mhs_bio.id_provinsi');
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