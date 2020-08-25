<?php


 /**
  * 
  */
 class Siswa extends CI_Controller
 {
 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$data['datasiswa'] =  $this->m_admin->getData("siswa")->result();
 		$this->template->load("template/template_admin","admin/siswa",$data);
 	}

 	//kirim json untuk menampilkan jumlah siswa 
 	public function sendData()
 	{
 		$data =  $this->m_admin->getData("siswa")->result();
 		echo json_encode($data) ;
 	}

 	//view data siswa 
 	public function view($id)
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$data['profile'] = $this->m_admin->cari(array("nisn" => $id),"siswa")->row();
 		$this->template->load("template/template_admin","admin/view_siswa",$data);
 	}

 	//hapus data 
 	public function delete()
 	{
 		$id = $this->input->get("id");
 		echo $id;
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