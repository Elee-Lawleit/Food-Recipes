<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Recipes</title>
    <style>
       body{
            margin: 0;
            padding: 0;
            /* background: url(./img/loginImg.jpg); */
            font-family: sans-serif;
        }
        .loginbox{
            width: 320px;
            height: 475px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 0 15px 0 rgb(0 0 0 / 30%);
            color: black;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 70px 30px;
            transition: transform .5s;
        }

        .loginbox:hover{
            transform: translate(-50%, -51%);
        }

        h1{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }

        .loginbox p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .loginbox input{
            width: 100%;
            margin-bottom: 20px;
        }

        .loginbox input::placeholder{
          color: rgb(161, 161, 161);
        }

        .loginbox input[type = "text"], input[type = "password"]{
            border: none;
            border-bottom: 1px solid brown;
            background: transparent;
            outline: none;
            height: 40px;
            color: black;
            font-size: 14px;
        }

        .btn{
            border: none;
            outline: none;
            height: 40px;
            background-color: #ac4511;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
            display: block;
            padding-inline: 5em;
            margin-bottom: .4em;
        }

        .btn:hover{
            cursor: pointer;
            background: rgb(143, 67, 29);
        }

        .loginbox a{
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: darkgray;
        }

        .loginbox a:hover{
            color: black;
        }
    </style>
</head>
<body>
    <script>

        function checkUsername(){
            let usernameValue = document.getElementById("Username").value.trim();
            if(usernameValue === ""){
                document.getElementById("invalidUsername").style.color = "red";
                document.getElementById("invalidUsername").innerHTML = "Username field is required";
                return false;
            }
            else if(!isNaN(usernameValue)){
                document.getElementById("invalidUsername").style.color = "red";
                document.getElementById("invalidUsername").innerHTML = "Username cannnot be a number";
                return false;
            }
            else{
                document.getElementById("invalidUsername").style.color = "green";
                document.getElementById("invalidUsername").innerHTML = "";
                return true;
            }
        }

        function checkPassword(){
            let passwordValue = document.getElementById("Password").value.trim();

            if(passwordValue === ""){
                document.getElementById("invalidPassword").style.color = "red";
                document.getElementById("invalidPassword").innerHTML = "Password field is required";
                return false;
            }
            else{
                document.getElementById("invalidPassword").style.color = "green";
                document.getElementById("invalidPassword").innerHTML = "";
                return true;
            }
        }

        // main();
        function main(){
            if(checkUsername() && checkPassword()){
                document.getElementById("submitBtn").disabled = false;
                document.getElementById("submitBtn").style.opacity = 1;
                document.getElementById("submitBtn").style.cursor = "pointer";
            }
            else{
                document.getElementById("submitBtn").style.opacity = .5;
                document.getElementById("submitBtn").style.cursor = "default";
                document.getElementById("submitBtn").disabled = true;
            }
        }
    </script>
    <div class="loginbox">
        <h1>Login</h1>
        <form action="includes/login.inc.php" method="post">
            <p>Username</p>
            <input type="text" name="username" id="Username" placeholder="Enter username/email"  onkeyup="main()">
            <span id="invalidUsername"></span>

            <p>Password</p>
            <input type="password" name="password" id="Password" placeholder="Enter Password" onkeyup="main()">
            <span id="invalidPassword" style="font-family: 'Roboto', sans-serif;"></span>

            <button class="btn" type="submit" name="submit" id="submitBtn">Login</button>

            <a href="resetpassword.php">Forgot your password?</a><br>
            <a href="signup.php" target="_blank">Don't have an account?</a>
        </form>
    </div>

    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] === "none"){
        ?>
            <script>alert("Signed up successfully")</script>
            <?php
        }
        else if($_GET["error"] === "notRegistered"){
            ?>
            <script>alert("User not registered")</script>
            <?php
        }
        if($_GET["error"] === "passwordMatchError"){
            ?>
            <script>alert("Incorrect password.")</script>
            <?php
        }
    }
    ?>

</body>
</html>