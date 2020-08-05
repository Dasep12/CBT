<?php



 /**
  * 
  */
 class Upload_soal extends CI_Controller
 {

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
                    $data['mapel']  = $this->m_guru->cariData(array("pengajar" => $this->session->userdata("nipn")),"mata_pelajaran")->result();
                    $data['sheet'] = $sheet ;
                }else{
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                    echo $upload['error'];
                }
 			}


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
        //cek kode soal sudah ada apa belum 
        $tableUts = $this->m_guru->searcKode("uts",$kode);
        $tableUas = $this->m_guru->searcKode("uas",$kode);
        if($tableUts > 0 || $tableUas > 0){
        	echo "Gagal";
        }elseif($this->input->post("bentuk_ujian") == "UTS"){
 			//tampung data untuk di masukan ke tabel uts
	 		$uts = array(
	 			'kode_soal'				=> $this->input->post('kode_soal'),
	 			'mata_pelajaran'		=> $this->input->post('mata_pelajaran'),
	 			'kode_guru'				=> $this->session->userdata("nipn"),
	 			'guru'					=> $this->input->post('nama_guru'),
	 			'kelas'					=> $this->input->post('kelas'),
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
									'kelas'					=> $this->input->post('kelas'),
		                    		'soal'			    => $soal['B'],
		                    		'a'			  		=> $soal['C'],
		                    		'b'			    	=> $soal['D'],
		                    		'c'			   		=> $soal['E'],
		                    		'd'			   		=> $soal['F'],
		                    		'jawaban'	   		=> $soal['G'],
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
 			//tampung data untuk di masukan ke tabel uts
	 		$uas = array(
	 			'kode_soal'				=> $this->input->post('kode_soal'),
	 			'mata_pelajaran'		=> $this->input->post('mata_pelajaran'),
	 			'guru'					=> $this->input->post('nama_guru'),
	 			'kode_guru'				=> $this->session->userdata("nipn"),
	 			'kelas'					=> $this->input->post('kelas'),
	 		);
	 		foreach($sheet as $soal){
 					if($numrow > 1){
						// push (add) array data soal ke variabel soal_uts
						array_push($soal_uas, array(
									'id_soal'		    => $soal['A'],
									'bentuk_ujian'	    => $this->input->post("bentuk_ujian") ,
									'kode_soal'		 	=> $this->input->post('kode_soal'),
									'mata_pelajaran'	=> $this->input->post('mata_pelajaran'),
									'kode_guru'			=> $this->session->userdata("nipn"),
									'nama_guru'			=> $this->input->post('nama_guru'),
									'kelas'					=> $this->input->post('kelas'),
		                    		'soal'			    => $soal['B'],
		                    		'a'			  		=> $soal['C'],
		                    		'b'			    	=> $soal['D'],
		                    		'c'			   		=> $soal['E'],
		                    		'd'			   		=> $soal['F'],
		                    		'jawaban'	   		=> $soal['G'],
						));
 					}
 					$numrow++;
 				}

 				//upload soal ke abel bank soal
 				$upload_soal = $this->m_guru->tambahSoal($soal_uas,"bank_soal"); 
 				//input data ke table uts 
		 		$list_uas =  $this->m_guru->input("uas",$uas);
 				if($upload_soal && $list_uas){
 					echo "Sukses2";
 				}else {
 					echo "gagal";
 				}
 		}

 	}
 }