<?php

date_default_timezone_set("Asia/Jakarta");

 /**
  * 
  */
 class Soal extends CI_Controller
 {


 	//soal bentuk pilihan ganda
 	public function PG($kode_soal)
 	{
 		$where = array("kode_soal" => $kode_soal);
 		//tampilkan soal pilihan ganda dari bank soal berdasarkan kode soal
 		$data['soal'] = $this->m_soal->cek("bank_soal",$where)->result();
 		$data['nosoal'] = $this->m_soal->cek("bank_soal",$where)->result();
 		$data['timer'] = $this->m_soal->cek("bank_soal",$where)->row();
 		//jumlah soal yang muncul
 		$data['jumlah'] = $this->m_soal->cek("bank_soal",$where)->num_rows();

 		//info mengenai soal (kode soal dan mata pelajaran serta waktu)
 		$data['info'] = $this->m_soal->cek("bank_soal",$where)->row();

 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		
 		$this->template->load("template/template_siswa","ujian/soal",$data);
 	}

 	//soal bentuk pilihan essay 
 	public function essay()
 	{
 		
 	}



 	//tampung semua jawaban ujian pilihan Ganda
 	public function kumpulkanJawabanPG()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		$id_soal = $this->input->post("id_soal");
 		$jawaban = $this->input->post("jawaban");
 		$jumlah = $this->input->post("jumlah");
 		for($i = 1 ; $i <= $jumlah ; $i++ ){
 			$data = array(
 				'id_soal'			=> $id_soal[$i-1],
 				'nama'				=> $this->input->post("nama") ,
 				'nisn'				=> $this->input->post("nisn") ,
 				'jawaban'			=> $jawaban[$i],
 				'kelas'				=> $this->input->post("kelas") ,
 				'tanggal'			=> date("Y-m-d"),
 				'mata_pelajaran'	=> $this->input->post("mata_pelajaran") ,
 				'prodi'				=> $this->input->post("prodi") ,
 				'kode_soal'			=> $this->input->post("kode_soal") ,
 				'bentuk_ujian'		=> $this->input->post("bentuk_ujian") ,
 			);

			$this->m_soal->input($data,"jawaban");
 		}

 		$this->session->set_flashdata("Ok","Ok");
 		redirect("ujian/Selesai");
 

 	}

 }