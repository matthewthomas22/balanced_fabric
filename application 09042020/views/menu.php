<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>

  <style media="screen">
  .actived{
    background-color: #17a2b8;
    color: white;
  }

  .btnScroll{
    width:110px;
  }
  </style>
</head>
<body>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>index.php/fab_received/index" class="brand-link">
      <span class="brand-text font-weight-light">Balanced Fabric Prominent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/templete_lte302/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url() ?>index.php/fab_received/index" class="d-block">Hi, <?php echo $this->session->userdata('ses_nama') ?></a>
        </div>
      </div>

      <!--Akses Menu Untuk Sales-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if($this->session->userdata('ses_job')=='sales'):?>
            <li class="nav-item <?php echo ($this->session->userdata('ses_page')=='fab_received') ? 'actived' : '' ; ?>">
              <a href="<?php echo base_url() ?>index.php/fab_received/index" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Received Fabric</p>
              </a>
            </li>

            <li class="nav-item <?php echo ($this->session->userdata('ses_page')=='fab_issued') ? 'actived' : '' ; ?>">
              <a href="<?php echo base_url() ?>index.php/fab_issued/view_fab_issued" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Issued Fabric</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/login/logout" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Reporting</p>
              </a>
            </li>


          <?php endif;?>

          <li class="nav-item">
            <a href="<?php echo base_url() ?>index.php/login/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Log Out</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <button class="btnScroll" type="button" name="button" id="geser_kiri" onclick="scrollKiri()" > Left </button>
              <button class="btnScroll" type="button" name="button" id="geser_kanan" onclick="scrollKanan()">Right</button>
            </li>
            </ul>
        </div>
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
  function scrollKanan() {
    window.scrollBy(500, 0);
  }
  function scrollKiri() {
    window.scrollBy(-500, 0);
  }
  </script>

</body>
</html>
