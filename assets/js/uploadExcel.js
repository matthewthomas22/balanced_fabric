$(document).ready(function () {


    //initialize array outside of event listener 
    let arrayOfUpdateQuery_receivedDate_eta_etd = [];
    let arrayOfDebugQuery = [];
    let arrayOfUpdateQuery_fab_qty_received = [];
    let arrayDebug = [];

    function isValidDate(dateString){
        const regex = /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;

        //Test the dateString with the Regex
        if(!regex.test(dateString)){
            return false;
        }else{
            return true
        }
    }

    function sortAfter2000(dateString){
        const date = new Date(dateString);

        return date.getFullYear() > 2019;
    }

    function convertOtherFormatDate(dateString){
        //split the date by "/"
        const [month, day, year] = dateString.split('/').map(Number);

        // Add 2000 to the year if it's two digits (assuming it's 21st century)
        const fullYear = year < 100 ? 2000 + year : year;

        //Format date into the wanted format which is "yyyy-mm-dd"
        const formattedDate = `${fullYear.toString().padStart(4, '0')}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;

        return formattedDate;
    }

    function convertExcelDate(excelDate) {
        const regex = /^(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])\/\d{2}$/;

        if(!regex.test(excelDate)){
            // Excel serial date starts from 1900-01-01
            const excelStartDate = new Date(1900, 0, 1);
            // Add the Excel date as days to the start date
            const jsDate = new Date(excelStartDate.getTime() + (excelDate - 1) * 24 * 60 * 60 * 1000);
        
            // Format the date as yyyy-mm-dd
            const year = jsDate.getFullYear();
            const month = String(jsDate.getMonth() + 1).padStart(2, '0'); // Months are 0-based
            const day = String(jsDate.getDate()).padStart(2, '0');
        
            return `${year}-${month}-${day}`;
        }else{
            return convertOtherFormatDate(excelDate);
        }
    }

    // const readColumnBasedOnZroh = async (file, targetColumns, filterColumn, filterValue) =>{ //Ini Datanya Per Zroh
    const readColumnBasedOnZroh = async (file, targetColumns) =>{                  //Ini Semua data ga dibagi per Zroh

        document.getElementById('loading_popup').style.display = 'block';

        const fileData = await file.arrayBuffer();
        const workbook = XLSX.read(fileData, {type: 'array'});
        const worksheet = workbook.Sheets[workbook.SheetNames[0]];


        const jsonData = XLSX.utils.sheet_to_json(worksheet, {header: 1}); //Conver to 2D array
        const [ targetColumn1, //fab_inv_no
                targetColumn2, //pr
                targetColumn3, //fab_received_date
                targetColumn4, //etd
                targetColumn5, //eta
                targetColumn6, //fab_inv_po
                targetColumn7, //zroh
                targetColumn8, //fab_qty_inv
                targetColumn9  //fab_qty_received
                                ] = targetColumns
        const targetColumn1Index = XLSX.utils.decode_col(targetColumn1);    //Get 0-based column index FAB_INV_NO
        const targetColumn2Index = XLSX.utils.decode_col(targetColumn2);    //Get 0-based column index PR
        const targetColumn3Index = XLSX.utils.decode_col(targetColumn3);    //Get 0-based column index FAB_RECEIVED_DATE
        const targetColumn4Index = XLSX.utils.decode_col(targetColumn4);    //Get 0-based column index ETD
        const targetColumn5Index = XLSX.utils.decode_col(targetColumn5);    //Get 0-based column index ETA
        const targetColumn6Index = XLSX.utils.decode_col(targetColumn6);    //Get 0-based column index fab_inv_po
        const targetColumn7Index = XLSX.utils.decode_col(targetColumn7);    //Get 0-based column index zroh
        const targetColumn8Index = XLSX.utils.decode_col(targetColumn8);    //Get 0-based column index fab_qty_inv
        const targetColumn9Index = XLSX.utils.decode_col(targetColumn9);    //Get 0-based column index fab_qty_received
        
        
        
        // //Filter rows based on the condition in the filter column
        // const filteredData = jsonData
        // .filter(row => row[filterColumnIndex] === filterValue)
        // .map((row, rowIndex) =>({
        //     rowIndex: rowIndex + 1, //1-based row index
        //     fab_inv_no: row[targetColumn1Index],
        //     pr: row[targetColumn2Index],
        //     fab_received_date: convertExcelDate(row[targetColumn3Index]),
        //     etd: convertExcelDate(row[targetColumn4Index]),
        //     eta: convertExcelDate(row[targetColumn5Index]),
        // })).filter(item => item.fab_inv_no !== undefined && item.pr !== undefined && item.fab_received_date !== undefined && item.etd !== undefined && item.eta !== undefined );
        
        //Ambil semua data tanpa di filter per ZROH
        const filteredData = jsonData.slice(15)
        .map((row, rowIndex) =>({
            rowIndex: rowIndex + 15, // to know what row it is in excel (+15 because sliced the data from 15)
            fab_inv_no: row[targetColumn1Index],
            pr: row[targetColumn2Index],
            fab_received_date: convertExcelDate(row[targetColumn3Index]),
            etd: convertExcelDate(row[targetColumn4Index]),
            eta: convertExcelDate(row[targetColumn5Index]),
            fab_inv_po: row[targetColumn6Index],
            zroh: row[targetColumn7Index],
            fab_qty_inv: row[targetColumn8Index],
            fab_qty_received: row[targetColumn9Index],
        }))
        .filter(
                item => item.fab_inv_no !== undefined 
                        && item.pr !== undefined 
                        && item.fab_received_date !== undefined 
                        && item.etd !== undefined 
                        && item.eta !== undefined 
                        && item.fab_inv_po !== undefined 
                        && item.zroh !== undefined 
                        && item.fab_qty_inv !== undefined 
                        && item.fab_qty_received !== undefined 
                );


        // Hide Loading Pop Up 
        document.getElementById('loading_popup').style.display = 'none';


        // const tableBody = document.querySelector('#confirmation_popup_table tbody');
        // //Display Data as a table 
        // filteredData.forEach(row =>{
        //     //Create row element
        //     const tr = document.createElement('tr');

        //     Object.values(row).forEach(cellData => {
        //         //Create <td> Element
        //         const td = document.createElement('td');
        //         td.textContent = cellData;
        //         tr.appendChild(td); //append the <td> element into the <tr> element
        //     });

        //     tableBody.append(tr);

        // })

        // document.getElementById('confirmation_popup').style.display = 'block'

        // console.log('Filter Column Data:', jsonData.map(row => row[filterColumnIndex]));

        //DEBUG DATA
        filteredData.forEach(row =>{
            // let receivedDate = convertExcelDate(row[2]);

            
            if(row['fab_inv_no'] == "undefined" || row['fab_inv_no'] == undefined){
                let updateQuery = `SELECT * FROM prominent.t_invoice  WHERE fab_inv_no = '${row['fab_inv_no']}'`
                arrayOfDebugQuery.push(updateQuery);
            }else{
                let updateQuery = `SELECT * FROM prominent.t_invoice  WHERE fab_inv_no = '${row['fab_inv_no']}' AND pr = '${row['pr']}'`
                arrayOfDebugQuery.push(updateQuery);
            }
            // console.log(row);   //Each row is an array
            // arrayOfDebugQuery
        });

        // && isValidDate(row['eta']) && isValidDate(row['etd']) &&  isValidDate(row['fab_received_date'])

        filteredData.forEach(row =>{
            // let receivedDate = convertExcelDate(row[2]);

            if(sortAfter2000(row['etd']) && sortAfter2000(row['etd']) && sortAfter2000(row['fab_received_date']) ){

                 //Query to update fab_qty_received
                 let fab_qty_received_update_query = `	
                        UPDATE prominent.t_invoice_detail
                            SET fab_qty_received = ${row['fab_qty_received']}
                        WHERE id = (

                            SELECT 
                                id_detail -- > adalah id di t_invoice_detail
                            FROM 
                                prominent.v_fabric_received
                            WHERE
                                fab_inv_no = '${row['fab_inv_no']}'
                                AND pr = '${row['pr']}'
                                AND fab_inv_po = '${row['fab_inv_po']}'
                                AND etd = '${row['etd']}'
                                AND eta = '${row['eta']}'
                                AND zroh = '${row['zroh']}'
                                AND fab_qty_inv = ${row['fab_qty_inv']}
                        )`;
                if(fab_qty_received_update_query.includes("NaN-NaN-Nan") || fab_qty_received_update_query.includes("undefined")){
                    arrayDebug.push(fab_qty_received_update_query);
                }

                 arrayOfUpdateQuery_fab_qty_received.push(fab_qty_received_update_query);

                if(row['fab_received_date'] == "NaN-NaN-NaN"){
                    console.log(`fab_inv_no = ${row['fab_inv_no']}\nReceived Date belum ada`);
                }else if((row['fab_inv_no'] == "undefined" || row['fab_inv_no'] == undefined) && row['fab_received_date'] != "NaN-NaN-NaN"){

                    // UPDATE prominent.t_invoice SET fab_received =  '${receivedDate}' WHERE fab_inv_no = '${row[0]}'
                    let updateQuery = `UPDATE prominent.t_invoice SET fab_received = '${row['fab_received_date']}', etd = '${row['etd']}', eta = '${row['eta']}'WHERE fab_inv_no = '${row['fab_inv_no']}'`
                    arrayOfUpdateQuery_receivedDate_eta_etd.push(updateQuery);


                }else{

                    let updateQuery = `UPDATE prominent.t_invoice SET fab_received = '${row['fab_received_date']}', etd = '${row['etd']}', eta = '${row['eta']}' WHERE fab_inv_no = '${row['fab_inv_no']}' AND pr = '${row['pr']}'`
                    arrayOfUpdateQuery_receivedDate_eta_etd.push(updateQuery);

                }
            }
            // console.log(row);   //Each row is an array
            // arrayOfDebugQuery
        });

        // console.log("This is Select query to DEBUG:", arrayOfDebugQuery);
        // console.log("This is UPDATE query to Update data:", arrayOfUpdateQuery_receivedDate_eta_etd);

        // console.log(`Filtered Data (Columns ${targetColumn1} & ${targetColumn2} & ${targetColumn3} `, filteredData);

        console.log("THIS IS filtered and chosen DATA: \n", filteredData);

        console.log("this is new array for update fab_qty_received\n",arrayOfUpdateQuery_fab_qty_received);
        console.log("this is new array for debugging\n",arrayDebug);

    }

    const fileInput = document.getElementById('excelFile');
    // const zrohInput = document.getElementById('zrohToUpdate');


   function processFile(){
        const file = fileInput.files[0];

        // const zrohToUpdate = Number(zrohInput.value);                            //Kalau Mau filter per Zroh

        // if(isNaN(zrohToUpdate)){
        //     alert("Cek Zroh yang akan diupdate!")
        //     return;
        // }
        
        if(!file) return;

        // readColumnBasedOnZroh(file, ['K','L','U','R','S'], 'G', zrohToUpdate);   //Kalau Mau filter per Zroh
        readColumnBasedOnZroh(file, ['K','L','U','R','S', 'P', 'G', 'Q', 'T']);

        // const reader = new FileReader();
        // reader.onload = (e) =>{
        //     const data = new Uint8Array(e.target.result);

        //     const workbook = XLSX.read(data, {type: 'array'});

        //     // get the first sheet name
        //     const firstSheetName = workbook.SheetNames[0];
        //     // get the worksheet data
        //     const worksheet = workbook.Sheets[firstSheetName];


        //     //Detect the range of table 
        //     const range = XLSX.utils.decode_range(worksheet['!ref']); //Get the range of the sheet
        //     console.log("Detected Range: ", range);

        //     // Convert Data by Range to JSON
        //     const jsonData = XLSX.utils.sheet_to_json(worksheet, {
        //         header: 1,
        //         range: range,       // Automatically detect the existing data table
        //         blankrows: false    // Exclude completely blank rows
        //     })

        //     function convertExcelDate(excelDate) {
        //         // Excel serial date starts from 1900-01-01
        //         const excelStartDate = new Date(1900, 0, 1);
        //         // Add the Excel date as days to the start date
        //         const jsDate = new Date(excelStartDate.getTime() + (excelDate - 1) * 24 * 60 * 60 * 1000);
            
        //         // Format the date as yyyy-mm-dd
        //         const year = jsDate.getFullYear();
        //         const month = String(jsDate.getMonth() + 1).padStart(2, '0'); // Months are 0-based
        //         const day = String(jsDate.getDate()).padStart(2, '0');
            
        //         return `${year}-${month}-${day}`;
        //     }


        //     // console.log(jsonData);

            

        //     //Display data
            // jsonData.forEach(row =>{
            //     let receivedDate = convertExcelDate(row[2]);
            //     if(row[1] == "undefined" || row[1] == undefined){
            //         let updateQuery = `UPDATE prominent.t_invoice SET fab_received =  '${receivedDate}' WHERE fab_inv_no = '${row[0]}'`;
            //         arrayOfUpdateQuery_receivedDate_eta_etd.push(updateQuery);
            //     }else{
            //         let updateQuery = `UPDATE prominent.t_invoice SET fab_received =  '${receivedDate}' WHERE fab_inv_no = '${row[0]}' AND pr = '${row[1]}'`;
            //         arrayOfUpdateQuery_receivedDate_eta_etd.push(updateQuery);
            //     }
                
            //     // console.log(row);   //Each row is an array
            // });

            // //DEBUG DATA
            // jsonData.forEach(row =>{
            //     let receivedDate = convertExcelDate(row[2]);
            //     if(row[1] == "undefined" || row[1] == undefined){
            //         let updateQuery = `SELECT * FROM prominent.t_invoice  WHERE fab_inv_no = '${row[0]}'`
            //         arrayOfDebugQuery.push(updateQuery);
            //     }else{
            //         let updateQuery = `SELECT * FROM prominent.t_invoice  WHERE fab_inv_no = '${row[0]}' AND pr = '${row[1]}'`
            //         arrayOfDebugQuery.push(updateQuery);
            //     }
            //     // console.log(row);   //Each row is an array
            //     // arrayOfDebugQuery
            // });

        // };
        // reader.readAsArrayBuffer(file);
        // console.log("THIS IS DATA FOR DEBUG\n", arrayOfDebugQuery);
        // console.log("THIS IS DATA FOR DEBUG\n", arrayOfUpdateQuery_receivedDate_eta_etd);
   };

//    document.getElementById('confirmation_popup_submitButton').addEventListener('click', function(){
//         // $.ajax({
//         //     type: "post",
//         //     url: "http://192.168.100.163/balanced_fabric/Fab_received/update_fab_received_date",
//         //     data: JSON.stringify(arrayOfUpdateQuery_receivedDate_eta_etd),
//         //     success: function (response) {
//         //         console.log("THIS IS update_fab_received_date: \n ", JSON.parse(response));
//         //     }
//         // });
//         if(confirm("Apakah Data yang akan diupdate sudah benar ?")){
//             console.log("This Log is from submit Button Confirmation Pop UP", arrayOfUpdateQuery_receivedDate_eta_etd);
//             document.getElementById('confirmation_popup').style.display = 'none'
//         }else{
//             alert("Silahkan Cek data Kembali");
//         }
//    });

//    document.getElementById('confirmation_popup_cancelButton').addEventListener('click', function(){
//         document.getElementById('confirmation_popup').style.display = 'none'
//         fileInput.value = "";
//         zrohInput.disabled = true;
//    });

   document.getElementById('updateDataModal_closeButton').addEventListener('click', function(){
        // zrohInput.disabled = true;
        fileInput.value = "";
        document.getElementById('')
   })

//    fileInput.addEventListener('change',()=>{
//         zrohInput.disabled = false;
//    });

//    const clueForUser = document.getElementById('clueForUser');

//    zrohInput.addEventListener('input', ()=>{
//         clueForUser.textContent = "Silahkan Pencet Enter untuk Cek Data!";
//    });

//    zrohInput.addEventListener('keydown',function(event){
//         if(event.key === "Enter" && zrohInput.value != ""){
//             processFile();
//             clueForUser.textContent = "";
//         }
//    });

//    zrohInput.addEventListener('blur', ()=>{
//         clueForUser.textContent = "";
//    });

   document.getElementById('update_data_uploadExcel').addEventListener('click', function(){

    processFile();
    // console.log("This Log is from submit Button: ", arrayOfUpdateQuery_receivedDate_eta_etd);
   });

   document.getElementById('submit_data_uploadExcel').addEventListener('click', ()=>{
    if(confirm('Apakah anda yakin untuk Update Data Fabric ?')){
        $.ajax({
            type: "post",
            url: "http://192.168.100.163/balanced_fabric/Fab_received/update_fab_received_date",
            data: JSON.stringify(arrayOfUpdateQuery_receivedDate_eta_etd),
            success: function (response) {
                console.log("THIS IS update_fab_received_date: \n ", JSON.parse(response));
                if(JSON.parse(response) == "Transaction committed!"){
                    alert("Fabric Received Date, ETA, ETD  Succesfully Updated!");
                }
            }
        });
        $.ajax({
            type: "post",
            url: "http://192.168.100.163/balanced_fabric/Fab_received/update_fab_qty_received",
            data: JSON.stringify(arrayOfUpdateQuery_fab_qty_received),
            success: function (response) {
                console.log("THIS IS update_fab_qty_received: \n ", JSON.parse(response));
                if(JSON.parse(response) == "Transaction committed!"){
                    alert("Fabric Quantity Receieved Succesfully Updated!");
                }
            }
        });
    }else{
        alert("Data Tidak DiUpdate!");
    }
   });
});