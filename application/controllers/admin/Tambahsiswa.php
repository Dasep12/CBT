<?php

 /**
  * 
  */
 class Tambahsiswa extends CI_Controller
 {
 	public function index()
 	{
 		$data['jurusan'] = $this->m_admin->getData("jurusan");
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/tambahsiswa",$data);
 	}

 	public function input()
 	{
 		$file = $_FILES['photo']['name'];
 		$ceknisn = $this->m_admin->cari(array("nisn" => $this->input->post("nisn")),"siswa")->num_rows() ;
 		if(empty($file)){
 			if($ceknisn > 0 ){
 				//jika nisn sudah ada maka siswa tidak bisa di daftar 
 				echo "nisn sudah ada";
 			}else {
 				//gunakan kode di bawah jika simpan data siswa tanpa dengan photo

 				//simpan data diri siswa kedalam array lalu input ke table siswa
		 		$data = array(
		 			"nama"			=> $this->input->post("nama"),
		 			"nisn"			=> $this->input->post("nisn"),
		 			"prodi"			=> $this->input->post("prodi"),
		 			"kelas"			=> $this->input->post("kelas"),
		 			"tgl_lahir"		=> $this->input->post("tgl_lahir"),
		 			"tempat_lahir"	=> $this->input->post("tempat_lahir"),
		 			"alamat"		=> $this->input->post("alamat"),
		 		);

		 		//simpan data untuk akun siswa
		 		$data2  = array(
		 			"username"		=> $this->input->post("nama"),
		 			"nisn"			=> $this->input->post("nisn"),
		 			"password"		=> 123 ,
		 			"role_id"		=> 3 
		 		);	

		 		$input_akun = $this->m_admin->input($data2,"akun");
		 		$inputSiswa = $this->m_admin->input($data,"siswa");
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
	 			$config['upload_path']  = "./assets/poto_siswa/" ;
	 			$config['allowed_types'] = "jpg|png|jpeg|gif" ;
	 			$this->upload->initialize($config);
	 				if(!$this->upload->do_upload("photo")){
	 					echo "File gagal upload";
	 				}else {
	 					$file = $this->upload->data("file_name");

	 					//simpan data diri siswa kedalam array lalu input ke table siswa
	 					$data = array(
				 			"nama"			=> $this->input->post("nama"),
				 			"nisn"			=> $this->input->post("nisn"),
				 			"prodi"			=> $this->input->post("prodi"),
				 			"kelas"			=> $this->input->post("kelas"),
				 			"tgl_lahir"		=> $this->input->post("tgl_lahir"),
				 			"tempat_lahir"	=> $this->input->post("tempat_lahir"),
				 			"alamat"		=> $this->input->post("alamat"),
				 			"photo"			=> $file 
				 		);

				 		//simpan data untuk akun siswa
				 		$data2  = array(
				 			"username"		=> $this->input->post("nama"),
				 			"nisn"			=> $this->input->post("nisn"),
				 			"password"		=> 123 ,
				 			"role_id"		=> 3 
				 		);	
				 		$input_akun = $this->m_admin->input($data2,"akun");
				 		$inputSiswa = $this->m_admin->input($data,"siswa");
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