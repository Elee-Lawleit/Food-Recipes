<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp - Food Recipes</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            /* background: url(./img/loginImg.jpg); */
            font-family: sans-serif;
        }
        .loginbox{
            width: 320px;
            /* height: 475px; */
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

        .loginbox input[type = "email"],
        input[type="text"], 
        input[type = "password"]{
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
    <script language="javascript">
        // alert("running");
        function checkEmail(){
            emailValue = document.getElementById("Email").value.trim();

            if(!emailValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) || emailValue === ""){
                document.getElementById("EmailError").style.color = "red";
                document.getElementById("EmailError").innerHTML = "Please enter a valid email.";
                return false;
            }
            else{
                document.getElementById("EmailError").innerHTML = "";
                return true;
            }
        }
    
        function checkUsername(){
            let usernameValue = document.getElementById("Username").value.trim();
            if(usernameValue === ""){
                document.getElementById("invalidUsername").style.color = "red";
                document.getElementById("invalidUsername").innerHTML = "Username cannnot be empty";
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
            let cpasswordValue = document.getElementById("cpassword").value.trim();

            if(passwordValue !== cpasswordValue){
                document.getElementById("messageMatch").style.color = "red";
                document.getElementById("messageMatch").innerHTML = "Passwords don't match";
                return false;
            }
            else if(passwordValue === ""){
                document.getElementById("messageMatch").style.color = "red";
                document.getElementById("messageMatch").innerHTML = "Password field is required";
                return false;
            }
            else{
                document.getElementById("messageMatch").style.color = "green";
                document.getElementById("messageMatch").innerHTML = "";
                return true;
            }
        }
        
        function main(){
            if(checkUsername() && checkEmail() && checkPassword() ){
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
        <h1>Sign Up</h1>
        <form action="includes/signup.inc.php" method="POST"  enctype="multipart/form-data">
            <p>Username</p>
            <input type="text" name="username" id="Username" placeholder="Enter Username" onkeyup="main()">
            <span id="invalidUsername"></span>
           
            <p>Email</p>
            <input type="email" name="email" id="Email" placeholder="Enter Email" onkeyup="main()">
            <span id="EmailError"></span>
            
            <p>Password</p>
            <input type="password" name="password" id="Password" onkeyup="main()" placeholder="Enter Password" required>
            
            <p>Confirm Password</p>
            <input type="password" name="confirmpassword" id="cpassword" onkeyup="main()" placeholder="Re-enter Password">
            <span id="messageMatch" style="font-family: 'Roboto', sans-serif;"></span>

            <input type="file" name="image" id="IMAGE" style="width: 100%;" required>

            <p>Choose profile image</p>
           <button class="btn" type="submit" name="submit" id="submitBtn" style="width: 100%; margin-top:.3em;">Sign Up</button>

            <a href="login.php" target="_blank" class="ar">Already have an account?</a>
        </form>
    </div>

    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "UserAlreadyExists"){
                ?>
                <script>alert("Email/Username is already registered.")</script>
                <?php
            }
            if($_GET["error"] === "imageTypeNotAllowed"){
                ?>
                <script>alert("Images/files of this type aren't allowed. Please choose files of type {jpg, jpeg, png, pdf, webp, JPG} and try again.")</script>
    <?php
            }
    }
                //rest of the error messages
    ?>

</body>
</html>