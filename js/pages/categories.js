$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    // if (Object.keys(user).length < 1) {
    //     console.log('redirect to main');
    //     window.location.href = "index.php";
    // }

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');
    $("#category_name").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();


    fetch_all_category('1');

});

$('#pagination').on('click', '.page-numbers', function() {
    var page = $(this).attr('data-id');

    fetch_all_category(page);
});

$('#addcategory').on('hide.bs.modal', function(e) {
    $("#category_name").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();
    $("#category_name").val('');
});


$(document).on("click", ".remove-icon", function() {
    var id = $(this).data('id');

    BootstrapDialog.show({
        title: 'Default Title',
        message: 'Click buttons below.',
        buttons: [{
            label: 'Title 1',
            action: function(dialog) {
                dialog.setTitle('Title 1');
            }
        }, {
            label: 'Title 2',
            action: function(dialog) {
                dialog.setTitle('Title 2');
            }
        }]
    });

});

function resetHelpInLine() {
    $('span.help-inline').each(function() {
        $(this).text('');
    });
}


function refresh() {
    fetch_all_category('1');
}

function save() {
    resetHelpInLine();

    var empty = false;

    $('input[type="text"]').each(function() {
        $(this).val($(this).val().trim());
    });

    if ($('#category_name').val() == '') {
        $('#category_name').next('span').text('Category Name is required.');
        empty = true;
    }

    if (empty == true) {
        alert('Please input all the required fields correctly.');
        return false;
    }

    $.ajax({
        url: '../server/category/index.php',
        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'create_category',
            category_name: $('#category_name').val()
        },
        success: function(response) {
            var decode = response;

            if (decode.success == true) {
                refresh();
                clear_category();
            } else if (decode.success === false) {
                $('#btn-save').button('reset');
                alert(decode.error);
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


function create_category() {
    $("#category_name").prop('disabled', false);
    $("#btn-save").removeAttr('disabled');
    $("#btn-reset").show();
    $("#category_name").val('');

    $('#addcategory').modal('show');
}

function fetch_all_category(page) {
    $('#tbl_category tbody > tr').remove();

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
                        $("#tbl_category tbody").append(html);
                    }
                    $('#pagination').html(decode.pagination);
                    $('#tbl_category').DataTable({
                        responsive: true
                    });
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
    var ipaddress = sessionStorage.getItem("ipaddress");
    $.ajax({
        url: '../server/category/index.php',
        async: true,
        type: 'POST',
        data: {
            command: 'delete_category',
            id: id
        },
        success: function(response) {
            var decode = response;

            if (decode.success == true) {
                refresh();
                clear_category();
            } else if (decode.success === false) {
                alert(decode.msg);
                return;
            }

        }
    });
}
