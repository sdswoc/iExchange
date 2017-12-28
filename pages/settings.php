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

    <title>I-Exchange</title>

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
        if(!isset($_SESSION['userEnrollment']))
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
                <a class="navbar-brand special" href="index.php">I-Exchange</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <?php
                    echo '
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <p style="display:inline;padding-right:30px"><img src="../Profile_Photos/file'.$_SESSION['userEnrollment'].'.jpg" height="20" width="20" hspace="10">Welcome! '.$_SESSION['userName'].'</p><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="active"><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>';
                    ?>
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
                                <form action="search.php" method="get">
                                    <input type="text" class="form-control" style="width:80%;" placeholder="Search by Id.." name="id">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </form>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="space text-center">
                            <h4>Most Discussed Topics<br><br></h4>
                        </li>
                        <?php
                            require '../php/connect.php';
                                    
                            $sql = "SELECT * FROM Threads order by count desc;";
                            $result = $connection->query($sql);
                            $i=6;
                            while($i-- and $row = $result->fetch_assoc()) {
                                echo '
                                <li class="text-center relative">
                                    <a href="Thread.php?id='.$row['id'].'">'.$row['name'].'</a>
                                </li>';
                            }
                            $connection->close();
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

		<?php

			require '../php/connect.php';

			$sql = "SELECT * FROM UserId WHERE userEnrollment=".$_SESSION['userEnrollment'].";";
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			$connection->close();
		?>



        <!--php or javascript to access all branch directories to add here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 stick">
                    <h1 class="page-header">SETTINGS:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row maintain">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            USER INFORMATION:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    	<div class="form-element">
                                            <label style="display: block;">ENROLLMENT NO</label>
                                            <input type ="number" style="width:37%; display: inline;" class="form-control" value=<?php
                                            echo '"'.$row['userEnrollment'].'"';
                                            ?> disabled>
                                        </div>        

                                        <div class="form-element">
                                            <label style="display: block;">NAME</label>
                                            <input class="form-control" style="width:37%; display: inline;" value=<?php
                                                echo '"'.$_SESSION['userName'].'"';
                                            ?> disabled><a>  </a><a href="../php/change_name.php"><button class="btn btn-default" style="display: inline;">Change</button></a>
                                        </div>          
  
                                        <div class="form-element">
                                            <label style="display: block;">ID</label>
                                            <input class="form-control" style="width:30%; display: inline;" value=<?php
                                                echo '"'.$row['userId'].'"';
                                            ?> disabled>
                                            <span style="display: inline; margin-right: 14px;" class="form-control-static">@iitr.ac.in</span>
                                            <p> </p>    
                                        </div>     


                                        <div class="form-element">
                                            <label style="display: block;">PASSWORD</label>
                                            <p> </p><a href="../php/change_password.php"><button class="btn btn-default" style="display: inline;">Change</button></a>
                                        </div>


                                        <div class="form-element">
                                            <label style="display: block;">Description</label>
                                            <input type="textarea" class="form-control" value=<?php
                                                echo '"'.$row['userDescription'].'"';
                                            ?> disabled style="width:37%; display: inline;" ><a>  </a><a href="../php/change_description.php"><button class="btn btn-default" style="display: inline;">Change</button></a>
                                        </div>

                                        <div class="form-element">
                                            <label style="display: block;">Profile Photo</label>
                                            <?php
                                            echo '<img src="../Profile_Photos/file'.$_SESSION['userEnrollment'].'.jpg" height="150" width="150" style="display:block;">';
                                            ?>
                                            <p> </p>
                                            <form action="../php/save_image.php" id="change" style="display: none;" method="post" enctype="multipart/form-data">
                                                <input type="file" name="profilePhoto" class="btn btn-default" style="display: block;" value="Change Photo">
                                                <div>
                                                    <p style=";color:#FF0000;"><?php
                                                    if (!empty($_SESSION['PhotoErr'])){
                                                        echo "*".$_SESSION['PhotoErr'];
                                                        $_SESSION['PhotoErr']="";
                                                    }
                                                    ?></p>
                                                </div>
                                                <div class="form-element">
                                                    <input type="submit" name="submit" value="Click to Submit!" class="btn-custom" style="border-radius: 10px;">
                                                </div>
                                            </form>
                                            <button onclick="photo()" class="btn btn-default" style="display: inline;">Change</button>
                                        </div> 
                                    </div>
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
    <script>
    function photo() {
    var x = document.getElementById("change");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
</body>
</html>