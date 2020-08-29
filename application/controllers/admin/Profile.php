<?php


 /**
  * 
  */
 class Profile extends CI_Controller
 {
 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$nisn = $this->session->userdata("nipn");
 		$data['profile'] = $this->m_admin->cari(array("nipn" => $nisn) , "guru")->row();
 		$this->template->load("template/template_admin","admin/profile",$data);
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
 						//jika berhasil update hapus poto admin yang lama 
 						if(!empty($nameFile)){
 							$file = './assets/poto_pengajar/' . $nameFile ;
 							unlink($file);
 						}
 					}else {
 						echo "Gagal";
 					}
 			}
 	}


 	//update data administrator
 	public function updateData()
 	{

 		$nipn = $this->input->post("nipn") ;
 		$nisn = $this->input->post("nisn");
 		$data = array(
		 			"nama"			=> $this->input->post("nama"),
		 			"nipn"			=> $nipn,
		 			"email"			=> $this->input->post("email"),
		 			"gender"		=> $this->input->post("gender"),
		 			"no_hp"			=> $this->input->post("no_hp")
		 		);
 		$data2 = array(
 			'nisn'	=> $nipn 
 		);
 		$id = $this->input->post("id");
 		$update = $this->m_admin->update($data,"guru",array("id" => $id));
 		$updateAkun = $this->m_admin->update($data2 ,"akun" , array("nisn" => $nisn ));
 					if($update && $updateAkun){
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