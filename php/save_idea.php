<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$time=date("Y-m-d")." ".date("H:i:s");//YYYY-MM-DD HH:MM:SS
		$userEnrollment=$_SESSION['userEnrollment'];
		$idea=$_POST['idea'];
		$userName=$_SESSION['userName'];

		require 'connectbranch.php';
						
		$sql = "INSERT INTO ".$_SESSION['researchName']." VALUES ('".$time."', ".$userEnrollment.",'".$idea."', '".$userName."');";
	
		if ($connection->query($sql) === TRUE) {
 		   	header("location: ../pages/Thread.php");
		} else {
    		echo "Error: " . $sql . "<br>" . $connection->error;
		}

		$connection->close();
	}



?>