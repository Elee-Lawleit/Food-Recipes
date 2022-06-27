<?php

session_start();
    if(isset($_SESSION["userid"])){
        require_once 'connection.php';
        if(isset($_POST["submit"])){
            $recipeid = $_POST["recipeid"];
            $userid = $_SESSION["userid"];

            $check = "DELETE from bookmarks where recipeid = '$recipeid'";
            mysqli_query($conn, $check) or die(mysqli_error($conn));
            $query = "DELETE from recipe where recipeId = '$recipeid' and userId = '$userid'";
            mysqli_query($conn, $query) or die(mysqli_error($conn));
            header("location: ../profile.php?message=recipeDeleted");
        }
        else{
            header("location ../profile.php");
        }
    }