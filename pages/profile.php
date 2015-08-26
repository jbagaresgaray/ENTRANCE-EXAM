<?php 
session_start();

if(!isset($_SESSION['entrance']) || empty($_SESSION['entrance'])){
    header("Location: index.php");
}
?>


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

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/nav-bar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Profile</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="main.php">Dashboard</a>
                        </li>
                        <li class="active">
                           Manage Profile
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Manage Profile
                        </div>
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="myTabs">                                    
                                <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Security Accounts</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="profile">
                                    <br>
                                    <form role="form"  id="frmProfile" class="padding-top">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['users']['id'];?>">
                                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                                        <div class="form-group col-md-6" >
                                            <label>First Name</label>
                                            <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name"/>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name"/ >
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" id= "email" placeholder="Email Address"/>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile No.</label>
                                            <input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Mobile No."/>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a id="btn-save" class="btn btn-primary" onclick="saveProfile()">Update</a>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Clear</button>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <br>
                                    <form role="form"  id="frmAccount" class="padding-top">
                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['users']['id'];?>">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" />
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Password</label>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                                                    <span class="help-inline"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Confirm Password</label>
                                                    <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm Password" />
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a id="btn-save" class="btn btn-primary" onclick="saveAccount()">Update</a>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Clear</button>
                                        </div>
                                    </form>                                        
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/pages/profile.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
