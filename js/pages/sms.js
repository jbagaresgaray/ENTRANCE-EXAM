$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');

});

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}


function resetRegular(){
	$('#txtMessages').val('');
	$('#mobileNo').val('');

	resetHelpInLine();
}


function send() {
	resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#mobileNo').val() == '') {
        $('#mobileNo').next('span').text('Mobile Number is required.');
        empty = true;
    }

    if ($('#txtMessages').val() == '') {
        $('#txtMessages').next('span').text('Message content is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }

    $.ajax({
        url: '../server/sms/',
        async: true,
        type: 'POST',
        data:{
        	number: $('#mobileNo').val(),
        	message: $('#txtMessages').val()
        },
        success: function(response) {
            var decode = response;
            if (decode.number == 0) {
            	$.notify(decode.response, "success");
                resetRegular();
            } else {
                $.notify(decode.response, "error");
                return;
            }

        }
    });
}


function bulksend() {

}
