<?php

 /**
  * 
  */
 class Tambahguru extends CI_Controller
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
 		$data['jurusan'] = $this->m_admin->getData("jurusan");
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/tambahpengajar",$data);
 	}

 	public function input()
 	{
 		$file = $_FILES['photo']['name'];
 		$ceknisn = $this->m_admin->cari(array("nipn" => $this->input->post("nipn")),"guru")->num_rows() ;
 		if(empty($file)){
 			if($ceknisn > 0 ){
 				//jika nipn sudah ada maka pengajar tidak bisa di daftar 
 				echo "nipn sudah ada";
 			}else {
 				//gunakan kode di bawah jika simpan data siswa tanpa dengan photo

 				//simpan data diri pengajar kedalam array lalu input ke table guru
		 		$data = array(
		 			"nama"				=> $this->input->post("nama"),
		 			"nipn"				=> $this->input->post("nipn"),
		 			"gelar"				=> $this->input->post("gelar"),
		 			"tgl_lahir"			=> $this->input->post("tgl_lahir"),
		 			"tempat_lahir"		=> $this->input->post("tempat_lahir"),
		 			"gender"			=> $this->input->post("gender"),
		 			"status"			=> $this->input->post("status"),
		 			"no_hp"				=> $this->input->post("no_hp"),
		 			"email"				=> $this->input->post("email"),
		 			"alamat"			=> $this->input->post("alamat"),
		 		);

		 		//simpan data untuk akun siswa
		 		$data2  = array(
		 			"username"		=> $this->input->post("nama"),
		 			"nisn"			=> $this->input->post("nipn"),
		 			"password"		=> 123 ,
		 			"role_id"		=> 2 
		 		);	

		 		$input_akun = $this->m_admin->input($data2,"akun");
		 		$inputSiswa = $this->m_admin->input($data,"guru");
		 			if($inputSiswa && $input_akun){
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

	 					//simpan data diri siswa kedalam array lalu input ke table siswa
	 					$data = array(
				 			"nama"				=> $this->input->post("nama"),
				 			"nipn"				=> $this->input->post("nipn"),
				 			"gelar"				=> $this->input->post("gelar"),
				 			"tgl_lahir"			=> $this->input->post("tgl_lahir"),
				 			"tempat_lahir"		=> $this->input->post("tempat_lahir"),
				 			"gender"			=> $this->input->post("gender"),
				 			"status"			=> $this->input->post("status"),
				 			"no_hp"				=> $this->input->post("no_hp"),
				 			"email"				=> $this->input->post("email"),
				 			"alamat"			=> $this->input->post("alamat"),
				 			"photo"				=> $file 
				 		);

				 		//simpan data untuk akun siswa
				 		$data2  = array(
				 			"username"		=> $this->input->post("nama"),
				 			"nisn"			=> $this->input->post("nipn"),
				 			"password"		=> 123 ,
				 			"role_id"		=> 2 
				 		);	
				 		$input_akun = $this->m_admin->input($data2,"akun");
				 		$inputSiswa = $this->m_admin->input($data,"guru");
				 			if($inputSiswa && $input_akun){
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