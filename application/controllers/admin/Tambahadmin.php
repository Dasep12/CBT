<?php


 /**
  * 
  */
 class Tambahadmin extends CI_Controller
 {
 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/tambahadmin",$data);
 	}

 	public function input()
 	{
 		$file = $_FILES['photo']['name'];
 		$ceknisn = $this->m_admin->cari(array("nisn" => $this->input->post("nipn")),"akun")->num_rows() ;
 		if(empty($file)){
 			if($ceknisn > 0 ){
 				//jika nisn sudah ada maka siswa tidak bisa di daftar 
 				echo "nipn / nik  sudah ada";
 			}else {
 				//gunakan kode di bawah jika simpan data admin tanpa dengan photo

 				//simpan data admin kedalam array lalu input ke table guru
		 		$data = array(
		 			"nama"				=> $this->input->post("username"),
		 			"nipn"				=> $this->input->post("nipn"),
		 			"status"			=> "Staf" ,
		 			"gender"			=> $this->input->post("gender")
		 		);

		 		//simpan data untuk akun guru / pengajar
		 		$data2  = array(
		 			"username"		=> $this->input->post("username"),
		 			"nisn"			=> $this->input->post("nipn"),
		 			"password"		=> 123 ,
		 			"role_id"		=> 1
		 		);	

		 		$input_akun = $this->m_admin->input($data2,"akun");
		 		$inputStaf = $this->m_admin->input($data,"guru");
		 			if($inputStaf && $input_akun){
		 				echo "Berhasil tambah data";
		 			}else {
		 				echo "Gagal input";
		 			}

 			}

//jika upload beserta poto gunakan code di bawah
 		}else {

 			if($ceknisn > 0){
 				echo "nisn sudah ada";
 			}else {
	 			$this->load->library("upload");
	 			$config['upload_path']  = "./assets/poto_pengajar/" ;
	 			$config['allowed_types'] = "jpg|png|jpeg|gif" ;
	 			$this->upload->initialize($config);
	 				if(!$this->upload->do_upload("photo")){
	 					echo "File gagal upload";
	 				}else {
	 					$file = $this->upload->data("file_name");

	 					//simpan data admin kedalam array lalu input ke table guru
		 		$data = array(
		 			"nama"				=> $this->input->post("username"),
		 			"nipn"				=> $this->input->post("nipn"),
		 			"status"			=> "Staf"  ,
		 			"gender"			=> $this->input->post("gender") ,
		 			"photo"				=> $file
		 		);

		 		//simpan data untuk akun guru / pengajar
		 		$data2  = array(
		 			"username"		=> $this->input->post("username"),
		 			"nisn"			=> $this->input->post("nipn"),
		 			"password"		=> 123 ,
		 			"role_id"		=> 1
		 		);	

		 		$input_akun = $this->m_admin->input($data2,"akun");
		 		$inputStaf = $this->m_admin->input($data,"guru");
			 			if($inputStaf && $input_akun){
			 				echo "Berhasil tambah data";
			 			}else {
			 				echo "Gagal input";
			 			}
	 				}
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