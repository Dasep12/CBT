<?php


 /** 
  * 
  */
 class Dashboard extends CI_Controller
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
 		$data['jmlahsiswa'] = $this->m_admin->getData("siswa")->num_rows();
 		$data['pengajar'] = $this->m_admin->getData("guru")->num_rows();
 		$data['siswaPria'] = $this->m_admin->cari(array("gender" => "Laki-Laki"),"siswa")->num_rows();
 		$data['siswaPerempuan'] = $this->m_admin->cari(array("gender" => "Perempuan"),"siswa")->num_rows();
 		$this->template->load("template/template_admin","admin/dashboard",$data);
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