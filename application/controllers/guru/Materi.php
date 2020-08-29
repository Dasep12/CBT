<?php
date_default_timezone_set('Asia/Jakarta');
 
 /**
  * 
  */
 class Materi extends CI_Controller
 {
 	public function index()
 	{	
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$where = array("kode_guru"	=> $this->session->userdata("nipn"));
 		$data['mapel']  = $this->m_guru->cariData($where,"materi")->result();
 		 $where = array("pengajar"	=> $this->session->userdata("nipn"));
 		$data['mapel2']  = $this->m_guru->cariData($where,"mata_pelajaran")->result();
 		$this->template->load("template/template_guru","guru/materi",$data);
 	}

 	public function upload()
 	{

 		$file = $_FILES['file_materi']['name'];
 		$mapel  = $this->m_guru->cariData(array("kode_mapel" => $this->input->post("kode_mapel")),"mata_pelajaran")->row();
 		if($file[0] == ""){
 			$data = array(
 				'kode_materi'			=> "MTR001",
 				'judul_materi'			=> $this->input->post("judul_materi"),
 				'keterangan_materi'		=> $this->input->post("keterangan"),
 				'kelas'					=> $mapel->kelas,
 				'prodi'					=> $mapel->prodi,
 				'mata_pelajaran'		=> $mapel->mata_pelajaran,
 				'kode_mapel'			=> $this->input->post("kode_mapel"),
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
 				'kode_materi'			=> $this->input->post("kode_materi"),
 				'judul_materi'			=> $this->input->post("judul_materi"),
 				'keterangan_materi'		=> $this->input->post("keterangan"),
 				'kelas'					=> $mapel->kelas,
 				'prodi'					=> $mapel->prodi,
 				'mata_pelajaran'		=> $mapel->mata_pelajaran,
 				'kode_mapel'			=> $this->input->post("kode_mapel"),
 				'kode_guru'				=> $this->session->userdata("nipn"),
 				'nama_guru'				=> $this->session->userdata("nama"),
 				'jam_post'				=> date('H:i:s'),
 				'tgl_post'				=> date('Y-m-d'),
 			);
 			//simpan keterangan dari materi yang di upload ke tabel materi
 			$upload = $this->m_guru->input("materi",$data);

 		//upload file materi 
		$config = array();
	    $config['upload_path'] = './assets/materi/';
	    $config['allowed_types'] = '*';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;

	    $this->load->library('upload');
	    $files = $_FILES;
	    $data2 = array();
	    $count = count($_FILES['file_materi']['name']);
	    for($i=0; $i < $count ; $i++)
	    {           
	        $_FILES['file_materi']['name']= $files['file_materi']['name'][$i];
	        $_FILES['file_materi']['type']= $files['file_materi']['type'][$i];
	        $_FILES['file_materi']['tmp_name']= $files['file_materi']['tmp_name'][$i];
	        $_FILES['file_materi']['error']= $files['file_materi']['error'][$i];
	        $_FILES['file_materi']['size']= $files['file_materi']['size'][$i];    

	        $this->upload->initialize($config);
	        $this->upload->do_upload("file_materi");
	        $data2 = array(
	        	'kode_materi'		=> $this->input->post("kode_materi") ,
	        	"file"				=> $this->upload->data("file_name")
	        );
	        $this->m_guru->input("file_materi",$data2);
	    }

	    	if($upload){
	    		echo "Berhasil";
	    	}
	 		
 		} 
 	}

 	//tampilkan materi yang di posting kedalam modal
 	public function viewMateri()
 	{
 		$id = $this->input->get("id");
 		$kode = $this->input->get("kode");
 		$guru = $this->session->userdata("nipn");
 		$data['materi_siswa'] = $this->m_guru->joinMateri($guru,$kode)->result();
 		$data['materi'] = $this->m_guru->joinMateri($guru,$kode)->row();
 		$data['materi_kosong'] = $this->m_guru->cariData(array("kode_materi" => $kode , "kode_guru " => $guru),"materi")->row();
		$this->load->view("guru/modal_materi",$data);
 	}

 	//hapus materi yang terposting 
 	public function deleteMateri()
 	{
 		$id = $this->input->get("kode");
 		$materi = $this->m_guru->cariData(array("id" => $id ) , "materi")->row();
 		$file_materi = $this->m_guru->cariData(array("kode_materi" => $materi->kode_materi) , "file_materi" )->result();

 		if($materi == FALSE || $file_materi == FALSE){
 			//hapus materi siswa di table materi 
	 		$hapusMateri = $this->m_guru->delete(array("id" => $id),"materi");
	 		if($hapusMateri){
	 			echo "Ok";
	 		}
 		}else {
	 		//hapus file materi dan unlink file nya 
	 		foreach($file_materi as $file){
	 			//target file yang akan di hapus 
	 			$target = "assets/materi/" . $file->file;
	 				if(unlink($target)){
	 					//file terhapus 
	 				}
	 		}

	 		//hapus materi siswa di table materi 
	 		$hapusFile = $this->m_guru->delete(array("kode_materi" => $materi->kode_materi),"file_materi");
	 		$hapusMateri = $this->m_guru->delete(array("id" => $id),"materi");
	 		if($hapusMateri){
	 			echo "Ok";
	 		}

 		}

 	}


 }