<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		$this->load->view('v_login');
	}

	function login_user(){
		$username=htmlspecialchars($this->input->post('user',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		$cek_user=$this->m_login->f_login_user($username,$password);

		//jika login berhasil
		if($cek_user->num_rows() > 0){
			$user=$cek_user->row_array();
			$this->session->set_userdata('login_success',TRUE);
			$this->session->set_userdata('ses_id',$user['id']);
			$this->session->set_userdata('ses_nama',$user['c_firstname']);
			$this->session->set_userdata('ses_job',$user['c_userjob']);
			redirect('Fab_received');
			

		}else{ //jika login gagal

			$this->load->view('failed');
		}

	}


	function logout(){
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}

}

?>
