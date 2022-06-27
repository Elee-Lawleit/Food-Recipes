<?php
session_start();
if(isset($_SESSION["userid"])){
    require_once 'connection.php';

    if(isset($_POST["submit"])){
        $recipeid = $_POST["recipeid"];
        $userid = $_SESSION["userid"];

        $query = "DELETE from bookmarks where recipeId = '$recipeid' and userId = '$userid'";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        header("location: ../profile.php?message=bookmarkDeleted");
    }
    else{
        header("loaction: ../profile.php");
    }
}