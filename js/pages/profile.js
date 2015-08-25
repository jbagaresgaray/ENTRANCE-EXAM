$(document).ready(function() {
    currentUser();
});

$('#myTabs a').click(function(e) {
    e.preventDefault();
    $(this).tab('show')
});

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function currentUser() {
    $.ajax({
        url: '../server/users/auth/',
        async: false,
        headers: {
            'X-Auth-Token' : $("input[name='csrf']" ).val()
        },
        type: 'GET',
        success: function(response) {
            $("#fname").val(response.fname);
            $("#lname").val(response.lname);
            $("#email").val(response.email);
            $('#mobileno').val(response.mobileno);
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