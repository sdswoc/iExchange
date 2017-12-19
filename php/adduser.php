<?php
session_start();
require 'connect.php';
$userEnrollment = $_SESSION['userEnrollment1'];
$userName = $_SESSION['userName1'];
$userId = $_SESSION['userId1'];
$userPassword = $_SESSION['userPassword'];
$userDescription = $_SESSION['userDescription'];

$sql = "INSERT INTO UserId
VALUES (".$userEnrollment.", '".$userName."','".$userId."', '".$userPassword."', '".$userDescription."');";

if ($connection->query($sql) === TRUE) {
    $_SESSION['userName']=$userName;
    $_SESSION['userEnrollment']=$userEnrollment;
    header("location: ../pages/login.php");
} else {
    $_SESSION['errorMessage'] = "Error: " . $sql . "<br>" . $connection->error;
    header("location: ../pages/basic_form.php");
}

$connection->close();
?>

