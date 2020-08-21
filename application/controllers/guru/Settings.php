<?php


 /**
  * 
  */
 class Settings extends CI_Controller
 {
 	public function index()
 	{
 		$where = $this->session->userdata("nipn");
 		$data['profile'] = $this->m_siswa->joinAkunProfile($where)->row();
 		$this->template->load("template/template_guru","guru/settings",$data);
 	}

 	public function update()
 	{
 		$nama = $this->input->post("nama");
 		$gelar = $this->input->post("gelar");
 		$tgl_lahir = $this->input->post("tgl_lahir");
 		$alamat = $this->input->post("alamat");
 		$email = $this->input->post("email");
 		$password = $this->input->post("password");
 		$nipn = $this->input->post("nipn");
 			if($password == ""){
 				$data = array(
 					"nama"			=> $nama ,
 					"gelar"			=> $gelar ,
 					"tgl_lahir"		=> $tgl_lahir ,
 					"alamat"		=> $alamat ,
 					"email"		=> $email ,
 				);
 				$update = $this->m_guru->update($data,"guru",array("nipn" => $nipn));
 				if($update){
 					echo "Update";
 				}else {
 					echo "Gagal Update";
 				}
 			}else {
 				$data = array(
 					"nama"			=> $nama ,
 					"gelar"			=> $gelar ,
 					"tgl_lahir"		=> $tgl_lahir ,
 					"alamat"		=> $alamat ,
 					"email"			=> $email ,
 				);

 				$data2 = array(
 					"password"	=> $password 
 				);

 				$update = $this->m_guru->update($data,"guru",array("nipn" => $nipn));
 				$updatePass = $this->m_guru->update($data2,"akun",array("nisn" => $nipn));
 				echo "Berhasil";
 			}

 	}
 }