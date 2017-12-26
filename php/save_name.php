<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST["userName"])) {
      $_SESSION["NameErr"] = "Name is required";
    }
    if(empty($_SESSION['NameErr']))
    {

		require 'connect.php';
		$sql = 'UPDATE UserId SET userName="'.test_input($_POST['userName']).'" WHERE userEnrollment='.$_SESSION['userEnrollment'].';';
		if ($connection->query($sql)) {
			$_SESSION['userName']=$_POST['userName'];
			header("location: ../pages/settings.php");
		} else {
    		die("Error: " . $sql . "<br>" . $connection->error);
    	}

    } else {
    	header("location: ../php/change_name.php");
    }
  }

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }
?>