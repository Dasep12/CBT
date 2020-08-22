<?php


 /**
  * 
  */
 class Form_ujian extends CI_Controller
 {

 	public function index()
 	{
 		$where = array("hari" => date('Y-m-d'));
 		$data['jadwal'] = $this->m_soal->cek("jadwal_ujian",$where)->result();

 		
 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['hari'] = $this->hari();
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		$this->template->load("template/template_siswa","ujian/form_ujian",$data);
 	}

 	function hari()
 	{
 		$data =  date("D");
 			switch ($data) {
 				case 'Mon':
 					$hari = "Senin" ;
 					break;
 				case 'Tue':
 					$hari = "Selasa" ;
 					break;
 				case 'Wed':
 					$hari = "Rabu" ;
 					break;
 				case 'Thu':
 					$hari = "Kamis" ;
 					break;
 				case 'Fri':
 					$hari = "Jum'at" ;
 					break;
 				case 'Sat':
 					$hari = "Sabtu" ;
 					break;

 				
 				default:
 					# code...
 					break;
 			}
 		return $hari ;
 	}


 	//cek ke validan data yang di input
 	public function cekBiodata()
 	{
 		$kode_soal = $this->input->post("kode_soal");
 		$tanggal = $this->input->post("tanggal");
 		$where = array(
 			'kode_soal'	=> $kode_soal,
 			'hari'	=> $tanggal ,
 		);
 		//cek jadwal ujian 
 		$cekJadwal = $this->m_soal->cek("jadwal_ujian",$where)->num_rows();
 		
 		//tampilkan jadwal ujian
 		$jadwal = $this->m_soal->cek("jadwal_ujian",$where)->row();
 		
 		//cek nisn siswa apakah sudah pernah ujian apa belum
 		$where2 = array(
 			'kode_soal'	=> $kode_soal,
 			'nisn'		=> $this->input->post("nisn")
 		);
 		$cekData = $this->m_soal->cek("jawaban",$where2)->num_rows();

 		if($cekData > 0){
 			echo "anda sudah ujian";
 		}
 		else if($cekJadwal <= 0){	
 			echo "Jadwal Tidak Ada";
 		}else {
 			echo $jadwal->kode_soal;
 		}
 	}




 }