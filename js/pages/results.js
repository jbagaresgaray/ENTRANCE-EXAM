$(document).ready(function() {

    // fetch_all_passers();

});



function fetch_all_passers() {
    $('#dataTables-example tbody > tr').remove();

    var target = document.getElementById('target1');
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    $.ajax({
        url: '../server/reports/results',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.data.length > 0) {
                    console.log('decode.data: ', decode.data);
                    for (var i = 0; i < decode.data.length; i++) {
                        var row = decode.data;

                       var html = '<tr class="odd">\
                                    <td>' + row[i].studid + '</td>\
                                    <td>' + row[i].lname + ', ' + row[i].fname + '</td>\
                                    <td class="text-center">' + row[i].TotalScore + '</td>\
                                    <td>' + courses + '</td>\
                                </tr>';

                        $("#dataTables-example tbody").append(html);
                    }
                    $.notify("All records display", "info");
                }
                spinner.stop();
            }
        },
        error: function(error) {
            console.log('error: ', error);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}

function fetch_courses() {
    $.ajax({
        url: '../server/courses/',
        async: false,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            $('#cboFilters').empty();

            $("#cboFilters").append('<option id="0" value="all">All</option>');
            for (var i = 0; i < decode.courses.length; i++) {
                var row = decode.courses;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].coursename + '</option>';
                $("#cboFilters").append(html);
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
            if (error.responseText) {
                var msg = JSON.parse(error.responseText)
                $.notify(msg.msg, "error");
            }
            return;
        }
    });
}
