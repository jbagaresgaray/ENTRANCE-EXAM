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

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet">

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


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Questions Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Category Information
                        </div>
                        <div class="panel-body">
                            <form id="frmCategory" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label class="control-label" for="inputCategory">Category</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" required>
                                    <span class="help-inline"></span>
                                </div>
                                <a id="btn-save" class="btn btn-primary" onclick="save()">Submit</a>
                                <a id="btn-reset" class="btn btn-warning" onclick="clear_category()">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-inline form-padding">
                        <form id="frmSearch" role="form">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search Keyword..." required>
                            <button type="submit" name="submitsearch" class="btn btn-success"><i class="fa fa-search"></i> Search</button>                                
                            <a onclick="create_category()" class="btn btn-primary">Add Category</a>
                            <a onclick="refresh()" class="btn btn-primary">Refresh</a>
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of Category
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped" style="margin-bottom:0;" id="tbl_category">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" >
                                            Category Name
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div id="pagination" cellspacing="0"></div>
                        </div>
                    </div>
                </div>
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

    <!-- Bootstrap Validator JavaScript -->
    <script src="../bower_components/bootstrap-validator/dist/validator.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/pages/categories.js" type="text/javascript"></script>

</body>

</html>