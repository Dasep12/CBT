<?php

date_default_timezone_set("Asia/Jakarta");



 /**
  * 
  */
 class Upload_soal extends CI_Controller
 {
 	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 2 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}
 	

 	private $filename = "soal";

 	public function index()
 	{
 		$data = array();
 			if(isset($_POST['submit'])){

 				$upload = $this->m_guru->uploadSoal($this->filename);
 				if($upload['result'] =="success") {
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('assets/soal/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                    $data['guru']  = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->result();
                    $data['mapel']  = $this->m_guru->cariData(array("kode_pengajar" => $this->session->userdata("nipn")),"mata_pelajaran")->result();
                    $data['sheet'] = $sheet ;
                }else{
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                    echo $upload['error'];
                }
 			}

 		$data['jurusan'] = $this->m_admin->getData("jurusan")->result();
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$this->template->load("template/template_guru","guru/upload_soal",$data);
 	}

 	public function upload()
 	{	

 		// Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/soal/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        $soal_uts = array();
        $soal_uas = array();
        $numrow = 1;
        $kode = $this->input->post('kode_soal') ;
        $jamMulai = $this->input->post("jamMulai");
        $menitMulai = $this->input->post("menitMulai");
        $jamSelesai = $this->input->post("jamSelesai");
        $menitSelesai = $this->input->post("menitSelesai");
        $tanggal = $this->input->post("tanggal");
        //cek kode soal sudah ada apa belum 
        $tableUts = $this->m_guru->searcKode("uts",$kode);
        $tableUas = $this->m_guru->searcKode("uas",$kode);

        //input data prodi 
        $jurusan = $this->m_guru->cariData(array("id" => $this->input->post("prodi")),"jurusan")->row();

        //data pengajar / guru b.study soal ujian
        $pengajar  = $this->m_guru->cariData(array("nipn" => $this->session->userdata('nipn')),"guru")->row();


        //jika kode sudah ada maka inputan gagal 
        if($tableUts > 0 || $tableUas > 0){
        	echo "Gagal";
        }elseif($this->input->post("bentuk_ujian") == "UTS"){
 			//tampung data untuk di masukan ke tabel uts
 			//const selesai = new Date("08 23 2020 17:04:00");
	 		$uts = array(
	 			'kode_soal'				=> $this->input->post('kode_soal'),
	 			'mata_pelajaran'		=> $this->input->post('mata_pelajaran'),
	 			'kode_guru'				=> $this->session->userdata("nipn"),
	 			'guru'					=> $this->input->post('nama_guru'),
	 			'kelas'					=> $this->input->post('kelas'),
	 			'prodi'					=> $jurusan->jurusan ,
	 			'kode_prodi'			=> $jurusan->kode_jurusan ,
	 			"tanggal"				=> $tanggal . " " . $jamSelesai . ":" . $menitSelesai . ":00" ,
	 		);
	 		foreach($sheet as $soal){
 					if($numrow > 1){
						// push (add) array data soal ke variabel soal_uts
						array_push($soal_uts, array(
									'id_soal'		    => $soal['A'],
									'bentuk_ujian'	    => $this->input->post("bentuk_ujian") ,
									'kode_soal'		 	=> $this->input->post('kode_soal'),
									'mata_pelajaran'	=> $this->input->post('mata_pelajaran'),
									'kode_guru'			=> $this->session->userdata("nipn"),
									'nama_guru'			=> $this->input->post('nama_guru'),
									'gelar'				=> $pengajar->gelar ,
									'kelas'				=> $this->input->post('kelas'),
									'prodi'				=> $jurusan->jurusan ,
									'kode_prodi'		=> $jurusan->kode_jurusan ,
		                    		'soal'			    => $soal['B'],
		                    		'a'			  		=> $soal['C'],
		                    		'b'			    	=> $soal['D'],
		                    		'c'			   		=> $soal['E'],
		                    		'd'			   		=> $soal['F'],
		                    		'jawaban'	   		=> $soal['G'],
		                    		'mulai'				=> $jamMulai . ":" . $menitMulai . ":00" ,
		                    		"selesai"			=> $jamSelesai . ":" . $menitSelesai . ":00",
		                    		'tanggal_ujian'		=> $tanggal
						));
 					}
 					$numrow++;
 				}

 				//upload soal ke abel bank soal
 				$upload_soal = $this->m_guru->tambahSoal($soal_uts,"bank_soal"); 
 				//input data ke table uts 
		 		$list_uts =  $this->m_guru->input("uts",$uts);
 				if($upload_soal && $list_uts){
 					echo "Sukses1";
 				}else {
 					echo "gagal";
 				}
 		}elseif($this->input->post("bentuk_ujian") == "UAS"){
 			//tampung data untuk di masukan ke tabel uas
	 		$uas = array(
	 			'kode_soal'				=> $this->input->post('kode_soal'),
	 			'mata_pelajaran'		=> $this->input->post('mata_pelajaran'),
	 			'kode_guru'				=> $this->session->userdata("nipn"),
	 			'guru'					=> $this->input->post('nama_guru'),
	 			'kelas'					=> $this->input->post('kelas'),
	 			'prodi'					=> $jurusan->jurusan ,
	 			'kode_prodi'			=> $jurusan->kode_jurusan ,
	 			"tanggal"				=> $tanggal . " " . $jamSelesai . ":" . $menitSelesai . ":00" ,
	 		);
	 		foreach($sheet as $soal){
 					if($numrow > 1){
						// push (add) array data soal ke variabel soal_uas
						array_push($soal_uas, array(
									'id_soal'		    => $soal['A'],
									'bentuk_ujian'	    => $this->input->post("bentuk_ujian") ,
									'kode_soal'		 	=> $this->input->post('kode_soal'),
									'mata_pelajaran'	=> $this->input->post('mata_pelajaran'),
									'kode_guru'			=> $this->session->userdata("nipn"),
									'nama_guru'			=> $this->input->post('nama_guru'),
									'gelar'				=> $pengajar->gelar ,
									'kelas'				=> $this->input->post('kelas'),
									'prodi'				=> $jurusan->jurusan ,
									'kode_prodi'		=> $jurusan->kode_jurusan ,
		                    		'soal'			    => $soal['B'],
		                    		'a'			  		=> $soal['C'],
		                    		'b'			    	=> $soal['D'],
		                    		'c'			   		=> $soal['E'],
		                    		'd'			   		=> $soal['F'],
		                    		'jawaban'	   		=> $soal['G'],
		                    		'mulai'				=> $jamMulai . ":" . $menitMulai . ":00" ,
		                    		"selesai"			=> $jamSelesai . ":" . $menitSelesai . ":00",
		                    		'tanggal_ujian'		=> $tanggal
						));
 					}
 					$numrow++;
 				}

 				//upload soal ke abel bank soal
 				$upload_soal = $this->m_guru->tambahSoal($soal_uas,"bank_soal"); 
 				//input data ke table uas 
		 		$list_uas =  $this->m_guru->input("uas",$uas);
 				if($upload_soal && $list_uas){
 					echo "Sukses2";
 				}else {
 					echo "gagal";
 				}
 		}

 	}
 }