<?php
	require 'connect.php';
	
	$sql = "USE I_EXCHANGE;";

	if($connection->query($sql) !== TRUE){
		die("ERROR") ;
	}

	$sql = "CREATE TABLE UserId(
	userEnrollment int(6) unsigned NOT NULL PRIMARY KEY ,
	userName varchar(30) NOT NULL ,
	userId varchar(15) UNIQUE NOT NULL,
	userPassword varchar(20) NOT NULL ,
	userDescription varchar(50)  

	);";	
	
	if($connection->query($sql) !== TRUE){
		die("ERROR") ;
	}
	$connection->close();
?>