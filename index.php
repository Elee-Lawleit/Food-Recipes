<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recipes - Meet all your recipe needs</title>

    <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>


    <?php
        include_once 'header.php';
     ?>

    <section class="action">

        <div class="left">
            <div class="imgContainer">
                <img src="./img/primary_img.webp" alt="" class="primaryImg">
                <div class="card">
                    <fieldset>
                        <legend style="text-align: center;">Voices</legend>
                        <div class="cardContent">
                            <h1 class="backHeading">Backyard Bash</h1>
                            <p class="backPara">Backyard Bash: Simply Recipes Digital Issue No. 1
                            </p>
                            <a href="" class="backAnchor">get the recipe<i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="right">
            <a href="all.php" class="headingRight">
                <h1>Join Our Backyard Bash<i style="transform: translateY(5px); color: brown; font-size: 2rem;"
                        class="fa-solid fa-arrow-right-long"></i></h1>
            </a>

            <?php

            require_once 'includes/connection.php';
            $query = "SELECT * from recipe order by recipeId desc;";
            $result = mysqli_query($conn, $query);
            $a = 1;
            while($a <= 6){
                $row = mysqli_fetch_assoc($result);
            echo "<a href='". $row["recipePath"] . "'>
                <div class='cardRight'>
                    <div class='imgContainerRight'>" .
                        "<img src='data:image;base64," . base64_encode( $row['recipeImg']) . "'>
                    </div>
                    <div class='cardContentRight'>
                        <p class='cardTitleRight'>" .
                        $row['recipeCategory'] 
                        . "</p>
                        <h2 class='cardHeadingRight'>".
                        $row['recipeTitle'].
                        "</h2>
                        <p class='cardTimeRight'>
                            <i class='fa-solid fa-clock-rotate-left' style='color: teal;'></i> ".
                            $row['recipeTime']  ." hrs
                            <form action='includes/bookmark.inc.php' method='POST'>
                            <input type='hidden' name='recipeid' value='". $row['recipeId'] ."'>
                            <button class='bookmarkBtn' type='submit' name='submit'><i class='fa-solid fa-bookmark bookmarkIcon' title='Bookmark Recipe'></i></button>
                            </form>
                        </p>
                    </div>
                </div>
            </a>";
            $_SESSION["recipeid"] = $row["recipeId"];
            $a++;
            }
            ?>
        </div>
    </section>

    <div class="cardSection minus180">
        <div class="holderContainer">
            <div class="miniSection">
                <div class="headingContainer">
                    <a href="">
                        <h1 class="cardBottomHeading">Plan your backyard  bash<i
                                style="transform: translateY(1px); color: brown; font-size: 1.6rem;"
                                class="fa-solid fa-arrow-right-long"></i></h1>
                    </a>
                </div>
                <div class="cards">
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/back1.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    family dinners
                                </p>
                                <h2 class="cardHeadingRight">
                                    grilled pork chops with adobo paste
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    45 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/back2.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    pies
                                </p>
                                <h2 class="cardHeadingRight">
                                    bourbon peach hand pies
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    55 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/back3.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    easy snacks and appetizers
                                </p>
                                <h2 class="cardHeadingRight">
                                   grilled bacon-wrapped salmon bites with lemon garlic mayo
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                    style="color: teal;"></i>
                                41 mins
                            </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="teamSection" id="about">
        <div class="teamLeft">
            <i class="fa-solid fa-bowl-food" style="font-size: 3rem;"></i>
            <h1 class="teamLeftHeading">The Food Recipes Team</h1>
            <p class="teamLeftPara">Simply Recipes is a trusted resource for home cooks with more than 3,000 tested
                recipes, guides, and meal plans, drawing over 15 million readers each month from around the world. We're
                supported by a group of recipe developers, food writers, recipe and product testers, photographers, and
                other creative professionals.</p>
            <button class="teamLeftbtn" onclick="document.location='about.php'">Read More <span>></span></button>
        </div>
        <div class="teamRight">
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer1.webp" alt=""
                        class="aImg">
                    <p>Kalisa Martin</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer2.webp" alt=""
                        class="aImg">
                    <p>Lori Rice</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer3.webp" alt=""
                        class="aImg">
                    <p>Cambrea Gordon</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer4.webp" alt=""
                        class="aImg">
                    <p>Ariane Resnick</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer5.webp" alt=""
                        class="aImg">
                    <p>Elana Lepkowski</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer6.webp" alt=""
                        class="aImg">
                    <p>Emma Christensen</p>
                    <p>Editor-in-Chief</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer7.webp" alt=""
                        class="aImg">
                    <p>Su-Jit-Lin</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer8.webp" alt=""
                        class="aImg">
                    <p>Liz Tarpy</p>
                    <p>Editor </p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer9.webp" alt=""
                        class="aImg">
                    <p>Jotaro Kujo</p>
                    <p>Contributing writer</p>
                </a></div>
            <div class="teamImgContainer"><a href="" class="teamImgAnchor"><img src="./img/contributer10.webp" alt=""
                        class="aImg">
                    <p>Wanda Abraham</p>
                    <p>Contributing writer</p>
                </a></div>
        </div>
    </section>

    <section class="cardSection">
        <div class="holderContainer">
            <div class="miniSection">
                <div class="headingContainer">
                    <a href="">
                        <h1 class="cardBottomHeading">Summer Dining!<i
                                style="transform: translateY(1px); color: brown; font-size: 1.6rem;"
                                class="fa-solid fa-arrow-right-long"></i></h1>
                    </a>
                </div>
                <div class="cards">
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom1.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    Easy dinners
                                </p>
                                <h2 class="cardHeadingRight">
                                    Greek Chicken Skewers with Yougurt Sauce (Chicken Souvlaki)
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    30 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom2.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    SALADS
                                </p>
                                <h2 class="cardHeadingRight">
                                    Easy Steak saland with lemon vinaigrette
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    20 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom3.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    table talk
                                </p>
                                <h2 class="cardHeadingRight">
                                    why my summmer celebrations always include a corn on the cob bar
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="miniSection">
                <div class="headingContainer">
                    <a href="">
                        <h1 class="cardBottomHeading">Dynamic Dressings<i
                                style="transform: translateY(1px); color: brown; font-size: 1.6rem;"
                                class="fa-solid fa-arrow-right-long"></i></h1>
                    </a>
                </div>
                <div class="cards">
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom4.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    salad dressings
                                </p>
                                <h2 class="cardHeadingRight">
                                    Thousand Island Dressing
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    10 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom5.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    Most recent
                                </p>
                                <h2 class="cardHeadingRight">
                                    greek and salad dressing
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    5 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom6.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    salad dressings
                                </p>
                                <h2 class="cardHeadingRight">
                                    creamy blue cheese dressing
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    15 mins
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="miniSection">
                <div class="headingContainer">
                    <a href="">
                        <h1 class="cardBottomHeading">Bapsang Meals<i
                                style="transform: translateY(1px); color: brown; font-size: 1.6rem;"
                                class="fa-solid fa-arrow-right-long"></i></h1>
                    </a>
                </div>
                <div class="cards">
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom13.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    quick dinners
                                </p>
                                <h2 class="cardHeadingRight">
                                    Korean beef skewers
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    18 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom14.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    snacks and appetizers
                                </p>
                                <h2 class="cardHeadingRight">
                                    soy sauce eggs
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    27 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom15.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    comfort food
                                </p>
                                <h2 class="cardHeadingRight">
                                    Kimchi jjigae (korean kimchi stew)
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    55 mins
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="miniSection">
                <div class="headingContainer">
                    <a href="">
                        <h1 class="cardBottomHeading">Pie Me!<i
                                style="transform: translateY(1px); color: brown; font-size: 1.6rem;"
                                class="fa-solid fa-arrow-right-long"></i></h1>
                    </a>
                </div>
                <div class="cards">
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom7.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    Pie crusts
                                </p>
                                <h2 class="cardHeadingRight">
                                    how to blind bake a pie crust
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    80 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom8.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    pies
                                </p>
                                <h2 class="cardHeadingRight">
                                    peach raspberry pie
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    85 mins
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom9.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    pies
                                </p>
                                <h2 class="cardHeadingRight">
                                    coconut cream pie
                                </h2>
                                <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left"
                                        style="color: teal;"></i>
                                    70 mins
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="miniSection">
                <div class="headingContainer">
                    <a href="">
                        <h1 class="cardBottomHeading">Kitchen tips and tricks<i
                                style="transform: translateY(1px); color: brown; font-size: 1.6rem;"
                                class="fa-solid fa-arrow-right-long"></i></h1>
                    </a>
                </div>
                <div class="cards">
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom10.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    in the kitchen
                                </p>
                                <h2 class="cardHeadingRight">
                                    how to line cake and loaf pans with parchment
                                </h2>
                                <p class="cardTimeRight">

                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom11.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    best kitchen items
                                </p>
                                <h2 class="cardHeadingRight">
                                    how to stock a home bar: The essential bottles of liquor, liqueur, bitters, and wine
                                </h2>
                                <p class="cardTimeRight">
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="cardRight cardBottom">
                            <div class="imgContainerRight">
                                <img src="./img/cardBottom12.webp" alt="">
                            </div>
                            <div class="cardContentRight">
                                <p class="cardTitleRight">
                                    cooking tips & techniques
                                </p>
                                <h2 class="cardHeadingRight">
                                    how to freeze an unbaked pie
                                </h2>
                                <p class="cardTimeRight">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <?php
        include_once 'footer.php';
     ?>

     <?php
        if(isset($_GET["error"])){
            if($_GET["error"] === "recipeAlreadyBookmarked"){
                ?>
                <script>alert("Recipe is already bookmarked.")</script>
                <?php
            }
            if($_GET["error"] === "errorBookmarkingRecipe"){
                ?>
                <script>alert("Something went wrong. Please try again later.")</script>
                <?php
            }
        }

        if(isset($_GET["message"])){
            if($_GET["message"] === "recipeBookmarked"){
                ?>
                <script>alert("Recipe bookmarked successfully.")</script>
                <?php
            }
        }
     ?>


</body>

</html>