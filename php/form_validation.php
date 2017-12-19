<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["userEnrollment"])) {
      $_SESSION["EnrollmentErr"] = "Enrollment is required";
    } else if(!is_numeric($_POST["userEnrollment"])){
      $_SESSION["EnrollmentErr"] = "Enrollment should be integer".gettype($_POST['userEnrollment']);
    } else{
      $_SESSION["userEnrollment1"] = test_input($_POST["userEnrollment"]);
    }
  
    if (empty($_POST["userName"])) {
      $_SESSION["NameErr"] = "Name is required";
    } else {
      $_SESSION['userName1'] = test_input($_POST["userName"]);
    }
      
   if (empty($_POST["userId"])) {
      $_SESSION["IdErr"] = "Id is required";
   } else {
      $_SESSION['userId1'] = test_input($_POST["userId"]);
   }

   if (empty($_POST["userPassword"])) {
     $_SESSION['PasswordErr'] = "Password is required";
   } else {
    $_SESSION['userPassword'] = $_POST["userPassword"];
   }

    if (!empty($_POST["userDescription"])) {
     $_SESSION['userDescription'] = $_POST['userDescription'];
   } else {
     
     $_SESSION['userDescription'] = "";
   }
  }
  if(empty($_SESSION['EnrollmentErr']) and empty($_SESSION['NameErr']) and empty($_SESSION['IdErr']) and empty($_SESSION['PasswordErr']))
  {

            header("location: adduser.php");
  }else{

            header("location: ../pages/basic_form.php");

  }

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }
?>