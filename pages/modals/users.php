<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa fa-user"></i> Add Student</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="id" id="id"/>
                    <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Mobile No" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password" />
                        <span class="help-inline"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:save()" class="btn btn-primary"> Save</a>
                 <a href="javascript:clear()" class="btn btn-warning"> Reset</a>
                <a class="btn btn-default" data-dismiss="modal">Close</a>
                </form>
            </div>
        </div>
    </div>
</div>
