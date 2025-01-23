<?php

/**
*
*/
class M_zroh extends CI_Model
{

  // public function get_data()
  // {
  // code...
  // return $this->db->get('prominent.t_zroh')->result_array();

  // $string = "select msubgroupid, msubgroupname from materialsubgroup order by msubgroupid";
  // $query = $this->db->query($string);
  // return $query->result();
  // atau
  // return $query->result_array();
  // }

  function zroh_list(){
    $hasil=$this->db->get('zroh');
    return $hasil->result();
  }

  function save_zroh(){
    $data = array(
      'zroh_code'  => $this->input->post('zroh_code'),
      'zroh_name'  => $this->input->post('zroh_name'),
      'zroh_price' => $this->input->post('price'),
    );
    $result=$this->db->insert('zroh',$data);
    return $result;
  }

  function update_zroh(){
    $zroh_code=$this->input->post('zroh_code');
    $zroh_name=$this->input->post('zroh_name');
    $zroh_price=$this->input->post('price');

    $this->db->set('zroh_name', $zroh_name);
    $this->db->set('zroh_price', $zroh_price);
    $this->db->where('zroh_code', $zroh_code);
    $result=$this->db->update('zroh');
    return $result;
  }

  function delete_zroh(){
    $zroh_code=$this->input->post('zroh_code');
    $this->db->where('zroh_code', $zroh_code);
    $result=$this->db->delete('zroh');
    return $result;
  }
}


?>
