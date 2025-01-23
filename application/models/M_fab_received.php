<?php

/**
*
*/
class M_fab_received extends CI_Model{

  public function update_fab_received_date($data){
    $this->db->trans_start();
      foreach ($data as $key) {
          $this->db->query($key);
      }
    $this->db->trans_complete();

    
    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return "Transaction rolled back!";
    } else {
        $this->db->trans_commit();
        return "Transaction committed!";
    }
  }

  function view_fab_received() {
        $string = "select * from prominent.v_fabric_received order by zroh,id ";
        $query=$this->db->query($string);
        return $query->result();
  }

  function view_final_received($zroh) {
        // $string = "select * from
        //           (SELECT b.id,b.zroh, a.fab_inv_no as note, a.fab_received as tgl,b.fab_qty_received as qty
        //              FROM prominent.t_invoice a
        //              JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
        //              where a.fab_received is not null and b.zroh = '".$zroh."'
        //           union all
        //           SELECT b.id,b.zroh, 'Test Shrinkage' as note ,a.fab_received as tgl,b.auto_test_val as qty
        //              FROM prominent.t_invoice a
        //              JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
        //              where a.fab_received is not null and b.zroh = '".$zroh."'
        //           order by zroh,id asc ,qty desc)
        //           union all
        //           select id,zroh,additional as note,to_char(input_date,'yyyy-MM-dd')::date as tgl,qty
        //           from prominent.t_additional
        //           where zroh = '".$zroh."'
        //           order by tgl ";

                // $string = "
                // select * from
                //   (SELECT b.id,b.zroh, a.fab_inv_no as note, a.fab_received as tgl,coalesce(b.fab_qty_received,0) as qty,a.fab_received||b.id||'1' as urutan
                //      FROM prominent.t_invoice a
                //      JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
                //      where a.fab_received is not null and b.zroh = '".$zroh."'
                //   union all
                //   SELECT b.id,b.zroh, 'Test Shrinkage' as note ,a.fab_received as tgl,coalesce(b.auto_test_val,0) as qty,a.fab_received||b.id||'2' as urutan
                //      FROM prominent.t_invoice a
                //      JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
                //      where a.fab_received is not null and b.zroh = '".$zroh."'
                //   order by zroh,id asc ,qty desc)
                //   union all
                //   select id,zroh,additional as note,to_char(input_date,'yyyy-MM-dd')::date as tgl,coalesce(qty,0) as qty,to_char(input_date,'yyyy-MM-dd')||id||'0' as urutan
                //   from prominent.t_additional
                //   where zroh = '".$zroh."'
                // order by urutan ";      
                
                
                
                $string = "
                   select zroh,note,tgl,sum(qty) as qty
                   from 
		              (select * from
                  (SELECT b.id,b.zroh, a.fab_inv_no as note, a.fab_received as tgl,coalesce(b.fab_qty_received,0) as qty,a.fab_received||b.id||'1' as urutan
                     FROM prominent.t_invoice a
                     JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
                     where a.fab_received is not null and coalesce(b.fab_qty_received,0) > 0  and b.zroh = '".$zroh."'
                  union all
                  SELECT b.id,b.zroh, 'Test Shrinkage' as note ,a.fab_received as tgl,coalesce(b.auto_test_val,0) as qty,a.fab_received||b.id||'2' as urutan
                     FROM prominent.t_invoice a
                     JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
                     where a.fab_received is not null and coalesce(b.auto_test_val,0) < 0 and b.zroh = '".$zroh."'
                  order by zroh,id asc ,qty desc)
                  union all
                  select id,zroh,additional as note,to_char(input_date,'yyyy-MM-dd')::date as tgl,coalesce(qty,0) as qty,to_char(input_date,'yyyy-MM-dd')||id||'0' as urutan
                  from prominent.t_additional
                  where zroh = '".$zroh."'
                  order by urutan) 
                  group by zroh,note,tgl
                  order by tgl "; 



        $query=$this->db->query($string);
        return $query->result();
  }

  function sum_plan_received($zroh) {
        $string = "select total_plan_rcvd from prominent.v_check_final_received where zroh = '".$zroh."' ";
        $query=$this->db->query($string);
        if ($query->num_rows() > 0){
          $row = $query->row();
          $qty = $row->total_plan_rcvd;
        }else{
          $qty = 0 ;
        }
        return $qty;
  }



  function sum_final_received($zroh) {
        $string = "select sum(qty) as qty from (select * from
                  (SELECT b.id,b.zroh, a.fab_inv_no as note, a.fab_received as tgl,coalesce(b.fab_qty_received,0) as qty,a.fab_received||b.id||'1' as urutan
                     FROM prominent.t_invoice a
                     JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
                     where a.fab_received is not null and b.zroh = '".$zroh."'
                  union all
                  SELECT b.id,b.zroh, 'Test Shrinkage' as note ,a.fab_received as tgl,coalesce(b.auto_test_val,0) as qty,a.fab_received||b.id||'2' as urutan
                     FROM prominent.t_invoice a
                     JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
                     where a.fab_received is not null and b.zroh = '".$zroh."'
                  order by zroh,id asc ,qty desc)
                  union all
                  select id,zroh,additional as note,to_char(input_date,'yyyy-MM-dd')::date as tgl,coalesce(qty,0) as qty,to_char(input_date,'yyyy-MM-dd')||id||'0' as urutan
                  from prominent.t_additional
                  where zroh = '".$zroh."'
                  order by urutan )";
        $query=$this->db->query($string);
        if ($query->num_rows() > 0){
          $row = $query->row();
          $qty = $row->qty;
        }else{
          $qty = 0 ;
        }
        return $qty;
  }


