$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

function exportToExcel(obj, elem, sheetname) {
    return ExcellentExport.excel(obj, elem, sheetname);
}

