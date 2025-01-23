<?php
class Fab_received extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    $this->load->model('m_fab_received');

  }

  // function view_fab_issued(){
  //
  //   $this->session->set_userdata('ses_page','fab_issued'); //displat menu
  //   $zroh=$this->input->get('zroh'); //get zroh from user
  //   $last_index=$this->input->get('lastIndex'); //get last id from user
  //   $last_id=$this->input->get('lastID'); //get last id from user
  //
  //   if($zroh != ""){
  //     $this->session->set_userdata('ses_filter',TRUE);
  //     $this->session->set_userdata('ses_last_index',$last_index );
  //     $this->session->set_userdata('ses_last_id',$last_id );
  //     $data['fab'] = $this->m_fab_issued->view_data($zroh);
  //     $this->load->view('v_fab_issued',$data);
  //   }else{
  //     $this->session->set_userdata('ses_filter',FALSE);
  //     $this->load->view('v_fab_issued');
  //   }
  // }

  // function get_fab_issued(){
  //     $myid=$this->input->get('id');
  //     $lastIndex=$this->input->get('lastIndex');
  //     $data=$this->m_fab_issued->get_fab_issued_by_id($myid,$lastIndex);
  //     echo json_encode($data);
  // }

  function input_fab_received(){
    $vendor=$this->input->post('vendor');
    $inv_no=$this->input->post('inv_no');
    $inv_po=$this->input->post('inv_po');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pr=$this->input->post('pr');
    $received=$this->input->post('received');
    $detail=$this->input->post('detail');

    $data=$this->m_fab_received->input_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail);
    // echo json_encode($data);
    echo $data;

  }

}
