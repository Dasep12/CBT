<?php

 /**
  * 
  */
 class Nilai_ujian extends CI_Controller
 {
 	public function index()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
  		//daftar mata pelajaran yang diambil 
 		$data['mata_pelajaran'] = $this->m_guru->cariData(array("kode_pengajar" => $this->session->userdata("nipn")),"mata_pelajaran");

 		//list jurusan
 		$data['jurusan'] = $this->m_guru->getData("jurusan");
 		$this->template->load("template/template_guru","guru/nilai_ujian",$data);
 	}


 	//view list siswa yang ikut ujian
 	public function view()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$data['jawaban_siswa'] = array();

			$ujian = $this->input->post("tipe_ujian");
	 		$kelas = $this->input->post("kelas");
	 		$prodi = $this->input->post("prodi");
	 		$mapel = $this->input->post("mata_pelajaran");
	 		$kode_soal  = $this->input->post("kode_soal");

	 		$where = array(
	 			'prodi'		=> $prodi ,
	 			'kelas'		=> $kelas,
	 		);

	 	//kirim variable data untuk cek soal dan jawaban berdasarkan inputan user
	 	$data['ujian']  = $ujian ;
	 	$data['kelas']  = $kelas ;
	 	$data['prodi']  = $prodi ;
	 	$data['mapel']  = $mapel ;
	 	$data['kode_soal'] = $kode_soal ;


 		//tampilkan data siswa 
 		$data['daftar_siswa_ujian'] = $this->m_guru->cariData($where,"siswa")->result();
 		$this->load->view("guru/reviewnilai",$data);
 	}



 	//jawaban dari siswa tampilkan kedalam model
 	public function lihat_jawaban()
 	{
 		$data['kode_soal'] = $this->input->get("kode_soal");
 		$data['nisn'] = $this->input->get("nisn")  ; 
 		$data['ujian'] = $this->input->get("ujian")  ; 
 		$data['prodi'] = $this->input->get("prodi")  ; 
 		$data['kelas'] = $this->input->get("kelas")  ; 
 		$data['mapel'] = $this->input->get("mapel")  ; 

 		$data['benar'] = 0 ;
 		$data['salah'] = 0 ;
 		$where = array(
 				'bentuk_ujian'			=> $data['ujian'],
 				'nisn'					=> $data['nisn'],
 				'prodi'					=> $data['prodi'],
 				'kelas'					=> $data['kelas'],
 				'mata_pelajaran'		=> $data['mapel'],	
 				'kode_soal'				=> $data['kode_soal'],	
 		);

 		$where2  = array(
 			'kelas'					=> $data['kelas'],
 			'mata_pelajaran'		=> $data['mapel'],
 			'bentuk_ujian'			=> $data['ujian'],
 			'kode_soal'				=> $data['kode_soal'],
 		);
 		//tampilkan jawaban ujian siswa berdasarkan paramater where 
 		$data['jawaban_siswa']  = $this->m_guru->cariData($where,"jawaban");

 		//tampilkan kunci jawaban dari bank soal  berdasarkan parameter where2 
 		$data['kunci_jawaban']  = $this->m_guru->cariData($where2,"bank_soal");

 		//cari kesamaan jawaban siswa dan kunci jawaban
 		foreach($data['jawaban_siswa']->result() as $jawaban){
 			$cek = $this->db->get_where("bank_soal",array("id_soal" => $jawaban->id_soal ,"jawaban" => $jawaban->jawaban ,"bentuk_ujian" => $jawaban->bentuk_ujian , "kode_soal" => $jawaban->kode_soal))->num_rows();
 			if($cek){
 				++$data['benar'] ;
 			}else {
 				$data['salah']++ ;
 			}
 		}

  		$this->load->view("guru/modal_jawaban_siswa",$data);
 	}

 }