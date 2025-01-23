<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prominent (Module)</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/fontawesome-free/css/all.min.css ">
   <!-- favicon -->
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/icons/favicon.ico"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/jqvmap/jqvmap.min.css ">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/dist/css/adminlte.min.css ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/overlayScrollbars/css/OverlayScrollbars.min.css ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/daterangepicker/daterangepicker.css ">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/templete_lte302/plugins/summernote/summernote-bs4.css ">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Plugin CSS DataTables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/fixedHeader.dataTables.css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/css/buttons.dataTables.min.css">


  <style media="screen">
  .dt-buttons{
    display: none !important;
  }

  #mydata_filter{
    display: none !important;
  }

  tr, th {
    text-align: center;
  }

  #mydata tr:hover td {
    background-color: #D5D5D5;
    cursor: pointer;
    text-decoration: underline;
  }

  .inputMod {
    height: 38px!important;
  }

  .column_search2{
    width: 400px;
  }

  .invisible{
    display: none;
  }

  .visible{
    display: block;
  }

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">



<div class="wrapper">
  <?php $this->load->view('header');?> <!--Include header-->

  <?php $this->load->view('menu');?> <!--Include menu-->


  <!-- Modal Pencarian -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="exampleModalLongTitle">Input Kode Zroh</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="<?php echo base_url() ?>index.php/fab_issued/view_fab_issued" method="get">
        <div class="modal-body">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="tzroh">#ZROH</label>
            </div>
              <input type="text" name="zroh" value="" id="tzroh" style="width:80%;">
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClsPreview">Close</button> -->
          <button type="submit" class="btn btn-primary" id="btnPreview" >Preview</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Update -->
  <div class="modal fade" id="Mod_updateData" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header bg-primary">
          <h5 class="modal-title  text-white" >UPDATE FABRIC ISSUED</h5>
          <button type="button" class="close" data-dismiss="modal" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <p id="label_identity">107038 -> 4900107757 -> PANT -> JORDP -> 2020-05-01 -> 100</p>
          <input type="text" name="" value="" id="t_zroh" hidden>
          <input type="text" name="" value="" id="t_id" hidden>
          <input type="text" name="" value="" id="t_lastIndex" hidden>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_received_mrk_cons">RECEIVED MARKER CONSP</label>
              </div>
              <input type="date" class="form-control form-control-sm inputMod" id="t_received_mrk_cons" placeholder="" autofocus>
            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_create_avg" style="width: 350px;" >CREATED AVG SIZE</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_create_avg" placeholder="">
              </div>

            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_fab_width" style="width: 350px;">FAB WIDTH</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_fab_width" placeholder="">
              </div>

            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_or_cons_ctc" style="width: 350px;">ORIGINAL CONS CTC</label>
              <input type="number" class="form-control form-control-sm inputMod" style="width: 130px;" id="t_or_cons_ctc" placeholder="" readonly>
              <input type="number" class="form-control form-control-sm inputMod" style="width: 130px;" id="t_or_cons_sales" placeholder="" >
              </div>


            </div>


            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_fab_width_costing" style="width: 350px;" >FAB WIDTH (COSTING)</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_fab_width_costing" placeholder="">
              </div>

            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_avg_size_costing" style="width: 350px;" >AVG SIZE (COSTING)</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_avg_size_costing" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_exfty_actual" style="width: 350px;" >EXFTY (ACTUAL)</label>
              <input type="date" class="form-control form-control-sm inputMod" id="t_exfty_actual" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_ship_actual" style="width: 350px;" >SHIPMENT (ACTUAL)</label>
              <input type="date" class="form-control form-control-sm inputMod" id="t_ship_actual" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_remark1" style="width: 350px;" >REMARK_1</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_remark1" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_remark2" style="width: 350px;" >REMARK_2</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_remark2" placeholder="">
              </div>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary " id="btnSimpan">SIMPAN</button>
        </div>
        <!-- <input type="hidden" name="" value="" id="tId1"> -->
      </div>
    </div>
  </div>

  <!-- KONTEN UNTUK FORM ISSUED FAB -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <table id="mydata" class="nowrap" style="width: 5500px;" >
        <thead>
          <tr>
            <th >ZROH</th>
            <th >ORIGINAL EX DATE</th>
            <th >PO RECEIVED DATE</th>
            <th >PO BUYER</th>
            <th >SEASON</th>
            <th >DESCRIPTION</th>
            <th >CATEGORY</th>
            <th >STYLE</th>
            <th >CONTENT</th>
            <th >COLOUR</th>
            <th >CONSUMPTION</th>
            <th >CONSUMPTION STATUS</th>
            <th >QTY (ORI)</th>
            <th >QTY (CUT)</th>
            <th >SHIP DATE (PLAN)</th>
            <th >QTY ISSUED</th>
            <th >RECEIVED MARKER CONSP</th>
            <th >CREATED AVG SIZE</th>
            <th >FAB WIDTH</th>
            <!-- <th >ORIGINAL CONS CTC</th> -->
            <th >FAB WIDTH (COSTING)</th>
            <th >AVG SIZE (COSTING)</th>
            <th >EXFTY (ACTUAL)</th>
            <th >SHIPMENT (ACTUAL)</th>
            <th >REMARK_1</th>
            <th >REMARK_2</th>
          </tr>
          <tr>
            <th >ZROH</th>
            <th >ORIGINAL EX DATE</th>
            <th >PO RECEIVED DATE</th>
            <th >PO BUYER</th>
            <th >SEASON</th>
            <th >DESCRIPTION</th>
            <th >CATEGORY</th>
            <th >STYLE</th>
            <th >CONTENT</th>
            <th >COLOUR</th>
            <th >CONSUMPTION</th>
            <th >CONSUMPTION STATUS</th>
            <th >QTY (ORI)</th>
            <th >QTY (CUT)</th>
            <th >SHIP DATE (PLAN)</th>
            <th >QTY ISSUED</th>
            <th >RECEIVED MARKER CONSP</th>
            <th >CREATED AVG SIZE</th>
            <th >FAB WIDTH</th>
            <!-- <th >ORIGINAL CONS CTC</th> -->
            <th >FAB WIDTH (COSTING)</th>
            <th >AVG SIZE (COSTING)</th>
            <th >EXFTY (ACTUAL)</th>
            <th >SHIPMENT (ACTUAL)</th>
            <th >REMARK_1</th>
            <th >REMARK_2</th>
          </tr>
        </thead>

        <tfoot>

        </tfoot>

        <tbody>

          <?php if($this->session->userdata('ses_filter')==TRUE):?>
            <?php if(count($fab) > 0) : ?>
              <?php foreach ($fab as $r) : ?>
                <tr >
                  <td> <input  type="text" id="myid" value="<?php echo $r['id_detail']; ?>" hidden> <?php echo $r['zroh']; ?></td>
                  <td> <?php echo $r['original_ex_date']; ?></td>
                  <td> <?php echo $r['received_date']; ?></td>
                  <td> <?php echo $r['po_buyer']; ?></td>
                  <td> <?php echo $r['season']; ?></td>
                  <td> <?php echo $r['description']; ?></td>
                  <td> <?php echo $r['fab_category']; ?></td>
                  <td> <?php echo $r['style']; ?></td>
                  <td> <?php echo $r['fab_content']; ?></td>
                  <td> <?php echo $r['fab_color']; ?></td>
                  <td> <?php echo $r['consumption']; ?></td>
                  <td> <?php echo $r['status_cons']; ?></td>
                  <td> <?php echo $r['qty_po_ori']; ?></td>
                  <td> <?php echo $r['qty_cut']; ?></td>
                  <td> <?php echo $r['date_ship']; ?></td>
                  <td> <?php echo $r['qty_issued']; ?></td>
                  <td> <?php echo $r['received_marker_consp']; ?></td>
                  <td> <?php echo $r['remark_avg_size']; ?></td>
                  <td> <?php echo $r['fab_width']; ?></td>
                  <!-- <td> <?php echo $r['fab_consp_act']; ?></td> -->
                  <td> <?php echo $r['actual_fab_width']; ?></td>
                  <td> <?php echo $r['avg_size']; ?></td>
                  <td> <?php echo $r['exfty_actual']; ?></td>
                  <td> <?php echo $r['shipment_actual']; ?></td>
                  <td> <?php echo $r['remark1']; ?></td>
                  <td> <?php echo $r['remark2']; ?></td>
                </tr>
              <?php endforeach ; ?>
            <?php else : ?>
                <tr>
                  <td> Zroh Not Found </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <!-- <td></td> -->
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            <?php endif;?>
          <?php endif;?>


        </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('footer');?> <!--Include menu-->


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/templete_lte302/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/bootstrap/js/bootstrap.bundle.min.js "></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/chart.js/Chart.min.js "></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/sparklines/sparkline.js "></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/jqvmap/jquery.vmap.min.js "></script>
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/jqvmap/maps/jquery.vmap.usa.js "></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/jquery-knob/jquery.knob.min.js "></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/moment/moment.min.js "></script>
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/daterangepicker/daterangepicker.js "></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js "></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/summernote/summernote-bs4.min.js "></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js "></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/templete_lte302/dist/js/adminlte.js "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/templete_lte302/dist/js/pages/dashboard.js "></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/templete_lte302/plugins/dist/js/demo.js "></script>