//   function input_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail)
  function input_fab_received($vendor,$inv_no,$etd,$eta,$pr,$received,$detail)
  {
    // code...
    $string = "select * from prominent.add_inv (
                      ". (!empty($vendor) ? "'$vendor'" : "NULL") .",
                      ". (!empty($inv_no) ? "'$inv_no'" : "NULL") .",
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
           if ($item['QTY_(TES)'] > 0){
             $qty = $item['QTY_(TES)'] * -1;
           }else{
             $qty = $item['QTY_(TES)'];
           }

           $query = $this->db->query("insert into prominent.t_invoice_detail(
                                            id_inv,
                                            zroh,
                                            fab_content_inv,
                                            micro_count,
                                            fab_inv_po,
                                            remark_test,
                                            fab_price,
                                            fab_qty_inv,
                                            fab_qty_received,
                                            auto_test_val)
                                        
                                    values(
                                    ".$id_inv.",
                                    ". (!empty($item['ZROH_ENTER']) ? "'".$item['ZROH_ENTER']."'" : "NULL") .",
                                    ". (!empty($item['CONTENT_(INV)']) ? "'".$item['CONTENT_(INV)']."'" : "NULL") .",
                                    ". (!empty($item['MICRON']) ? "'".$item['MICRON']."'" : "NULL") .",
                                    ". (!empty($item['NO_PO_(INV)']) ? "'".$item['NO_PO_(INV)']."'" : "NULL") .",
                                    ". (!empty($item['REMARK_(TES)']) ? "'".$item['REMARK_(TES)']."'" : "NULL") .",
                                    ". (!empty($item['PRICE']) ? "".$item['PRICE']."" : "NULL") .",
                                    ". (!empty($item['QTY_(INV)']) ? "".$item['QTY_(INV)']."" : "NULL") .",
                                    ". (!empty($item['QTY_(RCV)']) ? "".$item['QTY_(RCV)']."" : "NULL") .",
                                    ". (!empty($qty) ? "".$qty."" : "NULL") .") ");
           $ttl ++;
         }

      }

    if (count($array) ==  $ttl) {
      $hasil = "Data Berhasil Disimpan";
    } else {
      $string = "delete from prominent.t_invoice where id = ".$id_inv." ";
      $query=$this->db->query($string);
      $hasil = "Data Gagal Disimpan, Input Lagi Invoice Tersebut";
    }
    return $hasil;
  }


