<?php


 /**
  * 
  */
 class Settings extends CI_Controller
 {
 	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 3 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}


 	public function index()
 	{
 		$where = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where,"siswa")->row();
 		$this->template->load("template/template_siswa","siswa/setting",$data);
 	}



 	//update data siswa
 	public function update()
 	{
 		$where = array("nisn" =>  $this->session->userdata("nisn") );
 		$password  = $this->input->post("password");

 		if(empty($password)){
		 		$data = array(
		 			'nama'			=> $this->input->post("nama"),
		 			'tempat_lahir'	=> $this->input->post("tempat_lahir"),
		 			'tgl_lahir'		=> $this->input->post("tgl_lahir"),
		 			'alamat'		=> $this->input->post("alamat"),
		 		);

		 		$update = $this->m_siswa->update($data,"siswa",$where);
		 			if($update){
		 				echo "Sukses";
		 			}else {
		 				echo "Gagal";
		 			}

		 }else{
		 	$data = array(
		 			'nama'			=> $this->input->post("nama"),
		 			'tempat_lahir'	=> $this->input->post("tempat_lahir"),
		 			'tgl_lahir'		=> $this->input->post("tgl_lahir"),
		 			'alamat'		=> $this->input->post("alamat"),
		 		);

		 	//update data password 
		 	$data2 = array(
		 		"password"  => $password
		 	);

		 		$update = $this->m_siswa->update($data,"siswa",$where);
		 		$updatePass = $this->m_siswa->update($data2,"akun",$where);
		 			if($update){
		 				echo "Sukses";
		 			}else {
		 				echo "Gagal";
		 			}
		 }

 	}



 }