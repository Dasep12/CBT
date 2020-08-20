<?php

/**
 * 
 */
	date_default_timezone_set('Asia/Jakarta');
class Posting_tugas extends CI_Controller
{
	public function index()
	{
		$where = array("pengajar"  => $this->session->userdata("nipn"));
		$data['mapel'] = $this->m_guru->cariData($where,"mata_pelajaran");
		$data['mapel2'] = $this->m_guru->cariData($where,"mata_pelajaran")->row();
		$this->template->load("template/template_guru","guru/posting_tugas",$data);
	}


	public function posting()
	{
		$where = array("kode_tugas"  => $this->input->post("kode_tugas"));
		$kode_tugas= $this->m_guru->cariData($where,"tugas")->num_rows();
		$mapel = $this->m_guru->cariData(array("kode_mapel" => $this->input->post("mata_pelajaran")) , "mata_pelajaran" )->row();
		if($kode_tugas > 0 ){
			echo "Kode Tugas Sudah di gunakan";
		}else {
			//jika posting tidak disertai file lampiran
			if($_FILES['file_tugas']['name'] == ""){

				$where3 = array(
					'kelas'				=> $mapel->kelas,
					'prodi'				=> $mapel->prodi,
				);
				$daftar_siswa = $this->m_guru->cariData($where3,"siswa");
				foreach($daftar_siswa->result() as $r){
					//posting kedalam tabel daftar tugas
						$data3 = array(
						'kode_tugas'		=> $this->input->post("kode_tugas"),
						'nama_siswa'		=> $r->nama,
						'kelas'				=> $r->kelas,
						'nisn'				=> $r->nisn,
						'prodi'				=> $r->prodi,
					);
			 			$this->m_guru->input("daftar_tugas",$data3);	
				}


				//posting kedalam table tugas
				$data = array(
					'kode_guru'			=> $this->input->post("kode_guru"),
					'nama_guru'			=> $this->input->post("nama_guru"),
					'kode_tugas'		=> $this->input->post("kode_tugas"),
					'mata_pelajaran'	=> $mapel->mata_pelajaran,
					'kode_mapel'		=> $mapel->kode_mapel ,
					'kelas'				=> $mapel->kelas,
					'prodi'				=> $mapel->prodi,
					'judul_tugas'		=> $this->input->post("judul_tugas"),
					'keterangan'		=> $this->input->post("keterangan"),
					'tanggal'			=> date('Y-m-d'),
					'jam'				=> date("H:i:s")
				);
			 $p = $this->m_guru->input("tugas",$data);		
					if($p){
						echo "Sukses";
					}else {
						echo "Gagal" ;
					}
			}else {
				//jika posting beserta file gunakan fungsi di bawah

				$this->load->library("upload");
				$config['allowed_types'] = '*' ;
				$config['upload_path']  = './assets/tugas/soal/';
				$this->upload->initialize($config);
					if(!$this->upload->do_upload("file_tugas")){
						echo "Gagal upload";
					}else {
						$where3 = array(
							'kelas'				=> $mapel->kelas,
							'prodi'				=> $mapel->prodi,
						);
						$daftar_siswa = $this->m_guru->cariData($where3,"siswa");
						$file = $this->upload->data("file_name");
						foreach($daftar_siswa->result() as $r){
							//posting kedalam tabel daftar tugas
								$data3 = array(
								'kode_tugas'		=> $this->input->post("kode_tugas"),
								'nama_siswa'		=> $r->nama,
								'kelas'				=> $r->kelas,
								'file_tugas'		=> $file ,
								'nisn'				=> $r->nisn,
								'prodi'				=> $r->prodi,
							);
					 			$this->m_guru->input("daftar_tugas",$data3);	
						}

							$data = array(
								'kode_guru'			=> $this->input->post("kode_guru"),
								'nama_guru'			=> $this->input->post("nama_guru"),
								'file_tugas'		=> $file ,
								'kode_tugas'		=> $this->input->post("kode_tugas"),
								'mata_pelajaran'	=> $mapel->mata_pelajaran,
								'kode_mapel'		=> $mapel->kode_mapel ,
								'kelas'				=> $mapel->kelas,
								'prodi'				=> $mapel->prodi,
								'judul_tugas'		=> $this->input->post("judul_tugas"),
								'keterangan'		=> $this->input->post("keterangan"),
								'tanggal'			=> date('Y-m-d'),
								'jam'				=> date("H:i:s")
							);
					 $p = $this->m_guru->input("tugas",$data);		
							if($p){
								echo "Sukses";
							}else {
								echo "Gagal" ;
							}
					}
			}
		}

		
	}
}