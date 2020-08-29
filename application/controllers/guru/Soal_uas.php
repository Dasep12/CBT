<?php

 /**
  * 
  */
 class Soal_uas extends CI_Controller
 {
 	public function index()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$data['uas'] = $this->m_guru->getData("uas")->result();
 		$this->template->load("template/template_guru","guru/uas",$data);
 	}
 }