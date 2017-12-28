<?php
	session_start();
	$server = "localhost";
	$user = "root";
	$pass = "****";
    
  	$connection = new mysqli($server, $user, $pass);
    
    	if ($connection->connect_error) {
    		die("Connection failed: " . $connection->connect_error);
    	}
?>

