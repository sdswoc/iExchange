<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>I-Exchange</title>

    <!-- Bootstrap CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?php
        if(!isset($_SESSION['userEnrollment']))
        {   
            header("location: ../pages/index.php");
        }
    ?>

    <style type="text/css">
    	
    .form-element{
    	margin-bottom: 20px;
    }
    .row{
    	display: flex;
    	justify-content: center;
    	padding-top: 50px;
    }

    </style>

</head>

<body>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Change Name:
				</div>	
				<div class="panel-body">
					<form class="form-group" action="save_name.php" method="post">

						<div class="form-element">
							<input type="text" class="form-control" name="userName" placeholder="New Name">
							<p style="color:red;"><?php if(!empty($_SESSION['NameErr'])){ echo '*'.$_SESSION['NameErr']; $_SESSION['NameErr']='';} ?></p>
						</div>

						<div class="form-element">
							<input type="submit" class="btn btn-primary">
						</div>

					</form>
                    <div class="form-element">
                        <button class="btn-custom" style="border-radius: 10px;" onclick="window.location.href='../pages/settings.php';">Cancel</button>
                    </div>
				</div>
			</div>
		</div>
	</div>
        
</body>

</html>

