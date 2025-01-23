<?php

/**
*
*/
class M_fab_received extends CI_Model
{

  function view_data($zroh) {
    // code...
    // return $this->db->get('prominent.v_balanced_fab')->result_array();

    $string = "select * from prominent.v_balanced_fab where zroh = '".$zroh."' order by id_detail ";
    $query = $this->db->query($string);
    return $query->result_array();
  }

  // function get_fab_issued_by_id($myid,$lastIndex)
  // {
  //   // code...
  //   $string = "select * from prominent.v_balanced_fab where id_detail = ".$myid." ";
  //   $query = $this->db->query($string);
  //
  //   // $hsl=$this->db->query("SELECT * FROM tbl_barang WHERE barang_kode='$kobar'");
  //   if($query->num_rows()>0){
  //       foreach ($query->result() as $data) {
  //           $hasil=array(
  //               'id_detail' => $myid,
  //               'received_marker_consp' => $data->received_marker_consp,
  //               'remark_avg_size' => $data->remark_avg_size,
  //               'fab_width' => $data->fab_width,
  //               'fab_consp_act' => $data->fab_consp_act,
  //               'yields' => number_format($data->yields, 2, '.', ''),
  //               'actual_fab_width' => $data->actual_fab_width,
  //               'avg_size' => $data->avg_size,
  //               'exfty_actual' => $data->exfty_actual,
  //               'shipment_actual' => $data->shipment_actual,
  //               'remark1' => $data->remark1,
  //               'remark2' => $data->remark2,
  //               'po_buyer' => $data->po_buyer,
  //               'description' => $data->description,
  //               'style' => $data->style,
  //               'original_ex_date' => $data->original_ex_date,
  //               'qty_cut' => $data->qty_cut,
  //               'zroh' => $data->zroh,
  //               'last_index' => $lastIndex
  //               );
  //       }
  //   }
  //   return $hasil;
  // }

  function input_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail)
  {
    // code...
    $string = "select * from prominent.add_inv (". (!empty($vendor) ? "'$vendor'" : "NULL") .",
                      ". (!empty($inv_no) ? "'$inv_no'" : "NULL") .",
                      ". (!empty($inv_po) ? "'$inv_po'" : "NULL") .",
                      ". (!empty($etd) ? "'$etd'" : "NULL") .",
                      ". (!empty($eta) ? "'$eta'" : "NULL") .",
                      ". (!empty($pr) ? "'$pr'" : "NULL") .",
                      ". (!empty($received) ? "'$received'" : "NULL") ." )";

    $query = $this->db->query($string);
    $ttl = 0;
    $array = json_decode( $detail, true );

    // GET RESULT MULTIPLE ROW
    // foreach ($query->result_array() as $row)
    // {
    //    $tes = $row['id_inv'];
    //    $query = $this->db->query("insert into prominent.t_invoice_detail(id_inv,zroh) values(19,'".$tes."')");
    // }

    // GET RESULT SINGLE ROW / FROM FUNCTION DATABASE AND TRY TO INSERT DETAIL
    if ($query->num_rows() > 0)
      {
         $row = $query->row();
         $id_inv = $row->id_inv;

         foreach($array as $item) {
           $query = $this->db->query("insert into prominent.t_invoice_detail(id_inv,zroh,fab_content_inv,micro_count,fab_price,fab_qty_inv,fab_qty_received,auto_test_val)
                                    values(".$id_inv.",
                                    ". (!empty($item['ZROH']) ? "'".$item['ZROH']."'" : "NULL") .",
                                    ". (!empty($item['CONTENT_(INV)']) ? "'".$item['CONTENT_(INV)']."'" : "NULL") .",
                                    ". (!empty($item['MICRON']) ? "'".$item['MICRON']."'" : "NULL") .",
                                    ". (!empty($item['PRICE']) ? "".$item['PRICE']."" : "NULL") .",
                                    ". (!empty($item['QTY_(INV)']) ? "".$item['QTY_(INV)']."" : "NULL") .",
                                    ". (!empty($item['QTY_(RCV)']) ? "".$item['QTY_(RCV)']."" : "NULL") .",
                                    ". (!empty($item['QTY_(TES)']) ? "".$item['QTY_(TES)']."" : "NULL") .") ");
           $ttl ++;
         }

      }

    if (count($array) ==  $ttl) {
      $hasil = "ok";
    } else {
      $hasil = "failed";
    }
    return $hasil;
  }

}


?>
