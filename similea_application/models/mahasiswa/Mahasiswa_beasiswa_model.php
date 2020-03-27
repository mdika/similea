	<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_beasiswa_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('mahasiswa mhs');
			$this->db->join('mahasiswa_beasiswa mhs_be', 'mhs_be.nim=mhs.nim');
				$this->db->join('beasiswa_jenis be_jenis', 'be_jenis.id_beasiswa=mhs_be.id_beasiswa');
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
	
	public function getById($id){
		$this->db->select('*');
		$this->db->from('mahasiswa mhs');
			$this->db->join('mahasiswa_beasiswa mhs_be', 'mhs_be.nim=mhs.nim');
				$this->db->join('beasiswa_jenis be_jenis', 'be_jenis.id_beasiswa=mhs_be.id_beasiswa');
		$this->db->where('mhs.nim',$id);
		$this->db->order_by('mhs.nim','asc');
		
		$query = $this->db->get();
		
		return $query->row();
    }
	
	public function getJenisBeasiswa(){
		$this->db->select('*');
		$this->db->from('beasiswa_jenis');
		$this->db->order_by('id_beasiswa','asc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function edit()
    {
        $post = $this->input->post();
		
		$nim = $post["id"];
        $id_beasiswa = $post["id_beasiswa"];
        $no_rek = $post["no_rek"];
		
		$m_beasiswa = array(
			'id_beasiswa' => $id_beasiswa,
			'no_rek' => $no_rek
			); 
		
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa_beasiswa', $m_beasiswa);
    }
}