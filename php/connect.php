<?php
	session_start();
	$server = "localhost";
	$user = "root";
	$pass = "****";

    $database = "I_Exchange";
    
    $connection = new mysqli($server, $user, $pass, $database);
    
    if ($connection->connect_error) {
    	die("Connection failed: " . $connection->connect_error);
    }
?>
