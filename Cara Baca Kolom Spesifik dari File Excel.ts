const readAndFilterColumn = async (file, targetColumn, filterColumn, filterValue) => {
    const fileData = await file.arrayBuffer();
    const workbook = XLSX.read(fileData, { type: 'array' });
    const worksheet = workbook.Sheets[workbook.SheetNames[0]]; // Access the first sheet

    const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 }); // Convert to 2D array
    const targetColumnIndex = XLSX.utils.decode_col(targetColumn); // Get index of the target column
    const filterColumnIndex = XLSX.utils.decode_col(filterColumn); // Get index of the filter column

    // Filter rows based on the condition in the filter column
    const filteredData = jsonData
        .filter((row) => row[filterColumnIndex] === filterValue) // Check if the filter column matches the condition
        .map((row, rowIndex) => ({
            rowIndex: rowIndex + 1, // 1-based row index
            value: row[targetColumnIndex], // Value in the target column
        }))
        .filter(item => item.value !== undefined); // Exclude empty rows

    console.log(`Filtered Data (Column ${targetColumn} where Column ${filterColumn} = "${filterValue}")`, filteredData);
};

// Usage example
document.getElementById('upload').addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        readAndFilterColumn(file, 'B', 'A', 'Valid'); // Example: Read column 'B' where column 'A' has 'Valid'
    }
});
