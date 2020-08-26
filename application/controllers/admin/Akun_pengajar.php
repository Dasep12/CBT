<?php


 /**
  * 
  */
 class Akun_pengajar extends CI_Controller
 {
 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/akun_pengajar",$data);
 	}

 	//kirim data pengajar dalam bentuk json ke dalam ajax
 	public function sendData()
 	{
 		$data = $this->m_admin->cari(array("role_id" => 2),"akun")->result();
 		echo json_encode($data);
 	}


 	//hapus data akun pengajar
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

 	//modal untuk menampilkan data akun pengajar
 	public function viewAkun()
 	{
 		$id = $this->input->get("id");
 		$data['akun'] = $this->m_admin->cari(array("id" => $id ) , "akun")->row();
 		$this->load->view("admin/modal_akun_pengajar",$data);
 	}

 	public function updateAkun()
 	{
 		$pass  = $this->input->post("password");
 		$id  = $this->input->post("id");
 		if(empty($pass)){
	 		$data = array(
	 			"username"	=> $this->input->post("nama"),
	 			"nisn"	=> $this->input->post("nipn"),
	 		);
	 		$update = $this->m_admin->update($data,"akun",array("id" => $id));
	 			if($update){
	 				echo "Sukses";
	 			}else {
	 				echo "Gagal" ;
	 			}
 		}else {
 			$data = array(
	 			"username"	=> $this->input->post("nama"),
	 			"nisn"		=> $this->input->post("nipn"),
	 			"password"	=> $pass 
	 		);
	 		$update = $this->m_admin->update($data,"akun",array("id" => $id));
	 			if($update){
	 				echo "Sukses";
	 			}else {
	 				echo "Gagal" ;
	 			}
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