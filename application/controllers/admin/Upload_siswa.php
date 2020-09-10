<?php


 /**
  * 
  */
 class Upload_siswa extends CI_Controller
 {

 	private $filename = "Upload_siswa";
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
 		$data = array();
		if(isset($_POST['submit'])){
			$upload = $this->m_admin->uploadfile($this->filename);
			if($upload['result'] =="success") {
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('assets/upload/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                    $data['sheet'] = $sheet ;
                }else{
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                    echo $upload['error'];
                }

		}

 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/upload_siswa",$data);
 	}


 	public function upload()
 	{

 		// Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/upload/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

 		$numrow = 1  ;
 		 $data = array();
 		 $data2 = array();
 		 $cekNISN= array();
 		foreach($sheet as $row){
	            if($numrow > 1){
	 			//cek nisn sudah terdaftar apa belum di master siswa
				$cekNISN = $this->m_admin->cari(array("nisn" => $row['C']),"siswa")->num_rows();
	            	if($cekNISN > 0){
	            		$this->session->set_flashdata("error","NISN " . $row['C'] . " Sudah Terdaftar di Master Siswa");
	            		redirect("admin/Upload_siswa");

					}else {
							// push data siswa ke tabel siswa
			                array_push($data, array(
			                	'nama'			    => $row['B'],
			                	'nisn'			    => $row['C'],
			                	'kelas'				=> $row['H'],
			                	'kode_prodi'		=> $row['I'],
			                	'prodi'				=> $row['J'],
			                	'tgl_lahir'			=> $row['E'],
			                	'tempat_lahir'		=> $row['D'],
			                	'alamat'			=> $row['G'],
			                	'gender'			=> $row['F'],
			                	'tahun_ajaran'		=> $row['K'],
			                	'angkatan'  		=> $row['L'],
			                	'status' 	 		=> $row['M'],
			                ));

			                //push data akun siswa
			                array_push($data2, array(
			                	"username"		=> $row['B'],
					 			"nisn"			=> $row['C'],
					 			"password"		=> 123 ,
					 			"role_id"		=> 3 
			                ));

					}
	            }
            		$numrow++; // Tambah 1
        	}
        	if($cekNISN > 0){
        		echo "";
        	}else {
        		$input = $this->m_admin->inputArray("siswa",$data);
        		$input2 = $this->m_admin->inputArray("akun",$data2);
        			if($input && $input2){
        				$this->session->set_flashdata("success","Data telah Di daftar");
	            		redirect("admin/Upload_siswa");
        			}else {
        				echo "Gagal";
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