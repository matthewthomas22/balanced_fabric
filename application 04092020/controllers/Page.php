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

  // tidak di pakai lagi, karena langsung ke fab received aja main page nya
  function index(){
    // Untuk Received Fabric
    $this->session->set_userdata('ses_page','fab_received');
    $this->load->view('v_fab_received');
  }

}
