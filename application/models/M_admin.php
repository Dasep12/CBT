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
	
}