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

  <!-- <style>
      #icon_add {
        position: fixed; 
        bottom:0;
        right:0;
        margin-right:10px;
        margin-bottom:10px;  
        cursor: pointer; 
    }

    #icon_check {
        position: fixed; 
        bottom:0;
        right:0;
        margin-right:100px;
        margin-bottom:10px; 
        cursor: pointer;      
    }
  </style> -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('header');?> <!--Include header-->

  <?php $this->load->view('menu');?> <!--Include menu-->

  <!-- KONTEN UNTUK FORM RECEIVED INVOICE -->
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

  <!-- <div>
    <img src="http://192.168.100.124/prominent/balanced_fabric/assets/images/add.png" alt="New Invoice" width="75" height="75" id="icon_add">
    <img src="http://192.168.100.124/prominent/balanced_fabric/assets/images/check.png" alt="Check Invoice" width="75" height="75" id="icon_check" >
  </div> -->

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
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/Buttons-1.6.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/jszip.min.js"></script>

</body>
</html>
