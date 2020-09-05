<?php

/**
 * 
 */
class Pengajar extends CI_Controller
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
 		$this->template->load("template/template_admin","admin/guru",$data);
 	}

 	//kirim json untuk menampilkan data pengajar
 	public function sendData()
 	{
 		$data =  $this->m_admin->cari(array("status" => "pengajar") ,"guru")->result();
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


 	//update poto profile
 	public function updatePoto()
 	{
 		$file = $_FILES['photo']['name'];
 		$id = $this->input->post("id");
 		$nameFile = $this->input->post("namePoto");
 		$this->load->library("upload");
 		$config['upload_path']	 = './assets/poto_pengajar/' ;
 		$config['allowed_types'] = 'jpg|png|jpeg|gif' ;
 			$this->upload->initialize($config);
 			if(!$this->upload->do_upload("photo")){
 				echo "gagal upload ";
 			}else {
 				$poto = $this->upload->data("file_name");
 				$data = array(
 					'photo'		=> $poto 
 				);
 					$update = $this->m_admin->update($data,"guru",array("id" => $id));
 					if($update){
 						echo "Berhasil";
 						//jika berhasil update hapus poto siswa yang lama 
 						if(!empty($nameFile)){
 							$file = './assets/poto_pengajar/' . $nameFile ;
 							unlink($file);
 						}
 					}else {
 						echo "Gagal";
 					}
 			}
 	}


 	//update data pengajar
 	public function updateData()
 	{
 		$data = array(
		 			"nama"			=> $this->input->post("nama"),
		 			"nipn"			=> $this->input->post("nipn"),
		 			"gelar"			=> $this->input->post("gelar"),
		 			"email"			=> $this->input->post("email"),
		 			"gender"		=> $this->input->post("gender"),
		 			"no_hp"			=> $this->input->post("no_hp"),
		 			"tgl_lahir"		=> $this->input->post("tgl_lahir"),
		 			"tempat_lahir"	=> $this->input->post("tempat_lahir"),
		 		);
 		$id = $this->input->post("id");
 		$update = $this->m_admin->update($data,"guru",array("id" => $id));
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
 		$akun = $this->m_admin->cari(array("id" => $id) , "guru")->row();
 		$delete = $this->m_admin->delete( array("id" => $id  ) ,"guru");
 		$deleteAkun = $this->m_admin->delete( array("nisn" => $akun->nipn  ) ,"akun");
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