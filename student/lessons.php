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
    <div id="target1"></div>
    <div class="jumbotron">
        <h1 class="text-center">Entrance Test</h1>
        <p class="lead">Use this document as a way to quickly start any new project.</p>
    </div>
    <div class="container">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
        <div id="lessons"></div>
    </div><!-- /.container -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap Material Core JavaScript -->
    <script src="../bower_components/bootstrap-material-design/dist/js/ripples.min.js"></script>
    <script src="../bower_components/bootstrap-material-design/dist/js/material.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- spinJS -->
    <script src="../bower_components/spin.js/spin.js"></script>
    <!-- Notify -->
    <script src="../bower_components/notifyjs/dist/notify.js"></script>
    <script src="../bower_components/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/student/lessons.js" type="text/javascript"></script>
</body>

</html>
