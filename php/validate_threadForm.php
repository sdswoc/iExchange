<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

	  require 'connect.php';
                                    
    $sql = "SELECT id FROM Threads;";
    $result = $connection->query($sql);
    $unique=true;

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc() and $unique) {
      	if($row["id"] == $_POST['id']){
      		$unique=false;
      	}
      }
	  }
    $connection->close();

    if (empty($_POST["name"])) {
      $_SESSION["nameErr"] = "Name is required";
    } else {
      $_SESSION["name1"] = $_POST["name"];
    }
  
    if (empty($_POST["id"])) {
      $_SESSION["idErr"] = "Id is required";
    } else if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['id'])) {
      $_SESSION["idErr"] = "Must be Alphanumeric";	
    } else if (strlen($_POST['id'])!=4) {
      $_SESSION["idErr"] = "Must be four character long";	
    } else if (!$unique) {
      $_SESSION["idErr"] = "Must be unique";	
    } else {
      $_SESSION['id1'] = $_POST["id"];
    }
      
   	if (empty($_POST["link"])) {
      $_SESSION["linkErr"] = "Link is required";
   	} else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['link'])) {
      $_SESSION['linkErr'] = 'Invalid link';
   	}else {
      $_SESSION['link1'] = test_input($_POST["link"]);
   	}

   	if (empty($_POST["description"])) {
      $_SESSION['descriptionErr'] = "Description required";
   	} else {
      $_SESSION['description1'] = $_POST["description"];
   	}

    if (empty($_POST["author"])) {
     $_SESSION['authorErr'] = "Author Name is Required";
   	} else { 
     $_SESSION['author1'] = $_POST['author'];
   	}
  }
  if(empty($_SESSION['nameErr']) and empty($_SESSION['idErr']) and empty($_SESSION['linkErr']) and empty($_SESSION['descriptionErr']) and empty($_SESSION['authorErr'])) {
            header("location: addThread.php");
  } else {
            header("location: ../pages/threadForm.php");
  }

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }
?>