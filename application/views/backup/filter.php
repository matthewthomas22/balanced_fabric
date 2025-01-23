<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Plugin JQUERY -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

    <!-- Plugin CSS + JS BootStrap -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" >
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.min.js" ></script>
  </head>
  <body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input Kode Zroh</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">#ZROH</label>
              </div>
              <input type="text" name="" value="" id="inputGroupSelect01" style="width:80%;">
            </div>

          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnClsPreview">Close</button> -->
            <button type="button" class="btn btn-primary" id="btnPreview" onclick="showReport();">Preview</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModalCenter').modal('show');
    });
  </script>
  </body>
</html>
