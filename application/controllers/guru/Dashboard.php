<?php



 /**
  * 
  */
 class Dashboard extends CI_Controller
 {
 	public function index()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$this->template->load("template/template_guru","guru/dashboard",$data);
 	}
 }