<?php 
session_start();

if(!isset($_SESSION['entrance_student']) || empty($_SESSION['entrance_student'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include('includes/head.php'); ?>

</head>

<body>

    <?php include('includes/nav3.php'); ?>
    <div class="jumbotron text-center">
        <img src="../dist/photo.jpg" width="120px" alt="..." class="img-circle img-thumbnail">
        <h3 class="text-center"><?php echo $_SESSION['entrance_student']['fname'].' '. $_SESSION['entrance_student']['lname'];?></h3>
    </div>
    <div class="container">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo  $_SESSION['entrance_student']['id']; ?>">
        <input type="hidden" id="student_id" name="student_id" value="<?php echo  $_SESSION['entrance_student']['studid']; ?>">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
        <a href="results.php" class="btn btn-primary btn-lg btn-block">View Results</a>
        <a href="category.php" class="btn btn-primary btn-lg btn-block">View Detailed Results</a>
        <a href="#" data-toggle="modal"  data-target="#profileModal" class="btn btn-info btn-lg btn-block">Update Profile</a>
        <a href="#" data-toggle="modal"  data-target="#accountModal" class="btn btn-info btn-lg btn-block">Update Account</a>
        <a href="logout.php" class="btn btn-inverse btn-lg btn-block">Logout</a>
    </div><!-- /.container -->

    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Profile</h3>
                </div>
                <div class="modal-body">
                    <form id="frmCategory" role="form">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $_SESSION['entrance_student']['email']; ?>" required>
                            <span class="help-inline"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Mobile No." value="<?php echo $_SESSION['entrance_student']['mobileno']; ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a id="btn-save" class="btn btn-primary" onclick="saveProfile()">Save</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Account</h3>
                </div>
                <div class="modal-body">
                    <form id="frmCategory" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $_SESSION['entrance_student']['username']; ?>" required>
                            <span class="help-inline"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <span class="help-inline"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
                            <span class="help-inline"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a id="btn-save" class="btn btn-primary" onclick="saveAccount()">Save</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    <!-- HolderJS Plugin JavaScript -->
    <script src="../bower_components/holderjs/src/holder.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/student/profile.js" type="text/javascript"></script>
</body>

</html>
