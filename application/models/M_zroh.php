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

  function view_zroh(){
    $string = "select * from prominent.t_zroh order by zroh ";
    $query = $this->db->query($string);
    return $query->result_array();
  }

  function generate_report($myzroh){

    $array = json_decode( $myzroh, true );
    $ttl = count($array);
    $no_urut = 0;

    foreach($array as $z){
      $string = "select * from prominent.generate_report('".$z."',".$no_urut.") ;
                 select * from prominent.generate_pemakaian('".$z."',".$no_urut.") ;
      ";
      $query = $this->db->query($string);
      if ($query->num_rows() > 0) {
          $no_urut = $no_urut + 1;
      }
    }

    //double check takut ada yg ga ke proses
    $string = "select count(id) as ttl from prominent.t_zroh where prn = 'Y' ";
    $query = $this->db->query($string);
    $row = $query->row();
    $ttl_processed = $row->ttl;

    if ($ttl_processed == $ttl){
      $pesan = "ok";
    }else{
      $pesan = "no";
    }


    return $pesan;
  }
}


?>
