<?php

 /**
  * 
  */
 class Soal_uas extends CI_Controller
 {
 	public function index()
 	{
 		$data['uas'] = $this->m_guru->getData("uas")->result();
 		$this->template->load("template/template_guru","guru/uas",$data);
 	}
 }