<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa_session_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_khs khs', 'khs.monev_monev=monev.monev_monev');
			$this->db->join('monev_khs_session khs_session', 'khs_session.monev_session=khs.monev_session');
		$this->db->join('monev_hasil hasil', 'hasil.monev_monev=monev.monev_monev');
			$this->db->join('monev_hasil_status status', 'status.monev_status=hasil.monev_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.monev_sanksi=hasil.monev_sanksi');
		$this->db->order_by('monev.monev_monev','asc');
		
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
	
	public function getSession(){
		$monev = "session";
		
		$this->db->select('*');
		$this->db->from('monev_session');
		$this->db->where('monev',$monev);
		$this->db->order_by('monev_session','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getMonevSession(){
		$monev = "session";
		
		$this->db->select('monev_session');
		$this->db->from('monev_session');
		$this->db->where('monev',$monev);
		
		$query = $this->db->get();
		
		return $query->row()->monev_session;
	}
	
	public function verifikasi_valid(){
		$monev = "session";
		
		$monev_session = 1;
		
		$session = array('monev_session' => $monev_session); 
		
		$this->db->where('monev', $monev);
		$this->db->update('monev_session', $session); 
	}
	
	public function verifikasi_tidak_valid($monev){
		$monev = "session";
		
		$monev_session = 0;
		
		$session = array('monev_session' => $monev_session); 
		
		$this->db->where('monev', $monev);
		$this->db->update('monev_session', $session); 
	}	
}