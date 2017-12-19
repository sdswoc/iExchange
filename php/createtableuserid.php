<?php
	require 'connect.php';
	
	$sql = "USE I_EXCHANGE;";

	if($connection->query($sql) !== TRUE){
		die("ERROR") ;
	}

	$sql = "CREATE TABLE UserId;";	
	
	if($connection->query($sql) !== TRUE){
		die("ERROR") ;
	}
	$connection->close();
?>