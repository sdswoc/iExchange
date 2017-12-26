<?php
	session_start();
	require 'connect.php';
	$name = $_SESSION['name1'];
	$id = $_SESSION['id1'];
	$link = $_SESSION['link1'];
	$description = $_SESSION['description1'];
	$author = $_SESSION['author1'];

	$sql = "INSERT INTO Threads
	VALUES ('".$name."', '".$id."','".$link."', '".$description."', '".$author."',0);";

	if ($connection->query($sql) === TRUE) {

		$sql="CREATE TABLE ".$id." ( time DATETIME, userEnrollment INT(8), idea varchar(1000), userName varchar(30))";
		if($connection->query($sql) !== TRUE){
			$_SESSION['errorMessage'] = "Error: " . $sql . "<br>" . $connection->error;
			header("location: ../pages/threadForm.php");
		}
		header("location: ../pages/index.php");

	} else {
	    $_SESSION['errorMessage'] = "Error: " . $sql . "<br>" . $connection->error;
	    header("location: ../pages/threadForm.php");
	}

	$connection->close();
?>