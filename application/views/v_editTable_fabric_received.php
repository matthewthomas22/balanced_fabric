<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fabric Received</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .edit_fabric_received_get_zroh{
            height: 100vh;
            width: 100vw;
            background-color: rgb(0, 0, 0, 0.5);
            position: relative;
        }
        .edit_fabric_received_get_zroh_content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            width: 60%;
            border-radius: 8px;
        }

        .edit_fabric_received_content{
            display: none;
        }


        #edit_fabric_received_table{
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        #edit_fabric_received_table th {
            padding: 4px 8px;
            border: 1px solid grey;
            font-size: 12px;
        }

        #edit_fabric_received_table td{
            padding: 4px 8px;
            border: 1px solid grey;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s all ease-in-out;
        }

        #edit_fabric_received_table td:hover{
            background-color: rgb(252, 5, 17, 0.1);
        }

        .edit_fabric_received_table_container{
            padding: 20px 40px;
        }

        .empty_cell{
            background-color: rgb(252, 5, 17, 0.3);
        }

    </style>
</head>
<body>
    <div id="edit_fabric_received_container">
        <div class="howToProgram_container">
            <div class="howToProgram_content">
                <pre><code>
                Cara Edit:
                1. Double Click kolom ETD / ETA / Fabric received DATE / Fab Qty Received
                2. Edit data di dalamnya
                3. Pencet Enter setelah selesai Edit

                Note:
                - Hanya bisa edit satu data pada satu baris saja
                - tidak bisa edit data pada 2 baris sekaligus
                - Mirip kaya kalau mau edit data di excel tapi terakhirnya harus pencet Enter
                </code></pre>
            </div>
        </div>
        <div class="edit_fabric_received_get_zroh">
            <div class="edit_fabric_received_get_zroh_content">
                <p>Pilih ZROH: </p>
                <input v-model="zroh_to_find" type="number" id="get_zroh_fabric_received">

                <button type="button" @click="fetchReceivedFabricData" >View</button>
            </div>
        </div>
        <div class="edit_fabric_received_content">
            <div class="edit_fabric_received_table_container">
                <table style="table-layout: fixed;"  id="edit_fabric_received_table" >
                    <thead>
                        <tr>
                            <th style="display: none;" >id</th>
                            <th style="display: none;" >id_detail</th>
                            <th style="text-wrap: wrap;" >FABRIC VENDOR</th>  <!--fab_vendor-->
                            <th style="width: 120px; text-wrap: wrap;" >FABRIC INVOICE NO</th>  <!--fab_inv_no-->
                            <th style="width: 90px;" >PR</th>  <!--pr-->
                            <th style="width: 100px;" >FABRIC INVOICE PO</th>  <!--fab_inv_po-->
                            <th style="text-wrap: nowrap; width: 80px;" >ETD</th>  <!--etd-->
                            <th style="text-wrap: nowrap; width: 80px;" >ETA</th>  <!--eta-->
                            <th style="width: 80px;">FABRIC RECEIVED DATE</th>  <!--fab_received-->
                            <th>ZROH</th>  <!--zroh-->
                            <th>MICRO COUNT</th>  <!--micro_count-->
                            <th>FABRIC PRICE</th>  <!--fab_price-->
                            <th>FAB QTY INVOICE</th>  <!--fab_qty_inv-->
                            <th>FAB QTY RECEIVED</th>  <!--fab_qty_received-->
                            <th>AUTO TEST VAL</th>  <!--auto_test_val-->
                            <th>REMARK TEST</th>  <!--remark_test-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in data_fabric_received" >
                            <td :class="{'empty_cell': row.micro_count === null}" style="display: none;" >{{ row.id  }}</td>
                            <td :class="{'empty_cell': row.micro_count === null}" style="display: none;" >{{ row.id_detail  }}</td>
                            <td :class="{'empty_cell': row.fab_vendor === null}">{{ row.fab_vendor  }}</td>  <!--fab_vendor-->
                            <td :class="{'empty_cell': row.fab_inv_no === null}">{{ row.fab_inv_no  }}</td>  <!--fab_inv_no-->
                            <td :class="{'empty_cell': row.pr === null}">{{ row.pr  }}</td>  <!--pr-->
                            <td :class="{'empty_cell': row.fab_inv_po === null}">{{ row.fab_inv_po  }}</td>  <!--fab_inv_po-->
                            <td :class="{'empty_cell': row.etd === null}" @dblclick="editRow(index, row, 'etd')">
                                <div v-if="edit_index !== index" >{{ row.etd  }}</div>
                                <div v-else>
                                    <input 
                                        type="text" 
                                        v-model="data_fabric_received[index]['etd']"
                                        style="padding: 2px; width: 67px"
                                        @keyup.escape="edit_index = null" 
                                        @keyup.enter="queryEdit_etd"> 
                                </div>    

                            </td>
                            <td :class="{'empty_cell': row.eta === null}" @dblclick="editRow(index, row, 'eta')">
                                <div v-if="edit_index !== index" >{{ row.eta  }}</div>
                                <div v-else>
                                    <input 
                                        type="text" 
                                        v-model="data_fabric_received[index]['eta']"
                                        style="padding: 2px; width: 67px"
                                        @keyup.escape="edit_index = null" 
                                        @keyup.enter="queryEdit_eta"> 
                                </div>    

                            </td>
                            <td :class="{'empty_cell': row.fab_received === null}" @dblclick="editRow(index, row, 'fab_received')">
                                <div v-if="edit_index !== index" >{{ row.fab_received  }}</div>
                                <div v-else>
                                    <input 
                                        type="text" 
                                        v-model="data_fabric_received[index]['fab_received']"
                                        style="padding: 2px; width: 67px"
                                        @keyup.escape="edit_index = null" 
                                        @keyup.enter="queryEdit_fab_received_date"> 
                                </div>    

                            </td>
                            <td :class="{'empty_cell': row.zroh === null}">{{ row.zroh  }}</td>  <!--zroh-->
                            <td :class="{'empty_cell': row.micro_count === null}" >
                                {{ row.micro_count  }}  <!--micro_count-->
                            </td>  
                            <td :class="{'empty_cell': row.fab_price === null}">{{ row.fab_price  }}</td>  <!--fab_price-->
                            <td :class="{'empty_cell': row.fab_qty_inv === null}">{{ row.fab_qty_inv  }}</td>  <!--fab_qty_inv-->
                            <td :class="{'empty_cell': row.fab_qty_received === null}" @dblclick="editRow(index, row, 'fab_qty_received')">
                                <div v-if="edit_index !== index" >{{ row.fab_qty_received  }}</div>
                                <div v-else>
                                    <input 
                                        type="number" 
                                        v-model="data_fabric_received[index]['fab_qty_received']"
                                        style="padding: 2px; width: 67px"
                                        @keyup.escape="edit_index = null" 
                                        @keyup.enter="queryEdit_fab_qty_received"> 
                                </div>    

                            </td>  
                            <td :class="{'empty_cell': row.auto_test_val === null}">{{ row.auto_test_val  }}</td>  <!--auto_test_val-->
                            <td :class="{'empty_cell': row.remark_test === null}">{{ row.remark_test  }}</td>  <!--remark_test-->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vue.global.prod.js"></script>
<script src="<?php echo base_url() ?>assets/js/edit_table_fabric_received.js"></script>
</html>

