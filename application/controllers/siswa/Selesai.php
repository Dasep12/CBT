<?php


/**
  * 
  */
 class Selesai extends CI_Controller
 {
 	public function index()
 	{
 		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();
 		
 			$nama			= $this->session->userdata("nama");
 			$nisn			= $this->session->userdata("nisn");
 			$kelas			= $this->session->userdata("kelas");
 			$prodi			=$this->session->userdata("prodi");

 		$data['tugas_selesai'] = $this->m_siswa->joinTugasSelesaiSiswa($nama,$nisn,$kelas,$prodi);
 		$this->template->load("template/template_siswa","siswa/selesai",$data);
 	}


 	public function viewTugasSelesai()
 	{
 		$nisn 		= $this->input->get("nisn");
 		$kelas 		= $this->input->get("kelas");
 		$prodi 		= $this->input->get("prodi");
 		$kode_tugas = $this->input->get("kode_tugas");

 			$data['tugas'] = $this->m_siswa->joinTugasSelesaiSiswa2($kode_tugas,$nisn,$kelas,$prodi)->row();

 			$this->load->view("siswa/modal_tugas_selesai",$data);
 	}

 	//hapus lampiran
 	public function hapusLampiran()
 	{
 		$where = array(
 			"nisn"			 =>	$this->session->userdata("nisn") ,
 			"kode_tugas"	 => $this->input->post("kode")
 		);
 		$dataFile = $this->m_siswa->getSiswa($where,"kumpul_tugas")->row();
 		$target = "assets/tugas/jawaban/" . $dataFile->file_jawaban  ;
 		if(unlink($target)){
	 		$data = array("file_jawaban" => "" , "nilai" => "");
	 		$update = $this->m_siswa->update($data,"kumpul_tugas",$where);
	 		if($update){
	 			echo "Update";
	 		}
 		}
 	}


 	//perbarui lampiran
 	public function updateLampiran()
 	{
 		$kode = $this->input->post("kode_tugas");
 		$nisn = $this->session->userdata("nisn");
 		$fileLampiran = $_FILES['file_jawaban']['name'] ;

 		$this->load->library("upload");
			$config['upload_path']   = './assets/tugas/jawaban/';
			$config['allowed_types']	= '*' ;
			$this->upload->initialize($config);
				if(!$this->upload->do_upload("file_jawaban")){
					echo "gagal";
				}else {
					$file = $this->upload->data("file_name");
					$data = array(
						'file_jawaban'		=> $file,
					);
					$where = array(
						"kode_tugas"  => $kode ,
						"nisn"			=> $nisn 
					);
					
					//kumpulkan tugas dari siswa kedalam tablel kumpul tugas
					$update = $this->m_siswa->update($data,"kumpul_tugas",$where);
				 		if($update){
				 			echo "Update";
				 		}
				}

 	}
 } 