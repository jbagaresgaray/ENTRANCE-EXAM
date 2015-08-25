<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add Category</h3>
            </div>
            <div class="modal-body">
                <form id="frmCategory" role="form">
                    <div class="form-group">
                        <input type="hidden" id="category_id" name="category_id">
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
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