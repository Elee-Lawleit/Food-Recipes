<?php

if(isset($_POST["submit"])){

    // echo"if part is running";

    require_once 'connection.php';
    require_once 'functions.inc.php';

    $userEmail = $_POST["email"];
    $newPassword = $_POST["password"];

    $check = userNameExists($conn, $userEmail, $userEmail);

    if($check === false){
        echo"inner if is running";
        header("location: ../resetpassword.php?error=userNotRegisterd");
        exit();
    }

    // $2y$10$TvLbwEmY2lFQFkCxDfZA0OVfdjraoSG90Stm3mTuOJ.zpACXjs6MK  --> Ali's hash
    // $2y$10$TvLbwEmY2lFQFkCxDfZA0OVfdjraoSG90Stm3mTuOJ.zpACXjs6MK

    resetPassword($conn, $userEmail, $newPassword);
}
else{
    // echo"else part is running";
    header("location: ../resetpassword.php?error=formNotSubmitted");
}