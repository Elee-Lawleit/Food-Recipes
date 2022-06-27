<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Food Recipes</title>
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

        .loginbox input[type = "email"], input[type = "password"]{
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
            /* padding-inline: 2em; */
            margin-bottom: .4em;
            width: 100%;
        }

        .btn:hover{
            cursor: pointer;
            background: rgb(143, 67, 29);
        }

        .loginbox a{
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: gray;
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
            let emailValue = document.getElementById("Email").value.trim();
            if(emailValue === ""){
                document.getElementById("EmailError").style.color = "red";
                document.getElementById("EmailError").innerHTML = "Email cannnot be empty";
                return false;
            }
            else if(!isNaN(emailValue)){
                document.getElementById("EmailError").style.color = "red";
                document.getElementById("EmailError").innerHTML = "Email cannnot be a number";
                return false;
            }
            else{
                document.getElementById("EmailError").style.color = "green";
                document.getElementById("EmailError").innerHTML = "";
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
            if(checkEmail() && checkPassword()){
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
        <h1>Reset Password</h1>
        <form action="includes/reset.inc.php" method="POST">
            <p>Email</p>
            <input type="email" name="email" id="Email" placeholder="Enter email" onkeyup="main()">
            <span id="EmailError"></span>
            
            <p>New Password</p>
            <input type="password" name="password" id="Password" placeholder="Enter Password" onkeyup="main()">
            
            <p>Confirm Password</p>
            <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter Password" onkeyup="main()">
            <span id="messageMatch"></span>

            <button class="btn" type="submit" name="submit" id="submitBtn">Reset Password</button>
        </form>
    </div>
</body>
</html>