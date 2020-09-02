<?php


 /**
  * 
  */
 class Siswa extends CI_Controller
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
 		$delete = $this->m_admin->delete( array("id" => $id  ) ,"siswa");
 			if($delete){
 				echo "Sukses";
 			}else {
 				echo "Gagal";
 			}
 	}


 	//update poto profile
 	public function updatePoto()
 	{
 		$file = $_FILES['photo']['name'];
 		$id = $this->input->post("id");
 		$nameFile = $this->input->post("namePoto");
 		$this->load->library("upload");
 		$config['upload_path']	 = './assets/poto_siswa/' ;
 		$config['allowed_types'] = 'jpg|png|jpeg|gif' ;
 			$this->upload->initialize($config);
 			if(!$this->upload->do_upload("photo")){
 				echo "gagal upload ";
 			}else {
 				$poto = $this->upload->data("file_name");
 				$data = array(
 					'photo'		=> $poto 
 				);
 					$update = $this->m_admin->update($data,"siswa",array("id" => $id));
 					if($update){
 						echo "Berhasil";
 						//jika berhasil update hapus poto siswa yang lama 
 						if(!empty($nameFile)){
 							$file = './assets/poto_siswa/' . $nameFile ;
 							unlink($file);
 						}
 					}else {
 						echo "Gagal";
 					}
 			}
 	}

 	//update data siswa
 	public function updateData()
 	{
 		$data = array(
		 			"nama"			=> $this->input->post("nama"),
		 			"nisn"			=> $this->input->post("nisn"),
		 			"prodi"			=> $this->input->post("prodi"),
		 			"kelas"			=> $this->input->post("kelas"),
		 			"tgl_lahir"		=> $this->input->post("tgl_lahir"),
		 			"tempat_lahir"	=> $this->input->post("tempat_lahir"),
		 			"alamat"		=> $this->input->post("alamat"),
		 		);
 		$id = $this->input->post("id");
 		$update = $this->m_admin->update($data,"siswa",array("id" => $id));
 					if($update){
 						echo "Berhasil";
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