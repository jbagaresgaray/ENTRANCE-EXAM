<!DOCTYPE html>
<html lang="en">

<head>

<?php include('includes/head.php'); ?>

</head>

<body>
    
    <?php include('includes/nav1.php'); ?>

    <div class="container">
         <div class="col-md-6 col-md-offset-3">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="studid" class="col-lg-3 control-label">Student ID</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="studid" placeholder="Student ID">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="col-lg-3 control-label">Firstname</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="fname" placeholder="Firstname">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lname" class="col-lg-3 control-label">Lastname</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="lname" placeholder="Lastname">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" id="email" placeholder="Email Address">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobileno" class="col-lg-3 control-label">Mobile No.</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="mobileno" placeholder="Mobile No.">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-lg-3 control-label">Confirm Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="password2" placeholder="Confirm Password">
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a class="btn btn-primary" onclick="save()">Register</a>
                                    <a class="btn btn-default" onclick="clearFields()">Cancel</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap Material Core JavaScript -->
    <script src="../bower_components/bootstrap-material-design/dist/js/ripples.min.js"></script>
    <script src="../bower_components/bootstrap-material-design/dist/js/material.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Notify -->
    <script src="../bower_components/notifyjs/dist/notify.js"></script>
    <script src="../bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/student/register.js" type="text/javascript"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        $(function() {
            $.material.init();
        });
    </script>
</body>

</html>
