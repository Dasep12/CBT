<?php


 /**
  * 
  */
 class Daftar_tugas extends CI_Controller
 {
 	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 3 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}
 	
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

 		$data['daftar_tugas'] = $this->m_siswa->joinTugasSiswa($nama,$nisn,$kelas,$prodi);
 		$this->template->load("template/template_siswa","siswa/daftar_tugas",$data);
 	}
 }