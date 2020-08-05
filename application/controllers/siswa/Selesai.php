<?php


/**
  * 
  */
 class Selesai extends CI_Controller
 {
 	public function index()
 	{
 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		
 			$nama			= $this->session->userdata("nama");
 			$nisn			= $this->session->userdata("nisn");
 			$kelas			= $this->session->userdata("kelas");
 			$prodi			=$this->session->userdata("prodi");

 		$data['tugas_selesai'] = $this->m_siswa->joinTugasSelesaiSiswa($nama,$nisn,$kelas,$prodi);
 		$this->template->load("template/template_siswa","siswa/selesai",$data);
 	}


 	public function viewTugasSelesai()
 	{
 		$nisn 		= $this->input->get("nisn");
 		$kelas 		= $this->input->get("kelas");
 		$prodi 		= $this->input->get("prodi");
 		$kode_tugas = $this->input->get("kode_tugas");

 			$data['tugas'] = $this->m_siswa->joinTugasSelesaiSiswa2($kode_tugas,$nisn,$kelas,$prodi)->row();

 			$this->load->view("siswa/modal_tugas_selesai",$data);
 	}
 } 