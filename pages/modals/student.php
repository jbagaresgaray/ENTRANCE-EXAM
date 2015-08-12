<div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-user"></i> Add Student</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="id" />
                    <div class="form-group">
                        <input type="text" class="form-control" name="studid" id="studid" placeholder="Student ID" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Mobile No" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password" />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>