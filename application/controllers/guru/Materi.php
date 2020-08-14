<?php
date_default_timezone_set('Asia/Jakarta');
 
 /**
  * 
  */
 class Materi extends CI_Controller
 {
 	public function index()
 	{	
 		$where = array("pengajar"	=> $this->session->userdata("nipn"));
 		$data['mapel']  = $this->m_guru->cariData($where,"mata_pelajaran")->result();
 		$this->template->load("template/template_guru","guru/materi",$data);
 	}

 	public function upload()
 	{

 		$file = $_FILES['file_materi']['name'];
 		if($file[0] == ""){
 			$data = array(
 				'kode_materi'			=> "MTR001",
 				'judul_materi'			=> $this->input->post("judul_materi"),
 				'keterangan_materi'		=> $this->input->post("keterangan"),
 				'kelas'					=> $this->input->post("kelas"),
 				'prodi'					=> $this->input->post("prodi"),
 				'mata_pelajaran'		=> $this->input->post("mata_pelajaran"),
 				'kode_guru'				=> $this->session->userdata("nipn"),
 				'nama_guru'				=> $this->session->userdata("nama"),
 				'jam_post'				=> date('H:i:s'),
 				'tgl_post'				=> date('Y-m-d')
 			);
 			$save = $this->m_guru->input("materi",$data);
 			if($save){
 				echo "Sukses";
 			}else {
 				echo "Gagal";
 			}
 		}else {

	 		$data = array(
 				'kode_materi'			=> "MTR00001",
 				'judul_materi'			=> $this->input->post("judul_materi"),
 				'keterangan_materi'		=> $this->input->post("keterangan"),
 				'kelas'					=> $this->input->post("kelas"),
 				'prodi'					=> $this->input->post("prodi"),
 				'mata_pelajaran'		=> $this->input->post("mata_pelajaran"),
 				'kode_guru'				=> $this->session->userdata("nipn"),
 				'nama_guru'				=> $this->session->userdata("nama"),
 				'jam_post'				=> date('H:i:s'),
 				'tgl_post'				=> date('Y-m-d'),
 			);

 			for($i = 0 ; $i < count($file) ; $i++){
 				$this->load->library("upload");
 				$config['allowed_tpyes'] =  "*";
 				$config['upload_path']   = './assets/materi/' ;
 				$this->upload->initialize($config);
 					if(!$this->upload->do_upload("file_materi")){
 						echo "Gagal upload";
 					}else {

 					}
 			}
 		}

 	}

 	public function kode()
 	{
 		$kode = "MTR99999";
 		$rand = substr($kode, 3,3);
 		$rand++ ;
 		$char = "MTR" ;
 		$kodeMateri = $char . sprintf("%05s" , $rand);
 		echo $kodeMateri;
 	}
 }