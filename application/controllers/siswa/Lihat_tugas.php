<?php
date_default_timezone_set('Asia/Jakarta');
/**
 * 
 */
class Lihat_tugas extends CI_Controller
{
	public function view($id)
	{
		$where2 = array(
 			'nisn' => $this->session->userdata("nisn")
 		);
 		$data['profile'] = $this->m_siswa->getSiswa($where2,"siswa")->row();

		$where2 = array('id' => $id);
		$data['tugas'] = $this->m_siswa->getSiswa($where2,"tugas")->row();
		$this->template->load("template/template_siswa","siswa/lihat_tugas",$data);
	}

	public function kumpulkan()
	{
		if(empty($_FILES['file_jawaban']['name'])){
			//kumpulkan tugas jika tidak disertai lampiran
			$id_tugas = $this->input->post("kode_tugas");
			$where1 = array(
				'nisn'	=> $this->session->userdata("nisn"),
				'nama_siswa'	=> $this->session->userdata("nama"),
				'prodi'	=> $this->session->userdata("prodi"),
				'kelas'	=> $this->session->userdata("kelas"),
				'kode_tugas'	=> $id_tugas
			);
			$this->m_siswa->delete($where1,"daftar_tugas");

			$data = array(
				'kode_tugas'	=> $this->input->post("kode_tugas"),
				'jawaban'		=> $this->input->post("jawaban"),
				'tanggal'		=> date('Y-m-d'),
				'jam'			=> date('H:i:s'),
				'nama_siswa'	=> $this->session->userdata('nama'),
				'nisn'			=> $this->session->userdata('nisn'),
				"nilai"			=> 0 
			);

			$input = $this->m_siswa->input($data,"kumpul_tugas");
				if($input){
					echo "Tugas di serahkan";
				}else {
					echo "Gagal";
				}
		}else {

			//kumpulkan tugas beserta lampiran
			$id_tugas = $this->input->post("kode_tugas");
			$where1 = array(
				'nisn'			=> $this->session->userdata("nisn"),
				'nama_siswa'	=> $this->session->userdata("nama"),
				'prodi'			=> $this->session->userdata("prodi"),
				'kelas'			=> $this->session->userdata("kelas"),
				'kode_tugas'	=> $id_tugas
			);
			//pindahkan tugas dari table daftar tugas ke table kumpul tugas
			$this->m_siswa->delete($where1,"daftar_tugas");

			$this->load->library("upload");
			$config['upload_path']   = './assets/tugas/jawaban/';
			$config['allowed_types']	= '*' ;
			$this->upload->initialize($config);
				if(!$this->upload->do_upload("file_jawaban")){
					echo "gagal";
				}else {
					$file = $this->upload->data("file_name");
					$data = array(
						'kode_tugas'		=> $this->input->post("kode_tugas"),
						'jawaban'			=> $this->input->post("jawaban"),
						'tgl_diserahkan'	=> date('Y-m-d'),
						'file_jawaban'		=> $file ,
						'jam_diserahkan'	=> date('H:i:s'),
						'nama_siswa'		=> $this->session->userdata('nama'),
						'nisn'				=> $this->session->userdata('nisn'),
					);
					
					//kumpulkan tugas dari siswa kedalam tablel kumpul tugas
					$input = $this->m_siswa->input($data,"kumpul_tugas");
						if($input){
							echo "Tugas di serahkan";
						}else {
							echo "Gagal";
						}
				}


		}
	}
}