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
 		//hari 
 		$data =  date("D");
 		$data2 = date("m");
 			switch ($data) {
 				case 'Mon':
 					$hari	 = "Senin" ;
 					break;
 				case 'Tue':
 					$data = "Selasa" ;
 					break;
 				case 'Wed':
 					$data = "Rabu" ;
 					break;
 				case 'Thu':
 					$data = "Kamis" ;
 					break;
 				case 'Fri':
 					$data = "Jum'at" ;
 					break;
 				case 'Sat':
 					 $hari = "Sabtu" ;
 					break;
 				case 'Sun':
 					 $hari = "Minggu" ;
 					break;

 				
 				default:
 					# code...
 					break;
 			}
 			switch ($data2) {
 				case '01':
 					$bulan = "Januari" ;
 					break;
 				case '02':
 					$bulan = "Februari" ;
 					break;
 				case '03':
 					$bulan = "Maret" ;
 					break;
 				case '04':
 					$bulan = "April" ;
 					break;
 				case '05':
 					$bulan = "Mei" ;
 					break;
 				case '06':
 					$bulan = "Juni" ;
 					break;
 				case '07':
 					$bulan = "Juli" ;
 					break;
 				case '08':
 					$bulan = "Agustus" ;
 					break;
 				case '09':
 					$bulan = "September" ;
 					break;
 				case '10':
 					$bulan = "Oktober" ;
 					break;
 				case '11':
 					$bulan = "November" ;
 					break;
 				case '12':
 					$bulan = "Desember" ;
 					break;
 				default:
 					# code...
 					break;
 			}
 			return $hari .",". date("d ") . $bulan . date(" Y")  ;
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