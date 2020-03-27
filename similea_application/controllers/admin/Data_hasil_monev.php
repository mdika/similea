<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_hasil_monev extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("monev_beasiswa/monev_model");
	}
	
	public function index()
	{
		$data["username"] = $this->session->userdata('username');
		$data["monev"] = $this->monev_model->getAll();
		$data["subtitle"] = "Data Monev Beasiswa";
		$data["view"] = "data_hasil_monev/data_hasil_monev";
        $this->load->view("admin/view", $data);
	}
	
	function export()
	{
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("No", "NIM", "Nama Lengkap", "Program Studi", "Jenis Beasiswa", "Angkatan", "IP", "Nilai", "Organisasi", "Nilai", "Mentoring", "Nilai", "Prestasi", "Nilai", "Pelanggaran", "Nilai", "Total Nilai", "Status", "SPP", "Verifikasi");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$monev = $this->monev_model->getAll();

		$excel_row = 2;
		$no = 1;

		foreach($monev as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nim);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_lengkap);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->nama_prodi);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->nama_beasiswa);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->angkatan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->nilai_khs);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->khs_hasil);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->nilai_jabatan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->skao_hasil);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->nilai_skam);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->skam_hasil);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $sert = $row->internasional + $row->nasional + $row->provinsi + $row->kabupaten);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->sert_hasil);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->nilai_pelanggaran);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->pelanggaran_hasil);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->total_hasil);
			$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->keterangan_status);
			$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->keterangan_sanksi);
			$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->ket_ver_hasil);
			$excel_row++;
			$no++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Monev Beasiswa.xls"');
		$object_writer->save('php://output');
	}
	
	function phpexcel()
	{
		$this->load->model("excel_export_model");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Name", "Address", "Gender", "Designation", "Age");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$employee_data = $this->excel_export_model->fetch_data();

		$excel_row = 2;

		foreach($employee_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->address);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->designation);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
	}
	
	public function phpoffice(){
          $monev = $this->monev_model->getAll();

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
					  ->setCellValue('B1', 'NIM')
                      ->setCellValue('C1', 'Nama Lengkap')
                      ->setCellValue('D1', 'Program Studi')
                      ->setCellValue('E1', 'Jenis Beasiswa')
                      ->setCellValue('F1', 'Angkatan')
                      ->setCellValue('G1', 'IP')
                      ->setCellValue('H1', 'Nilai')
                      ->setCellValue('I1', 'Organisasi')
                      ->setCellValue('J1', 'Nilai')
                      ->setCellValue('K1', 'Mentoring')
                      ->setCellValue('L1', 'Nilai')
                      ->setCellValue('M1', 'Prestasi')
                      ->setCellValue('N1', 'Nilai')
                      ->setCellValue('O1', 'Pelanggaran')
                      ->setCellValue('P1', 'Nilai')
                      ->setCellValue('Q1', 'Total Nilai')
                      ->setCellValue('R1', 'Status')
                      ->setCellValue('S1', 'SPP')
                      ->setCellValue('T1', 'Sanksi')
					  ->setCellValue('U1', 'Verifikasi');

          $kolom = 2;
          $nomor = 1;
          foreach($monev as $m) {
			
			if($m->nilai_skao == 0 && $m->id_jabatan == "J0") {$skao = 0;}
                                                            elseif($m->nilai_skao == 1 && $m->id_jabatan == "J1") {$skao = 4;}
                                                            elseif($m->nilai_skao == 1 && $m->id_jabatan == "J2") {$skao = 3;}
                                                            elseif($m->nilai_skao == 1 && $m->id_jabatan == "J3") {$skao = 2;}
                                                            elseif($m->nilai_skao == 1 && $m->id_jabatan == "J4") {$skao = 1;}
                                                            else {$skao = 0;}

               $spreadsheet->setActiveSheetIndex(0)                           
						   ->setCellValue('A' . $kolom, $nomor)
					  	   ->setCellValue('B' . $kolom, $m->nim)
                      	   ->setCellValue('C' . $kolom, $m->nama_lengkap)
                      	   ->setCellValue('D' . $kolom, $m->nama_prodi)
                      	   ->setCellValue('E' . $kolom, $m->nama_beasiswa)
                      	   ->setCellValue('F' . $kolom, $m->angkatan)
                      	   ->setCellValue('G' . $kolom, $m->nilai_khs)
                      	   ->setCellValue('H' . $kolom, $m->khs_hasil)
                      	   ->setCellValue('I' . $kolom, $m->nilai_jabatan)
                      	   ->setCellValue('J' . $kolom, $m->skao_hasil)
                      	   ->setCellValue('K' . $kolom, $m->nilai_skam)
                      	   ->setCellValue('L' . $kolom, $m->skam_hasil)
                      	   ->setCellValue('M' . $kolom, $sert = $m->internasional + $m->nasional + $m->provinsi + $m->kabupaten)
                      	   ->setCellValue('N' . $kolom, $m->sert_hasil)
                      	   ->setCellValue('O' . $kolom, $m->nilai_pelanggaran)
                      	   ->setCellValue('P' . $kolom, $m->pelanggaran_hasil)
                      	   ->setCellValue('Q' . $kolom, $m->total_hasil)
                      	   ->setCellValue('R' . $kolom, $m->keterangan_status)
                      	   ->setCellValue('S' . $kolom, $m->keterangan_sanksi)
                      	   ->setCellValue('T' . $kolom, $m->keterangan_hasil)
						   ->setCellValue('U' . $kolom, $m->ket_ver_hasil);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
	  	  header('Content-Disposition: attachment;filename="Data Monev Beasiswa.xlsx"');
	  	  header('Cache-Control: max-age=0');

	  $writer->save('php://output');
    }
	
/*	public function isAdmin()
	{
		if($this->session->userdata('admin_status') == TRUE)
		{
			redirect(base_url('admin/dashboard'));
		}
		else
		{
			redirect(base_url('login'));
		}
	}
*/
}
