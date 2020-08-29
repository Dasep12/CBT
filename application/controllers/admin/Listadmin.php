<?php


 /**
  * 
  */
 class Listadmin extends CI_Controller
 {

 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/listadmin",$data);
 	}

 	//kirim json untuk menampilkan data jurusan
 	public function sendData()
 	{
 		$data =  $this->m_admin->cari(array("role_id" => 1 ) , "akun")->result();
 		echo json_encode($data) ;
 	}

 	//tampilkan akun kedalam modal
 	public function akunModal()
 	{
 		$id = $this->input->get("id");
 		$data['akun'] = $this->m_admin->cari(array("id" => $id),"akun")->row();
 		$this->load->view("admin/modal_admin",$data);
 	}


 	//update data akun administrator
 	public function updateData()
 	{
 		$password = $this->input->post("password");
 		$id  = $this->input->post("id");

 			if(empty($password)){
		 		$data = array(
				 			"username"			=> $this->input->post("username"),
				 		);
		 		$id = $this->input->post("id");
		 		$update = $this->m_admin->update($data,"akun",array("id" => $id));
		 					if($update){
		 						echo "Berhasil";
		 					}else {
		 						echo "Gagal";
		 					}	
		 	}else {
		 		$data = array(
					 		"username"			=> $this->input->post("username"),
				 			"password"			=> $password
				 		);
		 		$id = $this->input->post("id");
		 		$update = $this->m_admin->update($data,"akun",array("id" => $id));
		 					if($update){
		 						echo "Berhasil";
		 					}else {
		 						echo "Gagal";
		 					}	
		 	}

 	}

 	//hapus data 
 	public function delete()
 	{
 		$id = $this->input->get("id");
 		$delete = $this->m_admin->delete( array("id" => $id  ) ,"akun");
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