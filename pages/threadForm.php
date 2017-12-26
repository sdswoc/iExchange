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
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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




        <!--php or javascript to access all branch directories to add here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 stick">
                    <h1 class="page-header">Thread Form:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row maintain">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill The Form:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <form action="../php/validate_threadForm.php" method="post">

                                        <div>
                                            <p style=";color:#FF0000;text-align:center;"><?php
                                            if (isset($_SESSION['errorMessage'])){
                                                echo "*".$_SESSION['errorMessage'];
                                                $_SESSION['errorMessage']="";
                                            }
                                            ?></p>
                                        </div>


                                        <div class="form-element">
                                            <label>Name of Research Paper:</label>
                                            <input class="form-control" placeholder="Enter the Name for the Research Paper" name="name" <?php
                                            if(isset($_SESSION['name1']))
                                                echo 'value="'.$_SESSION['name1'].'"';
                                            ?>>
                                        </div>
                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['nameErr'])){
                                                echo "*".$_SESSION['nameErr'];
                                                $_SESSION['nameErr']="";
                                            }
                                            ?></p>
                                        </div>


                                        <div class="form-element">
                                            <label>Id</label>
                                            <input class="form-control" placeholder="Enter 4 digit alphanumeric Id to refer the Paper" name="id" <?php
                                            if(isset($_SESSION['id1']))
                                                echo 'value="'.$_SESSION['id1'].'"';
                                            ?>>
                                        </div> 
                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['idErr'])){
                                                echo "*".$_SESSION['idErr'];
                                                $_SESSION['idErr']="";
                                            }
                                            ?></p>
                                        </div>

                                        <div class="form-element">
                                            <label>Link</label>
                                            <input class="form-control" placeholder="Give a valid link for the Research Paper" name="link" <?php
                                            if(isset($_SESSION['link1']))
                                                echo 'value="'.$_SESSION['link1'].'"';
                                            ?>>
                                        </div> 
                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['linkErr'])){
                                                echo "*".$_SESSION['linkErr'];
                                                $_SESSION['linkErr']="";
                                            }
                                            ?></p>
                                        </div>
                                        

                                        <div class="form-element">
                                            <label>Description</label>
                                            <input type="textarea" name="description" class="form-control" rows="2" placeholder="Give Brief Discussion of the Paper" <?php
                                            if(isset($_SESSION['description1']))
                                                echo 'value="'.$_SESSION['description1'].'"';
                                            ?> >
                                        </div> 
                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['descriptionErr'])){
                                                echo "*".$_SESSION['descriptionErr'];
                                                $_SESSION['descriptionErr']="";
                                            }
                                            ?></p>
                                        </div>

                                        <div class="form-element">
                                            <label>Author(s):</label>
                                            <input class="form-control" placeholder="Give name(s) of Author separated by commas" name="author" <?php
                                            if(isset($_SESSION['author1']))
                                                echo 'value="'.$_SESSION['author1'].'"';
                                            ?>>
                                        </div> 
                                        <div>
                                            <p style=";color:#FF0000;"><?php
                                            if (isset($_SESSION['authorErr'])){
                                                echo "*".$_SESSION['authorErr'];
                                                $_SESSION['authorErr']="";
                                            }
                                            ?></p>
                                        </div>

                                        <div class="form-element">
                                            <input type="submit" name="submit" value="Click to Submit!" class="btn-custom" style="border-radius: 10px;" <?php if(!isset($_SESSION['userEnrollment'])) { echo'disabled';}?>>
                                        </div>
                                    </form>
                                    <div class="form-element">
                                        <button class="btn-custom" style="border-radius: 10px;" onclick="window.location.href='index.php';">Cancel</button>
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
</body>
</html>