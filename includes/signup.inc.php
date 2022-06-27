<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    // $password = $_POST["password"];
    $userpassword = $_POST["password"];
    // $cpassword = $_POST["cpassword"];
    // $confirmpassword = $_POST["confirmpassword"];

    $file = $_FILES["image"];

    $fileName = basename($file["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    

    $allowedTypes = array("jpg", "jpeg", "png", "pdf", "webp", "JPG");

    if(in_array($fileType, $allowedTypes)){
        $image = $file["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
    }
    else{
        header("location: ../signup.php?error=imageTypeNotAllowed");
        exit();
    }

    require_once 'connection.php';
    require_once 'functions.inc.php';


    // checking for input errors, won't need this but you know
    // if(emptyInputsSignup($username, $email, $password, $cpassword) !== false){
    //     // header("location: ../signup.php?error=emptyinput");
    //     echo '<div style=" width: 500px; height=200px; background-color: purple; color: white;">Hello Bitch , Im the error</div>';
    //     exit(); //stops the script from running completely
    // }
    
    // if(invalidUsername($username) !== false){
    //     header("location: ../signup.php?error=invalidUsername");
    //     exit();
    // }
    
    // if(invalidEmail($email) !== false){
    //     header("location: ../signup.php?error=invalidEmail");
    //     exit();
    // }

    // if(passwordMatch($password, $cpassword) !== false){
    //     header("location: ../signup.php?error=PasswordsDon'tMatch");
    //     exit();
    // }
    
    if(userNameExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=UserAlreadyExists");
        exit();
    }

    createUser($conn, $username, $email, $userpassword, $imgContent);
}
else{
    header("location: ../signup.php");
}