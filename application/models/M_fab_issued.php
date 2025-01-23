<?php

/**
*
*/
class M_fab_issued extends CI_Model
{

  function view_fab_issued($zroh) {
    // code...
    // return $this->db->get('prominent.v_fabric_issued')->result_array();

    // $string = "select * from prominent.v_fabric_issued where zroh = '".$zroh. "' order by zroh, original_ex_date, received_date_sort,po_buyer,date_ship, id_detail";
    $stringx = "select * from prominent.generate_pemakaian('" . $zroh . "',0)";
    $queryx  = $this->db->query($stringx);

    $string = "select * from prominent.v_fabric_issued where zroh = '" . $zroh . "' order by zroh, original_ex_date,received_date_sort , po_buyer,urutan_item,date_ship, id_detail ; ";
    $query = $this->db->query($string);
    return $query->result_array();
  }

  function get_fab_issued_by_id($myid,$lastIndex)
  {
    // code...
    $string = "select * from prominent.v_fabric_issued where id_detail = ".$myid." ";
    $query = $this->db->query($string);

    // $hsl=$this->db->query("SELECT * FROM tbl_barang WHERE barang_kode='$kobar'");
    if($query->num_rows()>0){
        foreach ($query->result() as $data) {
            $hasil=array(
                'id_detail' => $myid,
                'received_marker_consp' => $data->received_marker_consp,
                'remark_avg_size' => $data->remark_avg_size,
                'fab_width' => $data->fab_width,
                'fab_consp_act' => $data->fab_consp_act,
                'yields' => number_format($data->yields, 2, '.', ''),
                'actual_fab_width' => $data->actual_fab_width,
                'avg_size' => $data->avg_size,
                'exfty_actual' => $data->exfty_actual,
                'shipment_actual' => $data->shipment_actual,
                'remark1' => $data->remark1,
                'remark2' => $data->remark2,
                'po_buyer' => $data->po_buyer,
                'description' => $data->description,
                'style' => $data->style,
                'original_ex_date' => $data->original_ex_date,
                'qty_cut' => $data->qty_cut,
                'zroh' => $data->zroh,
                'last_index' => $lastIndex,
                'date_marker_ctc_approval' => $data->date_marker_ctc_approval,
                'avg_size_new' => $data->avg_size_new,
                'fab_width_new' => $data->fab_width_new
                );
        }
    }
    return $hasil;
  }

  function update_fab_issued($received_mrk_cons,$create_avg,$fab_width,$or_cons_ctc,$or_cons_sales,$fab_width_costing,$avg_size_costing,$exfty_actual,$ship_actual,$remark1,$remark2,$id)
  {
    // code...
    $string = "select * from prominent.update_balanced_fabric(". $id .",
                      ". (!empty($received_mrk_cons) ? "'$received_mrk_cons'" : "NULL") .",
                      ". (!empty($create_avg) ? "'$create_avg'" : "NULL") .",
                      ". (!empty($fab_width) ? "'$fab_width'" : "NULL") .",
                      ". (!empty($fab_width_costing) ? "'$fab_width_costing'" : "NULL") .",
                      ". (!empty($avg_size_costing) ? "'$avg_size_costing'" : "NULL") .",
                      ". (!empty($exfty_actual) ? "'$exfty_actual'" : "NULL") .",
                      ". (!empty($ship_actual) ? "'$ship_actual'" : "NULL") .",
                      ". (!empty($remark1) ? "'$remark1'" : "NULL") .",
                      ". (!empty($remark2) ? "'$remark2'" : "NULL") .",
                      ". (!empty($or_cons_sales) ? "$or_cons_sales" : "NULL") ." )";

    $query = $this->db->query($string)->result();

    return $query;
  }

  function get_fab_additional_detail($myzroh)
  {
    $string = "select * from prominent.t_additional where zroh = '".$myzroh."' order by id ";
    $query=$this->db->query($string);
    return $query->result();
  }

  function delete_fab_issued_adds($myid)
  {
      $string = "delete from prominent.t_additional where id = ".$myid."  ";
      $query=$this->db->query($string);
      return "Data Berhasil Di Hapus";
  }

  function simpan_additional($zroh,$detail)
  {
    // code...
    $ttl = 0;
    $array = json_decode( $detail, true );
    //
    foreach($array as $item) {
           $last_id_adds = str_replace("x ","",$item['#']); //replace dlu pertama
           $last_id_adds = str_replace("x","",$item['#']);  //replace kedua bisi ke edit htmlnya (optional)
    //
           if ($item['QTY'] > 0){
             $qty = $item['QTY'] * -1;
           }else{
             $qty = $item['QTY'];
           }

           if ($last_id_adds == "0") {
             $query = $this->db->query("insert into prominent.t_additional(additional,qty,zroh)
                                      values(". (!empty($item['REMARK (ADDITIONAL)']) ? "'".$item['REMARK (ADDITIONAL)']."'" : "NULL") .",
                                      ". (!empty($qty) ? "".$qty."" : "NULL") ." , '".$zroh."'  )");
             $ttl ++;
           }
           else{

             $query = $this->db->query("update prominent.t_additional set additional = ". (!empty($item['REMARK (ADDITIONAL)']) ? "'".$item['REMARK (ADDITIONAL)']."'" : "NULL") ." ,
                                        qty =  ". (!empty($qty) ? "".$qty."" : "NULL") ."
                                        where id = ".$last_id_adds." " );
             $ttl ++;
           }
         }



    if (count($array) ==  $ttl) {
      $hasil = "Data Berhasil Disimpan";
    } else {
      $hasil = "Data Gagal Disimpan, Periksa Lagi Semua Pengeluran Lain-Lian Di Zroh Tersebut";
    }
    return $hasil;
  }

}


?>