//   function edit_fab_received($vendor,$inv_no,$inv_po,$etd,$eta,$pr,$received,$detail,$last_id)
  function edit_fab_received($vendor,$inv_no,$etd,$eta,$pr,$received,$detail,$last_id)
  {
    // code...
    $string = "select * from prominent.update_inv (
                      ". (!empty($vendor) ? "'$vendor'" : "NULL") .",
                      ". (!empty($inv_no) ? "'$inv_no'" : "NULL") .",
                      ". (!empty($etd) ? "'$etd'" : "NULL") .",
                      ". (!empty($eta) ? "'$eta'" : "NULL") .",
                      ". (!empty($pr) ? "'$pr'" : "NULL") .",
                      ". (!empty($received) ? "'$received'" : "NULL") .",
                      ". $last_id ." )";

    $query = $this->db->query($string);
    $ttl = 0;
    $array = json_decode( $detail, true );



    foreach($array as $item) {
           $last_id_detail = str_replace("x ","",$item['#']); //replace dlu pertama
           $last_id_detail = str_replace("x","",$item['#']);  //replace kedua bisi ke edit htmlnya (optional)

           if ($item['QTY_(TES)'] > 0){
             $qty = $item['QTY_(TES)'] * -1;
           }else{
             $qty = $item['QTY_(TES)'];
           }

           if ($last_id_detail == "0") {
             $query = $this->db->query("insert into prominent.t_invoice_detail(id_inv,zroh,fab_content_inv,micro_count,fab_inv_po,remark_test,fab_price,fab_qty_inv,fab_qty_received,auto_test_val)
                                      values(".$last_id.",
                                      ". (!empty($item['ZROH_ENTER']) ? "'".$item['ZROH_ENTER']."'" : "NULL") .",
                                      ". (!empty($item['CONTENT_(INV)']) ? "'".$item['CONTENT_(INV)']."'" : "NULL") .",
                                      ". (!empty($item['MICRON']) ? "'".$item['MICRON']."'" : "NULL") .",
                                      ". (!empty($item['NO_PO_(INV)']) ? "'".$item['NO_PO_(INV)']."'" : "NULL") .",
                                      ". (!empty($item['REMARK_(TES)']) ? "'".$item['REMARK_(TES)']."'" : "NULL") .",
                                      ". (!empty($item['PRICE']) ? "".$item['PRICE']."" : "NULL") .",
                                      ". (!empty($item['QTY_(INV)']) ? "".$item['QTY_(INV)']."" : "NULL") .",
                                      ". (!empty($item['QTY_(RCV)']) ? "".$item['QTY_(RCV)']."" : "NULL") .",
                                      ". (!empty($qty) ? "".$qty."" : "NULL") .") ");
             $ttl ++;
           }
           else{
             $query = $this->db->query("update prominent.t_invoice_detail set zroh = ". (!empty($item['ZROH_ENTER']) ? "'".$item['ZROH_ENTER']."'" : "NULL") ."
                                        ,
                                        fab_content_inv = ". (!empty($item['CONTENT_(INV)']) ? "'".$item['CONTENT_(INV)']."'" : "NULL") ." ,
                                        micro_count = ". (!empty($item['MICRON']) ? "'".$item['MICRON']."'" : "NULL") .",
                                        fab_inv_po = ". (!empty($item['NO_PO_(INV)']) ? "'".$item['NO_PO_(INV)']."'" : "NULL") .",
                                        remark_test = ". (!empty($item['REMARK_(TES)']) ? "'".$item['REMARK_(TES)']."'" : "NULL") .",
                                        fab_price = ". (!empty($item['PRICE']) ? "".$item['PRICE']."" : "NULL") .",
                                        fab_qty_inv = ". (!empty($item['QTY_(INV)']) ? "".$item['QTY_(INV)']."" : "NULL") .",
                                        fab_qty_received = ". (!empty($item['QTY_(RCV)']) ? "".$item['QTY_(RCV)']."" : "NULL") .",
                                        auto_test_val =  ". (!empty($qty) ? "".$qty."" : "NULL") ."
                                        where id = ".$last_id_detail." " );
             $ttl ++;
           }
      }



    if (count($array) ==  $ttl) {
      $hasil = "Data Berhasil Disimpan";
    } else {
      $string = "delete from prominent.t_invoice where id = ".$last_id." ";
      $query=$this->db->query($string);
      $hasil = "Data Gagal Disimpan, Input Lagi Invoice Tersebut";
    }
    // $hasil = "tes123";
    return $hasil;
  }

  function get_fab_received_header($myid)
  {
    $string = "select * from prominent.t_invoice where id = ".$myid."  ";
    $query=$this->db->query($string);
    return $query->result();
  }


  function find_fab_received_header($myinv)
  {
    $string = "select * from prominent.t_invoice where fab_inv_no = '".$myinv."' order by id desc ";
    $query=$this->db->query($string);
    return $query->result();
  }



  function check_zroh($zroh)
  {
    // $string = "select * from prominent.t_zroh where zroh = '".$zroh."'  limit 1";
    // $string = "select a.*,b.micro
    //           from
    //           (select * from prominent.t_zroh where zroh = '" . $zroh . "'  limit 1) a
    //           left join
    //           (select zroh , string_agg(micro_count, ';')as micro  from prominent.t_invoice_detail where zroh = '" . $zroh . "' group by zroh) b on a.zroh = b.zroh";
    $string = "select a.*,b.micro
              from
              (select * from prominent.t_zroh where zroh = '".$zroh."'  limit 1) a
              left join
	          (select zroh , micro_count as micro  from prominent.t_invoice_detail where zroh = '".$zroh."' order by id desc limit 1) b on a.zroh = b.zroh";


              
          
    $query = $this->db->query($string);
    return $query->result();

    // return "test";

  }

  function cek_all_zroh($list_zroh)
  {
    $string = "select * from prominent.t_zroh where zroh in (".$list_zroh.")";
    $query = $this->db->query($string);
    $count = $query->num_rows();
    return $count;
 
    // return "test";

  }


  function get_fab_received_detail($myid)
  {
    $string = "select a.id,a.id_inv,a.zroh,a.fab_content_inv,a.micro_count,a.fab_price,a.fab_qty_inv,a.fab_qty_received,a.remark,a.auto_test_val,
    case when a.fab_inv_po is null or a.fab_inv_po = '' then b.fab_inv_po else a.fab_inv_po end as fab_inv_po ,a.remark_test 
    from prominent.t_invoice_detail a
    join prominent.t_invoice b on a.id_inv = b.id
    where a.id_inv = ".$myid." order by id";
    $query=$this->db->query($string);
    return $query->result();
  }

  function get_list_inv()
  {
    $string = "select id,fab_inv_no from prominent.t_invoice order by id desc ";
    $query=$this->db->query($string);
    return $query->result();
  }


  function check_fab_infty()
  {
  $string = "select a.id,b.id as id_detail
              from prominent.t_invoice a
              join (select id_inv,min(id) as id from prominent.t_invoice_detail group by id_inv) b on a.id = b.id_inv
              where eta <= now and fab_received is null
              order by a.id ";
  $query=$this->db->query($string);
  return $query->result();
  }

  function delete_fab_received_item($myid)
  {
      $string = "delete from prominent.t_invoice_detail where id = ".$myid."  ";
      $query=$this->db->query($string);
      return "Data Berhasil Di Hapus";
  }

  function delete_fab_received_all($myid)
  {
      $string = "delete from prominent.t_invoice where id = ".$myid."  ";
      $query=$this->db->query($string);
      return "Semua Data Invoice Ini Berhasil Di Hapus";
  }

}


?>
