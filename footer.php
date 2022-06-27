<script>
    function checkEmail(){
        emailValue = document.getElementById("Email1").value.trim();

        if(!emailValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
            document.getElementById("EmailError1").style.color = "red";
            document.getElementById("EmailError1").innerHTML = "Please enter a valid email.";
            document.getElementById("submitBtn").style.opacity = .5;
            document.getElementById("submitBtn").style.cursor = "default";
            document.getElementById("submitBtn").disabled = true;
        }
        else{
            document.getElementById("submitBtn").style.opacity = 1;
            document.getElementById("submitBtn").style.cursor = "pointer";
            document.getElementById("submitBtn").disabled = false;
            document.getElementById("EmailError1").innerHTML = "";
        }
    }
</script>

<footer class="footer" id="footer">
        <div class="footerContainer">
            <div class="iffContainer">
                <div class="footerImgContainer">
                    <div><a href="" class="footerLogoAnchor"><img src="./img/logo1.png" alt="logo" class="footerLogoImg"></a></div>
                </div>
                <div class="formContainer">
                    <h1 class="footerHeading">Ready to cook?</h1>
                    <p class="footerPara">Sign up for our weekly newsletters!</p>
                    <form action="includes/newsletter.inc.php" method="POST">
                        <input type="email" name="email" id="Email1" placeholder="Enter email" onkeyup="checkEmail()">
                        <button type="submit" class="newsBtn" name="submit" id="submitBtn">Sign up</button>
                        <span id="EmailError1" style="font-family: 'Roboto', sans-serif;"></span>
                    </form>
                </div>
                <div class="socialsContainer">
                    <p class="footerParaSocials" style="font-weight: 500;">Let's be friends!</p>
                    <a href="https://www.instagram.com/riyuzaki_/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    
                    <a href="https://www.pinterest.com" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
                    
                    <a href="https://www.facebook.com/profile.php?id=100006478807327" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    
                    <a href="https://twitter.com/ELawleit" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="ulContainer">
                <ul class="ul1">
                    <li><a href="">Recipes</a></li>
                    <li><a href="">quick and easy</a></li>
                    <li><a href="">in the kitchen</a></li>
                    <li><a href="">buying guides</a></li>
                    <li><a href="">holidays and seasons</a></li>
                </ul>
                <ul class="ul2">
                    <li><a href="">About us</a></li>
                    <li><a href="">terms of use</a></li>
                    <li><a href="">editorial guidelines</a></li>
                    <li><a href="">cookies</a></li>
                    <li><a href="">contact us</a></li>
                </ul>
                <ul class="ul3">
                    <li><a href="">Advertise</a></li>
                    <li><a href="">careers</a></li>
                    <li><a href="">privary policy</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <?php

    if(isset($_GET["error"])){
        if($_GET["error"] === "subscriptionFailed"){
            ?> 
            <script>alert("Subscription failed due to an error, please try again later.")</script>
        <?php
        }
         if($_GET["error"] === "loginToSubscribe"){
            ?> 
            <script>alert("Please login to subscribe.")</script>
        <?php
         }
        if($_GET["error"] === "emailAlreadySubscribed"){
            ?> 
            <script>alert("Email already subscribed.")</script>
            <?php
        }
}
    if(isset($_GET["message"])){
        if($_GET["message"] === "registrationSuccessful"){
            ?>
            <script>alert("Registration Successful.")</script>
            <?php
        }
    }
?>