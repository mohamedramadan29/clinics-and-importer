<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Ajax Tab Container</title>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,',
                template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                base64 = function(s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                },
                format = function(s, c) {
                    return s.replace(/{(\w+)}/g, function(m, p) {
                        return c[p];
                    })
                }
            return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {
                    worksheet: name || 'Worksheet',
                    table: table.innerHTML
                }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>
    <style type="text/css">
        .green {
            background-color: green;
        }
    </style>
</head>

<body>
    <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel" />

    <table style="border: 2px solid #ccc;" id="testTable" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2">
        <caption>
            CODE-PAGE SUPPORT IN MICROSOFT WINDOWS
        </caption>
        <colgroup align="center"></colgroup>
        <colgroup align="left"></colgroup>
        <colgroup span="2" align="center"></colgroup>
        <colgroup span="3" align="center"></colgroup>
        <thead valign="top">
            <tr>
                <th>Code-Page<br />ID</th>
                <th style="background-color: #00f;">Name</th>
                <th>ACP</th>
                <th>OEMCP</th>
                <th>Windows<br />NT 3.1</th>
                <th>Windows<br />NT 3.51</th>
                <th>Windows<br />95</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1200</td>
                <td style="background-color: #00f; color: #fff">Unicode (BMP of ISO/IEC-10646)</td>
                <td></td>
                <td></td>
                <td>X</td>
                <td>X</td>
                <td>*</td>
            </tr>
            <tr>
                <td>1250</td>
                <td style="font-weight: bold">
                    <a href="http://www.jquery2dotnet.com/">http://www.jquery2dotnet.com/</a>
                </td>
                <td>X</td>
                <td></td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td class="green">1255</td>
                <td>Hebrew</td>
                <td>X</td>
                <td></td>
                <td></td>
                <td></td>
                <td>X</td>
            </tr>
            <tr>
                <td>437</td>
                <td>MS-DOS United States</td>
                <td></td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td>708</td>
                <td>Arabic (ASMO 708)</td>
                <td></td>
                <td>X</td>
                <td></td>
                <td></td>
                <td>X</td>
            </tr>
            <tr>
                <td>709</td>
                <td>Arabic (ASMO 449+, BCON V4)</td>
                <td></td>
                <td>X</td>
                <td></td>
                <td></td>
                <td>X</td>
            </tr>
            <tr>
                <td>710</td>
                <td>Arabic (Transparent Arabic)</td>
                <td></td>
                <td>X</td>
                <td></td>
                <td></td>
                <td>X</td>
            </tr>
        </tbody>
    </table>
</body>

</html>