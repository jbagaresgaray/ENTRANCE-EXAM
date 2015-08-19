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
    fetch_questions();
});


function create_question() {
    $('#questionsModal').modal('show');
}

function clear() {

}

function refresh() {
    fetch_categories();
    fetch_all_questions();
    fetch_questions();
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

function validate() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    var CKEDITOR = CKEDITOR.instances['content'].getData();

    if ($('#select_category').val() == '') {
        $('#select_category').next('p').text('Question Category is required.');
        empty = true;
    }

    if (CKEDITOR == '') {
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
        return true;
    }

    return empty;
}

function save() {

    if (validate() !== true) {

        var data = {
            course_id: $('#select_course').val(),
            category_id: $('#select_category').val(),
            content:  CKEDITOR.instances['content'].getData(),
            answer: $('#answer').val(),
            choice2: $('#choice2').val(),
            choice3: $('#choice3').val(),
            choice4: $('#choice4').val()
        };

        if ($("#mainpic").get(0).files[0]) {
            if ($("#mainpic").get(0).files[0].result) {
                data.file = $("#mainpic").get(0).files[0].result;
            } else {
                data.file = '';
            }
        } else if (path !== '') {
            data.file = path;
        } else {
            data.file = '';
        }


        if ($("#correctpic").get(0).files[0]) {
            if ($("#correctpic").get(0).files[0].result) {
                data.correctpic = $("#correctpic").get(0).files[0].result;
            } else {
                data.correctpic = '';
            }
        } else if (path !== '') {
            data.correctpic = path;
        } else {
            data.correctpic = '';
        }

        if ($("#pic2").get(0).files[0]) {
            if ($("#pic2").get(0).files[0].result) {
                data.pic2 = $("#pic2").get(0).files[0].result;
            } else {
                data.pic2 = '';
            }
        } else if (path !== '') {
            data.pic2 = path;
        } else {
            data.pic2 = '';
        }

        if ($("#pic3").get(0).files[0]) {
            if ($("#pic3").get(0).files[0].result) {
                data.pic3 = $("#pic3").get(0).files[0].result;
            } else {
                data.pic3 = '';
            }
        } else if (path !== '') {
            data.pic3 = path;
        } else {
            data.pic3 = '';
        }

        if ($("#pic4").get(0).files[0]) {
            if ($("#pic4").get(0).files[0].result) {
                data.pic4 = $("#pic4").get(0).files[0].result;
            } else {
                data.pic4 = '';
            }
        } else if (path !== '') {
            data.pic4 = path;
        } else {
            data.pic4 = '';
        }

        console.log('data: ',data);

       /* if ($("#question_id").val() === '') {
            $.ajax({
                url: '../server/questions/',
                async: false,
                type: 'POST',
                crossDomain: true,
                dataType: 'json',
                data: data,
                success: function(response) {
                    var decode = response;
                    if (decode.success == true) {
                        $('#addcourse').modal('hide');
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
                url: '../server/questions/' + $('#question_id').val(),
                async: false,
                type: 'PUT',
                data: data,
                success: function(response) {
                    var decode = response;
                    console.log('decode: ', decode);
                    if (decode.success == true) {
                        $('#addcourse').modal('hide');
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
                    return;
                }
            });
        }*/
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
            console.log('data: ', response);
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

function fetch_questions() {
    $.ajax({
        url: '../server/courses/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            console.log('data: ', response);
            $('#select_course').empty();
            for (var i = 0; i < decode.courses.length; i++) {
                var row = decode.courses;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].coursename + '</option>';
                $("#select_course").append(html);
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
