<?php



 /**
  * 
  */
 class Daftar_tugas extends CI_Controller
 {

 	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 2 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}


 	public function index()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$this->template->load("template/template_guru","guru/daftar_tugas",$data);
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
 		$deleteDaftarTugas = $this->db->get_where("tugas" , array("id" => $id))->row();
 		//hapus tugas tabel tugas dan table daftar tugas 
 		$del = $this->m_guru->delete(array("kode_tugas" => $deleteDaftarTugas->kode_tugas),"daftar_tugas");
 		$delete = $this->m_guru->delete($where,"tugas");
 			if($del == TRUE){
			 		if($delete && $del){
			 			echo "Sukses";
			 		}
 			}else {
 				if($delete){
 					echo "Sukses";
 				}
 			}
 	}

 	//lihat daftar siswa yang sudah mengumpulkan tugas
 	public function kumpulanTugas($kode)
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
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