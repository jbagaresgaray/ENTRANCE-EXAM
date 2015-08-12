$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');
    $("#category_name").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();

    $('#tbl_questions').DataTable({
        responsive: true
    });

    $(function() {
        CKEDITOR.replace('content');
    });

    fetch_categories();
});


function create_question() {
    $('#questionsModal').modal('show');
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