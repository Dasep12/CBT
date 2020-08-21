<?php



 /**
  * 
  */
 class M_siswa extends CI_Model
 {

 	//tampilkan data siswa berdasarkan nisn
 	public function getSiswa($where,$table)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	//cari data berdasarkan kategori
 	public function cari($table,$where)
 	{
 		return $this->db->order_by("tanggal","DESC")->get_where($table,$where);
 	}

 	//input data
 	public function input($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}

 	//update data siswa 
 	public function update($table,$data,$where)
 	{
 		$this->db->where($where);
 		return $this->db->update($data,$table);
 	}

 	//cek akun terdaftar atau tidak
 	public function cekAkun($where,$table)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	//join table daftar tugas dan table tugas
 	public function joinTugasSiswa($nama,$nisn,$kelas,$prodi)
 	{
 		$this->db->select("*");
 		$this->db->from("daftar_tugas");
 		$this->db->where(array(
 			'daftar_tugas.kelas' => $kelas ,
 			'nama_siswa'		=> $nama ,
 			'daftar_tugas.nisn' => $nisn ,
 			'daftar_tugas.prodi' => $prodi 
 		));
 		$this->db->join("tugas" , "tugas.kode_tugas = daftar_tugas.kode_tugas");
 		return $this->db->get();
 	}





 	//join table kunpul_tugas dan table tugas
 	public function joinTugasSelesaiSiswa($nama,$nisn,$kelas,$prodi)
 	{
 		$this->db->select("*");
 		$this->db->from("kumpul_tugas");
 		$this->db->where(array(
 			'nama_siswa'		=> $nama ,
 			'kumpul_tugas.nisn' => $nisn ,
 		));
 		$this->db->join("tugas" , "tugas.kode_tugas = kumpul_tugas.kode_tugas");
 		return $this->db->get();
 	}


 	//join table kunpul_tugas dan table tugas
 	public function joinTugasSelesaiSiswa2($kode_tugas,$nisn,$kelas,$prodi)
 	{
 		$this->db->select("*");
 		$this->db->from("kumpul_tugas");
 		$this->db->where(array(
 			'kumpul_tugas.kode_tugas'	=> $kode_tugas ,
 			'tugas.kelas'				=> $kelas ,
 			'tugas.prodi'				=> $prodi ,
 			'kumpul_tugas.nisn' 		=> $nisn ,
 		));
 		$this->db->join("tugas" , "tugas.kode_tugas = kumpul_tugas.kode_tugas");
 		return $this->db->get();
 	}




 	//delete
 	public function delete($where,$table)
 	{	
 		$this->db->where($where);
 		return $this->db->delete($table);
 	}

 	//join akun dan profile guru
 	public function joinAkunProfile($where)
 	{
 		$this->db->select("*");
 		$this->db->from("guru");
 		$this->db->where("nipn",$where);
 		$this->db->join("akun" , "akun.nisn  = guru.nipn ");
 		return $this->db->get();
 	}

 }