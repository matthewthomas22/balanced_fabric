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

  .submenu{
     margin-bottom:5px;
     margin-left:10px;
     cursor:pointer; 
  }

  .submenu:hover{
    color:orange;
  }

  .non_aktif{
      display: none;
  }

  .aktif{
      display: block;
  }

  #loading_popup{
    display: none;
  }

  #confirmation_popup{
    display: none;
  }

  .loader_background{
    z-index: 9999;
    height: 100vh;
    width: 100vw;
    background-color: rgb(0, 0, 0, 0.4);
    position: relative;
  }

  .popup_background{
    z-index: 9999;
    height: 100vh;
    width: 100vw;
    background-color: rgb(0, 0, 0, 0.4);
    position: relative;
  }

  @keyframes spin{
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
  }

  .loader{
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 16px solid #f3f3f3;
    border-top: 16px solid #17a2b8;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 0.5s linear infinite;
    /* -moz-animation: spin 2s linear infinite; */
    /* -o-animation: spin 2s linear infinite; */
    /* animation: spin 2s linear infinite; */

  }

  /* .confirmation_popup_container{
    overflow-y: scroll;
    display: block;
    position: absolute;
    padding: 20px 40px;
    top: 45%;
    left: 50%;
    transform: translate(-45%, -50%);
    background: white;
    width: 60%;
    height: 50vh;
    border-radius: 10px;
  }

  #confirmation_popup_table th{
    background-color: #858787;
    color: white;
    padding: 2px 4px;
    border: 1px solid #5a5a5a;
  }
  #confirmation_popup_table td{
    border: 1px solid black;
    padding: 2px 4px;
  }

  .confirmation_popup_container button{
    margin-top: 16px; 
    outline: none; 
    border: none; 
    padding: 8px 16px;
    transition: 0.2s all ease-in;
  }

  .confirmation_popup_container button:hover{
    background-color: #858787;
    color: white;
  } */

  .buttonStyle{
    margin-top: 16px; 
    outline: none; 
    border: none; 
    padding: 8px 16px;
    transition: 0.2s all ease-in;
    background-color: #17a2b8; 
    color: white;
  }

  .buttonStyle:hover{
    background-color: ##13899c;
    color: white;
  }

  

  </style>
</head>
<body>

<!-- LOADING SCREEN POPUP -->
<div id="loading_popup" class="loader_background">
  <div class="loader">    
  </div>
</div>
<!-- 
<div id="confirmation_popup" class="popup_background">
  <div class="confirmation_popup_container">
    <h1></h1>
    <table id="confirmation_popup_table" >
      <thead>
        <tr>
          <th>Baris Ke -</th>
          <th>FABRIC INV. NO.</th>
          <th>PR</th>
          <th>Fabric RECEIVED DATE</th>
          <th>ETD / EX. MILL FROM BUYER</th>
          <th>ETA</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

    <button type="button" id="confirmation_popup_submitButton" >Submit Change</button>
    <button type="button" id="confirmation_popup_cancelButton" >Cancel</button>
  </div>
</div> -->

  <!-- MODAL BUAT UPDATE DATA -->
  <div class="modal fade" id="updateDataModal" tabindex="-1" role="dialog" aria-labelledby="Add DataModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: fit-content;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                      <p style="margin: 0; font-weight: bold; font-size: 32px;" >Update RECEIVED DATE, ETD, ETA</p>
                    </div>
                    <button id="updateDataModal_closeButton"  type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="width: 500px; padding: auto;">
                  <div class="update_data_content">
                      <input type="file" id="excelFile" accept=".xls, .xlsx, .csv" required>
                      
                  </div>

                  <!-- <hr> -->

                  <!-- <div class="inputZrohToUpdate">
                    <p style="margin: 0 0 4px 0; padding: 0; font-size: 12px;" > Zroh yang ingin diupdate:</p>
                    <input style="padding: 4px 8px;"  placeholder="Zroh..." type="number" id="zrohToUpdate" required>
                    <div id="clueForUser" style="color: red; margin-top: 10px; font-size: 12px;" ></div>
                  </div> -->

                  <div>
                    <button class="buttonStyle"  type="button" id="update_data_uploadExcel" >Upload</button>
                    <button class="buttonStyle"  type="button" id="submit_data_uploadExcel" >Submit</button>
                  </div>
                 
                  
                </div>
            </div>
        </div>
    </div>

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

                        <ul style="list-style-type: none;" class="<?php echo ($this->session->userdata('ses_page')=='fab_received') ? 'aktif' : 'non_aktif' ; ?>">
                            <li class="submenu"><span id="sm_new_invoice">* New Invoice</span></li>
                            <li class="submenu"><span id="sm_check_infty">* Check Fabric Infty</span></li>
                        </ul>
                    </li>

                    <li class="nav-item <?php echo ($this->session->userdata('ses_page')=='fab_issued') ? 'actived' : '' ; ?>">
                    <a href="<?php echo base_url() ?>index.php/fab_issued/view_fab_issued" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Issued Fabric</p>
                    </a>
                        
                        <ul style="list-style-type: none;" class="<?php echo ($this->session->userdata('ses_page')=='fab_issued') ? 'aktif' : 'non_aktif' ; ?>">
                            <!-- <li class="submenu"><span id="sm_additional">* Additional Use</span></li> -->
                            <!-- <li class="submenu"><span id="sm_information">* More Information</span></li> -->
                        </ul>

                    </li>


                    <li class="nav-item <?php echo ($this->session->userdata('ses_page')=='fab_report') ? 'actived' : '' ; ?>">
                    <a href="<?php echo base_url() ?>index.php/fab_report/index" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Reporting</p>
                    </a>
                    </li>

                    <li class="nav-item ">
                    <a href="<?php echo base_url() ?>C_Fab_Recap" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Fabric Recap</p>
                    </a>
                    </li>

                    <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <button style="outline: none;
                                        border: none;
                                        background: transparent;
                                        color: white;
                                        padding: 0; "  
                          data-toggle="modal" 
                          data-target="#updateDataModal">
                          <p>Update DATA</p>
                        </button>
                    </a>
                    </li>

                    <li class="nav-item ">
                    <a href="<?php echo base_url() ?>index.php/fab_received/view_fabric_received_data" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <button style="outline: none;
                                        border: none;
                                        background: transparent;
                                        color: white;
                                        padding: 0; "  
                        >
                          <p>Fabric Received Table</p>
                        </button>
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

  <script src="<?php echo base_url('assets/js/xlsx.full.min.js')?>" ></script>
  <script src="<?php echo base_url('assets/js/uploadExcel.js')?>" ></script>

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
