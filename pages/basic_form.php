<?php
session_start();				
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../vendor/bootstrap/css/custom.css" rel="stylesheet">

    <style type="text/css">
        .btn-custom:active {
            background-color: #555555;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
        if(isset($_SESSION['userEnrollment']))
        {   
            header("location: index.php");
        }
    ?>
</head>
<body>
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand special" href="index.html">I-Exchange</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-th fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a><i class="fa fa-user fa-fw"></i><del> User Profile</del></a>
                        </li>
                        <li><a><i class="fa fa-gear fa-fw"></i><del> Settings</del></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="space text-center">
                            <h4>Most Discussed Topics<br><br></h4>
                        </li>
                        <li class="text-center relative">
                            <a href="1.html">1</a>
                        </li>
                        <li class="text-center relative">
                            <a href="2.html">2</a>
                        </li>
                        <li class="text-center relative">
                            <a href="3.html">3</a>
                        </li>
                        <li class="text-center relative">
                            <a href="4.html">4</a>
                        </li>
                        <li class="text-center relative">
                            <a href="6.html">5</a>
                        </li>
                        <li class="text-center relative">
                            <a href="6.html">6</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>




        <!--php or javascript to access all branch directories to add here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 stick">
                    <h1 class="page-header">Basic Form:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row maintain">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            SIGN UP FORM
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="../php/form_validation.php" method="post">

                                        <div>
                                            <p style=";color:#FF0000;text-align:center;"><?php
                                            if (isset($_SESSION['errorMessage']))
                                                echo "*".$_SESSION['errorMessage'];
                                            ?></p>
                                        </div> 
                                        <div class="form-group">
                                            <label>ENROLLMENT NO</label>
                                            <input type ="number" max="99999999" class="form-control" placeholder="ENROLLMENT NO" name="userEnrollment" value=<?php
                                            if(isset($_SESSION['userEnrollment1']))
                                                echo '"'.$_SESSION['userEnrollment1'].'"';
                                            ?>>
                                        </div>          

                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['EnrollmentErr']))
                                                echo "*".$_SESSION['EnrollmentErr'];
                                            ?></p>
                                        </div>                              
                                        <div class="form-group">
                                            <label>NAME</label>
                                            <input class="form-control" placeholder="Name" name="userName" value=<?php
                                            if(isset($_SESSION['userName1']))
                                                echo '"'.$_SESSION['userName1'].'"';
                                            ?>>
                                        </div>          

                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['NameErr']))
                                                echo "*".$_SESSION['NameErr'];
                                            ?></p>
                                        </div>   
                                        <div class="form-element">
                                            <label style="width: 100%;">ID</label>
                                            <input class="form-control" style="width:30%; display: inline;" placeholder="Enter IITR username" name="userId" value=<?php
                                            if(isset($_SESSION['userId']))
                                                echo '"'.$_SESSION['userId'].'"';
                                            ?>>
                                            <span style="display: inline;" class="form-control-static">@iitr.ac.in</span>
                                            <p> </p>         

                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['IdErr']))
                                                echo "*".$_SESSION['IdErr'];
                                            ?></p>
                                        </div> 
                                        </div>

                                        <div class="form-group">
                                            <label>PASSWORD</label>
                                            <input type="password" class="form-control" placeholder="Enter your password <MUST BE ATLEAST 6 characters long>" name="userPassword">
                                        </div>

                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['PasswordErr']))
                                                echo "*".$_SESSION['PasswordErr'];
                                            ?></p>
                                        </div> 

                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="textarea" name="userDescription" class="form-control" rows="2" placeholder="Write about Yourself" value=<?php
                                            if(isset($_SESSION['userDescription']))
                                                echo '"'.$_SESSION['userDescription'].'"';
                                            ?>>
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Click to Submit!" class="btn-custom" style="border-radius: 10px;">
                                        </div>

                                    </form>
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

    </div>
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
<?php
    
    session_start();
    session_unset(); 
    session_destroy(); 
?>