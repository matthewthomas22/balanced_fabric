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
    .inputMod {
      height: 38px!important;
    }
    .inputModDtl {
      width: 100px!important;
    }
    .inputModDtl2 {
      width: 150px!important;
    }
    td,th{
      text-align: center;
    }

    </style>

  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php $this->load->view('header');?> <!--Include header-->

    <?php $this->load->view('menu');?> <!--Include menu-->

    <!-- Modal Update -->
    <div class="modal fade" id="Mod_input_received" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="margin-top: 100px; width:1000px;">

          <div class="modal-header bg-primary">
            <h5 class="modal-title  text-white" id ="Lbl_input_received">INPUT RECEIVED FABRIC</h5>
            <button type="button" class="close" data-dismiss="modal" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <div class="modal-body">
            <!-- <p id="label_identity">107038 -> 4900107757 -> PANT -> JORDP -> 2020-05-01 -> 100</p> -->
            <!-- <input type="text" name="" value="" id="t_zroh" hidden> -->
            <input type="text" name="" value="" id="t_id" hidden>
            <!-- <input type="text" name="" value="" id="t_lastIndex" hidden> -->

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_vendor" style="width: 300px;" >VENDOR</label>
                <input type="text" class="form-control form-control-sm inputMod" id="t_vendor" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_inv_no" style="width: 300px;" >NO INVOICE</label>
                <input type="text" class="form-control form-control-sm inputMod" id="t_inv_no" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_inv_po" style="width: 300px;">NO PO (INV)</label>
                <input type="text" class="form-control form-control-sm inputMod" id="t_inv_po" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_etd" style="width: 300px;" >ETD DATE</label>
                <input type="date" class="form-control form-control-sm inputMod" id="t_etd" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_eta" style="width: 300px;" >ETA DATE</label>
                <input type="date" class="form-control form-control-sm inputMod" id="t_eta" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_pr" style="width: 300px;" >NO PR</label>
                <input type="text" class="form-control form-control-sm inputMod" id="t_pr" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_received" style="width: 300px;" >RECEIVED DATE</label>
                <input type="date" class="form-control form-control-sm inputMod" id="t_received" placeholder="">
                </div>
              </div>

              <table class="table" id="tblDetail">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ZROH</th>
                    <th scope="col">CONTENT_(INV)</th>
                    <th scope="col">MICRON</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QTY_(INV)</th>
                    <th scope="col">QTY_(RCV)</th>
                    <th scope="col">QTY_(TES)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="col"> <button type="button" name="button" class="btn btn-danger btn-sm" value="x"  > x </button> </td>
                    <td scope="col"> <input type="text" name="" value="" id="t_zroh" class="inputModDtl"> <span id="n_zroh" hidden></span> </td>
                    <!-- span berfungsi untuk tableToJson -->
                    <td scope="col"> <input type="text" name="" value="" id="t_konten"  class="inputModDtl2" > <span id="n_konten" hidden></span> </td>
                    <td scope="col"> <input type="number" name="" value="" id="t_micron" class="inputModDtl"> <span id="n_micron" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_price" class="inputModDtl"> <span id="n_price" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_qty_inv" class="inputModDtl"> <span id="n_qty_inv" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_qty_rcv" class="inputModDtl"> <span id="n_qty_rcv" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="1.65" id="t_tes" class="inputModDtl"> <span id="n_tes" hidden>1.65</span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_id_detail" class="inputModDtl" hidden></td>
                  </tr>
                </tbody>
              </table>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary " id="btnAddZroh">ADD ZROH</button>
            <button type="button" class="btn btn-primary " id="btnSimpan">SIMPAN</button>
          </div>
        </div>
      </div>
    </div>

    <!-- KONTEN UNTUK FORM RECEIVED FAB -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <table>
          <tr>
            <td>Data Table1</td>
          </tr>
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
  <script src="<?php echo base_url() ?>assets/js/jquery.tabletojson.min.js"></script>
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
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/jszip.min.js"></script>


  <script type="text/javascript">
  $(document).ready(function() {
      $('#Mod_input_received').modal('show');

      $('#Mod_input_received').on('shown.bs.modal', function() {
          $('#t_vendor').focus();
      });

  });

  $("#btnAddZroh").click(function () {
    var blankRow = "<tr> <td scope='col'> <button type='button' name='button' class='btn btn-danger btn-sm' value='x' > x </button> </td> " +
                    "<td scope='col'> <input type='text' name='' value='' id='t_zroh' class='inputModDtl'> <span id='n_zroh' hidden></span> </td>"  +
                    "<td scope='col'> <input type='text' name='' value='' id='t_konten'  class='inputModDtl2' > <span id='n_konten' hidden></span> </td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_micron' class='inputModDtl'> <span id='n_micron' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_price' class='inputModDtl'> <span id='n_price' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_qty_inv' class='inputModDtl'> <span id='n_qty_inv' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_qty_rcv' class='inputModDtl'> <span id='n_qty_rcv' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='1.65' id='t_tes' class='inputModDtl'> <span id='n_tes' hidden>1.65</span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_id_detail' class='inputModDtl' hidden></td>" +
                    "</tr>";

    $("#tblDetail tbody").append(blankRow);
  });

  $("#tblDetail tbody").on("click", ".btn", function(){
        $(this).parents('tr').remove();
  });

  $("#tblDetail tbody").on("focusout", "#t_zroh", function(){
        // alert($(this).val()); NANTI CEK ZROH

  });

  $("#btnSimpan").click(function () {
    var judul = $("#Lbl_input_received").html();
    var vid = $("#t_id").val();
    var v_vendor = $("#t_vendor").val();
    var v_inv_no = $("#t_inv_no").val();
    var v_inv_po = $("#t_inv_po").val();
    var v_etd = $("#t_etd").val();
    var v_eta = $("#t_eta").val();
    var v_pr = $("#t_pr").val();
    var v_received = $("#t_received").val();

    var vdetail = JSON.stringify($('#tblDetail').tableToJSON());
    // var vdetail = "a";

    if(judul == "INPUT RECEIVED FABRIC") {
        // alert("tes");
          $.post("<?php echo base_url()?>"+"index.php/fab_received/input_fab_received", //Required URL of the page on server
          { // Data Sending With Request To Server
            vendor:v_vendor,
            inv_no:v_inv_no,
            inv_po:v_inv_po,
            etd:v_etd,
            eta:v_eta,
            pr:v_pr,
            received:v_received,
            detail:vdetail
         },
          function(response,status){ // Required Callback Function
              alert(response);
          });

    }else if(judul == "EDIT RECEIVED FABRIC") {


    }
  });

  $("#tblDetail tbody").on("keyup", "#t_zroh", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_zroh").html(data);
  });

  $("#tblDetail tbody").on("keyup", "#t_konten", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_konten").html(data);
  });

  $("#tblDetail tbody").on("keyup", "#t_micron", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_micron").html(data);
  });

  $("#tblDetail tbody").on("keyup", "#t_price", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_price").html(data);
  });

  $("#tblDetail tbody").on("keyup", "#t_qty_inv", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_qty_inv").html(data);
  });

  $("#tblDetail tbody").on("keyup", "#t_qty_rcv", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_qty_rcv").html(data);
  });

  $("#tblDetail tbody").on("keyup", "#t_tes", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_tes").html(data);
  });

  </script>
  </body>
  </html>
