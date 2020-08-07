<?php



 /**
  * 
  */
 class Daftar_tugas extends CI_Controller
 {


 	public function index()
 	{
 		$this->template->load("template/template_guru","guru/daftar_tugas");
 	}

 	//ambil data dari json 
 	public function sendData()
 	{
 		$where = array("kode_guru"	=> $this->session->userdata("nipn"));
 		$data = $this->m_guru->cariData($where,"tugas")->result();
 		echo json_encode($data);
 	}

 	//lihat tugas di dalam modal
 	public function viewTugas()
 	{
 		$id = $this->input->get("id");
 		$where = array("id"	=> $id);
 		$data['tugas'] = $this->m_guru->cariData($where,"tugas")->row();
 		$this->load->view("guru/modal_tugas",$data);
 	}

 	//hapus tugas dari daftar
 	public function delete()
 	{
 		$id = $this->input->get("id");
 		$where = array('id' => $id);

 		$delete = $this->m_guru->delete($where,"tugas");
 		if($delete){
 			echo "Sukses";
 		}
 	}

 	//lihat daftar siswa yang sudah mengumpulkan tugas
 	public function kumpulanTugas($kode)
 	{
 		$data['join_tugas'] = $this->m_guru->joinTugas($kode)->result();
 		$this->template->load("template/template_guru",'guru/kumpulkan_tugas',$data);

 	}

 	//modal untuk beri nilai pada tugas siswa
 	public function nilai_tugas()
 	{
 		$nisn		 = $this->input->get("nisn");
 		$id		 = $this->input->get("id");
 		$kode_tugas  = $this->input->get("kode_tugas");
 		$where = array(
 			'kode_tugas'	=> $kode_tugas ,
 			"nisn"			=> $nisn
 		);
 		$data['jawaban'] = $this->m_guru->cariData($where,"kumpul_tugas")->row();
 		$this->load->view("guru/modal_nilai_tugas",$data);
 	}

 	public function berinilai()
 	{
 		$nilai = $this->input->post("nilai_tugas");
 		$id  = $this->input->post("id");

 		$where = array('id' => $id);
 		$data = array('nilai'  => $nilai);
 		$update = $this->m_guru->update($data,"kumpul_tugas",$where);
 		if($update){
 			echo "nilai di berikan";
 		}
 		//var_dump($data);
 	}


 }