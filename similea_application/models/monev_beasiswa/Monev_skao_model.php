<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_skao_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
			//$this->db->join('mahasiswa_ormawa mhs_orm', 'mhs_orm.nim=mhs.nim');
				//$this->db->join('ormawa orm', 'orm.id_ormawa=mhs_orm.id_ormawa');
				//$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=mhs_orm.id_jabatan');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
			$this->db->join('monev_skao_nilai skao_nilai', 'skao_nilai.nilai_skao=skao.nilai_skao');
			$this->db->join('monev_skao_ver skao_ver', 'skao_ver.ver_skao=skao.ver_skao');
			$this->db->join('ormawa orm', 'orm.id_ormawa=skao.id_ormawa');
			$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=skao.id_jabatan');
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
			//$this->db->join('mahasiswa_ormawa mhs_orm', 'mhs_orm.nim=mhs.nim');
				//$this->db->join('ormawa orm', 'orm.id_ormawa=mhs_orm.id_ormawa');
				//$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=mhs_orm.id_jabatan');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
			$this->db->join('monev_skao_nilai skao_nilai', 'skao_nilai.nilai_skao=skao.nilai_skao');
			$this->db->join('monev_skao_ver skao_ver', 'skao_ver.ver_skao=skao.ver_skao');
			$this->db->join('ormawa orm', 'orm.id_ormawa=skao.id_ormawa');
			$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=skao.id_jabatan');
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
			//$this->db->join('mahasiswa_ormawa mhs_orm', 'mhs_orm.nim=mhs.nim');
				//$this->db->join('ormawa orm', 'orm.id_ormawa=mhs_orm.id_ormawa');
				//$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=mhs_orm.id_jabatan');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
			$this->db->join('monev_skao_nilai skao_nilai', 'skao_nilai.nilai_skao=skao.nilai_skao');
			$this->db->join('monev_skao_ver skao_ver', 'skao_ver.ver_skao=skao.ver_skao');
			$this->db->join('ormawa orm', 'orm.id_ormawa=skao.id_ormawa');
			$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=skao.id_jabatan');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
		$this->db->where('monev.nim',$username);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getNilaiSkao(){
		$this->db->select('*');
		$this->db->from('monev_skao_nilai');
		$this->db->order_by('nilai_skao','desc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function getOrmawa(){
		$this->db->select('*');
		$this->db->from('ormawa');
		$this->db->order_by('id_ormawa','asc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function getJabatan(){
		$this->db->select('*');
		$this->db->from('ormawa_jabatan');
		$this->db->order_by('id_jabatan','asc');
		
		$query = $this->db->get();
		
		return $query->result();
    }
	
	public function edit()
    {
        $post = $this->input->post();		
		
		$id_monev = $post["id"];
        $nilai_skao = $post["nilai_skao"];
        $id_ormawa = $post["id_ormawa"];
        $id_jabatan = $post["id_jabatan"];
        $ket_skao = $post["ket_skao"];
        $ver_skao = 0;
		
		$skao = array(
			'nilai_skao' => $nilai_skao,
			'id_ormawa' => $id_ormawa,
			'id_jabatan' => $id_jabatan,
			'ket_skao' => $ket_skao,
			'ver_skao' => $ver_skao
			); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skao', $skao);
    }
	
	public function upload_skao()
	{
		$post = $this->input->post();
		
		$id_monev = $post["id"];
		$nama_file = str_replace(".","_",$post["id"]);
        	$file_skao = $nama_file."_skao.pdf";
		
		$skao = array('file_skao' => $file_skao);
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skao', $skao);
	}
	
	public function verifikasi_valid($id){
		$id_monev = $id;
		
		$ver_skao = 2;
		
		$ver = array('ver_skao' => $ver_skao); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skao', $ver); 
	}
	
	public function verifikasi_tidak_valid($id){
		$id_monev = $id;
		
		$ver_skao = 1;
		
		$ver = array('ver_skao' => $ver_skao); 
		
		$this->db->where('id_monev', $id_monev);
		$this->db->update('monev_skao', $ver); 
	}
	
	
}