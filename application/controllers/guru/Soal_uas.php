<?php

 /**
  * 
  */
 class Soal_uas extends CI_Controller
 {

 	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 2 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}

 	
 	public function index()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$data['uas'] = $this->m_guru->getData("uas")->result();
 		$this->template->load("template/template_guru","guru/uas",$data);
 	}
 }