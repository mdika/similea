<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->order_by('nim','asc');
		
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