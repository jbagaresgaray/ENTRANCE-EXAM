$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');

    $('#tbl_questions').DataTable({
        responsive: true
    });

    $(function() {
        CKEDITOR.replace('content');
    });

    fetch_categories();
    fetch_all_questions();
});


function create_question() {
    $('#questionsModal').modal('show');
}

function clear(){

}

function refresh(){

}

function fetch_all_questions() {
    $('#tbl_students tbody > tr').remove();

    $.ajax({
        url: '../server/student/',
        async: true,
        type: 'GET',
        crossDomain: true,
        dataType: 'json',
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

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}

function save(){
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#select_category').val() == '') {
        $('#select_category').next('p').text('Question Category is required.');
        empty = true;
    }

    if ($('#content').val() == '') {
        $('#content').next('p').text('Question Content is required.');
        $.notify('Question Content is required.', "error");
        empty = true;
    }

    if ($('#answer').val() == '') {
        $('#answer').next('p').text('Question Answer is required.');
        empty = true;
    }

    if ($('#choice2').val() == '') {
        $('#choice2').next('p').text('Question 2nd Choice is required.');
        empty = true;
    }

    if ($('#choice3').val() == '') {
        $('#choice3').next('p').text('Question 3rd Choice is required.');
        empty = true;
    }

    if ($('#choice4').val() == '') {
        $('#choice4').next('p').text('Question 4th Choice is required.');
        empty = true;
    }

    if (empty == true) {
        $.notify('Please input all the required fields correctly.', "error");
        return false;
    }
}

function fetch_categories() {
    $.ajax({
        url: '../server/category/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            console.log('data: ',response);
            $('#select_category').empty();
            for (var i = 0; i < decode.category.length; i++) {
                var row = decode.category;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].name + '</option>';
                $("#select_category").append(html);
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