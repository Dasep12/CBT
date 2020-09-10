<?php


/**
 * 
 */
class M_admin extends CI_Model
{
	//ambil data dari database 
	public function getData($table)
	{
		return $this->db->get($table);
	}

	//input data 
	public function input($data,$table)
	{
		return $this->db->insert($table,$data);
	}

	//input data dengan metode array()
	public function inputArray($data,$table)
	{
		return $this->db->insert_batch($data,$table);
	}

	//cari data berdasarkan inputan 
	public function cari($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	//update data
	public function update($data,$table,$where)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}

	//hapus data
	public function delete($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	//upload data siswa
	public function uploadfile($filename)
 	{
 		$this->load->library('upload');
 		$config['upload_path']		= './assets/upload/';
 		$config['allowed_types']	='xlsx';
 		$config['max_size']			='12048';
 		$config['overwrite']		=true ;
 		$config['file_name']		= $filename;

 		$this->upload->initialize($config);
 			if ($this->upload->do_upload('file')) {
 				//jik berhasil
 				$return = array('result' => 'success' , 'file'	=> $this->upload->data() , 'error' => '');
 				return $return;
 			}else{
 				$return = array('result' => 'gagal' , 'file' => '' , 'error' => $this->upload->display_errors());
 				return $return;
 			}
 	}


 	//cek nik dan tgl lahir untuk ganti password
 	public function joinAkunNISN($nisn , $tgl)
 	{
 		$this->db->select("*");
 		$this->db->from("siswa");
 		$this->db->where(array("siswa.nisn" => $nisn , "tgl_lahir" => $tgl));
 		$this->db->join("akun" , "akun.nisn = siswa.nisn");
 		return $this->db->get();
 	}

 	//
 	public function insertimport($data)
    {
        $this->db->insert_batch("token", $data);
    }

    public function getSelect($key)
    {
    	$this->db->select("*");
    	$this->db->limit(10);
    	$this->db->from("siswa");
    	$this->db->like("nisn" , $key);
    	return $this->db->get()->result_array();
    }

    public function getSelect2($key)
    {
    	$this->db->select("*");
    	$this->db->limit(10);
    	$this->db->from("guru");
    	$this->db->where("status" , "Pengajar");
    	$this->db->like("nipn" , $key);
    	return $this->db->get()->result_array();
    }
	
}