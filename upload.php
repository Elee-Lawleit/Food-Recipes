<?php
    session_start();

    if(!isset($_SESSION["userid"]))
        header("location: signup.php?error=LogintoUploadRecipes");
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
         // alert("running");
         
    </script>

    <div class="container">
        <form action="includes/upload.inc.php" class="form" id="Form" enctype="multipart/form-data" method="post">
            <div class="form-block">
                <label for="RecipeTtitle">Enter recipe Title: </label>
                <input type="text" name="recipeTitle" id="RecipeTitle" onkeyup="main()"><br>
                <span id="TitleError"></span>

                <label for="RecipeCat">Enter recipe category: </label>
                <select name="recipeCat" id="RecipeCat">
                    <option value="uncategorized">uncategorized</option>
                    <option value="drinks">Drinks</option>
                    <option value="pastas">pastas</option>
                    <option value="salads">salads</option>
                </select><br>

                <label for="RecipeTime">Enter recipe time (hours/minutes): </label>
                <input type="text" class="html-duration-picker" name="recipeTime" id="RecipeTime"  onkeyup="main()" data-hide-seconds required><br>
                <span id="TimeError"></span>

                <label for="RecipeDetail">Enter recipe details</label><br>
                <textarea name="recipeDetail" id="RecipeDetail" cols="30" rows="10"></textarea>

                <label for="">Upload image</label>
                <input type="file" name="image" id="IMAGE">

                <button type="submit" name="submit" id="submitBtn">Upload Recipe</button>
            </div>
        </form>
    </div>
    <script src="html-duration-picker.min.js"></script>
</body>
</html>