<?php
	session_start();
	require 'connectsql.php';
	
	$sql = "CREATE DATABASE ".$SESSION['branchName'].";";

	if($connection->query($sql) !== TRUE){
		echo "ERROR" ;
	}
	
	$connection->close();
?>

