<?php


    require_once 'includes/connection.php';
    include_once 'header.php';
    // session_start();
    $userid = $_SESSION["userid"];
    $query1 = "SELECT userName, userEmail, userImg from users where userId = '$userid'";
    $query2 = "SELECT count(recipeId) as totalRecipes from recipe where userId = '$userid'";
    $query3 = "SELECT count(userId) as totalBookmarks from bookmarks where userId = '$userid'";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);
    $result3 = mysqli_query($conn, $query3);
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    $row3 = mysqli_fetch_assoc($result3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="modal/edit.css?v=<?php echo time(); ?>">
    <title>Profile - Food Recipes</title>

    <style>
        .mainContainer {
            /* margin-top: 10em; */
            /* max-width: 90rem; */
            display: flex;
            flex-direction: column;
            /* border: 2px solid red; */
            margin: 10em auto 0 auto;
        }

        .profileContainer {
            /* max-width: 70rem; */
            /* display: flex;
            flex-direction: column;
            justify-content: center; */
            /* border: 2px solid green; */
            display: flex;
            gap: 12em;
            justify-content: space-evenly;
            align-items: center;
            margin: 0 auto;
        }

        .detailsContainer {
            /* width: 50%; */
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            justify-content: center;
            align-items: flex-start;
            gap: 2em;
        }

        .editContainer {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            gap: .3em;
        }

        .countContainer {
            /* display: flex; */
        }

        .profileImg {
            width: 350px;
            height: 420px;
            border: 1px solid #ffd977;
        }

        .nameHeading {
            font-weight: 400;
            font-family: 'Frank Ruhl Libre', serif;
            font-size: 3.2rem;
        }

        .emailPara {
            font-family: 'Roboto', sans-serif;
            font-size: 1.1rem;
        }

        .btn {
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
            width: 100%;
        }

        .btn:hover {
            cursor: pointer;
            background: rgb(143, 67, 29);
        }

        .countContainer {
            display: flex;
            gap: 3em;
        }

        .count {
            font-family: 'Roboto', sans-serif;
            font-size: .95rem;
        }


        /* login box styling */

        input[type="email"],
        input[type="text"] {
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            padding-left: .875rem;
            border: 1px solid #cc754981;
            width: 300px;
            padding-block: .50em;
            outline: none;
            margin: .3em;
        }

        form>p {
            font-family: 'Roboto', sans-serif;
            margin: .4em;
        }

        form>.btn {
            border: none;
            outline: none;
            height: 40px;
            background-color: #ac4511 !important;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
            display: block;
            padding-inline: 5em;
            margin-bottom: .4em;
            margin-top: .8em;
            width: 100%;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* margin: 0 auto; */
            margin-left: 6em;
            gap: -1em;
        }

        .primaryHeading {
            margin-bottom: .2em;
            text-align: center;
            font-size: 3.5rem;
            text-transform: capitalize;
            font-family: 'Frank Ruhl Libre', serif;
            font-weight: 300;
        }

        .cardBottom {
            margin-block: 1em;
        }

        .super {
            background: linear-gradient(#f0f9f9, #f0f9f9 calc(100% - 15rem), #fff);
            margin-top: 2em;
            padding: 1.2em;
        }
        .form-block{
            padding: 2em;
            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: column;
            gap: .4em;
        }

        .imageLabel{
            display: block;
            /* text-align: center; */
        }
        input[type="file"]{
            display: block;
            text-align: center;
            margin: 0 auto;
        }
        select{
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            padding-left: .875rem;
            border: 1px solid #cc754981;
            width: 300px;
            padding-block: .50em;
            outline: none;
            margin: .3em;
        }
        .caret{
            color: teal;
        }
        textarea{
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            padding-left: .875rem;
            border: 1px solid #cc754981;
            width: 300px;
            padding-block: .50em;
            outline: none;
            margin: .3em;
            resize: none;
        }
        .imgUpload{
            width: 100%;
        }
        .mt{
            margin-top: .4em;
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

        function checkEmailChange(){
            emailValue = document.getElementById("Email").value.trim();

            if(!emailValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                document.getElementById("EmailError").style.color = "red";
                document.getElementById("EmailError").innerHTML = "Please enter a valid email.";
                return false;
            }
            else if(emailValue === ""){
                document.getElementById("EmailError").style.color = "red";
                document.getElementById("EmailError").innerHTML = "Please enter a valid email.";
                return false;
            }
            else{
                document.getElementById("EmailError").style.color = "green";
                document.getElementById("EmailError").innerHTML = "";
                return true;
            }
        }

        function main1() {
            if (checkUsername() && checkEmailChange()) {
                document.getElementById("submitBtn2").disabled = false;
                document.getElementById("submitBtn2").style.opacity = 1;
                document.getElementById("submitBtn2").style.cursor = "pointer";
            }
            else {
                document.getElementById("submitBtn2").style.opacity = .5;
                document.getElementById("submitBtn2").style.cursor = "default";
                document.getElementById("submitBtn2").disabled = true;
            }
        }

        function checkTitle() {
            let TitleValue = document.getElementById("RecipeTitle").value.trim();
            if (TitleValue === "") {
                document.getElementById("TitleError").style.color = "red";
                document.getElementById("TitleError").innerHTML = "Title cannnot be empty";
                return false;
            }
            else if (!isNaN(TitleValue)) {
                document.getElementById("TitleError").style.color = "red";
                document.getElementById("TitleError").innerHTML = "Title cannnot be a number";
                return false;
            }
            else {
                document.getElementById("TitleError").style.color = "green";
                document.getElementById("TitleError").innerHTML = "";
                return true;
            }
        }

        function checkTime() {
            let RecipeTime = document.getElementById("RecipeTime").value;
            // alert(RecipeTime);

            if (RecipeTime === "00:00") {
                document.getElementById("TimeError").style.color = "red";
                document.getElementById("TimeError").innerHTML = "Please enter a valid time";
                return false;
            }
            else {
                document.getElementById("TimeError").style.color = "green";
                document.getElementById("TimeError").innerHTML = "";
                return true;
            }
        }

        function main() {
            if (checkTitle() && checkTime()) {
                document.getElementById("submitBtn1").disabled = false;
                document.getElementById("submitBtn1").style.opacity = 1;
                document.getElementById("submitBtn1").style.cursor = "pointer";
            }
            else {
                document.getElementById("submitBtn1").style.opacity = .5;
                document.getElementById("submitBtn1").style.cursor = "default";
                document.getElementById("submitBtn1").disabled = true;
            }
        }
    </script>

    <div class="mainContainer">
        <div class="profileContainer">
            <div class="imgContainer">
                <?php echo '<img class="profileImg" src="data:image;base64,' . base64_encode( $row1['userImg']) . '">'; ?> 
            </div>
            <div class="detailsContainer">
                <div class="editContainer">
                    <h2 class="nameHeading">
                        <?php
                        echo $row1["userName"];
                        ?>
                    </h2>
                    <p class="emailPara">
                        <?php
                        echo $row1["userEmail"];
                        ?>
                    </p>
                </div>
                <div class="countContainer">
                    <p class="count">
                        <?php
                        echo $row2["totalRecipes"];
                        ?> uploaded recipe(s)
                    </p>
                    <p class="count">
                        <?php
                        echo $row3["totalBookmarks"];
                        ?> bookmark(s)
                    </p>
                </div>
                <div class="btndiv">
                    <button class="modal-btn btn">Edit Profile</button>
                    <button class="modal-btn2 btn">Upload Recipe</button>
                </div>
            </div>
        </div>
        <div class="super">
            <h1 class="primaryHeading">Uploaded Recipes</h1>
            <div class="cards margin">
                <?php
                        $query = "SELECT * from recipe where userId = '$userid'";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) === 0){echo"<div style='width: 100vw; text-align: center; margin-right: 5em; font-family: Roboto, sans-serif; font-size: 1rem;'>No recipes uploaded yet</div>";}
                        else{
                        while($row = mysqli_fetch_assoc($result)){
                        echo'<a href="'. $row["recipePath"] . '">
                            <div class="cardRight cardBottom">
                                <div class="imgContainerRight">
                                    <img src="data:image;base64,' . base64_encode( $row['recipeImg']) . '">'.
                                '</div>
                                <div class="cardContentRight">
                                    <p class="cardTitleRight">'.
                                        $row["recipeCategory"] .
                                    '</p>
                                    <h2 class="cardHeadingRight">'.
                                        $row["recipeTitle"]
                                    .'</h2>
                                    <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left" style="color: teal;"></i>  '
                                    .$row["recipeTime"]  .' hrs
                                    <div class="formControl" style="display: flex; gap: 1em;">
                                        <form action="includes/bookmark.inc.php" method="POST">
                                            <input type="hidden" name="recipeid" value="'. $row['recipeId'] .'">
                                            <button class="bookmarkBtn" type="submit" name="submit"><i class="fa-solid fa-bookmark bookmarkIcon" title="Bookmark Recipe"></i></button>
                                            </form>
                                        <form action="includes/deleteRecipe.inc.php" method="POST">
                                            <input type="hidden" name="recipeid" value="'. $row['recipeId'] .'">
                                            <button class="bookmarkBtn" type="submit" name="submit"><i class="fa-solid fa-trash bookmarkIcon" title="Delete Recipe"></i></button>
                                            </form>
                                </div>
                                    </p>
                                </div>
                            </div>
                        </a>';
                        }
                    }
                    ?>
            </div>
            <h1 class="primaryHeading" style="margin-top: .6em;">Bookmarks</h1>
            <div class="cards margin">
                <?php
                        $query = "SELECT r.* from bookmarks b, recipe r where b.recipeId = r.recipeId and b.userId = '$userid';";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) === 0){echo"<div style='width: 100vw; text-align: center; margin-right: 5em; font-family: Roboto, sans-serif; font-size: 1rem;'>No recipes bookmarked</div>";}
                        else{
                        while($row = mysqli_fetch_assoc($result)){
                        echo'<a href="'. $row["recipePath"] . '">
                            <div class="cardRight cardBottom">
                                <div class="imgContainerRight">
                                    <img src="data:image;base64,' . base64_encode( $row['recipeImg']) . '">'.
                                '</div>
                                <div class="cardContentRight">
                                    <p class="cardTitleRight">'.
                                        $row["recipeCategory"] .
                                    '</p>
                                    <h2 class="cardHeadingRight">'.
                                        $row["recipeTitle"]
                                    .'</h2>
                                    <p class="cardTimeRight"><i class="fa-solid fa-clock-rotate-left" style="color: teal;"></i>  '
                                    .$row["recipeTime"]  .' hrs
                                    <div class="formControl" style="display: flex; gap: 1em;">
                                            <form action="includes/bookmark.inc.php" method="POST">
                                                    <input type="hidden" name="recipeid" value="'. $row['recipeId'] .'">
                                                    <button class="bookmarkBtn" type="submit" name="submit"><i class="fa-solid fa-bookmark bookmarkIcon" title="Bookmark Recipe"></i></button>
                                                    </form>
                                            <form action="includes/deleteBookmarks.inc.php" method="POST">
                                                    <input type="hidden" name="recipeid" value="'. $row['recipeId'] .'">
                                                    <button class="bookmarkBtn" type="submit" name="submit"><i class="fa-solid fa-trash bookmarkIcon" title="Delete Bookmark"></i></button>
                                                    </form>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </a>';
                        }
                    }
                    ?>
            </div>
        </div>
    </div>

    </div>
    <div class="modal-bg">
        <div class="modal">
            <form action="includes/update.inc.php" method="post" enctype="multipart/form-data">
                <p>New username</p>
                <input type="text" name="newUsername" id="Username" placeholder="Enter new username" onkeyup="main1()">
                <span id="invalidUsername"  style="font-family: 'Roboto', sans-serif; display: block;"></span>

                <p>New email</p>
                <input type="email" name="newEmail" id="Email" placeholder="Enter new email" onkeyup="main1()">
                <span id="EmailError" style="font-family: 'Roboto', sans-serif; display: block;"></span>

                <p>New image</p>
                <input type="file" name="image" id="IMAGE" required>

                <button class="btn" type="submit" name="submit" id="submitBtn2">Update</button>
            </form>
            <span class="modal-close">X</span>
        </div>
    </div>

    <div class="modal-bg2">
        <div class="modal2">
        <form action="includes/upload.inc.php" class="form" id="Form" enctype="multipart/form-data" method="post">
                <div class="form-block">
                    <label class="titleLabel" for="RecipeTtitle">Enter recipe title: </label>
                    <input type="text" name="recipeTitle" id="RecipeTitle" onkeyup="main()" placeholder="eg: egyptian iced tea">
                    <span id="TitleError"></span>

                    <label class="catLabel" for="RecipeCat">Enter recipe category: </label>
                    <select name="recipeCat" id="RecipeCat">
                        <option value="uncategorized">uncategorized</option>
                        <option value="drinks">Drinks</option>
                        <option value="pastas">pastas</option>
                        <option value="salads">salads</option>
                        <option value="salads">dinners</option>
                        <option value="salads">recipes</option>
                    </select>

                    <label for="RecipeTime">Enter recipe time (hours/minutes): </label>
                    <input type="text" class="html-duration-picker" name="recipeTime" id="RecipeTime" onkeyup="main()" data-hide-seconds required>
                    <span id="TimeError"></span>

                    <label for="RecipeDetail">Enter recipe details</label>
                    <textarea name="recipeDetail" id="RecipeDetail" cols="30" rows="5" placeholder="1. Prepare the tea bags..."></textarea>

                    <label class="imageLabel" for="IMAGE">Upload image</label>
                    <input class="imgUpload" type="file" name="image" id="IMAGE" required>

                    <button class="btn mt" type="submit" name="submit" id="submitBtn1">Upload Recipe</button>
                </div>
            </form>
            <span class="modal-close2">X</span>
        </div>
    </div>

    <!-- script file for modal pop up -->
    <script src="modal/edit.js"></script>

    <!-- script file to record time duration -->
    <script src="html-duration-picker.min.js"></script>

    <?php
        include_once 'footer.php';
    ?>


    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] === "alreadyInUse"){
                ?>
            <script>alert("Username/email already in use.")</script>
    <?php
            }
            if($_GET["error"] === "recipeUploadFailed"){
                ?>
                <script>alert("Recipe upload failed. Please try again later.")</script>
    <?php
            }
            if($_GET["error"] === "imageTypeNotAllowed"){
                ?>
                <script>alert("Images/files of this type aren't allowed. Please choose files of type {jpg, jpeg, png, pdf, webp, JPG} and try again.")</script>
    <?php
            }
        }
        if(isset($_GET["message"])){
            if($_GET["message"] === "recipeUploadedSuccessfully"){
                ?>
                <script>alert("Recipe Uploaded.")</script>
    <?php
            }
            if($_GET["message"] === "bookmarkDeleted"){
                ?>
                <script>alert("Bookmark Deleted.")</script>
    <?php
            }
            if($_GET["message"] === "recipeDeleted"){
                ?>
                <script>alert("Recipe Deleted.")</script>
    <?php
            }
        }
    ?>
</body>

</html>