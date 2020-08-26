<?php

/**
 * 
 */
class Pengajar extends CI_Controller
{
	

	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/guru",$data);
 	}

 	//kirim json untuk menampilkan data pengajar
 	public function sendData()
 	{
 		$data =  $this->m_admin->getData("guru")->result();
 		echo json_encode($data) ;
 	}

 	//view data guru 
 	public function view($id)
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$data['profile'] = $this->m_admin->cari(array("nipn" => $id),"guru")->row();
 		$this->template->load("template/template_admin","admin/view_pengajar",$data);
 	}



 	public function hari()
 	{
 		//hari 
 		$data =  date("D");
 			switch ($data) {
 				case 'Mon':
 					$hari	 = "Senin, " ;
 					break;
 				case 'Tue':
 					$hari = "Selasa, " ;
 					break;
 				case 'Wed':
 					$hari = "Rabu, " ;
 					break;
 				case 'Thu':
 					$hari = "Kamis, " ;
 					break;
 				case 'Fri':
 					$hari = "Jum'at, " ;
 					break;
 				case 'Sat':
 					 $hari = "Sabtu, " ;
 					break;
 				case 'Sun':
 					 $hari = "Minggu, " ;
 					break;

 			}
			return $hari;
	}
}