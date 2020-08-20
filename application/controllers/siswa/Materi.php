<?php


 /**
  * 
  */
 class Materi extends CI_Controller
 {
 	public function index()
 	{
 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		$data['mata_pelajaran'] = $this->m_siswa->getSiswa(array("prodi" => $this->session->userdata("prodi") , "kelas" => $this->session->userdata("kelas")),"mata_pelajaran")->result();
 		$this->template->load("template/template_siswa","siswa/materi",$data);
 	}


 	public function list($mapel)
 	{
 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		
 		$where = array(
 			"kode_mapel"			=> $mapel ,
 			"kelas"					=> $this->session->userdata("kelas"),
 			"prodi"					=> $this->session->userdata("prodi"),
 		);
 		$data['materi_siswa'] = $this->m_siswa->getSiswa($where,"materi")->result();
 		$this->template->load("template/template_siswa","siswa/listMateri",$data);
 	}

 	public function lihatMateri($kode)
 	{
 		$data['file_materi'] = $this->m_siswa->getSiswa(array("kode_materi" => $kode),"file_materi")->result();
 		$data['materi'] = $this->m_siswa->getSiswa(array("kode_materi" => $kode),"materi")->row();

 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		$this->template->load("template/template_siswa","siswa/lihatMateri",$data);

 	}
 }