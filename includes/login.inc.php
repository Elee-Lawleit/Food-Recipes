<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $userpassword = $_POST["password"];

    require_once 'connection.php';
    require_once 'functions.inc.php';

    //add error handlers here, or maybe just use javascript for it you know
    //you stupid bitch, you can't use js validation for login page, credentials have to go into database to be validated
    //oh my god, I'm even more stupid than I thought, in the first comment, I didn't refer to matching the credentials eneterd with the ones in database, I was refering to user submitting empty fields, which can be controlled through javascript

    loginUser($conn, $username, $userpassword);
}
else{
    header("location: ../login.php");
    exit();
}