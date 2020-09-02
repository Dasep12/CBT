<?php


/**
 * 
 */
class SettJadwal extends CI_Controller
{
	
	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$data['pengajar'] = $this->m_admin->cari(array("status" => "Pengajar"),"guru");
 		$data['mata_pelajaran'] = $this->m_admin->getData("mata_pelajaran");
 		$data['jurusan'] = $this->m_admin->getData("jurusan");
 		$this->template->load("template/template_admin","admin/jadwal_ujian",$data);
 	}

 	public function input()
 	{
 		$kode = $this->input->post("kode_soal");
 		$cekKode = $this->m_admin->cari(array("kode_soal" => $kode),"jadwal_ujian")->num_rows();
 		$pelajaran = $this->m_admin->cari(array("id" => $this->input->post("mapel")),"mata_pelajaran")->row();
 		$pengajar = $this->m_admin->cari(array("nipn" => $this->input->post("pengajar")),"guru")->row();
 		$prodi = $this->m_admin->cari(array("id" => $this->input->post("prodi")),"jurusan")->row();

 		if($cekKode > 0){
 			echo "Kode Soal Sudah ada";
 		}else {

 			$data = array(
 				"kode_soal"			=> $kode ,
 				"mata_pelajaran"	=> $pelajaran->mata_pelajaran ,
 				"kode_mapel"		=> $pelajaran->kode_mapel ,
 				"hari"				=> $this->input->post("hari") ,
 				"jam_mulai"			=> $this->input->post("jamMulai") . ":" . $this->input->post("menitMulai") . ":00" ,
 				"jam_selesai"		=> $this->input->post("jamSelesai") . ":" . $this->input->post("menitSelesai") . ":00" ,
 				"kelas"				=> $this->input->post("kelas"),
 				"kode_prodi"		=> $prodi->kode_jurusan ,
 				"prodi"				=> $prodi->jurusan ,
 				"guru"				=> $pengajar->nama . " " . $pengajar->gelar ,
 				"kode_guru"			=> $pengajar->nipn 
 			);
 			$simpan = $this->m_admin->input($data,"jadwal_ujian");
 			if($simpan){
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