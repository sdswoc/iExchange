<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$time=date("Y-m-d")." ".date("H:i:s");//YYYY-MM-DD HH:MM:SS
		$userEnrollment=$_SESSION['userEnrollment'];
		$idea=$_POST['idea'];
		$userName=$_SESSION['userName'];

		require 'connect.php';
						
		$sql = "INSERT INTO ".$_POST['id']." VALUES ('".$time."', ".$userEnrollment.",'".$idea."', '".$userName."');";
	
		if ($connection->query($sql) === TRUE) {
			$sql="UPDATE Threads SET count = count + 1 WHERE id='".$_POST['id']."';";
			

			if($connection->query($sql) !== TRUE ){ die("ERROR");}


 		   	header("location: ../pages/Thread.php?id=".$_POST['id']);
		} else {
    		echo "Error: " . $sql . "<br>" . $connection->error;
		}

		$connection->close();
	}



?>