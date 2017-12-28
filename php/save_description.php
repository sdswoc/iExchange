<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST["userDescription"])) {
      $_SESSION["DescriptionErr"] = "Name is required";
    }
    if(empty($_SESSION['DescriptionErr']))
    {

		require 'connect.php';
		$sql = 'UPDATE UserId SET userDescription="'.test_input($_POST['userDescription']).'" WHERE userEnrollment='.$_SESSION['userEnrollment'].';';
		if ($connection->query($sql)) {
			header("location: ../pages/settings.php");
		} else {
    		die("Error: " . $sql . "<br>" . $connection->error);
    	}

    } else {
    	header("location: ../php/change_description.php");
    }
  }

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }
?>