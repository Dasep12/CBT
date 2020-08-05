<?php



 /**
  * 
  */
 class Ujian extends CI_Controller
 {
 	
 	public function UTS($kode_soal)
 	{
 		$where = array("kode_soal" => $kode_soal);
 		$data['soal'] = $this->m_soal->cek("bank_soal",$where)->result();
 		$data['jumlah'] = $this->m_soal->cek("bank_soal",$where)->num_rows();
 		$data['info'] = $this->m_soal->cek("bank_soal",$where)->row();
 		$this->template->load("template/template_siswa","ujian/soal_uts",$data);
 	}




 	public function UAS($kode_soal)
 	{
 		$where = array("kode_soal" => $kode_soal);
 		$data['soal'] = $this->m_soal->cek("bank_soal",$where)->result();
 		$data['jumlah'] = $this->m_soal->cek("bank_soal",$where)->num_rows();
 		$this->template->load("template/template_siswa","ujian/soal_uas",$data);
 	}



 	/*public function sejarah()
 	{
 		$data['soal'] = $this->m_soal->getSoal("bank_soal")->result();
 		$data['jumlah'] = $this->m_soal->getSoal("bank_soal")->num_rows();
 		$this->template->load("template/template_siswa","ujian/sejarah",$data);
 	}

 	//tampung semua jawaban ujian
 	public function kumpulkanJawaban()
 	{
 		$id_soal = $this->input->post("id_soal");
 		$jawaban = $this->input->post("jawaban");
 		$jumlah = $this->input->post("jumlah");
 		for($i = 0 ; $i < $jumlah ; $i++ ){
 			$data = array(
 				'id_soal'	=> $id_soal[$i],
 				'jawaban'	=> $jawaban[$i],
 				'nama'		=> "andi"
 			);

 			$this->db->insert("jawaban",$data);
 		}
 		var_dump($id_soal); echo "<br>";
 		var_dump($jawaban);
 	}*/

 		
 }