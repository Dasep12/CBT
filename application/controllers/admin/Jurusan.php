<?php


/**
 * 
 */
class Jurusan extends CI_Controller
{
	public  function __construct()
 	{
 		parent::__construct();
 		if(empty($this->session->userdata("role_id")) || $this->session->userdata("role_id") != 1 ) {
 			$this->session->set_flashdata("error","Gagal");
 			redirect("Login");
 		}
 	}
	
	public function index()
 	{
 		$data['hari'] = $this->hari();
 		$data['url']  = $this->uri->segment(2); 
 		$this->template->load("template/template_admin","admin/jurusan",$data);
 	}


 	//kirim json untuk menampilkan data jurusan
 	public function sendData()
 	{
 		$data =  $this->m_admin->getData("jurusan")->result();
 		echo json_encode($data) ;
 	}

 	//tampilkan jurusan kedalam modal
 	public function jurusanModal()
 	{
 		$id = $this->input->get("id");
 		$data['jurusan'] = $this->m_admin->cari(array("id" => $id),"jurusan")->row();
 		$this->load->view("admin/modal_jurusan",$data);
 	}

 	//tambah data jurusan
 	public function input()
 	{
 		$kode = $this->input->post("kode_jurusan");
 		$cek = $this->m_admin->cari(array("kode_jurusan" => $kode),"jurusan")->num_rows();
 			if($cek > 0){
 				echo "0";
 			}else {
		 		$data = array(
				 			"jurusan"			=> $this->input->post("jurusan"),
				 			"kode_jurusan"		=> $this->input->post("kode_jurusan"),
				 		);
		 		$input = $this->m_admin->input($data,"jurusan");
		 			if($input){
		 				echo "Sukses";
		 			}else {
		 				echo "Gagal";
		 			}
 			}
 	}
 	//update data jurusan / prodi
 	public function updateData()
 	{
 		$data = array(
		 			"jurusan"			=> $this->input->post("jurusan"),
		 			"kode_jurusan"		=> $this->input->post("kode_jurusan"),
		 		);
 		$id = $this->input->post("id");
 		$update = $this->m_admin->update($data,"jurusan",array("id" => $id));
 					if($update){
 						echo "Berhasil";
 					}else {
 						echo "Gagal";
 					}
 	}


 	//hapus data 
 	public function delete()
 	{
 		$id = $this->input->get("id");
 		$delete = $this->m_admin->delete( array("id" => $id  ) ,"jurusan");
 			if($delete){
 				echo "Sukses";
 			}else {
 				echo "Gagal";
 			}
 	}

 	public function hari()
 	{
 		//hari 
 		$data =  date("D");
 			switch ($data) {
 				case 'Mon':
 					$hari	 = "Senin, " ;
 					break;
 				case 'Tue':
 					$hari = "Selasa, " ;
 					break;
 				case 'Wed':
 					$hari = "Rabu, " ;
 					break;
 				case 'Thu':
 					$hari = "Kamis, " ;
 					break;
 				case 'Fri':
 					$hari = "Jum'at, " ;
 					break;
 				case 'Sat':
 					 $hari = "Sabtu, " ;
 					break;
 				case 'Sun':
 					 $hari = "Minggu, " ;
 					break;

 			}
			return $hari;
	}
}