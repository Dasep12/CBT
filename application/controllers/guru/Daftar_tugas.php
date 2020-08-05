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
 }