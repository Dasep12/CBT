<?php


/**
 * 
 */
class M_guru extends CI_Model
{
	
	//ambil data di dalam database
	public function getData($table)
	{
		return $this->db->get($table);
	}

	//cari data 
	public function cariData($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	//tampilkan data uts sesuai kode soal
	public function showSoal($kode)
	{
		return $this->db->get_where("bank_soal",array("kode_soal" => $kode));
	}


	//tampilkan data soal uts per nomor / id soal
	public function showPerid($id)
	{
		return $this->db->get_where("bank_soal",array("id" => $id));
	}

	//update data
	public function update($table,$data,$where)
	{
		$this->db->where($where);
		return $this->db->update($data,$table);
	}

	//upload file soal
	public function uploadSoal($filename)
	{
		$this->load->library("upload");
		$config['upload_path']  = './assets/soal/';
		$config['allowed_types'] = 'xlsx' ;
		$config['max_size']		 = '12048' ;
		$config['overwrite']	 = true ;
		$config['file_name']	= $filename ;
		$this->upload->initialize($config);

			if($this->upload->do_upload("file")){
				//jika berhasil file terupload 
				$return = array('result' => 'success' , 'file' => $this->upload->data() , 'error' => '');
				return $return ;
			}else {
				//jika gagal maka muncul error
				$return = array('result' => 'gagal' , 'file' => '' , 'error' => $this->upload->display_errors() ) ;
				return $return ;
			}
	}

	//input data ke table
	public function input($data,$table)
	{
		return $this->db->insert($data,$table);
	}

	//tambah dengan looping
	public function tambahSoal($table,$data)
	{
		return $this->db->insert_batch($data,$table);
	}

	//hapus data soal uts/uas dari bank soal
	public function delete($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	//cari kode soal sudah terdaftar apa belum 
	public function searcKode($table,$kode)
	{
		return $this->db->get_where($table,array("kode_soal" => $kode))->num_rows();
	}


	//tampilkan kode jawaban dari soal 
	public function kunciJawaban($kode)
	{
		return $this->db->get_where("bank_soal",array("kode_soal" => $kode));
	}

	//join table tugas dan kumpul_tugas
	public function joinTugas($kode)
	{
		$this->db->select("*");
		$this->db->from("tugas");
		$this->db->where("tugas.kode_tugas" , $kode);
		$this->db->join("kumpul_tugas" , "kumpul_tugas.kode_tugas = tugas.kode_tugas");
		return $this->db->get();
	}

	//upload file materi
	public function fileMateri($data)
	{
		return $this->db->insert_batch($data,"file_materi");
	}

	//join data materi dengan file materi
	public function joinMateri($guru,$kode_materi)
	{
		//return $this->db->get("materi");
		$this->db->select("*");
		$this->db->from("materi");
		$this->db->where(array("materi.kode_guru" => $guru , "materi.kode_materi" => $kode_materi ));
		$this->db->join("file_materi" , "file_materi.kode_materi = materi.kode_materi");
		return $this->db->get();
	}

}