$(document).ready(function() {
    fetch_all_user();
});

$('#adduser').on('hide.bs.modal', function(e) {
    clear();
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
    fetch_all_user();
}

function fetch_all_user() {
    $('#tbl_users tbody > tr').remove();
    var target = document.getElementById('target1')
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    $.ajax({
        url: '../server/users/',
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            if (decode) {
                if (decode.users.length > 0) {
                    for (var i = 0; i < decode.users.length; i++) {
                        var row = decode.users;
                        var html = '<tr class="odd">\
                                        <td class="sorting">' + row[i].lname + ', ' + row[i].fname + '</td>\
                                        <td class="sorting">' + row[i].username + '</td>\
                                        <td class="sorting">' + row[i].email + '</td>\
                                        <td class="sorting">' + row[i].mobileno + '</td>\
                                        <td class="sorting">' + row[i].level + '</td>\
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
                        $("#tbl_users tbody").append(html);
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
        url: '../server/users/' + id,
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
        url: '../server/users/' + id,
        async: true,
        type: 'GET',
        headers: {
            'X-Auth-Token': $("input[name='csrf']").val()
        },
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                $("#fname").val(decode.user.fname);
                $("#lname").val(decode.user.lname);
                $("#mobileno").val(decode.user.mobileno);
                $("#email").val(decode.user.email);
                $("#username").val(decode.user.username);
                $("#password").val(decode.user.str_password);
                $("#id").val(decode.user.id);
                $("#level").val(decode.user.level);

                $('#adduser').modal('show');
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


function create_user() {
    $('#adduser').modal('show');
}

function clear() {
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
            url: '../server/users/',
            async: false,
            type: 'POST',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            data: {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                mobileno: $('#mobileno').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                email: $('#email').val(),
                level: $('#level').val()
            },
            success: function(response) {
                var decode = response;
                if (decode.success == true) {
                    $('#adduser').modal('hide');
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
            url: '../server/users/' + $('#id').val(),
            async: false,
            type: 'PUT',
            headers: {
                'X-Auth-Token': $("input[name='csrf']").val()
            },
            data: {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                mobileno: $('#mobileno').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                email: $('#email').val(),
                level: $('#level').val()
            },
            success: function(response) {
                var decode = response;
                console.log('decode: ', decode);
                if (decode.success == true) {
                    $('#adduser').modal('hide');
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
