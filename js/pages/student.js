$(document).ready(function() {
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

$(document).on("click", ".result-icon", function() {
    var studentid = $(this).data('studentid');
    var name = $(this).data('name');

    window.sessionStorage['studentid'] = studentid;
    window.sessionStorage['StudentName'] = name;
    window.location.href='flot.php';
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
    var target = document.getElementById('target1')
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    $.ajax({
        url: '../server/student/',
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            console.log('decode: ', decode);
            if (decode) {
                if (decode.student.length > 0) {
                    for (var i = 0; i < decode.student.length; i++) {
                        var row = decode.student;
                        var html = '<tr class="odd">\
                                        <td class="sorting">' + row[i].lname + ', ' + row[i].fname + '</td>\
                                        <td class="sorting">' + row[i].mobileno + '</td>\
                                        <td class=" ">\
                                          <div class="text-right">\
                                            <a class="result-icon btn btn-primary btn-sm" data-name="' + row[i].lname + ', ' + row[i].fname + '" data-studentid="' + row[i].studid + '">\
                                              <i class="fa fa-file-text-o"></i>\
                                            </a>\
                                            <a class="edit-icon btn btn-success btn-sm" data-id="' + row[i].id + '">\
                                              <i class="fa fa-pencil"></i>\
                                            </a>\
                                            <a class="remove-icon btn btn-danger btn-sm" data-id="' + row[i].id + '">\
                                              <i class="fa fa-remove"></i>\
                                            </a>\
                                          </div>\
                                        </td>\
                                </tr>';
                        $("#tbl_students tbody").append(html);
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

function deletedata(id) {
    $.ajax({
        url: '../server/student/' + id,
        async: true,
        type: 'DELETE',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            if (decode.success == true) {
                $.notify("Record successfully deleted", "success");
                refresh();
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
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

function getData(id) {
    $.ajax({
        url: '../server/student/' + id,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                $("#studid").val(decode.student.studid);
                $("#fname").val(decode.student.fname);
                $("#lname").val(decode.student.lname);
                $("#mobileno").val(decode.student.mobileno);
                $("#username").val(decode.student.username);
                $("#password").val(decode.student.password);
                $("#password2").val(decode.student.password2);
                $("#id").val(decode.student.id);

                $('#addstudent').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
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


function create_student() {
    $('#addstudent').modal('show');
}

function create_student_bulk() {
    $('#addbulkstudent').modal('show');
}

function clear() {
    $('#studid').val('');
    $('#fname').val('');
    $('#lname').val('');
    $('#mobileno').val('');
    $('#username').val('');
    $('#password').val('');
    $('#password2').val('');
}

function save() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#studid').val() == '') {
        $('#studid').next('span').text('Student ID is required.');
        empty = true;
    }

    if ($('#fname').val() == '') {
        $('#fname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#lname').val() == '') {
        $('#lname').next('span').text('Last Name is required.');
        empty = true;
    }

    if ($('#email').val() == '') {
        $('#email').next('span').text('Email Address is required.');
        empty = true;
    }

    if ($('#mobileno').val() == '') {
        $('#mobileno').next('span').text('Mobile No is required.');
        empty = true;
    }

    if ($('#username').val() == '') {
        $('#username').next('span').text('Username is required.');
        empty = true;
    }

    if ($('#password').val() == '') {
        $('#password').next('span').text('Password is required.');
        empty = true;
    }

    if ($('#password2').val() == '') {
        $('#password2').next('span').text('Confirm Password is required.');
        empty = true;
    }

    if ($('#password').val() !== $('#password2').val()) {
        $('#password2').next('span').text('Password and Confirm Password must be the same.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    if ($("#id").val() === '') {
        $.ajax({
            url: '../server/student/',
            async: false,
            type: 'POST',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            data: {
                studid: $('#studid').val(),
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                mobileno: $('#mobileno').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                email : $('#email').val()
            },
            success: function(response) {
                var decode = response;
                if (decode.success == true) {
                    $('#addstudent').modal('hide');
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
                if (error.responseText) {
                    var msg = JSON.parse(error.responseText)
                    $.notify(msg.msg, "error");
                }
                return;
            }
        });
    } else {
        $.ajax({
            url: '../server/student/' + $('#id').val(),
            async: false,
            type: 'PUT',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            data: {
                studid: $('#studid').val(),
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                mobileno: $('#mobileno').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                email : $('#email').val()
            },
            success: function(response) {
                var decode = response;
                console.log('decode: ', decode);
                if (decode.success == true) {
                    $('#addstudent').modal('hide');
                    refresh();
                    $.notify("Record successfully updated", "success");
                } else if (decode.success === false) {
                    $.notify(decode.msg, "error");
                    return;
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
}
