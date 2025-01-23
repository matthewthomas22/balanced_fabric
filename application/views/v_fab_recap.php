<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabric Recap</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/fabric_recap.css')?>">
</head>
<body>

    <div class="fab_recap_modal">
        <div class="fab_recap_modal_content">
            <div class="fab_recap_modal_title">
                <p>Pilih ZROH</p>
            </div>
            <div class="fab_recap_modal_form">
                <input type="text" id="selectedZroh" v-model="selectedZroh" >
                <button type="button" @click="" >Search</button>
            </div>
        </div>
    </div>

    <div id="mount_fab_recap" class="fab_recap_container">
        <div class="fab_recap_content">

        </div>
    </div>
    
</body>
<!-- jQuery -->
<script src=<?php echo base_url('assets/js/jquery.min.js'); ?>></script>
<script src=<?= base_url("assets/js/vue.global.prod.js")?> ></script>
<script src=<?= base_url("assets/js/fabric_recap.js")?> ></script>
</html>