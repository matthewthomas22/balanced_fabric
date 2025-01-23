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
    .inputModDtl {
      width: 100px!important;
    }
    .inputModDtl2 {
      width: 150px!important;
    }
    .btn_check{
      margin-left: 5px;
      margin-top: 8px;
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

    <!-- Modal Insert And Update -->
    <div class="modal fade" id="Mod_input_received" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="margin-top: 100px; width:1000px;">

          <div class="modal-header bg-primary">
            <h5 class="modal-title  text-white" id ="Lbl_input_received">INPUT RECEIVED FABRIC</h5>
            <button type="button" name="button" id="b_prev" class="btn_check">Prev</button>
            <button type="button" name="button" id="b_next" class="btn_check">Next</button>
            <button type="button" class="close" data-dismiss="modal" >
              <span aria-hidden="true" style="color:white;">X</span>
            </button>

          </div>


          <div class="modal-body">
            <!-- <p id="label_identity">107038 -> 4900107757 -> PANT -> JORDP -> 2020-05-01 -> 100</p> -->
            <!-- <input type="text" name="" value="" id="t_zroh" hidden> -->
            <input type="text" name="" value="" id="t_id" hidden>
            <!-- <input type="text" name="" value="" id="t_lastIndex" hidden> -->

            <div class="form-group">
              <div class="input-group-prepend">
              <label class="input-group-text labelMod" for="t_inv_no" style="width: 300px;" >NO INVOICE</label>
              <input type="text" class="form-control form-control-sm inputMod" id="t_inv_no" placeholder="">
              </div>
            </div>


              <div class="form-group">
                <div class="input-group-prepend">
                <label class="input-group-text labelMod" for="t_vendor" style="width: 300px;" >VENDOR</label>
                <input type="text" class="form-control form-control-sm inputMod" id="t_vendor" placeholder="">
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
                  <!-- <tr>
                    <td scope="col"> <input type="number" name="" value="" id="t_id_detail" class="inputModDtl" hidden> <button type="button" name="button" class="btn btn-danger btn-sm" value="x"  > x </button> <span id="n_id_detail" hidden>0</span> </td>
                    <td scope="col"> <input type="text" name="" value="" id="t_zroh" class="inputModDtl"> <span id="n_zroh" hidden></span> </td> -->
                    <!-- span berfungsi untuk tableToJson -->
                    <!-- <td scope="col"> <input type="text" name="" value="" id="t_konten"  class="inputModDtl2" > <span id="n_konten" hidden></span> </td>
                    <td scope="col"> <input type="number" name="" value="" id="t_micron" class="inputModDtl"> <span id="n_micron" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_price" class="inputModDtl"> <span id="n_price" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_qty_inv" class="inputModDtl"> <span id="n_qty_inv" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_qty_rcv" class="inputModDtl"> <span id="n_qty_rcv" hidden></span></td>
                    <td scope="col"> <input type="number" name="" value="" id="t_tes" class="inputModDtl"> <span id="n_tes" hidden></span></td>
                  </tr> -->
                </tbody>
              </table>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-auto" id="btnDeleteAll">DELETE ALL</button>
            <button type="button" class="btn btn-secondary " id="btnAddZroh">ADD ZROH</button>
            <button type="button" class="btn btn-primary " id="btnSimpan">SAVE</button>
          </div>

        </div>
      </div>
    </div>


    <!-- KONTEN UNTUK FORM RECEIVED FAB -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <table id="mydata" class="nowrap" >
          <thead>
            <tr>
              <th >ZROH</th>
              <th >NO INVOICE</th>
              <th >VENDOR</th>
              <th >NO PO (INV)</th>
              <th >ETD DATE</th>
              <th >ETA DATE</th>
              <th >NO PR</th>
              <th >RECEIVED DATE</th>
              <th >CONTENT (INV)</th>
              <th >CONTENT (PRODPLAN)</th>
              <th >MICRON</th>
              <th >PRICE</th>
              <th >QTY INV</th>
              <th >QTY RECEIVED</th>
              <th >QTY TEST</th>
            </tr>
            <tr>
              <th >ZROH</th>
              <th >NO INVOICE</th>
              <th >VENDOR</th>
              <th >NO PO (INV)</th>
              <th >ETD DATE</th>
              <th >ETA DATE</th>
              <th >NO PR</th>
              <th >RECEIVED DATE</th>
              <th >CONTENT (INV)</th>
              <th >CONTENT (PRODPLAN)</th>
              <th >MICRON</th>
              <th >PRICE</th>
              <th >QTY INV</th>
              <th >QTY RECEIVED</th>
              <th >QTY TEST</th>
            </tr>
          </thead>

          <tfoot>
          </tfoot>

          <tbody>
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

  var list_infactory;
  var last_index_infactory;


  //kalau mau pakai ajax untuk isi data table maka simpan sebelum document ready supaya kesimpan di data tablenya
  view_fab_received();

  $(document).ready(function() {
      $('#Mod_input_received').on('shown.bs.modal', function() {
          $('#t_inv_no').focus();
      });

      // ------------------------------------------------ FILTER PER KOLOM
      // Setup - add a text input to each footer cell
      $('#mydata thead tr:eq(1) th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Press Enter" class="column_search" />' );
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
        order: [],
        // defaul value
        // "aoColumnDefs": [
        //   {
        //     "mData": null,
        //     "sDefaultContent": "-",
        //     "aTargets": [ 6,7,8,9 ]
        //   }
          // ,
          // {
          //   "mData": null,
          //   "sDefaultContent": 0,
          //   "aTargets": [ 13 ]
          // }
        // ]
      });

     //set_focus
      // var last ="<?php echo $this->session->userdata('ses_last_id') ?>";
      // if (last != "") {
      //   for (var i = 0; i < $('#mydata tbody').find('tr').length; i++) {
      //     if ( $('#mydata tbody tr:eq('+i+')').find('input:first').val() == last) {
      //       var $row = $(table.row(Number(i)).node());
      //       $('html, body').animate({ scrollTop: $row.offset().top - 300 }, 500);
      //       $row.addClass('selected');
      //     }
      //   }
      // }


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

      //Mau bikin double click cell harus di dalem document ready
      $('#mydata tr td').dblclick(function(){
          r = $(this).closest("tr").index();
          c = $(this).closest("td").index();

          var vid = $('#mydata tbody tr:eq('+r+')').find('#t_last_id').val();
          var vid_detail = $('#mydata tbody tr:eq('+r+')').find('#t_last_id_detail').val();

          $("#b_next").hide();
          $("#b_prev").hide();

          editInvoice(vid,vid_detail,"EDIT RECEIVED FABRIC");
      });

  });

  function view_fab_received(){
      $.ajax({
          type  : 'GET',
          url   : "<?php echo base_url()?>"+"index.php/fab_received/view_fab_received",
          async : true,
          dataType : 'json',
          success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<tr>'+
                          '<td><input type="number" name="" value="'+data[i].id+'" id="t_last_id" class="inputModDtl" hidden><input type="number" name="" value="'+data[i].id_detail+'" id="t_last_id_detail" class="inputModDtl" hidden>'+data[i].zroh+'</td>'+
                          '<td>'+data[i].fab_inv_no+'</td>'+
                          '<td>'+data[i].fab_vendor+'</td>'+
                          '<td>'+data[i].fab_inv_po+'</td>'+
                          '<td>'+data[i].etd+'</td>'+
                          '<td>'+data[i].eta+'</td>'+
                          '<td>'+data[i].pr+'</td>'+
                          '<td>'+data[i].fab_received+'</td>'+
                          '<td>'+data[i].fab_content_inv+'</td>'+
                          '<td>'+data[i].konten+'</td>'+
                          '<td>'+data[i].micro_count+'</td>'+
                          '<td>'+data[i].fab_price+'</td>'+
                          '<td>'+data[i].fab_qty_inv+'</td>'+
                          '<td>'+data[i].fab_qty_received+'</td>'+
                          '<td>'+data[i].auto_test_val +'</td>'+
                          '</tr>';
              }
              $('#mydata tbody').html(html);
          }

      });
  }

  $("#btnAddZroh").click(function () {
      addBlankRow();
  });

  $("#btnDeleteAll").click(function () {

    var vid = $("#t_id").val() ;
    $.ajax({
        type  : 'GET',
        url   : "<?php echo base_url()?>"+"index.php/fab_received/delete_fab_received_all",
        async : true,
        data : {id:vid},
        success : function(data){
            alert(data);
            window.location = "<?php echo base_url() ?>index.php/fab_received/index";
            $('#Mod_input_received').modal('hide');
        }
    });


  });

  $("#tblDetail tbody").on("click", ".btn", function(){
        var row = $(this).closest("tr").index();
        var vid = $("#tblDetail tbody tr:eq("+row+")").find("#t_id_detail").val() ;

        if (vid == ""){
          alert("Data Berhasil Di Hapus");

        }else{
          $.ajax({
              type  : 'GET',
              url   : "<?php echo base_url()?>"+"index.php/fab_received/delete_fab_received_item",
              async : true,
              data : {id:vid},
              success : function(data){
                  alert(data);
              }
          });
        }

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

    var cek_data = $("#tblDetail tbody tr:eq(0)").find("#t_zroh").val();

    if (cek_data.length > 0 ){
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
                // view_fab_received();
                window.location = "<?php echo base_url() ?>index.php/fab_received/index";
                $('#Mod_input_received').modal('hide');
            });

      }else if(judul == "EDIT RECEIVED FABRIC") {
            $.post("<?php echo base_url()?>"+"index.php/fab_received/edit_fab_received", //Required URL of the page on server
            { // Data Sending With Request To Server
              last_id:vid,
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
                // view_fab_received();
                window.location = "<?php echo base_url() ?>index.php/fab_received/index";
                $('#Mod_input_received').modal('hide');
            });
      }else if(judul.includes("CHECK")) {
            $.post("<?php echo base_url()?>"+"index.php/fab_received/edit_fab_received", //Required URL of the page on server
            { // Data Sending With Request To Server
              last_id:vid,
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
                view_fab_received();
                $("#m_check").click();

                // window.location = "<?php echo base_url() ?>index.php/fab_received/index";
                // $('#Mod_input_received').modal('hide');
            });
      }
    }else{
      alert("Data Belum Lengkap");
    }


  });

  $("#tblDetail tbody").on("change", "#t_zroh", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_zroh").html(data);
  });

  $("#tblDetail tbody").on("change", "#t_konten", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_konten").html(data);
  });

  $("#tblDetail tbody").on("change", "#t_micron", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_micron").html(data);
  });

  $("#tblDetail tbody").on("change", "#t_price", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_price").html(data);
  });

  $("#tblDetail tbody").on("change", "#t_qty_inv", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_qty_inv").html(data);
  });

  $("#tblDetail tbody").on("change", "#t_qty_rcv", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_qty_rcv").html(data);
  });

  $("#tblDetail tbody").on("change", "#t_tes", function(){
        // //ambil datanya per baris
        var row = $(this).closest("tr").index();    // Find the row
        var data = $(this).val();
        $("#tblDetail tbody tr:eq("+row+")").find("#n_tes").html(data);
  });


  function editInvoice(vid,vid_detail,vjudul) {

    $("#Lbl_input_received").html(vjudul);
    $('#Mod_input_received').modal('show');


    // header
    $.ajax({
        type  : 'GET',
        url   : "<?php echo base_url()?>"+"index.php/fab_received/get_fab_received_header",
        async : true,
        dataType : 'json',
        data : {id:vid},
        success : function(data){
          $("#t_id").val(data[0].id);
          $("#t_vendor").val(data[0].fab_vendor);
          $("#t_inv_no").val(data[0].fab_inv_no);
          $("#t_pr").val(data[0].pr);
          $("#t_inv_po").val(data[0].fab_inv_po);
          $("#t_etd").val(data[0].etd);
          $("#t_eta").val(data[0].eta);
          $("#t_received").val(data[0].fab_received);

          if(vjudul.includes("CHECK")){
              // kalau mau otomatis aktifin yang ini
              // var now = new Date();
              // var day = ("0" + now.getDate()).slice(-2);
              // var month = ("0" + (now.getMonth() + 1)).slice(-2);
              // var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
              //
              // $('#t_received').val(today);
          }

        }
    });

    // detail
    $.ajax({
        type  : 'GET',
        url   : "<?php echo base_url()?>"+"index.php/fab_received/get_fab_received_detail",
        async : true,
        dataType : 'json',
        data : {id:vid},
        success : function(data){
            var html = '';
            $('#tblDetail tbody').html(html);
            var i;
            var row_focus;
            for(i=0; i<data.length; i++){
              var content_inv = (data[i].fab_content_inv == null) ? "" : data[i].fab_content_inv;

              var new_qty_received,new_qty_test ;
              if(vjudul.includes("CHECK")){
                // kalau mau otomatis aktifin yang ini
                // new_qty_received = data[i].fab_qty_inv;
                // new_qty_test = 1.65;

                new_qty_received = data[i].fab_qty_received;
                new_qty_test = data[i].auto_test_val;
              }else{
                new_qty_received = data[i].fab_qty_received;
                new_qty_test = data[i].auto_test_val;
              }

              if(data[i].id == vid_detail ){
                html += "<tr style = 'background-color: #D5D5D5;'>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].id+"' id='t_id_detail' class='inputModDtl' hidden> <button type='button' name='button' class='btn btn-danger btn-sm' value='x' > x </button> <span id='n_id_detail' hidden>"+data[i].id+"</span> </td>"+
                        "<td scope='col'> <input type='text' name='' value='"+data[i].zroh+"' id='t_zroh' class='inputModDtl' > <span id='n_zroh' hidden>"+data[i].zroh+"</span> </td>"+
                        "<td scope='col'> <input type='text' name='' value='"+content_inv+"' id='t_konten'  class='inputModDtl2'  > <span id='n_konten' hidden>"+content_inv+"</span> </td>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].micro_count+"' id='t_micron' class='inputModDtl' > <span id='n_micron' hidden>"+data[i].micro_count+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].fab_price+"' id='t_price' class='inputModDtl'> <span id='n_price' hidden>"+data[i].fab_price+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].fab_qty_inv+"' id='t_qty_inv' class='inputModDtl'> <span id='n_qty_inv' hidden>"+data[i].fab_qty_inv+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+new_qty_received+"' id='t_qty_rcv' class='inputModDtl'> <span id='n_qty_rcv' hidden>"+new_qty_received+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+new_qty_test+"' id='t_tes' class='inputModDtl'> <span id='n_tes' hidden>"+new_qty_test+"</span></td>"+
                        "</tr>";
                row_focus = i;
              }else{
                html += "<tr>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].id+"' id='t_id_detail' class='inputModDtl' hidden> <button type='button' name='button' class='btn btn-danger btn-sm' value='x' > x </button> <span id='n_id_detail' hidden>"+data[i].id+"</span> </td>"+
                        "<td scope='col'> <input type='text' name='' value='"+data[i].zroh+"' id='t_zroh' class='inputModDtl'> <span id='n_zroh' hidden>"+data[i].zroh+"</span> </td>"+
                        "<td scope='col'> <input type='text' name='' value='"+content_inv+"' id='t_konten'  class='inputModDtl2' > <span id='n_konten' hidden>"+content_inv+"</span> </td>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].micro_count+"' id='t_micron' class='inputModDtl'> <span id='n_micron' hidden>"+data[i].micro_count+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].fab_price+"' id='t_price' class='inputModDtl'> <span id='n_price' hidden>"+data[i].fab_price+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+data[i].fab_qty_inv+"' id='t_qty_inv' class='inputModDtl'> <span id='n_qty_inv' hidden>"+data[i].fab_qty_inv+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+new_qty_received+"' id='t_qty_rcv' class='inputModDtl'> <span id='n_qty_rcv' hidden>"+new_qty_received+"</span></td>"+
                        "<td scope='col'> <input type='number' name='' value='"+new_qty_test+"' id='t_tes' class='inputModDtl'> <span id='n_tes' hidden>"+new_qty_test+"</span></td>"+
                        "</tr>";
              }

            }
            $('#tblDetail tbody').html(html);

        }
    });

  };

  $("#m_new").click(function () {
      $("#b_next").hide();
      $("#b_prev").hide();

      $("#t_id").val("");
      $("#t_vendor").val("");
      $("#t_inv_no").val("");
      $("#t_pr").val("");
      $("#t_inv_po").val("");
      $("#t_etd").val("");
      $("#t_eta").val("");
      $("#t_received").val("");

      blankRow();



      $("#Lbl_input_received").html("INPUT RECEIVED FABRIC");
      $('#Mod_input_received').modal('show');
  });

  $("#m_check").click(function () {
    $("#b_next").show();
    $("#b_prev").show();

    $.ajax({
        type  : 'GET',
        url   : "<?php echo base_url()?>"+"index.php/fab_received/check_fab_infty",
        async : true,
        dataType : 'json', //ini harus dibawa kalau mau langsung dipake hasil returnnya
        success : function(data){
            list_infactory = data;

            if (list_infactory.length > 0){
                last_index_infactory = 0;
                editInvoice(list_infactory[0].id,list_infactory[0].id_detail,"CHECK FABRIC INFTY (1/"+list_infactory.length+")");
            }else{
                $('#Mod_input_received').modal('hide');
                alert("Tidak Ada Kedatangan Fabric Lagi Sampai Hari Ini (Complete)");
            }

        }
    });
  });

  $("#b_next").click(function () {

    if((last_index_infactory + 1) == list_infactory.length ){
      last_index_infactory = 0;
    }else{
      last_index_infactory = last_index_infactory + 1;
    }

    var judulindex = (last_index_infactory + 1) ;

    editInvoice(list_infactory[last_index_infactory].id,list_infactory[last_index_infactory].id_detail,"CHECK FABRIC INFTY ("+judulindex+"/"+list_infactory.length+")");

  });

  $("#b_prev").click(function () {

    if(last_index_infactory == 0 ){
      last_index_infactory = (list_infactory.length - 1) ;
    }else{
      last_index_infactory = last_index_infactory - 1;
    }

    var judulindex = (last_index_infactory + 1) ;

    editInvoice(list_infactory[last_index_infactory].id,list_infactory[last_index_infactory].id_detail,"CHECK FABRIC INFTY ("+judulindex+"/"+list_infactory.length+")");

  });

  $("#t_received").change(function () {

    var judul = $("#Lbl_input_received").html();
    var tgl = $("#t_received").val();

    var total = $('#tblDetail tbody tr').length ;
    if(judul.includes("EDIT") || judul.includes("CHECK")){
      for (var i = 0; i < total; i++) {
        if(tgl.length > 0){
              if($("#tblDetail tbody tr:eq("+i+")").find("#t_qty_rcv").val() == ""){
                  var new_qty = $("#tblDetail tbody tr:eq("+i+")").find("#t_qty_inv").val();
                  $("#tblDetail tbody tr:eq("+i+")").find("#t_qty_rcv").val(new_qty);
                  $("#tblDetail tbody tr:eq("+i+")").find("#n_qty_rcv").html(new_qty);
              }

              if($("#tblDetail tbody tr:eq("+i+")").find("#t_tes").val() == ""){
                  $("#tblDetail tbody tr:eq("+i+")").find("#t_tes").val(-1.65);
                  $("#tblDetail tbody tr:eq("+i+")").find("#n_tes").html(-1.65);
              }
        }else{
                  //reset lagi kalau ga jadi infty
                  $("#tblDetail tbody tr:eq("+i+")").find("#t_qty_rcv").val('');
                  $("#tblDetail tbody tr:eq("+i+")").find("#n_qty_rcv").html('');

                  $("#tblDetail tbody tr:eq("+i+")").find("#t_tes").val('');
                  $("#tblDetail tbody tr:eq("+i+")").find("#n_tes").html('');
        }


      }
    }
  })


  function blankRow() {
    var html = "<tr> <td scope='col'> <input type='number' name='' value='' id='t_id_detail' class='inputModDtl' hidden> <button type='button' name='button' class='btn btn-danger btn-sm' value='x' > x </button> <span id='n_id_detail' hidden>0</span> </td> " +
                    "<td scope='col'> <input type='text' name='' value='' id='t_zroh' class='inputModDtl'> <span id='n_zroh' hidden></span> </td>"  +
                    "<td scope='col'> <input type='text' name='' value='' id='t_konten'  class='inputModDtl2' > <span id='n_konten' hidden></span> </td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_micron' class='inputModDtl'> <span id='n_micron' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_price' class='inputModDtl'> <span id='n_price' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_qty_inv' class='inputModDtl'> <span id='n_qty_inv' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_qty_rcv' class='inputModDtl'> <span id='n_qty_rcv' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_tes' class='inputModDtl'> <span id='n_tes' hidden></span></td>" +
                    "</tr>";

    $('#tblDetail tbody').html(html);
  }

  function addBlankRow() {
    var html = "<tr> <td scope='col'> <input type='number' name='' value='' id='t_id_detail' class='inputModDtl' hidden> <button type='button' name='button' class='btn btn-danger btn-sm' value='x' > x </button> <span id='n_id_detail' hidden>0</span> </td> " +
                    "<td scope='col'> <input type='text' name='' value='' id='t_zroh' class='inputModDtl'> <span id='n_zroh' hidden></span> </td>"  +
                    "<td scope='col'> <input type='text' name='' value='' id='t_konten'  class='inputModDtl2' > <span id='n_konten' hidden></span> </td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_micron' class='inputModDtl'> <span id='n_micron' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_price' class='inputModDtl'> <span id='n_price' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_qty_inv' class='inputModDtl'> <span id='n_qty_inv' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_qty_rcv' class='inputModDtl'> <span id='n_qty_rcv' hidden></span></td>" +
                    "<td scope='col'> <input type='number' name='' value='' id='t_tes' class='inputModDtl'> <span id='n_tes' hidden></span></td>" +
                    "</tr>";

    $("#tblDetail tbody").append(html);
  }


  </script>
  </body>
  </html>
