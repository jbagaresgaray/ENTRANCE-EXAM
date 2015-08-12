$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');
    $("#category_name").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();

    $('#tbl_students').DataTable({
        responsive: true
    });

    fetch_all_student();

});

$(document).on("click", ".remove-icon", function() {
    var id = $(this).data('id');

    BootstrapDialog.show({
        title: 'Delete',
        message: 'Are you sure to delete this record?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                deletedata(id);
                dialog.close();
            }
        }, {
            label: 'No',
            cssClass: 'btn-warning',
            action: function(dialog) {
                dialog.close();
            }
        }]
    });
});

$(document).on("click", ".edit-icon", function() {
    var id = $(this).data('id');
    getData(id);
});

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function refresh() {
    fetch_all_student();
}

function fetch_all_student() {
    $('#tbl_students tbody > tr').remove();

    $.ajax({
        url: '../server/student/',
        async: true,
        type: 'GET',
        crossDomain: true,
        dataType: 'json',
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.category.length > 0) {
                    for (var i = 0; i < decode.category.length; i++) {
                        var row = decode.category;
                        var html = '<tr class="odd">\
                                        <td class="sorting">' + row[i].lname + ', ' + row[i].fname + '</td>\
                                        <td class="sorting">' + row[i].mobileno + '</td>\
                                        <td class=" ">\
                                          <div class="text-right">\
                                            <a class="edit-icon btn btn-success btn-xs" data-id="' + row[i].id + '">\
                                              <i class="fa fa-pencil"></i>\
                                            </a>\
                                            <a class="remove-icon btn btn-danger btn-xs" data-id="' + row[i].id + '">\
                                              <i class="fa fa-remove"></i>\
                                            </a>\
                                          </div>\
                                        </td>\
                                </tr>';
                        $("#tbl_students tbody").append(html);
                    }
                    $.notify("All records display", "info");
                }
            }
        },
        error: function(error) {
            $('#btn-save').button('reset');
            return;
        }
    });
}

function deletedata(id) {
    $.ajax({
        url: '../server/student/' + id,
        async: true,
        type: 'DELETE',
        success: function(response) {
            var decode = response;
            if (decode.success == true) {
                $.notify("Record successfully deleted", "success");
                refresh();
                clear_category();
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}

function getData(id) {
    $.ajax({
        url: '../server/student/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                $("#studid").val(decode.student.studid);
                $("#fname").val(decode.student.fname);
                $("#mobileno").val(decode.student.mobileno);
                $("#username").val(decode.student.username);
                $("#password").val(decode.student.password);
                $("#password2").val(decode.student.password2);
                $("#id").val(decode.student.id);

                $('#addcategory').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}


function create_student() {
    $('#addstudent').modal('show');
}

function create_student_bulk() {
    $('#addbulkstudent').modal('show');
}
