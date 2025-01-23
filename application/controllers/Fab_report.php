<?php
class Fab_report extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    // $this->load->model('m_fab_issued');
    // $this->load->model('m_fab_received');
    $this->load->model('m_zroh');
  }

  function index(){
    $this->session->set_userdata('ses_page','fab_report');

    $data['myzroh'] = $this->m_zroh->view_zroh();
    $this->load->view('v_fab_report',$data);
  }

  function generate_report(){
      $myzroh = $this->input->post('zroh');

      $data=$this->m_zroh->generate_report($myzroh);
      echo $data;
  }

  function show_report() {
    // $output = shell_exec('java -jar "D:\Report Balanced Fabric\balanced_fabric\dist\balanced_fabric.jar"');
    $tes = exec("app.bat");
    echo "ok";
  }
}
