<?php


 /**
  * 
  */
 class Login extends CI_Controller
 {



 	public function index()
 	{
 		if(!empty($this->session->userdata("role_id")) && $this->session->userdata("role_id") == 1 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("admin/Dashboard");
 		}elseif(!empty($this->session->userdata("role_id")) && $this->session->userdata("role_id") == 2  ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("guru/Dashboard");
 		}elseif(!empty($this->session->userdata("role_id")) && $this->session->userdata("role_id") == 3  ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("siswa/Dashboard");
 		}

 		
 		$this->load->view("login");
 	}


 	public function ceklogin()
 	{
 		$nisn = $this->input->post("nisn");
 		$pass = $this->input->post("password");
 		$where = array(
 			'nisn'			=> $nisn ,
 			'password'		=> $pass 
 		);
 		$cekAkun = $this->m_siswa->cekAkun($where,"akun");
 		$role = $cekAkun->row();
 			if($cekAkun->num_rows() <= 0){
 				echo "0"; //akun tidak terdaftar
 			}else if($cekAkun->num_rows()  > 0) {
 				//akun ada dan terdaftar
 				$ceknisn = $this->m_siswa->cekAkun(array("nisn" => $nisn ) ,"siswa");
 				$ceknipn = $this->m_siswa->cekAkun(array("nipn" => $nisn ) ,"guru");
 					if($ceknisn->num_rows() > 0 ){
 						$auth = $ceknisn->row();
 						$this->session->set_userdata("nama",$auth->nama);
 						$this->session->set_userdata("kelas",$auth->kelas);
 						$this->session->set_userdata("nisn",$auth->nisn);
 						$this->session->set_userdata("role_id",$role->role_id);
 						$this->session->set_userdata("prodi",$auth->prodi);
 					}else {
 						$auth = $ceknipn->row();
 						$this->session->set_userdata("role_id",$role->role_id);
 						$this->session->set_userdata("nipn",$auth->nipn);
 						$this->session->set_userdata("nama",$auth->nama);
 						$this->session->set_userdata("status",$auth->status);
 					}

 					echo $role->role_id;
 			}
 	}


 }