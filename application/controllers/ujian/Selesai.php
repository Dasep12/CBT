<?php


 /**
  * 
  */
 class Selesai extends CI_Controller
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
 		$this->template->load("template/template_siswa","ujian/selesai");
 	}
 }