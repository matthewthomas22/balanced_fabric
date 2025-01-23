<!DOCTYPE html>
<html lang="en" dir="ltr" style="<?php echo ($this->session->userdata('ses_page')=='fab_issued') ? 'width:6100px;' : 'width:3600px;' ; ?>">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

      h5{
        color: white;
        margin-top: 8px;
      }

      #additional_menu{
        position: fixed;
        top: 0;
        right: 0;
        margin-top: 10px;
      }

    </style>
  </head>
  <body>


    <!-- Navbar -->
    <nav id ="nav_menu" class="main-header navbar navbar-expand navbar-dark navbar-cyan">

      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item">
          <?php if($this->session->userdata('ses_page') == 'fab_received'): ?>
              <h5 >Form Received Fabric </h5>
          <?php elseif ($this->session->userdata('ses_page') == 'fab_issued'): ?>
              <h5 >Form Issued Fabric </h5>
          <?php endif; ?>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto" id="additional_menu">
        <?php if($this->session->userdata('ses_page') == 'fab_received'): ?>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" >
          <span id="m_new">[ New Invoice ]</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
          <span id="m_check">[ Check Fabric Infty ] </span>
          </a>
        </li>

      <?php elseif($this->session->userdata('ses_page') == 'fab_issued'): ?>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
          <span id="m_info">[ Received Information ] </span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
          <span id="m_add">[ Additional Use ] </span>
          </a>
        </li>

        <?php endif; ?>
      </ul>

    </nav>
    <!-- /.navbar -->

  </body>
</html>
