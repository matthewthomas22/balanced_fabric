<?php

/**
*
*/
class M_fab_issued extends CI_Model
{

  function view_data($zroh) {
    // code...
    // return $this->db->get('prominent.v_fabric_issued')->result_array();

    $string = "select * from prominent.v_fabric_issued where zroh = '".$zroh."' order by id_detail ";
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
                'last_index' => $lastIndex
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

}


?>
