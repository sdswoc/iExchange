<?php
	require 'connectsql.php';
	
	$sql = "CREATE DATABASE I_EXCHANGE;";

	if($connection->query($sql) !== TRUE){
		echo "ERROR" ;
	}
	
	$connection->close();
?>
