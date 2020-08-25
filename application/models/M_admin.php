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

	//cari data berdasarkan inputan 
	public function cari($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	
}