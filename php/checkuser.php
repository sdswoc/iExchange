<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "connect.php";

    $errorMessage="";

    $givenId=$_POST['userId'];
    $givenPassword=$_POST['userPassword'];

    $sql = "SELECT * FROM UserId WHERE userId = '".$givenId."';";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($givenPassword === $row["userPassword"]){
            $_SESSION['userName']=$row['userName'];
            $_SESSION['userEnrollment']=$row['userEnrollment'];
            header("location: ../pages/login.php");
        }
        else{
            $_SESSION['errorMessage']="Password incorrect!";
            header("location: ../pages/login.php");
        }   
    } else {
        $_SESSION['errorMessage']="user doesnot exist";
        header("location: ../pages/login.php");
    }
    
$connection->close();
}
?>