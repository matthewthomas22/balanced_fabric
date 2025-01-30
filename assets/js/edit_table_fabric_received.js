$(document).ready(function () {
	const base_url = "http://192.168.100.163/balanced_fabric/Fab_received/";

	const app = Vue.createApp({
		data() {
			return {
				data_fabric_received: [],
                zroh_to_find: null,
                edit_index : null,
                edit_key: "",
                idToEdit: null
			};
		},
		mounted() {
            // this.fetchData()
        },
		methods: {
			fetchReceivedFabricData() {

                this.edit_index = null;
                
                const vm = this;
                const zroh = this.zroh_to_find;
				$.ajax({
					type: "post",
					url: base_url + "get_data_fabric_received",
					data: JSON.stringify(zroh),
					success: function (response) {

                        //Parsed Response
                        const parsedData = JSON.parse(response);

                        //assign the fetched data to vue variable
                        // vm.data_fabric_received =parsedData.map( item =>{
                        //     item.eta = vm.formatDate(item.eta);
                        //     item.etd = vm.formatDate(item.etd);
                        //     item.fab_received = vm.formatDate(item.fab_received);

                        //     return item;
                        // })

                        vm.data_fabric_received = {...parsedData};

                        //show the table and hide the popup
                        document.querySelector('.edit_fabric_received_get_zroh').style.display = 'none';
                        document.querySelector('.edit_fabric_received_content').style.display = 'block';
                        console.log(JSON.parse(response));
                    },
				});

                
                
                
                //*********************** DEBUG ***********************
                //console.log();
			},

            editRow(index, row, whatToEdit){
                //assign which row to edit
                this.edit_index = index;
                //assign what column to edit
                this.edit_key = whatToEdit;

                if(whatToEdit === "fab_qty_received"){
                    this.idToEdit = row['id_detail'];
                    console.log("This is id_detail \nbecause fab_qty_received is being editted\n", this.idToEdit);
                }else{
                    this.idToEdit = row['id'];
                }

                console.group();
                console.log("This is what to edit: ", whatToEdit);
                console.log("function editRow:\n", index);
                console.groupEnd();
            },

            queryEdit_fab_qty_received(){
                const vm = this;
                // const zroh = this.zroh_to_find;
                const editQuery = `UPDATE prominent.t_invoice_detail 
                                    SET ${this.edit_key} = ${this.data_fabric_received[this.edit_index]['fab_qty_received']}
                                    WHERE id = ${this.idToEdit}`;
                if(confirm("Are you sure you want to Update Data ?")){
                    
                    //%%%%%%%% KODE YANG DIJALANKAN %%%%%%%%//
                    $.ajax({
                        type: "post",
                        url: base_url + "update_fab_qty_received_by_table",
                        data: JSON.stringify(editQuery),
                        success: function (response) {
                            // console.log("this is editQuery function log: ", JSON.parse(response));
                            if(JSON.parse(response) === "success"){
                                vm.fetchReceivedFabricData()
                            }else{
                                alert("Update Failed!");
                            }

                        }
                    });


                    //%%%%%%%% DEBUG %%%%%%%%//
                    // console.group();
                    // console.log(editQuery);
                    // console.log("data type of fab_qty_receievd: ", typeof this.data_fabric_received[this.edit_index]['fab_qty_received'] )
                    // console.groupEnd();
                }else{
                    alert("Update Canceled!");
                }
            },
            queryEdit_eta(){ 
                const vm = this;
                // const zroh = this.zroh_to_find;
                const editQuery = `UPDATE prominent.t_invoice 
                                    SET ${this.edit_key} = '${this.data_fabric_received[this.edit_index]['eta'].trim()}'
                                    WHERE id = ${this.idToEdit}`;
                if(confirm("Are you sure you want to Update Data ?")){
                    
                    //%%%%%%%% KODE YANG DIJALANKAN %%%%%%%%//
                    $.ajax({
                        type: "post",
                        url: base_url + "update_eta_by_table",
                        data: JSON.stringify(editQuery),
                        success: function (response) {
                            // console.log("this is editQuery function log: ", JSON.parse(response));
                            if(JSON.parse(response) === "success"){
                                vm.fetchReceivedFabricData()
                            }else{
                                alert("Update Failed!");
                            }

                        }
                    });


                    //%%%%%%%% DEBUG %%%%%%%%//
                    // console.group();
                    // console.log(editQuery);
                    // console.log("data type of fab_qty_receievd: ", typeof this.data_fabric_received[this.edit_index]['fab_qty_received'] )
                    // console.groupEnd();
                }else{
                    alert("Update Canceled!");
                }
            },
            queryEdit_etd(){
                const vm = this;
                // const zroh = this.zroh_to_find;
                const editQuery = `UPDATE prominent.t_invoice 
                                    SET ${this.edit_key} = '${this.data_fabric_received[this.edit_index]['etd'].trim()}'
                                    WHERE id = ${this.idToEdit}`;
                if(confirm("Are you sure you want to Update Data ?")){
                    
                    //%%%%%%%% KODE YANG DIJALANKAN %%%%%%%%//
                    $.ajax({
                        type: "post",
                        url: base_url + "update_etd_by_table",
                        data: JSON.stringify(editQuery),
                        success: function (response) {
                            // console.log("this is editQuery function log: ", JSON.parse(response));
                            if(JSON.parse(response) === "success"){
                                vm.fetchReceivedFabricData()
                            }else{
                                alert("Update Failed!");
                            }

                        }
                    });


                    //%%%%%%%% DEBUG %%%%%%%%//
                    // console.group();
                    // console.log(editQuery);
                    // console.log("data type of fab_qty_receievd: ", typeof this.data_fabric_received[this.edit_index]['fab_qty_received'] )
                    // console.groupEnd();
                }else{
                    alert("Update Canceled!");
                }
            },
            queryEdit_fab_received_date(){
                const vm = this;
                // const zroh = this.zroh_to_find;
                const editQuery = `UPDATE prominent.t_invoice 
                                    SET ${this.edit_key} = '${this.data_fabric_received[this.edit_index]['fab_received'].trim()}'
                                    WHERE id = ${this.idToEdit}`;
                if(confirm("Are you sure you want to Update Data ?")){
                    
                    //%%%%%%%% KODE YANG DIJALANKAN %%%%%%%%//
                    $.ajax({
                        type: "post",
                        url: base_url + "update_fab_received_date_by_table",
                        data: JSON.stringify(editQuery),
                        success: function (response) {
                            // console.log("this is editQuery function log: ", JSON.parse(response));
                            if(JSON.parse(response) === "success"){
                                vm.fetchReceivedFabricData()
                            }else{
                                alert("Update Failed!");
                            }

                        }
                    });


                    //%%%%%%%% DEBUG %%%%%%%%//
                    // console.group();
                    // console.log(editQuery);
                    // console.log("data type of fab_qty_receievd: ", typeof this.data_fabric_received[this.edit_index]['fab_qty_received'] )
                    // console.groupEnd();
                }else{
                    alert("Update Canceled!");
                }
            },

            formatDate(inputDate){

                if(inputDate !== null){
                    // Map of months
                   const months = {
                       JAN: '01',
                       FEB: '02',
                       MAR: '03',
                       APR: '04',
                       MAY: '05',
                       JUN: '06',
                       JUL: '07',
                       AUG: '08',
                       SEP: '09',
                       OCT: '10',
                       NOV: '11',
                       DEC: '12'
                   };
   
                   //Split string berdasarkan strip
                   const [day, month, year] = inputDate.split('-');
   
                   //Re-format the year
                   const fullYear = `20${year}`;
   
                   //return the formatted_date
                   return `${fullYear}-${months[month.toUpperCase()]}-${day}`;
                }else{
                    return inputDate;
                }


            }
		},
	});

	const vueApp = app.mount("#edit_fabric_received_container");
});
