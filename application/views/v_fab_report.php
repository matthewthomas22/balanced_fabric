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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/dataTables.checkboxes.css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/css/buttons.dataTables.min.css">

  <style media="screen">
  .dt-buttons{
    display: none !important;
  }

  .dataTables_filter {
    float: left!important;
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

    <!-- Modal progress report -->
    <div class="modal fade" id="modProsesReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title  text-white" id="modProsesReport_title">Proses Report Balanced Fabric</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
              <span aria-hidden="true" style="color:black;">X</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="lblheader_proses">Please Wait, Report is being Processed</p>
            <span id="lblComplete" style="color:green;">Process Completed</span>

            <!-- <button type="button" name="button" id="btnViewRpt">View Now</button> -->
          </div>

        </div>
      </div>
    </div>

    <!-- KONTEN UNTUK FORM LIST ZROH -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <table id="mydata" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th></th>
              <th>ZROH</th>
              <th>CONTENT</th>
              <th>COLOUR</th>
              <th>CATEGORY</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($myzroh as $r) : ?>
              <tr>
                <td></td>
                <td><?php echo $r['zroh']; ?></td>
                <td><?php echo $r['konten']; ?></td>
                <td><?php echo $r['colour']; ?></td>
                <td><?php echo $r['category']; ?></td>
              </tr>
            <?php endforeach ; ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>ZROH</th>
              <th>CONTENT</th>
              <th>COLOUR</th>
              <th>CATEGORY</th>
            </tr>
          </tfoot>
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
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/dataTables.checkboxes.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/jszip.min.js"></script>


  <script type="text/javascript">
  $(document).ready(function (){
    var table = $('#mydata').DataTable({
      'columnDefs': [
        {
          'targets': 0,
          'checkboxes': {
            'selectRow': true
          }
        }
      ],
      'select': {
        'style': 'multi'
      },
      'paging':false
    });


  });

  $("#m_generate_report").click(function () {

    var listZroh = [];

    for (var i = 0; i < $("#mydata tbody tr").length; i++) {
      if ($("#mydata tbody tr:eq("+i+")").find("input:checkbox").is(':checked')) {
        listZroh.push($("#mydata tbody tr:eq("+i+") td:eq(1)").html());
      }
    }

    if (listZroh.length === 0){
      alert("Maaf Zroh Belum Dipilih");
    }else{
      // tampil proses bar
      // $("#lbl_proses_rpt").html("Total Zroh 0/"+listZroh.length);
      $('#lblheader_proses').show();
      $('#lblComplete').hide();
      $('#btnViewRpt').hide();
      $('#modProsesReport').modal('show');

      //Reset Dulu
      // $.ajax({
      //     type  : 'GET',
      //     url   : "<?php echo base_url()?>"+"index.php/fab_report/reset_report",
      //     async : true,
      //     success : function(data){
      //     }
      // });

      var vzroh = JSON.stringify(listZroh);
      //Proses Kemudian
      // var nmr = 0 ;
      // for (var x = 0; x < listZroh.length; x++) {
        // var vzroh = listZroh[x];
        $.ajax({
            type  : 'POST',
            url   : "<?php echo base_url()?>"+"index.php/fab_report/generate_report",
            async : true,
            data : {zroh:vzroh},
            cache:false,
            success : function(data){
                if(data == "ok"){
                  $('#lblheader_proses').hide();
                  $('#lblComplete').html("("+listZroh.length+" Zroh) Process Completed , Please Open App.Bat");
                  $('#lblComplete').show();
                  $('#btnViewRpt').show();
                }else{
                  $('#lblheader_proses').hide();
                  $('#lblComplete').html("Process Failed, Please Retry");
                  $('#lblComplete').show();
                }

                // nmr = Number(nmr) + 1;
                // $("#lbl_proses_rpt").html("Total Zroh "+nmr+"/"+listZroh.length);
            }
        });
      // }

    }
  })

  $("#btnViewRpt").click(function () {
    // $.ajax({
    //     type  : 'GET',
    //     url   : "<?php echo base_url()?>"+"index.php/fab_report/show_report",
    //     async : true,
    //     success : function(data){
    //         alert(data);
    //     }
    // });

    alert("silahkan buka app.bat");
  })

  </script>
</body>
</html>