<!-- Plugin JS DataTables -->
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/dataTables.fixedHeader.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/jszip.min.js"></script>

<script>

document.onkeydown = function(evt) {
      evt = evt || window.event;
      var isEscape = false;
      if ("key" in evt) {
          isEscape = (evt.key === "f2" || evt.key === "F2");
      } else {
          isEscape = (evt.keyCode === 113);
      }
      if (isEscape) {
               $('#exampleModalCenter').modal('show');
      }
};

$(document).ready(function() {

  if($('#mydata tbody').find('tr').length == 0) {
      $('#exampleModalCenter').modal('show');
  }

  $('#exampleModalCenter').on('shown.bs.modal', function() {
      $('#tzroh').focus();
 })

 $('#Mod_updateData').on('shown.bs.modal', function() {
     $('#t_create_avg').focus();
})

 // ------------------------------------------------ FILTER PER KOLOM
 // Setup - add a text input to each footer cell
 $('#mydata thead tr:eq(1) th').each( function () {
   var title = $(this).text();
   // $(this).html( '<input type="text" placeholder="Filter '+title+'" class="column_search" />' );
   if(title == "REMARK_1" || title == "REMARK_2"  ){
        $(this).html( '<input type="text" placeholder="Press Enter" class="column_search2" />' );
   }else{
        $(this).html( '<input type="text" placeholder="Press Enter" class="column_search" />' );
   }

 } );

 // DataTable
 var table = $('#mydata').DataTable({
   dom: 'Blfrtip',
   orderCellsTop: true,
   fixedHeader: true,
   paging: false,
   // stateSave: true,
   buttons: [{extend:'excel',
              autoFilter: true,
              title: 'Data Prod Plan',
              text: 'Download',
              attr:  {
                "id"  : 'cDownload'
              }
            }],
   order: [], //pas awal di install tidak akan ng order
   "columnDefs": [
       { "width": "100px", "targets": [0,1,2,3,4,5,6,7,9,10,11,12,13,14,15,16,17,18,19,20,21,22] }
       ,{ "width": "200px", "targets": 8 }
       // ,{ "width": "100px", "targets": [0,1,2,3] } boleh jg diset beda2
     ],
     fixedColumns: true
 // ------ini untuk freeze-----
   // scrollY:        true,
   //     scrollX:        true,
   //     scrollCollapse: true,
   // fixedColumns:   {
   //         leftColumns: 2
   //     }

 });

//set_focus
 var last ="<?php echo $this->session->userdata('ses_last_id') ?>";
 if (last != "") {
   for (var i = 0; i < $('#mydata tbody').find('tr').length; i++) {
     if ( $('#mydata tbody tr:eq('+i+')').find('input:first').val() == last) {
       var $row = $(table.row(Number(i)).node());
       $('html, body').animate({ scrollTop: $row.offset().top - 300 }, 500);
       $row.addClass('selected');
     }
   }

 }


 // Apply the search
 $( '#mydata thead'  ).on( 'keyup', ".column_search",function (e) {

   if(e.key === 'Enter') {
     //Do the stuff

     table
     .column( $(this).parent().index() )
     .search( this.value )
     .draw();
   }

   if(this.value == ""){
     table
     .column( $(this).parent().index() )
     .search( this.value )
     .draw();
   }


 } );

 // ------------------------------------------------ FILTER PER KOLOM

 //if($('#mydata tbody').find('tr').length != 0) {

 //}


} );

