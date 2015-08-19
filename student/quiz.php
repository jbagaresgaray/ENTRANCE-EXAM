<!DOCTYPE html>
<html lang="en">

<head>

<?php include('includes/head.php'); ?>

</head>

<body>

    <?php include('includes/nav1.php'); ?>
    <div class="jumbotron">
        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h4>
    </div>
    <div class="container">
        <form class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-10">
                        <div class="radio radio-primary">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                Option one is this
                            </label>
                        </div>
                        <div class="radio radio-primary">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Option two can be something else
                            </label>
                        </div>
                        <div class="radio radio-primary">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                Option two can be something else
                            </label>
                        </div>
                        <div class="radio radio-primary">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                                Option two can be something else
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-warning">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
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
