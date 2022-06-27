<?php

session_start();
// echo"bookmark file is running";
if(isset($_SESSION["userid"])){
    if(isset($_POST["submit"])){
        // echo"if part is running";
        require_once 'connection.php';

        $recipeid = $_POST["recipeid"];
        $userid = $_SESSION["userid"];

        $check = "SELECT * from bookmarks where recipeId = '$recipeid' and userId = '$userid';";
        $result = mysqli_query($conn, $check);

        if(mysqli_num_rows($result) > 0){
            header("location: ../index.php?error=recipeAlreadyBookmarked");
            exit();
        }

        $query = "INSERT INTO bookmarks (userId, recipeId) values ('$userid', '$recipeid');";

        $success = mysqli_query($conn, $query);

        if(!$success){
            header("location: ../index.php?error=errorBookmarkingRecipe");
            exit();
            // echo"Query failed";
        }
        
        header("location: ../index.php?message=recipeBookmarked");
        exit();
    }
    else{
        header("location: ../index.php");
        exit();
    }
}
else{
    // echo"bookmark not set<br>";
    header("location: ../index.php?error=loginToBookmark");
}