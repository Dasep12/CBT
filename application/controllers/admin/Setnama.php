<?php


 /**
  * 
  */
 class Setnama extends CI_Controller
 {

 	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 1 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}
 	
 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$data['sekolah']  = $this->m_admin->getData("judul")->row();
  		$this->template->load("template/template_admin","admin/setnama",$data);
 	}


 	public function update()
 	{
 		$data = array(
		 			"nama_sekolah" 		=> $this->input->post("nama")
		 		);
 		$id = $this->input->post("id");
 		$update = $this->m_admin->update($data,"judul",array("id" => $id));
 					if($update){
 						echo "Berhasil update data";
 					}else {
 						echo "Gagal";
 					}
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