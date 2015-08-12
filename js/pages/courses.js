$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');
    $("#category_name").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();

    $('#tbl_courses').DataTable({
        responsive: true
    });

    fetch_all_course();

});


$('#addcourse').on('hide.bs.modal', function(e) {
    $("#course_name").prop('disabled', true);
    $("#passing_score").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();
    $("#course_name").val('');
    $("#passing_score").val('');
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
    fetch_all_course();
}

function save() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#course_name').val() == '') {
        $('#course_name').next('span').text('Course Name is required.');
        empty = true;
    }

    if ($('#passing_score').val() == '') {
        $('#passing_score').next('span').text('Passing Score is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    if ($("#course_id").val() === '') {
        $.ajax({
            url: '../server/courses/index.php',
            async: false,
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
            data: {
                category_name: $('#category_name').val()
            },
            success: function(response) {
                var decode = response;
                if (decode.success == true) {
                    $('#addcategory').modal('hide');
                    refresh();
                    $.notify("Record successfully saved", "success");
                } else if (decode.success === false) {
                    $('#btn-save').button('reset');
                    $.notify(decode.msg, "error");
                    return;
                }
            },
            error: function(error) {
                console.log("Error:");
                console.log(error.responseText);
                console.log(error.message);
                return;
            }
        });
    } else {
        $.ajax({
            url: '../server/courses/index.php',
            async: false,
            type: 'POST',
            data: {
                category_id: $('#category_id').val(),
                category_name: $('#category_name').val()
            },
            success: function(response) {
                var decode = response;
                console.log('decode: ',decode);
                if (decode.success == true) {
                    $('#addcategory').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    $('#btn-save').button('reset');
                    $.notify(decode.msg, "error");
                    return;
                }
            },
            error: function(error) {
                console.log("Error:");
                console.log(error.responseText);
                console.log(error.message);
                return;
            }
        });
    }
}


function create_course() {
    $("#course_name").prop('disabled', false);
    $("#passing_score").prop('disabled', false);
    $("#btn-save").removeAttr('disabled');
    $("#btn-reset").show();
    $("#course_name").val('');
    $("#passing_score").val('');

    $('#addcourse').modal('show');
}

function fetch_all_course() {
    $('#tbl_courses tbody > tr').remove();

    $.ajax({
        url: '../server/category',
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
                                        <td class="sorting">' + row[i].name + '</td>\
                                        <td class="sorting">' + row[i].name + '</td>\
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
                        $("#tbl_courses tbody").append(html);
                    }
                    $('#pagination').html(decode.pagination);
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
        url: '../server/category/' + id,
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
        url: '../server/category/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                $("#course_name").prop('disabled', false);
                $("#course_id").prop('disabled', false);
                $("#btn-save").removeAttr('disabled');
                $("#btn-reset").show();

                $("#course_name").val(decode.category.name);
                $("#course_id").val(decode.category.id);

                $('#addcategory').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}
