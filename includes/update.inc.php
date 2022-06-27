<?php
    session_start();

if(isset($_POST["submit"])){
    require_once 'connection.php';

    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $userid = $_SESSION["userid"];

    $file = $_FILES["image"];

    $fileName = basename($file["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    

    $allowedTypes = array("jpg", "jpeg", "png", "pdf", "webp", "JPG");

    if(in_array($fileType, $allowedTypes)){
        $image = $file["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
    }
    else{
        header("location: ../profile.php?error=imageTypeNotAllowed");
        exit();
    }

    //check if username is already in use
    $query = "SELECT * from users where userName = '$newUsername' or userEmail = '$newEmail';";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        header("location: ../profile.php?error=alreadyInUse");
        exit();
    }

    $query = "UPDATE users set userName = '$newUsername', userEmail = '$newEmail', userImg = '$imgContent' where userId = '$userid'";

    $success = mysqli_query($conn, $query);

    if(!$success){
        header("location: ../profile.php?error=failedToUpdate");
        exit();
    }

    header("location: ../profile.php?message=updatedSuccessfully");

}
else{
    header("location: ../profile.php");
}