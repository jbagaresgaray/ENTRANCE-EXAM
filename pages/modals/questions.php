<div class="modal fade" id="questionsModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" id="frmQuestions" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3>Manage Questions</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="question_id" id="question_id">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category_id" name="category_id"></select>
                    </div>
                    <div class="form-group">
                        <label>Course</label>
                        <select class="form-control" id="course_id" name="course_id"></select>
                    </div>
                    <div class="form-group">
                        <label>Question</label>
                        <textarea class="ckeditor" name="content" id="content"></textarea>
                    </div>
                    <div class="form-group well">
                        <label>Primary Image: </label>
                        <input type="file" name="mainpic" id="mainpic" class="form-control" accept="image/*" />
                        <p class="help-inline"></p>
                    </div>
                    <div class="form-group well">
                        <label>Correct Answer</label>
                        <input type="text" name="answer" id="answer" class="form-control" required/>
                        <p class="help-inline"></p>
                        <label>Image: </label>
                        <input type="file" name="correctpic" id="correctpic" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">
                        <label>2nd Choice</label>
                        <input type="text" name="choice2" id="choice2" class="form-control" required/> 
                        <p class="help-inline"></p>
                        <label>Image: </label>
                        <input type="file" name="pic2" id="pic2" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">                
                        <label>3rd Choice</label>
                        <input type="text" name="choice3" id="choice3" class="form-control" required/> 
                        <p class="help-inline"></p>
                        <label>Image: </label>
                        <input type="file" name="pic3" id="pic3" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">
                        <label>4th Choice</label>
                        <input type="text" name="choice4" id="choice4" class="form-control" required/>
                        <p class="help-inline"></p>
                        <label>Image: </label>
                        <input type="file" name="pic4" id="pic4" class="form-control" accept="image/*" />
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
