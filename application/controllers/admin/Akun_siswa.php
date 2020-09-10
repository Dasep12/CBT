<?php


 /**
  * 
  */
 class Akun_siswa extends CI_Controller
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
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/akun_siswa",$data);
 	}

 	//kirim data siswa dalam bentuk json ke dalam ajax
 	public function sendData()
 	{
 		$data = $this->m_admin->cari(array("role_id" => 3),"akun")->result();
 		echo json_encode($data);
 	}

 	//kirim data siswa di select
 	public function sendSelect()
 	{
 		$key = $this->input->get("nipn");
 		$data = $this->m_admin->getSelect2($key);
 		echo json_encode($data);
 	}

 	//hapus data akun siswa
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

 	//modal untuk menampilkan data akun siswa
 	public function viewAkun()
 	{
 		$id = $this->input->get("id");
 		$data['akun'] = $this->m_admin->cari(array("id" => $id ) , "akun")->row();
 		$this->load->view("admin/modal_lihat_akun",$data);
 	}

 	public function updateAkun()
 	{
 		$pass  = $this->input->post("password");
 		$id  = $this->input->post("id");
 		if(empty($pass)){
	 		$data = array(
	 			"username"	=> $this->input->post("nama"),
	 			"nisn"	=> $this->input->post("nisn"),
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
	 			"nisn"		=> $this->input->post("nisn"),
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

 	//tambah data akun siswa baru 
 	public function addAkun()
 	{
 		$nisn = $this->input->post("nisn");
 		//cek nisn sudah terdaftar di akun apa tidak
 		$cekNISN = $this->m_admin->cari(array("nisn" => $nisn) , "akun");
 		$cekNAMA = $this->m_admin->cari(array("nisn" => $nisn) , "siswa");
 		if($cekNISN->num_rows() > 0 ){
 			echo "NISN sudah terdaftar di akun";
 		}else {
 		$akun = $cekNAMA->row();
 			$data = array(
 				"nisn"			=> $nisn ,
 				"username"		=> $akun->nama,
 				"password"		=> $this->input->post("password"),
 				"role_id"		=> 3 
 			);

 			$input  = $this->m_admin->input($data,"akun");
 				if($input){
 					echo "Sukses";
 				}else {
 					echo "Gagal Input";
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