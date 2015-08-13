$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');

    $('#studid').val('');
    $('#fname').val('');
    $('#lname').val('');
    $('#mobileno').val('');
    $('#username').val('');
    $('#password').val('');
    $('#password2').val('');
});

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function clear(){
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
        $('#lname').next('span').text('First Name is required.');
        empty = true;
    }

    if ($('#mobileno').val() == '') {
        $('#mobileno').next('span').text('Mobile No is required.');
        empty = true;
    }

    if ($('#username').val() == '') {
        $('#username').parent().next('span').text('Username is required.');
        empty = true;
    }

    if ($('#password').val() == '') {
        $('#password').parent().next('span').text('Password is required.');
        empty = true;
    }

    if ($('#password2').val() == '') {
        $('#password2').parent().next('span').text('Confirm Password is required.');
        empty = true;
    }

    if ($('#password').val() !== $('#password2').val()) {
        $('#password2').parent().next('span').text('Password and Confirm Password must be the same.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    $.ajax({
        url: '../server/student/',
        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            studid: $('#studid').val(),
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            mobileno: $('#mobileno').val(),
            username: $('#username').val(),
            password: $('#password').val(),
        },
        success: function(response) {
            var decode = response;
            if (decode.success == true) {
                clear();
                $.notify("Record successfully saved", "success");
            } else if (decode.success === false) {
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