//ambil data
$('#mydata tbody tr td').dblclick(function(){
    var r = Number($(this).closest("tr").index()) ;
    var vid = $('#mydata tbody tr:eq('+r+')').find('#myid').val();


    $.ajax({
        type : "GET",
        url  : "<?php echo base_url() ?>index.php/fab_issued/get_fab_issued",
        dataType : "JSON",
        data : {id:vid,
                lastIndex:r},
        success: function(data){
              $('#t_received_mrk_cons').val(data.received_marker_consp);

                if($('#t_received_mrk_cons').val() == "") {
                  var now = new Date();
                  var day = ("0" + now.getDate()).slice(-2);
                  var month = ("0" + (now.getMonth() + 1)).slice(-2);
                  var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                  $('#t_received_mrk_cons').val(today);
                }

                $('#t_create_avg').val(data.remark_avg_size);
                $('#t_fab_width').val(data.fab_width);
                $('#t_or_cons_ctc').val(data.fab_consp_act);
                if(data.yields != 0.00){
                  $('#t_or_cons_sales').val(data.yields);
                }else{
                  $('#t_or_cons_sales').val('');
                }

                $('#t_fab_width_costing').val(data.actual_fab_width);
                $('#t_avg_size_costing').val(data.avg_size);
                $('#t_exfty_actual').val(data.exfty_actual);
                $('#t_ship_actual').val(data.shipment_actual);
                $('#t_remark1').val(data.remark1);
                $('#t_remark2').val(data.remark2);
                $('#label_identity').html(data.zroh + " -> " + data.po_buyer + " -> " + data.description + " -> " + data.style + " -> " + data.original_ex_date + " -> " + data.qty_cut);
                $('#t_id').val(vid);
                $('#t_lastIndex').val(data.last_index);
                $('#t_zroh').val(data.zroh);
                $('#Mod_updateData').modal('show');
        }
    });
    return false;
});

