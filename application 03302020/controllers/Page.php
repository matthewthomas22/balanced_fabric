<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('login_success') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }

  function index(){
    // Untuk Received Inveoice
    $this->session->set_userdata('ses_page','received_invoice');
    $this->load->view('v_fab_received');
  }

}
