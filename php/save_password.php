<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'connect.php';

    $sql = "SELECT * FROM UserId WHERE userEnrollment=".$_SESSION['userEnrollment'].";";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $connection->close();

    if (empty($_POST["old"]) and empty($_POST["new1"]) and empty($_POST["new2"])) {
      $_SESSION["PasswordErr"] = "All fields are required";
    } else if($row['userPassword']!=$_POST['old'])
    {
      $_SESSION['PasswordErr']="The current password didnot match..";
    } else if ($_POST['new1']!=$_POST['new2']){
      $_SESSION['PasswordErr']="Different passwords were typed!";
    } 

    if(empty($_SESSION['PasswordErr']))
    {

		require 'connect.php';
		$sql = 'UPDATE UserId SET userPassword="'.$_POST['new1'].'" WHERE userEnrollment='.$_SESSION['userEnrollment'].';';
		if ($connection->query($sql)) {
			header("location: ../pages/settings.php");
		} else {
    		die("Error: " . $sql . "<br>" . $connection->error);
    	}

    } else {
    	header("location: ../php/change_password.php");
    }
  }
?>