//Update Barang
$('#btnSimpan').on('click',function(){

  $('#Mod_updateData').modal('hide');

  var v_received_mrk_cons = $('#t_received_mrk_cons').val();
  var v_create_avg =  $('#t_create_avg').val();
  var v_fab_width =  $('#t_fab_width').val();
  var v_or_cons_ctc =  $('#t_or_cons_ctc').val();
  var v_or_cons_sales =  $('#t_or_cons_sales').val();
  var v_fab_width_costing =  $('#t_fab_width_costing').val();
  var v_avg_size_costing =  $('#t_avg_size_costing').val();
  var v_exfty_actual =  $('#t_exfty_actual').val();
  var v_ship_actual =  $('#t_ship_actual').val();
  var v_remark1 =  $('#t_remark1').val();
  var v_remark2 =  $('#t_remark2').val();

  var v_id =  $('#t_id').val();

    $.ajax({
        type : "POST",
        url  : "<?php echo base_url() ?>index.php/fab_issued/update_fab_issued",
        dataType : "JSON",
        data : {received_mrk_cons:v_received_mrk_cons,
                create_avg:v_create_avg,
                fab_width:v_fab_width,
                or_cons_ctc:v_or_cons_ctc,
                or_cons_sales:v_or_cons_sales,
                fab_width_costing:v_fab_width_costing,
                avg_size_costing:v_avg_size_costing,
                exfty_actual:v_exfty_actual,
                ship_actual:v_ship_actual,
                remark1:v_remark1,
                remark2:v_remark2,
                id:v_id
               },
        success: function(data){
          $('#t_received_mrk_cons').val('');
          $('#t_create_avg').val('');
          $('#t_fab_width').val('');
          $('#t_or_cons_ctc').val('');
          $('#t_or_cons_sales').val('');
          $('#t_fab_width_costing').val('');
          $('#t_avg_size_costing').val('');
          $('#t_exfty_actual').val('');
          $('#t_ship_actual').val('');
          $('#t_remark1').val('');
          $('#t_remark2').val('');
          $('#label_identity').html('');
          $('#Mod_updateData').modal('hide');

          window.location = "<?php echo base_url() ?>index.php/fab_issued/view_fab_issued?zroh="+$('#t_zroh').val()+"&lastIndex="+$('#t_lastIndex').val()+"&lastID="+$('#t_id').val();
        }
    });
    return false;
});


</script>
</body>
</html>
