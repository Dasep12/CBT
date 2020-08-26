<?php


/**
 * 
 */
class Jurusan extends CI_Controller
{
	
	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/jurusan",$data);
 	}


 	//kirim json untuk menampilkan data jurusan
 	public function sendData()
 	{
 		$data =  $this->m_admin->getData("jurusan")->result();
 		echo json_encode($data) ;
 	}

 	//tampilkan jurusan kedalam modal
 	public function jurusanModal()
 	{
 		$id = $this->input->get("id");
 		echo $id ;
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