<?php

// function emptyInputsSignup($username, $email, $password, $cpassword){
//     $result;
//     if(empty($username) || empty($email) || empty($password) || empty($cpassword)){
//         $result = true;
//     }
//     else{
//         $result = false;
//     }
//     return $result;
// }
// function invalidUsername($username){

//     if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
//         return true;
//     }
//     return false;
// }
// function invalidEmail($email){

//     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         return true;
//     }
//     return false;
// }
// function passwordMatch($password, $cpassword){

//     if($password !== $cpassword){
//         return true;
//     }
//     return false;
// }

function userNameExists($conn, $username, $email){

    $query = "SELECT * from users where userName = '$username' or userEmail = '$email';";

    $resultData = mysqli_query($conn, $query);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    // $query = "select * from users where userName = ? OR userEmail = ?;";

    // //prepared statement for security
    // $preState = mysqli_stmt_init($conn);

    // //to see if there are any errors in the data that user entered, or if the data creates any sort of error in the database
    


    //if an error is created --> return false
    // if no error --> return true
    


    // if(!mysqli_stmt_prepare($preState, $query)){
    //     header("location: ../signup.php?error=preparedStatementFailed");
    //     exit();
    // }

    // //to now send the data into the databse
    // //ss means two strings were passed by the user i-e., "username", "email"
    // mysqli_stmt_bind_param($preState, "ss", $username, $email);
    // mysqli_stmt_execute($preState);

    // $result = mysqli_stmt_get_result($preState);

    // if($row = mysqli_fetch_assoc($result)){
    //     return $row;
    // }
    // else{
    //     $result = false;
    //     return $result;
    // }

    // mysqli_stmt_close($preState);
}

function createUser($conn, $username, $email, $userpassword, $imgContent){


    


    // ********************************** MY CODE ************************************

    $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

    $query = "INSERT into users(userName, userEmail, userPassword, userImg) values('$username', '$email', '$hashedPassword', '$imgContent')";
    mysqli_query($conn, $query);
    
    // $query = "INSERT into users(userName, userEmail, userPassword) values(?, ?, ?)";
    // //intializing a prepared statement for security
    // $preState = mysqli_stmt_init($conn);

    // //to see if there are any errors in the data that user entered, or if the data creates any sort of error in the database
    // if(!mysqli_stmt_prepare($preState, $query)){
    //     header("location: ../signup.php?error=preparedStatementFailed");
    //     exit();
    // }

    // //to now send the data into the databse
    // //ss means two strings were passed by the user i-e., "username", "email"

    // //to encrypt the password before it's entered into the database
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // mysqli_stmt_bind_param($preState, "sss", $username, $email, $password);

    // //finally executing the prepared statement
    // mysqli_stmt_execute($preState);
    // mysqli_stmt_close($preState);
    header("location: ../login.php?error=none");
}


function loginUser($conn, $username, $userpassword){
    //check email/username
    $user = userNameExists($conn, $username, $username);

    // echo "The password user just typed is: $userpassword";

    if($user === false){
        header("location: ../login.php?error=notRegistered");
        exit(); //this exit is very important
    }

    // getting the hashed password that is stored in the database
    $hashedPassword = $user["userPassword"];
    
    $passwordCheck = password_verify("$userpassword", "$hashedPassword");

    //storing the result 1 if password matches, 0 otherwise


    //true is the passwords match, false otherweise

    //checking if the password is correct
    if($passwordCheck === false){
        // echo"The password for this user is: $hashedPassword";
        // var_dump($passwordCheck);
        header("location: ../login.php?error=passwordMatchError");
        exit();
    }
    else if($passwordCheck === true){
        session_start();
        $_SESSION["userid"] = $user["userId"];
        $_SESSION["username"] = $user["userName"];
        header("location: ../index.php");
        exit();
    }
}

function uploadRecipe($conn, $recipeTitle, $recipeCat, $recipeTime, $imgContent, $recipeDetail, $newRecipePage){

    $userid = $_SESSION['userid'];

    $query = "INSERT into recipe (recipeTitle, recipeCategory, recipeTime, recipeImg, recipeDetail, userId, recipePath) values('$recipeTitle', '$recipeCat', '$recipeTime','$imgContent','$recipeDetail', '$userid', '$newRecipePage')";

    // $sql = "INSERT INTO recipe ('recipeImg', 'recipeCategory', 'recipeTitle', 'recipeTime', 'userId') VALUES ('$imgContent', '$recipeCat', '$recipeTile', '$recipeTime', '$userid');";

    $success = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(!$success){
        header("location: ../profile.php?error=recipeUploadFailed");
        exit();
    }
    header("location: ../profile.php?message=recipeUploadedSuccessfully");
}

function resetPassword($conn, $userEmail, $newPassword){

    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // echo password_hash("ali", PASSWORD_DEFAULT) . "<br>";
    // echo $newPassword . "<br>";
    // echo $hashedNewPassword . "<br>";

    $query = "UPDATE users SET userPassword = '$hashedNewPassword' WHERE userEmail = '$userEmail';";
    $success = mysqli_query($conn, $query);
    if(!$success){
        echo"There was an error resetting the password";
        exit();
    }
    header("location: ../login.php?");
}

// $2y$10$TbzTmRstuBiuy5LyVGQ5a.4KmywPAV1wDtijhFPtti7.j.TFWPy5O --> original password hash (mohsin)
