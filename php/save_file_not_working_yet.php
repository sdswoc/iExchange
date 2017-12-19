<?php
	session_start();
    $target_dir = "../Profile_Photos/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename($_FILES["profilePhoto"]["name"]),PATHINFO_EXTENSION));
    $target_file = $target_dir . 'file'.$_SESSION['userEnrollment'].".jpg";


    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
        if($check === false){
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    if ($_FILES["profilePhoto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    if($imageFileType != "jpg") {
        echo "Sorry, only JPG files are allowed.";
        $uploadOk = 0;
    }



    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";


    } else {
        if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file)) {

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
