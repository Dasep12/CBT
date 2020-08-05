<?php


 /**
  * 
  */
 class M_soal extends CI_Model
 {
 	public function getSoal($table)
 	{
 		return $this->db->get($table);
 	}

 	//cek data 
 	public function cek($table,$where)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	//input data 
 	public function input($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}
 }