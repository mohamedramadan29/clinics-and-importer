<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="data.xlsx"');
readfile('data.xlsx');
?>

<table id="data-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>1234567890</td>
        </tr>
        <tr>
            <td>Jane Doe</td>
            <td>jane@example.com</td>
            <td>0987654321</td>
        </tr>
    </tbody>
</table>
<button onclick="exportTableToExcel('data-table')">Export to Excel</button>

<script src="https://cdn.jsdelivr.net/npm/table-to-excel/dist/tableToExcel.min.js"></script>
<script>
    function exportTableToExcel(tableId) {
        var fileName = 'data.xlsx';
        var sheetName = 'Sheet1';
        var table = document.getElementById(tableId);
        TableToExcel.convert(table, {
            name: sheetName,
            sheet: {
                name: sheetName
            }
        });
    }
</script>