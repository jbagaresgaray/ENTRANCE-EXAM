<div class="modal fade" id="questionsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Manage Questions</h3>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Question</label>
                        <div id="summernote"></div>
                    </div>
                    <div class="form-group well">
                        <label>Primary Image: </label>
                        <input type="file" name="mainpic" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">
                        <label>Correct Answer</label>
                        <input type="text" name="answer" class="form-control" required/>
                        <label>Image: </label>
                        <input type="file" name="correctpic" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">
                        <label>2nd Choice</label>
                        <input type="text" name="choice2" class="form-control" required/> 
                        <label>Image: </label>
                        <input type="file" name="pic2" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">                
                        <label>3rd Choice</label>
                        <input type="text" name="choice3" class="form-control" required/> 
                        <label>Image: </label>
                        <input type="file" name="pic3" class="form-control" accept="image/*" />
                    </div>
                    <div class="form-group well">
                        <label>4th Choice</label>
                        <input type="text" name="choice4" class="form-control" required/> 
                        <label>Image: </label>
                        <input type="file" name="pic4" class="form-control" accept="image/*" />
                    </div>      
                </form>
                <button class="btn btn-primary">Submit Button</button>
                <button class="btn btn-warning">Reset Button</button>
            </div>
            <div class="modal-footer">
                <a id="btn-save" class="btn btn-primary" onclick="save()">Submit</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>