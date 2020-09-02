<?php


/**
 * 
 */
class Jadwal_ujian extends CI_Controller
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
 		$this->template->load("template/template_admin","admin/set_jadwal_ujian",$data);
 	}

 	//kirim json untuk menampilkan jadwal ujian 
 	public function sendData()
 	{
 		$data =  $this->m_admin->getData("jadwal_ujian")->result();
 		echo json_encode($data) ;
 	}

 	//tampilkan jadwal ujian kedalam modal
 	public function mapelJadwal()
 	{
 		$id = $this->input->get("id");
 		$data['jadwal'] = $this->m_admin->cari(array("id" => $id),"jadwal_ujian")->row();
 		//var_dump($data['jadwal']);
 		$this->load->view("admin/modal_jadwal_ujian",$data);
 	}


 	//hapus data 
 	public function delete()
 	{
 		$id = $this->input->get("id");
 		$delete = $this->m_admin->delete( array("id" => $id  ) ,"jadwal_ujian");
 			if($delete){
 				echo "Sukses";
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