<div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add Category</h3>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label class="control-label">Course Name:</label>
                        <input type="hidden" id="course_id" name="course_id">
                        <input type="text" class="form-control" id="course_name" name="course_name">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Passing Score:</label>
                        <input type="text" class="form-control" id="passing_score" name="passing_score">
                        <span class="help-inline"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <a id="btn-save" class="btn btn-primary" onclick="save()">Submit</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>