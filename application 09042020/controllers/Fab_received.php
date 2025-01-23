<?php
class Fab_received extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    //validasi jika user belum login
    if($this->session->userdata('login_success') != TRUE){
			$url=base_url();
			redirect($url);
		}else{
      $this->load->model('m_fab_received');
    }

  }

  function index(){
    // Untuk Received Fabric
    $this->session->set_userdata('ses_page','fab_received');
    $this->load->view('v_fab_received');
  }

  function view_fab_received(){
      $data=$this->m_fab_received->view_fab_received();
      echo json_encode($data);
  }

  function view_final_received(){
      $zroh = $this->session->userdata('ses_zroh');
      $data=$this->m_fab_received->view_final_received($zroh);
      echo json_encode($data);
  }

  function get_fab_received_header(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->get_fab_received_header($id);
      echo json_encode($data);
  }

  function get_fab_received_detail(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->get_fab_received_detail($id);
      echo json_encode($data);
  }

  function get_list_inv(){
      $data=$this->m_fab_received->get_list_inv();
      echo json_encode($data);
  }


  function check_fab_infty(){
      // $id = $this->input->get('id');
      $data=$this->m_fab_received->check_fab_infty();
      echo json_encode($data);
  }

  function delete_fab_received_item(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->delete_fab_received_item($id);
      echo $data;
  }

  function delete_fab_received_all(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->delete_fab_received_all($id);
      echo $data;
  }


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

  function edit_fab_received(){
    $last_id=$this->input->post('last_id');
    $vendor=$this->input->post('vendor');
    $inv_no=$this->input->post('inv_no');
    $inv_po=$this->input->post('inv_po');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pr=$this->input->post('pr');
    $received=$this->input->post('received');
    $detail=$this->input->post('detail');

    $data=$this->m_fab_received->edit_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail,$last_id);
    // echo json_encode($data);
    echo $data;

  }

}
