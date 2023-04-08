<!DOCTYPE html>
<html>

<head>
    <title>Export HTML Table to Excel using PHP and JavaScript</title>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <!-- Include PHPSpreadsheet and its dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
</head>

<body>
    <h1>Export HTML Table to Excel using PHP and JavaScript</h1>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john.doe@example.com</td>
                <td>1234567890</td>
            </tr>
            <tr>
                <td>Jane</td>
                <td>Doe</td>
                <td>jane.doe@example.com</td>
                <td>0987654321</td>
            </tr>
        </tbody>
    </table>

    <button id="export-btn">Export to Excel</button>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        document.getElementById("export-btn").addEventListener("click", function() {
            var table = document.getElementById("myTable");
            var worksheet = XLSX.utils.table_to_sheet(table);
            var workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");
            var wbout = XLSX.write(workbook, {
                bookType: 'xlsx',
                type: 'binary'
            });

            function s2ab(s) {
                var buf = new ArrayBuffer(s.length);
                var view = new Uint8Array(buf);
                for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                return buf;
            }

            var blob = new Blob([s2ab(wbout)], {
                type: "application/octet-stream"
            });

            var fileName = "table.xlsx";
            saveAs(blob, fileName);
        });
    </script>