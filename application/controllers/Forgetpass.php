<?php


/**
 * 
 */
class Forgetpass extends CI_Controller
{
	public function index()
	{
		$this->load->view("LupaPassword");
	}

	public function ceknisn()
	{
		$nisn = $this->input->post("nisn");
		$tgl_lahir = $this->input->post("tgl_lahir");

		$where = array(
			"nisn"  => $nisn ,
			"tgl_lahir" => $tgl_lahir
		);

		$akun = $this->m_admin->joinAkunNISN($nisn , $tgl_lahir)->num_rows();
		if($akun > 0 ){
			redirect('Forgetpass/formEmail/' . md5($nisn) );
		}else {
			$this->session->set_flashdata("err","akun tidak di temukan");
			redirect("Forgetpass");
		}
	}


	public function formEmail( $nisn )
	{
		$this->load->view("Formemail");
	}


	public function sendLink()
	{
		$email = $this->input->post("email");
		//generate token aktivasi 
	      $token = "";
	      $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	      $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	      $codeAlphabet.= "0123456789";
	      $max = strlen($codeAlphabet); // edited
	        
	      for ($i=0; $i < 7 ; $i++) {
	       $token .= $codeAlphabet[random_int(0, $max-1)];
	      }
	      

		$this->load->library('email');  
			$config = Array(  
            'protocol'   => 'smtp',  
            'smtp_host'  => 'ssl://smtp.googlemail.com',  
            'smtp_port'  => 465,  
            'smtp_user'  => 'dasepdepiyawan19101051@gmail.com',   
            'smtp_pass'  => 'swadharma',   
            'mailtype'   => 'html',   
            'charset'    => 'iso-8859-1'  
           );  
           
 			$isi = 'Berikut kode ganti password akun anda, kode tersebut hanya bisa digunakan satu kali<br><center><h3>'.  $token .'</h3></center>' ;
           $this->email->initialize($config);
           $this->email->set_newline("\r\n");  

           $this->email->from('dasepdepiyawan19101051@gmail.com', 'Reset Your Password');   
           $this->email->to($email);   
           $this->email->subject('Token Ganti Password');   
           $this->email->message($isi);  
           
           $kirim =  $this->email->send() ;
          if($kirim){
          	$data = array(
		      	"token" => $token ,
		     );
	      $this->db->insert("token",$data);
          	$this->session->set_flashdata("send","masukan kode token yang di kirim ke email anda");
          	redirect("Forgetpass/inputToken");
          }else {
          	echo "Gagal Kirim Token" ;
          }

	}


	public function inputToken()
	{
		$this->load->view("inputToken");
	}


	public function cekToken()
	{
		$token = $this->input->post("token");

		$cekToken = $this->db->get_where("token",array("token" => $token) )->num_rows();
		if($cekToken > 0){
			$this->session->set_flashdata("sendToken","Ok");
			redirect("Forgetpass/formUpdatePassword/". $token);
		}else {
			$this->session->set_flashdata("errtoken","Token sudah kadaluarsa / sudah tidak aktif / token salah");
			$this->inputToken();
		}
	}


	public function formUpdatePassword($token)
	{
		$cekToken = $this->db->get_where("token",array("token" => $token) )->num_rows();
		if($cekToken){
			$data['token'] = $token;
			$this->load->view("updatePassword",$data);
		}else {
			echo "Halaman Sudah Kadaluarsa";
		}
	}


	public function updatePass()
	{
		$token = $this->input->post("token");
		$nisn = $this->input->post("nisn");
		$cekAkun = $this->m_admin->cari(array("nisn" => $nisn),"akun")->num_rows();
		if($cekAkun > 0 ){
			$data = array(
				"password"  => $this->input->post("password")
			);
			$update = $this->m_admin->update($data,"akun",array("nisn" => $nisn));
				if($update){
					$this->m_admin->delete(array("token" => $token),"token");
					echo "Berhasil";
				}
		}else {
			echo "akun tidak ada";
		}
	}
}