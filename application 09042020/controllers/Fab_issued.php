<?php
class Fab_issued extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    $this->load->model('m_fab_issued');
    $this->load->model('m_fab_received');
  }

  function view_fab_issued(){

    $this->session->set_userdata('ses_page','fab_issued'); //displat menu
    $zroh=$this->input->get('zroh'); //get zroh from user
    $this->session->set_userdata('ses_zroh',$zroh); //save zroh to session
    $last_index=$this->input->get('lastIndex'); //get last id from user
    $last_id=$this->input->get('lastID'); //get last id from user

    if($zroh != ""){
      $this->session->set_userdata('ses_filter',TRUE);
      $this->session->set_userdata('ses_last_index',$last_index );
      $this->session->set_userdata('ses_last_id',$last_id );

      //ambil total final received fab qty untuk membuat po status otomatis  
      $total_recived=$this->m_fab_received->sum_final_received($zroh);
      $this->session->set_userdata('ses_ttl_rcvd',$total_recived);

      $data['fab'] = $this->m_fab_issued->view_fab_issued($zroh);
      $this->load->view('v_fab_issued',$data);
    }else{
      $this->session->set_userdata('ses_filter',FALSE);
      $this->load->view('v_fab_issued');
    }
  }

  function get_fab_issued(){
      $myid=$this->input->get('id');
      $lastIndex=$this->input->get('lastIndex');
      $data=$this->m_fab_issued->get_fab_issued_by_id($myid,$lastIndex);
      echo json_encode($data);
  }

  function update_fab_issued(){
    $received_mrk_cons=$this->input->post('received_mrk_cons');
    $create_avg=$this->input->post('create_avg');
    $fab_width=$this->input->post('fab_width');
    $or_cons_ctc=$this->input->post('or_cons_ctc');
    $or_cons_sales=$this->input->post('or_cons_sales');
    $fab_width_costing=$this->input->post('fab_width_costing');
    $avg_size_costing=$this->input->post('avg_size_costing');
    $exfty_actual=$this->input->post('exfty_actual');
    $ship_actual=$this->input->post('ship_actual');
    $remark1=$this->input->post('remark1');
    $remark2=$this->input->post('remark2');
    $id=$this->input->post('id');

    $data=$this->m_fab_issued->update_fab_issued($received_mrk_cons,$create_avg,$fab_width,$or_cons_ctc,$or_cons_sales,$fab_width_costing,$avg_size_costing,$exfty_actual,$ship_actual,$remark1,$remark2,$id);
    echo json_encode($data);

  }

  function get_fab_additional_detail(){
      $zroh = $this->session->userdata('ses_zroh');
      $data=$this->m_fab_issued->get_fab_additional_detail($zroh);
      echo json_encode($data);
  }

  function delete_fab_issued_adds(){
      $id = $this->input->get('id');
      $data=$this->m_fab_issued->delete_fab_issued_adds($id);
      echo $data;
  }

  function simpan_additional(){
    $zroh=$this->input->post('zroh');
    $detail=$this->input->post('detail');

    $data=$this->m_fab_issued->simpan_additional($zroh,$detail);
    // echo json_encode($data);
    echo $data;

  }

}
