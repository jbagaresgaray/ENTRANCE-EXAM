<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ENTRACE EXAM</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="../bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Bootstrap Material CSS -->
    <link href="../bower_components/bootstrap-material-design/dist/css/roboto.min.css" rel="stylesheet">
    <!-- <link href="../bower_components/bootstrap-material-design/dist/css/material.min.css" rel="stylesheet"> -->
    <link href="../bower_components/bootstrap-material-design/dist/css/material-fullpalette.min.css" rel="stylesheet">
    <link href="../bower_components/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
                                <label for="inputFirstName" class="col-lg-3 control-label">Firstname</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLastname" class="col-lg-3 control-label">Lastname</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="inputLastname" placeholder="Lastname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMobileNo" class="col-lg-3 control-label">Mobile No.</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="inputMobileNo" placeholder="Mobile No.">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUsername" class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="inputUsername" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCPassword" class="col-lg-3 control-label">Confirm Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="inputCPassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a class="btn btn-primary">Submit</a>
                                    <a class="btn btn-default">Cancel</a>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        $(function() {
            $.material.init();
        });
    </script>
</body>

</html>
