<?php
class Fab_received extends CI_Controller{
  public function __construct(){
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

  public function index(){
    // Untuk Received Fabric
    $this->session->set_userdata('ses_page','fab_received');
    $this->load->view('v_fab_received');
  }

  public function view_fab_received(){
      $data=$this->m_fab_received->view_fab_received();
      echo json_encode($data);
  }

  public function view_final_received(){
      $zroh = $this->session->userdata('ses_zroh');
      $data=$this->m_fab_received->view_final_received($zroh);
      echo json_encode($data);
  }

  public function get_fab_received_header(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->get_fab_received_header($id);
      echo json_encode($data);
  }


  public function find_fab_received_header(){
      $no_inv = $this->input->get('no_inv');
      $data=$this->m_fab_received->find_fab_received_header($no_inv);
      echo json_encode($data);
  }


  public function get_fab_received_detail(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->get_fab_received_detail($id);
      echo json_encode($data);
  }

  public function get_list_inv(){
      $data=$this->m_fab_received->get_list_inv();
      echo json_encode($data);
  }


  public function check_fab_infty(){
      // $id = $this->input->get('id');
      $data=$this->m_fab_received->check_fab_infty();
      echo json_encode($data);
  }

  public function check_zroh()
  {
    $zroh = $this->input->get('zroh');
    $data = $this->m_fab_received->check_zroh($zroh);
    echo json_encode($data);
    // echo $zroh;
  }

  public function cek_all_zroh()
  {
    $list_zroh = $this->input->get('list_zroh');
    $data = $this->m_fab_received->cek_all_zroh($list_zroh);
    echo ($data);
    // echo $zroh;
  }

  public function delete_fab_received_item(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->delete_fab_received_item($id);
      echo $data;
  }

  public function delete_fab_received_all(){
      $id = $this->input->get('id');
      $data=$this->m_fab_received->delete_fab_received_all($id);
      echo $data;
  }


  public function input_fab_received(){
    $vendor=$this->input->post('vendor');
    $inv_no=$this->input->post('inv_no');
    // $inv_po=$this->input->post('inv_po');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pr=$this->input->post('pr');
    $received=$this->input->post('received');
    $detail=$this->input->post('detail');

    // $data=$this->m_fab_received->input_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail);
    $data=$this->m_fab_received->input_fab_received($vendor,$inv_no,$etd,$eta,$pr,$received,$detail);
    // echo json_encode($data);
    echo $data;

  }

  public function edit_fab_received(){
    $last_id=$this->input->post('last_id');
    $vendor=$this->input->post('vendor');
    $inv_no=$this->input->post('inv_no');
    // $inv_po=$this->input->post('inv_po');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pr=$this->input->post('pr');
    $received=$this->input->post('received');
    $detail=$this->input->post('detail');

    // $data=$this->m_fab_received->edit_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail,$last_id);

    $data=$this->m_fab_received->edit_fab_received($vendor,$inv_no,$etd,$eta,$pr,$received,$detail,$last_id);
    echo $data;
    // echo "eka";

  }

  public function update_fab_received_date(){
    $result = json_decode($this->input->raw_input_stream, true);

    $queryToModel = $this->m_fab_received->update_fab_received_date($result);

    echo json_encode($queryToModel);


  }

  
  public function update_fab_qty_received(){
    $result = json_decode($this->input->raw_input_stream, true);

    $queryToModel = $this->m_fab_received->update_fab_qty_received($result);

    echo json_encode($queryToModel);


  }

}

