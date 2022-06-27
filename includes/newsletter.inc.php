<?php

session_start();

if(isset($_POST["submit"])){
    if(isset($_SESSION["userid"])){
        require_once 'connection.php';
        require_once 'functions.inc.php';

        $userid = $_SESSION["userid"];
        $userEmail = $_POST["email"];

        $check = "SELECT * from newsletter where userEmail = '$userEmail';";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result) > 0){
            header("location: ../index.php?error=emailAlreadySubscribed");
            exit();
        }

        $query = "INSERT into newsletter (userId, userEmail) values ('$userid', '$userEmail');";
        $success = mysqli_query($conn, $query);

        if(!$success){
            header("location: ../index.php?error=subscriptionFailed");
            exit();
        }
        header("location: ../index.php?message=registrationSuccessful");
    }
    else{
        header("location: ../login.php?error=loginToSubscribe");
    }
}
else{
    header("location: ../index.php");
}