<?php


 /**
  * 
  */
 class Mata_pelajaran extends CI_Controller
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
 		$this->template->load("template/template_admin","admin/mata_pelajaran",$data);
 	}

 	//kirim json untuk menampilkan data jurusan
 	public function sendData()
 	{
 		$data =  $this->m_admin->getData("mata_pelajaran")->result();
 		echo json_encode($data) ;
 	}


 	//tampilkan matapelajaran kedalam modal
 	public function mapelModal()
 	{
 		$id = $this->input->get("id");
 		$data['pengajar'] = $this->m_admin->cari(array('status' => "Pengajar"),"guru")->result(); 
 		$data['jurusan'] = $this->m_admin->getData("jurusan")->result(); 
 		$data['mapel'] = $this->m_admin->cari(array("id" => $id),"mata_pelajaran")->row();
 		$this->load->view("admin/modal_mata_pelajaran",$data);
 	}


 	//update data 
 	public function updateData()
 	{
 		$pengajar = $this->m_admin->cari(array("nipn" => $this->input->post("pengajar")),"guru")->row();
 		$data = array(
 					"mata_pelajaran" => $this->input->post("mata_pelajaran") , 		 			
 					"kode_mapel"	 => $this->input->post("kode_mapel") , 		 			
 					"kode_pengajar"	 => $this->input->post("pengajar") , 		 			
 					"pengajar"	 	 => $pengajar->nama . " " . $pengajar->gelar , 		 			
 					"kelas"			 => $this->input->post("kelas") , 		 			
 					"prodi"			 => $this->input->post("prodi") 	 			
		 		);
 		$id = $this->input->post("id");
 		$update = $this->m_admin->update($data,"mata_pelajaran",array("id" => $id));
 					if($update){
 						echo "Berhasil";
 					}else {
 						echo "Gagal";
 					}
 	}

 	//hapus data 
 	public function delete()
 	{
 		$id = $this->input->get("id");
 		$delete = $this->m_admin->delete( array("id" => $id  ) ,"mata_pelajaran");
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