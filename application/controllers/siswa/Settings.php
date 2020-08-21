<?php


 /**
  * 
  */
 class Settings extends CI_Controller
 {
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
 	}



 }