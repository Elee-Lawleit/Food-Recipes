
<?php 
    session_start();
?>

    <header class="header">
        <navbar class="whitesmoke">
            <div class="navContainer1">
                <a href="index.php"><img src="img/logo1.png" alt="logo" class="logo"></a>
                
                <div>
                    <form action="search.php" method="GET">
                        <input type="search" name="query" id="Search" placeholder="Search Recipes" required>
                        <button class="searchBtn" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass searchI" style=""></i></button>
                    </form>
                </div>
            </div>
            <div class="navContainer2">
                <?php
                  if(isset($_SESSION["userid"])){
                      echo"<a href='profile.php'>Profile</a>";
                      echo"<a href='includes/logout.inc.php'>Log out</a>";
                    }
                    else{
                        echo'<a href="signup.php">Sign Up</a>';
                      echo'<a href="login.php">Login</a>';
                    }
                    ?>
                    <a href="contact.php">Contact</a>
                    <a href="index.php#about">about us</a>
            </div>
        </navbar>

        <navbar class="navbar">
            <div class="navContainer3">
                <ul class="navList" style="list-style: none; display: flex;">
                    <li>
                        <a href="index.php">Home
                        </a>
                    </li>
                    <li class="listItem">
                        <a href="">Recipes&nbsp;&nbsp;<i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="dropDown">
                            <li><a href="#" class="dropDownAnchor">Most Recent</a></li>
                            <li><a href="#" class="dropDownAnchor">Breakfast</a></li>
                            <li><a href="#" class="dropDownAnchor">Lunch</a></li>
                            <li><a href="#" class="dropDownAnchor">Dinner</a></li>
                            <li><a href="#" class="dropDownAnchor">Dessert</a></li>
                            <li><a href="#" class="dropDownAnchor">snacks & appetizers</a></li>
                            <li><a href="#" class="dropDownAnchor">holiday & seasonal recipes</a></li>
                            <li><a href="#" class="dropDownAnchor">Recipes by Diet</a></li>
                            <li><a href="#" class="dropDownAnchor">Recipes by method</a></li>
                        </ul>
                    </li>
                    <li class="listItem">
                        <a href="">Quick and easy&nbsp;&nbsp;<i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="dropDown">
                            <li><a href="#" class="dropDownAnchor">Quick dinners</a></li>
                            <li/><a href="#" class="dropDownAnchor">easy and healty</a></li>
                            <li><a href="#" class="dropDownAnchor">quick vegeterian</a></li>
                            <li><a href="#" class="dropDownAnchor">easy pastas</a></li>
                            <li><a href="#" class="dropDownAnchor">easy chicken</a></li>
                        </ul>
                    </li>
                    <li class="listItem">
                        <a href="">in the kitchen&nbsp;&nbsp;<i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="dropDown">
                            <li><a href="#" class="dropDownAnchor">the simply recipes A-Z guide to cooking terms and definitions</a></li>
                            <li><a href="#" class="dropDownAnchor">Meal plans</a></li>
                            <li><a href="#" class="dropDownAnchor">recipe collections</a></li>
                            <li><a href="#" class="dropDownAnchor">tips and techniques</a></li>
                            <li><a href="#" class="dropDownAnchor">ingridient guides</a></li>
                        </ul>
                    </li>

                    <li class="listItem">
                        <a href="">table talk&nbsp;&nbsp;<i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="dropDown">
                        <li><a href="#" class="dropDownAnchor">news and trends</a></li>
                        <li><a href="#" class="dropDownAnchor">voices</a></li>
                    </ul></li>
                    <li class="listItem">
                        <a href="">holiday & seasons&nbsp;&nbsp;<i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="dropDown">
                            <li><a href="#" class="dropDownAnchor">the backyard bash: a digital issue</a></li>
                            <li><a href="#" class="dropDownAnchor">Celebrate Summer</a></li>
                            <li><a href="#" class="dropDownAnchor">Father's Day</a></li>
                            <li><a href="#" class="dropDownAnchor">Grill Recipes</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </navbar>
    </header>
