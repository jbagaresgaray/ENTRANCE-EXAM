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

    <!-- Summernote -->
    <link href="../bower_components/summernote/dist/summernote.css" rel="stylesheet">

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
                    <h1 class="page-header">Questions</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Manage Student
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Question</label>
                                            <div id="summernote"></div>
                                        </div>
                                        <div class="form-group well">
                                            <label>Primary Image: </label>
                                            <input type="file" name="mainpic" class="form-control" accept="image/*" />
                                        </div>
                                        <div class="form-group well">
                                            <label>Correct Answer</label>
                                            <input type="text" name="answer" class="form-control" required/>
                                            <label>Image: </label>
                                            <input type="file" name="correctpic" class="form-control" accept="image/*" />
                                        </div>
                                        <div class="form-group well">
                                            <label>2nd Choice</label>
                                            <input type="text" name="choice2" class="form-control" required/> 
                                            <label>Image: </label>
                                            <input type="file" name="pic2" class="form-control" accept="image/*" />
                                        </div>
                                        <div class="form-group well">                
                                            <label>3rd Choice</label>
                                            <input type="text" name="choice3" class="form-control" required/> 
                                            <label>Image: </label>
                                            <input type="file" name="pic3" class="form-control" accept="image/*" />
                                        </div>
                                        <div class="form-group well">
                                            <label>4th Choice</label>
                                            <input type="text" name="choice4" class="form-control" required/> 
                                            <label>Image: </label>
                                            <input type="file" name="pic4" class="form-control" accept="image/*" />
                                        </div>      
                                    </form>
                                    <button class="btn btn-primary">Submit Button</button>
                                    <button class="btn btn-warning">Reset Button</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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

    <!-- SummerNote -->
    <script src="../bower_components/summernote/dist/summernote.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    // popover demo
    $("[data-toggle=popover]").popover();

    $(document).ready(function() {
      $('#summernote').summernote({
          height: 300,                 // set editor height

          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor

          focus: true,                 // set focus to editable area after initializing summernote
        });
    });
    </script>

</body>

</html>
