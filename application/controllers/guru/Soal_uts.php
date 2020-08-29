<?php


 /**
  * 
  */
 class Soal_uts extends CI_Controller
 {
 	public function index()
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$where = array('kode_guru' => $this->session->userdata("nipn")) ;
 		$data['list_uts']   = $this->m_guru->cariData($where,"uts")->result();
  		$this->template->load("template/template_guru","guru/uts",$data);
 	}


 	//review soal uts berdasarkan kode soal
 	public function view_uts($kode)
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$data['soal'] = $this->m_guru->showSoal($kode)->result();
  		$this->template->load("template/template_guru","guru/view_soal",$data);
 	}


 	// list soal uts untuk di edit
 	public function edit_soal($kode)
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$data['edit_soal'] = $this->m_guru->showSoal($kode)->result();
  		$this->template->load("template/template_guru","guru/edit_soal",$data);
 	}


 	//form untuk edit data uts 
 	public function form_edit($id)
 	{
 		$data['profile'] = $this->m_guru->cariData(array("nipn" => $this->session->userdata("nipn")),"guru")->row();
 		$data['soal'] = $this->m_guru->showPerid($id)->row();
 		$data['kode'] = $data['soal']->kode_soal ;
 		$this->template->load("template/template_guru","guru/form_edit_soal",$data);
 	}

 	//update soal uts 
 	public function update()
 	{
 		$where = array(
 			'id' 			=> $this->input->post("id"),
 			'kode_soal'		=> $this->input->post("kode_soal")
 		);
 		$data = array(
 			'soal'		=> $this->input->post("soal"),
 			'a'			=> $this->input->post("a"),
 			'b'			=> $this->input->post("b"),
 			'c'			=> $this->input->post("c"),
 			'd'			=> $this->input->post("d"),
 			'jawaban'	=> $this->input->post("jawaban")
 		);
 		 $update = $this->m_guru->update($data,"bank_soal",$where);
 		//var_dump($data);
 		if($update){
 			echo "Sukses";
 		}else {
 			echo "Gagal";
 		}
 	}

 	//hapus soal dari bank soal dan table uts 
 	public function delete()
 	{
 		$kode = $this->input->get("kode");
 		$where = array('kode_soal' => $kode);
 		$where1 = array('kode_soal' => $kode);

 		//hapus data soal dari table uts 
 		$del_uts =  $this->m_guru->delete($where,"uts");
 		//hapus data dari bank soal
 		$soal_uts =  $this->m_guru->delete($where1,"bank_soal");

 		if($del_uts && $soal_uts){
 			echo "Sukses";
 		}else {
 			echo "gagal";
 		}
 	}


 }