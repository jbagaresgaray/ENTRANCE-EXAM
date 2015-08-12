$(document).ready(function() {
    var user = JSON.parse(window.localStorage['user'] || '{}');

    $('#current_user').html(user.FullName + ' (' + user.GroupName + ')');
    $("#category_name").prop('disabled', true);
    $("#btn-save").attr('disabled', true);
    $("#btn-reset").hide();

    $('#tbl_questions').DataTable({
        responsive: true
    });
    
    $('#summernote').summernote({
      height: 300,                 // set editor height

      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor

      focus: true,                 // set focus to editable area after initializing summernote
    });
});


function create_question() {
    $('#questionsModal').modal('show');
}
