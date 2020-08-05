<?php



 /**
  * 
  */
 class Dashboard extends CI_Controller
 {
 	public function index()
 	{
 		$this->template->load("template/template_guru","guru/dashboard");
 	}
 }