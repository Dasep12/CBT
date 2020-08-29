<?php


 /**
  * 
  */
 class Tambahmapel extends CI_Controller
 {
 
 	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$data['pengajar'] = $this->m_admin->getData("guru")->result(); 
 		$data['jurusan'] = $this->m_admin->getData("jurusan")->result(); 
 		$this->template->load("template/template_admin","admin/tambahmapel",$data);
 	}

 	public function input()
 	{
 		$kode = $this->input->post("kode_mapel");
 		$kdguru = $this->input->post("pengajar");
 		$kdprodi = $this->input->post("prodi");
 		$prodi = $this->m_admin->cari(array("kode_jurusan" => $kdprodi),"jurusan")->row();
 		$pengajar = $this->m_admin->cari(array("nipn" => $kdguru),"guru")->row();
 		$cekkodemapel = $this->m_admin->cari(array("kode_mapel" => $kode),"mata_pelajaran")->num_rows();
 			if($cekkodemapel > 0){
 				echo "kode sudah ada ";
 			}else {
 				$data = array(
 					"mata_pelajaran"		=> $this->input->post("mata_pelajaran"),
 					"kode_mapel"			=> $kode,
 					"pengajar"				=> $pengajar->nama . " " . $pengajar->gelar,
 					"kode_pengajar"			=> $pengajar->nipn ,
 					"kelas"					=> $this->input->post("kelas"),
 					"prodi"					=> $prodi->jurusan ,
 					"kode_prodi"			=> $prodi->kode_jurusan
 				);

 				$input = $this->m_admin->input($data,"mata_pelajaran");
 				if($input){
 					echo "Berhasil tambah data";
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