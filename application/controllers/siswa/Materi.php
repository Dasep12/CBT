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

 		$this->template->load("template/template_siswa","siswa/materi",$data);
 	}
 }