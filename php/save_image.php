<?php
  	session_start();
  	$target_dir = "../Profile_Photos/";
  	$imageFileType = strtolower(pathinfo(basename($_FILES["profilePhoto"]["name"]),PATHINFO_EXTENSION));
    $target_file = $target_dir . 'file'.$_SESSION['userEnrollment'].".jpg";

    if ($_FILES["profilePhoto"]["size"] > 500000) {
        $_SESSION['PhotoErr'] = "Sorry, your file is too large.";
    }


    if($imageFileType != "jpg") {
        $_SESSION['PhotoErr'] = "Sorry, only JPG files are allowed.";
    }
    if(empty($_SESSION["PhotoErr"])){

        if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file)) {
        	header("location: ../pages/settings.php");
        } else {
           	die("Sorry, there was an error uploading your file.");
        }
    } else {
    	header("location: ../pages/settings.php");
    }
?>