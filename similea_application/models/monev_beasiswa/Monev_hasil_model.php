<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_hasil_model extends CI_Model{
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('beasiswa_monev monev');
		$this->db->join('mahasiswa mhs', 'mhs.nim=monev.nim');
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
			$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=skao.id_jabatan');
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
			$this->db->join('monev_hasil_ver hasil_ver', 'hasil_ver.ver_hasil=hasil.ver_hasil');
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
		$this->db->join('monev_khs khs', 'khs.id_monev=monev.id_monev');
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
			$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=skao.id_jabatan');
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
			$this->db->join('monev_hasil_ver hasil_ver', 'hasil_ver.ver_hasil=hasil.ver_hasil');
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
		$this->db->join('monev_skao skao', 'skao.id_monev=monev.id_monev');
			$this->db->join('ormawa_jabatan orm_jab', 'orm_jab.id_jabatan=skao.id_jabatan');
		$this->db->join('monev_skam skam', 'skam.id_monev=monev.id_monev');
		$this->db->join('monev_sert sert', 'sert.id_monev=monev.id_monev');
		$this->db->join('monev_pelanggaran pelanggaran', 'pelanggaran.id_monev=monev.id_monev');
		$this->db->join('monev_hasil hasil', 'hasil.id_monev=monev.id_monev');
			$this->db->join('monev_hasil_status status', 'status.id_status=hasil.id_status');
			$this->db->join('monev_hasil_sanksi sanksi', 'sanksi.id_sanksi=hasil.id_sanksi');
			$this->db->join('monev_hasil_ver hasil_ver', 'hasil_ver.ver_hasil=hasil.ver_hasil');
		$this->db->where('monev.nim',$username);
		$this->db->order_by('monev.id_monev','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
//	============================================================================================
//		MODUL KHS
//	============================================================================================

	function get_ver_khs($id)
	{
		$this->db->select('ver_khs');
		$this->db->from('monev_khs');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->ver_khs;		
	}
	
	function get_nilai_khs($id)
	{
		$this->db->select('nilai_khs');
		$this->db->from('monev_khs');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->nilai_khs;
	}
	
	public function update_khs_hasil($id)
    {
		$ver_khs = $this->get_ver_khs($id);
		$nilai_khs = $this->get_nilai_khs($id);
		$khs_hasil;
		
		if ($ver_khs == 2){
			if ($nilai_khs > 2.99) {$khs_hasil = 40;}
			elseif ($nilai_khs > 2.25) {$khs_hasil = $nilai_khs/4*40;}
			elseif ($nilai_khs > 0.00) {$khs_hasil = $nilai_khs/3*40;}
			else {$khs_hasil = -4;}
		} else {
			$khs_hasil = -4;
		}
		
		$khs = array('khs_hasil' => $khs_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $khs); 
    }
	
//	============================================================================================
//		MOUDL SKAO
//	============================================================================================

	function get_ver_skao($id)
	{
		$this->db->select('ver_skao');
		$this->db->from('monev_skao');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->ver_skao;		
	}
	
	function get_nilai_skao($id)
	{
		$this->db->select('nilai_skao');
		$this->db->from('monev_skao');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->nilai_skao;
	}
	
	function get_id_ormawa($id)
	{
		$this->db->select('id_ormawa');
		$this->db->from('monev_skao');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->id_ormawa;
	}
	
	function get_id_jabatan($id)
	{
		$this->db->select('id_jabatan');
		$this->db->from('monev_skao');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->id_jabatan;
	}
	
	public function update_skao_hasil($id)
    {
		$ver_skao = $this->get_ver_skao($id);
		$nilai_skao = $this->get_nilai_skao($id);
		$id_ormawa = $this->get_id_ormawa($id);
		$id_jabatan = $this->get_id_jabatan($id);
		$skao_hasil;
		
		if ($ver_skao == 2){
			if ($nilai_skao == 0) {$skao_hasil = -1;}
			elseif ($id_ormawa != "ORM000" && $id_jabatan == "J4") {$skao_hasil = 20;}
			elseif ($id_ormawa != "ORM000" && $id_jabatan == "J3") {$skao_hasil = 15;}
			elseif ($id_ormawa != "ORM000" && $id_jabatan == "J2") {$skao_hasil = 10;}
			elseif ($id_ormawa != "ORM000" && $id_jabatan == "J1") {$skao_hasil = 5;}
			else {$skao_hasil = -1;}
		} else {
			$skao_hasil = -1;
		}
		
        $skao = array('skao_hasil' => $skao_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $skao); 
    }
	
//	============================================================================================
//		MOUDL SKAM
//	============================================================================================

	function get_ver_skam($id)
	{
		$this->db->select('ver_skam');
		$this->db->from('monev_skam');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->ver_skam;		
	}
	
	function get_nilai_skam($id)
	{
		$this->db->select('nilai_skam');
		$this->db->from('monev_skam');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->nilai_skam;
	}
	
	public function update_skam_hasil($id)
    {	
		$ver_skam = $this->get_ver_skam($id);
		$nilai_skam = $this->get_nilai_skam($id);
		$skam_hasil;
		
		if ($ver_skam == 2){
			if ($nilai_skam > 0) {$skam_hasil = 20;}
			else {$skam_hasil = -1;}
		} else {
			$skam_hasil = -1;
		}
		
		$skam = array('skam_hasil' => $skam_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $skam); 
    }
	
//	============================================================================================
//		MODUL SERT
//	============================================================================================

	function get_ver_sert($id)
	{
		$this->db->select('ver_sert');
		$this->db->from('monev_sert');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->ver_sert;		
	}
	
	function get_nilai_sert($id)
	{
		$this->db->select('nilai_sert');
		$this->db->from('monev_sert');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->nilai_sert;
	}
	
	function get_internasional($id)
	{
		$this->db->select('internasional');
		$this->db->from('monev_sert');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->internasional;
	}
	
	function get_nasional($id)
	{
		$this->db->select('nasional');
		$this->db->from('monev_sert');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->nasional;
	}
	
	function get_provinsi($id)
	{
		$this->db->select('provinsi');
		$this->db->from('monev_sert');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->provinsi;
	}
	
	function get_kabupaten($id)
	{
		$this->db->select('kabupaten');
		$this->db->from('monev_sert');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->kabupaten;
	}
	
	public function update_sert_hasil($id)
    {
		$ver_sert = $this->get_ver_sert($id);
		$nilai_sert = $this->get_nilai_sert($id);
		$internasional = $this->get_internasional($id);
		$nasional = $this->get_nasional($id);
		$provinsi = $this->get_provinsi($id);
		$kabupaten = $this->get_kabupaten($id);
		$sert_hasil;
		
		if ($ver_sert == 2){
			$sert_total = $internasional + $nasional + $provinsi + $kabupaten;
			if ($nilai_sert == 1 && $sert_total >= 4) {$sert_hasil = 20;} 
			elseif ($nilai_sert == 1 && $sert_total > 0) {$sert_hasil = $sert_total/4*20;}
			elseif ($nilai_sert == 0) {$sert_hasil = 0;}
			else {$sert_hasil = 0;}
		} else {
			$sert_hasil = 0;
		}
		
		$sert = array('sert_hasil' => $sert_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $sert); 
    }
	
//	============================================================================================
//		MODUL PELANGGARAN
//	============================================================================================

	function get_ver_pelanggaran($id)
	{
		$this->db->select('ver_pelanggaran');
		$this->db->from('monev_pelanggaran');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->ver_pelanggaran;		
	}
	
	function get_nilai_pelanggaran($id)
	{
		$this->db->select('nilai_pelanggaran');
		$this->db->from('monev_pelanggaran');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->nilai_pelanggaran;
	}
	
	function get_skor_pelanggaran($id)
	{
		$this->db->select('skor_pelanggaran');
		$this->db->from('monev_pelanggaran');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->skor_pelanggaran;
	}
	
	public function update_pelanggaran_hasil($id)
    {	
		$ver_pelanggaran = $this->get_ver_pelanggaran($id);
		$nilai_pelanggaran = $this->get_nilai_pelanggaran($id);
		$skor_pelanggaran = $this->get_skor_pelanggaran($id);
		$pelanggaran_hasil;
		
		if ($ver_pelanggaran == 2){
			if ($nilai_pelanggaran == 1) {$pelanggaran_hasil = $skor_pelanggaran;}
			else {$pelanggaran_hasil = 0;}
		} else {
			$pelanggaran_hasil = 0;
		}
		
        $pelanggaran = array('pelanggaran_hasil' => $pelanggaran_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $pelanggaran); 
    }
	
//	============================================================================================
//		MODUL TOTAL
//	============================================================================================
	
	function get_khs_hasil($id)
	{
		$this->db->select('khs_hasil');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->khs_hasil;
	}
	
	function get_skao_hasil($id)
	{
		$this->db->select('skao_hasil');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->skao_hasil;		
	}
	
	function get_skam_hasil($id)
	{
		$this->db->select('skam_hasil');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->skam_hasil;		
	}
	
	function get_sert_hasil($id)
	{
		$this->db->select('sert_hasil');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->sert_hasil;		
	}
	
	function get_pelanggaran_hasil($id)
	{
		$this->db->select('pelanggaran_hasil');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->pelanggaran_hasil;		
	}
	
	public function update_total_hasil($id)
    {
		$khs_hasil = $this->get_khs_hasil($id);
		$skao_hasil = $this->get_skao_hasil($id);
		$skam_hasil = $this->get_skam_hasil($id);
		$sert_hasil = $this->get_sert_hasil($id);
		$pelanggaran_hasil = $this->get_pelanggaran_hasil($id);
		$total_hasil = $khs_hasil + $skao_hasil + $skam_hasil + $sert_hasil + $pelanggaran_hasil;
		
		$total = array('total_hasil' => $total_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $total); 
    }

//	============================================================================================
//		MODUL STATUS & SANKSI & KETERANGAN & VERIFIKASI
//	============================================================================================

	function get_total_hasil($id)
	{
		$this->db->select('total_hasil');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->total_hasil;		
	}
	
	function get_id_sanksi($id)
	{
		$this->db->select('id_sanksi');
		$this->db->from('monev_hasil');
		$this->db->where('id_monev', $id);
		
		return $this->db->get()->row()->id_sanksi;
		
	}
	
	public function update_status_hasil($id)
    {
		$total_hasil = $this->get_total_hasil($id);
		$id_status;
		
		if ($total_hasil >= 60) {$id_status = "LMV";}
		elseif ($total_hasil > -2) {$id_status = "TLM";}
		else {$id_status = "TMV";}
		
		$status = array('id_status' => $id_status); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $status); 
    }
	
	public function update_sanksi_hasil($id)
    {	
		$total_hasil = $this->get_total_hasil($id);
		$id_sanksi;
		
		if ($total_hasil >= 60) {$id_sanksi = "S00";}
		elseif ($total_hasil >= 54) {$id_sanksi = "S01";}
		elseif ($total_hasil >= 48) {$id_sanksi = "S02";}
		elseif ($total_hasil >= 42) {$id_sanksi = "S03";}
		elseif ($total_hasil >= 36) {$id_sanksi = "S04";}
		elseif ($total_hasil >= 30) {$id_sanksi = "S05";}
		elseif ($total_hasil >= 24) {$id_sanksi = "S06";}
		elseif ($total_hasil >= 18) {$id_sanksi = "S07";}
		elseif ($total_hasil >= 12) {$id_sanksi = "S08";}
		elseif ($total_hasil >= 6) {$id_sanksi = "S09";}
		else {$id_sanksi = "S10";}		
		
		$sanksi = array('id_sanksi' => $id_sanksi); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $sanksi); 
    }
	
	public function update_keterangan_hasil($id)
    {
		$id_sanksi = $this->get_id_sanksi($id);
		$uang_beasiswa = 1200000;
		$keterangan_hasil;
		
		if ($id_sanksi == "S00") {$keterangan_hasil = $uang_beasiswa*0;}
		elseif ($id_sanksi == "S01") {$keterangan_hasil = $uang_beasiswa*10/100;}
		elseif ($id_sanksi == "S02") {$keterangan_hasil = $uang_beasiswa*20/100;}
		elseif ($id_sanksi == "S03") {$keterangan_hasil = $uang_beasiswa*30/100;}
		elseif ($id_sanksi == "S04") {$keterangan_hasil = $uang_beasiswa*40/100;}
		elseif ($id_sanksi == "S05") {$keterangan_hasil = $uang_beasiswa*50/100;}
		elseif ($id_sanksi == "S06") {$keterangan_hasil = $uang_beasiswa*60/100;}
		elseif ($id_sanksi == "S07") {$keterangan_hasil = $uang_beasiswa*70/100;}
		elseif ($id_sanksi == "S08") {$keterangan_hasil = $uang_beasiswa*80/100;}
		elseif ($id_sanksi == "S09") {$keterangan_hasil = $uang_beasiswa*100/100;}
		else {$keterangan_hasil = "Tidak Menerima Uang Saku";}
		
		$keterangan = array('keterangan_hasil' => $keterangan_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $keterangan); 
    }

	public function update_ver_hasil($id)
    {
		$ver_khs = $this->get_ver_khs($id);
		$ver_skao = $this->get_ver_skao($id);
		$ver_skam = $this->get_ver_skam($id);
		$ver_sert = $this->get_ver_sert($id);
		$ver_pelanggaran = $this->get_ver_pelanggaran($id);		
		$ver_hasil;
				
		if ($ver_khs != 0 && $ver_skao != 0 && $ver_skam != 0 && $ver_sert != 0 && $ver_pelanggaran != 0){
			$ver_hasil = 1;
		} else {
			$ver_hasil = 0;
		}
		
		$verifikasi = array('ver_hasil' => $ver_hasil); 
		
		$this->db->where('id_monev', $id);
		$this->db->update('monev_hasil', $verifikasi); 
    }

//	============================================================================================
//		MODUL HASIL MONEV
//	============================================================================================
	
	public function update_monev_hasil($id)
    {
		$this->update_total_hasil($id);
		$this->update_status_hasil($id);
		$this->update_sanksi_hasil($id);
		$this->update_keterangan_hasil($id);
		$this->update_ver_hasil($id);
    }
	
	public function update_monev_khs_hasil($id)
	{
		$this->update_khs_hasil($id);
		$this->update_monev_hasil($id);
	}
	
	public function update_monev_skao_hasil($id)
	{
		$this->update_skao_hasil($id);
		$this->update_monev_hasil($id);
	}
	
	public function update_monev_skam_hasil($id)
	{
		$this->update_skam_hasil($id);
		$this->update_monev_hasil($id);
	}
	
	public function update_monev_sert_hasil($id)
	{
		$this->update_sert_hasil($id);
		$this->update_monev_hasil($id);
	}
	
	public function update_monev_pelanggaran_hasil($id)
	{
		$this->update_pelanggaran_hasil($id);
		$this->update_monev_hasil($id);
	}
}