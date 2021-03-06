<!DOCTYPE html>
<html lang="en">

<head>

<?php include('includes/head.php'); ?>

</head>

<body>

    <?php include('includes/nav1.php'); ?>
    <div class="jumbotron">
        <h4>Thank you for using our app. <br><br>Our System will send you a message about your Examination Results.</h4>
        </br>
        <small>If you still not receive the Exam Result. <br>Go to the View Results or Detailed Results at your Profile.</small>
    </div>
    <div class="container">
        <a href="main.php" class="btn btn-primary btn-lg btn-block">Go to Home</a>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        $(function() {
            $.material.init();
        });
    </script>
</body>

</html>
