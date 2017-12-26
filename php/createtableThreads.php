<?php
	require 'connect.php';
	
	$sql = "CREATE TABLE Threads(
	name varchar(50) NOT NULL PRIMARY KEY,
	id varchar(4) NOT NULL ,
	link varchar(100) NOT NULL,
	description varchar(2000) NOT NULL ,
	author varchar(50) NOT NULL,
	count int
	);";	
	
	if($connection->query($sql) !== TRUE){
		die("ERROR") ;
	} else{
		echo "done";
	}
	$connection->close();
?>