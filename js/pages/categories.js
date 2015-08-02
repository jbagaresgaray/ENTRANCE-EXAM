$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    if (Object.keys(user).length < 1) {
        console.log('redirect to main');
        window.location.href = "index.php";
    }

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');
    $("#category_name").prop('disabled', true);

    fetch_all_category('1');

});


function refresh() {
    fetch_all_category('1');
}


$('#pagination').on('click', '.page-numbers', function() {
    var page = $(this).attr('data-id');

    fetch_all_category(page);
});


function save() {
    $('#frmCategory').validator('validate');

    $.ajax({
        url: '../server/category/index.php',
        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'create_category',
            category_name:  $('#category_name').val()
        },
        success: function(response) {
            var decode = response;

            if (decode.success == true) {
                $('#btn-save').button('reset');
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

function clear_category() {
    $("#category_name").prop('disabled', true);
    $("#category_name").val('');
}

function create_category() {
    $("#category_name").prop('disabled', false);
    $("#category_name").val('');
}

function fetch_all_category(page) {
    $('#tbl_category tbody > tr').remove();

    $.ajax({
        url: '../server/category/index.php',
        async: true,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'read_category',
            page: page
        },
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
	                                        <a class="edit-college-icon btn btn-success btn-xs" data-id="' + row[i].id + '">\
	                                          <i class="fa fa-pencil"></i>\
	                                        </a>\
	                                        <a class="remove-college-icon btn btn-danger btn-xs" data-id="' + row[i].id + '">\
	                                          <i class="fa fa-remove"></i>\
	                                        </a>\
	                                      </div>\
	                                    </td>\
                                </tr>';
                        $("#tbl_category tbody").append(html);
                    }
                    $('#pagination').html(decode.pagination);
                    var resort = true;
                    $("table").trigger("update", [resort]);
                }
            }
        },
        error: function(error) {
            $('#btn-save').button('reset');
            return;
        }
    });
}
