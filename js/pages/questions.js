jQuery.fn.CKEditorValFor = function(element_id) {
    return CKEDITOR.instances[element_id].getData();
}

$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');

    $('#tbl_questions').DataTable({
        responsive: true
    });


    CKEDITOR.replace('content');

    fetch_categories();
    fetch_all_questions();
    fetch_questions();
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
    $('#tbl_questions tbody > tr').remove();

    var target = document.getElementById('target1')
    var spinner = new Spinner({
        radius: 30,
        length: 0,
        width: 10,
        trail: 40
    }).spin(target);

    $.ajax({
        url: '../server/questions/',
        async: true,
        type: 'GET',
        crossDomain: true,
        dataType: 'json',
        success: function(response) {
            var decode = response;
            console.log('decode: ', decode);
            if (decode) {
                if (decode.questions.length > 0) {
                    for (var i = 0; i < decode.questions.length; i++) {
                        var row = decode.questions;
                        var html = '<tr class="odd">\
                                        <td class="sorting" width="100px">' + row[i].content + '</td>\
                                        <td class="sorting">' + row[i].category + '</td>\
                                        <td class="sorting">' + row[i].courses + '</td>\
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
                        $("#tbl_questions tbody").append(html);
                    }
                    $.notify("All records display", "info");
                }
                spinner.stop();
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

    var CKEDITOR = $().CKEditorValFor('content');

    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
        $.notify('The File APIs are not fully supported in this browser.', 'error');
        return;
    }

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
        return;
    }

    return empty;
}

$("form#frmQuestions").submit(function(e){
    e.preventDefault();
    if (validate() !== true) {
        var formData = new FormData($(this)[0]);
        if ($("#question_id").val() === '') {
             $.ajax({
                 url: '../server/questions/',
                 async: false,
                 type: 'POST',
                 data: formData,
                 success: function(response) {
                     var decode = response;
                     console.log('decode: ', decode);
                     if (decode.success == true) {
                         $('#questionsModal').modal('hide');
                         refresh();
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
        } else {
             $.ajax({
                 url: '../server/questions/' + $('#question_id').val(),
                 async: false,
                 type: 'PUT',
                 data: formData,
                 success: function(response) {
                     var decode = response;
                     console.log('decode: ', decode);
                     if (decode.success == true) {
                         $('#questionsModal').modal('hide');
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
        }
    }
});

function fetch_categories() {
    $.ajax({
        url: '../server/category/',
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var decode = response;
            $('#category_id').empty();
            for (var i = 0; i < decode.category.length; i++) {
                var row = decode.category;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].name + '</option>';
                $("#category_id").append(html);
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
            $('#course_id').empty();
            for (var i = 0; i < decode.courses.length; i++) {
                var row = decode.courses;
                var html = '<option id="' + row[i].id + '" value="' + row[i].id + '">' + row[i].coursename + '</option>';
                $("#course_id").append(html);
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

function deletedata(id) {
    $.ajax({
        url: '../server/questions/' + id,
        async: true,
        type: 'DELETE',
        success: function(response) {
            var decode = response;
            if (decode.success == true) {
                $.notify("Record successfully deleted", "success");
                refresh();
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}

function getData(id) {
    $.ajax({
        url: '../server/questions/' + id,
        async: true,
        type: 'GET',
        success: function(response) {
            var decode = response;
            console.log('response: ', decode);
            if (decode.success == true) {
                $('#questionsModal').modal('show');
            } else if (decode.success === false) {
                $.notify(decode.msg, "error");
                return;
            }

        }
    });
}
