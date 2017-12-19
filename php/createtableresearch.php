<?php
	session_start();

	require 'connectbranch.php';

	$sql = "CREATE TABLE ".$_SESSION['researchName']."( time DATETIME, userEnrollment INT(8), idea varchar(1000))";	//SAMPLE RESEARCH

	if($connection->query($sql) !== TRUE){
		die("ERROR");
	}

	$connection->close();
?>