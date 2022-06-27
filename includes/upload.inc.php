<?php

session_start();

if(isset($_POST["submit"])){
    if(isset($_SESSION["userid"])){

    }
    require_once 'connection.php';
    require_once 'functions.inc.php';

    $recipeTitle = $_POST["recipeTitle"];
    $recipeCat = $_POST["recipeCat"];
    $recipeTime = $_POST["recipeTime"];
    $recipeDetail = $_POST["recipeDetail"];


    // **********  SETTING UP THE IMAGE ***********

    $file = $_FILES["image"];

    $fileName = basename($file["name"]);
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    

    $allowedTypes = array("jpg", "jpeg", "png", "pdf", "webp");

    if(in_array($fileType, $allowedTypes)){
        $image = $file["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
    }
    else{
        header("location: ../profile.php?error=imageTypeNotAllowed");
        exit();
    }
    
    // **********  SETTING UP THE UPLOADED RECIPE PATH ***********

    $pageName = str_replace(" ", "-", $recipeTitle);
    $pageName = addslashes($pageName);
    $pageName = $pageName . uniqid(".", true);
    $writePath = fopen("../" . $pageName . ".php", "w");
    $newRecipePage = $pageName . ".php";
    $pageDesign = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <style>
            .container{
                padding-top: 14em;
                background: linear-gradient(#f0f9f9, #f0f9f9 calc(100% - 15rem), #fff);
            }
            h1{
                font-family: "Frank Ruhl Libre", serif;
                font-weight: 400;
                text-transform: capitalize;
            }
            .innerContainer{
                max-width: 90%;
                display: flex;
                /* flex-direction: column; */
                line-height: 2em;
                margin-left: 10em;
                gap: 7em;
                /* justify-content: space-evenly; */
            }
            .details{
                /* max-width: 40rem; */
                display: flex;
                flex-direction: column;
                gap: 2em;
                margin-top: 1em;
                margin-bottom: 3em;
                max-width:43%;
            }
            p{
                font-family: Roboto, sans-serif;
            }
            .primaryHeading{
                text-align: center;
                font-family: inherit;
                font-size: 4rem;
                margin-bottom: 1em;
                text-decoration: underline #ac4511;
            }
            .primaryHeading:hover{
                text-decoration: underline orange;
            }
            .recipeTitle{
                font-size: 3rem;
                line-height: 1em;
                /* text-align: left; */
            }
            .headingContainer{
                max-width: 40%;
                display: flex;
                flex-direction: column;
                gap: 1em;
            }
    
            .headingContainer img{
                max-width: 648px;
                height: 971px;
            }
        </style>
    </head>
    <body>
    
    <?php
        include_once "header.php";
    ?>
    
        <div class="container">
            <h1 class="primaryHeading">Recipe View</h1>
            <div class="innerContainer">
                <div class="headingContainer">
                    <img src="recipes/haitan.webp" alt="recipe image">
                </div>
                <div class="details">
                    <h1 class="recipeTitle">' .$recipeTitle. '</h1>
                    <h1>Step 1. Lorem ipsum dolor sit amet.</h1>
                    <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum totam perferendis odio!
                </p>
                <h1>Step 2. Lorem, ipsum dolor.</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex exercitationem et omnis, dicta vero quae delectus labore, ab fuga, facilis laboriosam suscipit cum quidem voluptates aperiam hic ducimus. Quos facilis dolores velit!</p>
    
                <h1>Step 3. Lorem, ipsum.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod molestiae accusamus adipisci tempora perferendis atque incidunt harum quisquam commodi, iure, nulla ducimus et?</p>
    
                <h1>Step 4.Lorem ipsum dolor sit amet </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam non dolor quisquam quidem magnam corporis eveniet? Sit nemo cupiditate quidem voluptatum mollitia facilis pariatur magnam nam et, modi asperiores? Enim ratione vel laborum.
                    </p>
    
                <h1>Step 5.  Sit nemo cupiditate quidem</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias ipsa mollitia eum voluptatem nobis ratione tenetur.</p>
    
                    <h1>Step 6. Sit nemo cupiditate quidem voluptatum mollitia </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, sed natus veritatis perspiciatis blanditiis delectus sapiente consequuntur vitae dicta aspernatur possimus commodi praesentium consectetur facilis, beatae sequi?</p>
    
                <h1>Step 7. Modi asperiores, Enim ratione vel laborum.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, totam. Aliquam, laudantium.</p>
    
                <h1>Step 8. Libero quisquam eum</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, porro. Quas, nostrum ipsa? Optio temporibus sequi illum libero quisquam eum incidunt iure voluptate, distinctio in sunt a quos, perferendis doloribus?</p>
            </div>
            </div>
        </div>

    <?php
        include_once "footer.php";
    ?>
    </body>
    </html>';
    
    fwrite($writePath, $pageDesign);

    uploadRecipe($conn, $recipeTitle, $recipeCat, $recipeTime, $imgContent, $recipeDetail, $newRecipePage);

    // $fileName = $file["name"];
    // $fileTemporaryLocation = $file["tmp_name"];
    // $fileSize = $file["size"];
    // $fileError = $file["error"];
    // $fileType = $file["type"];

    // //explode is used to tear apart strings
    // //explode(the part where we want to seperate from, the string)

    // //fileType is going to become an array with 2 indeces

    // $fileType = explode(".", $fileName);

    // //so it won't matter if the file extension is in upercase or lowercase


    // //since there are going to be two parts in the fileType array, 0: the file name, 1:the file extension, we want the data that's at the end of the array so we use the end() , which returns whatever is at the last index of an array, 1, in this case

    // $fileExtension = strtolower(end($fileType));

    // $allowedTypes = array("jpg", "jpeg", "png", "pdf", "webp");

    // //in_array(the thing we want to check, the reference)
    // if(in_array($fileExtension, $allowedTypes)){
    //     //checking if there were any errors uploading  the file
    //     if($fileError === 0){
    //         //checking file size
    //         if($fileSize  < 500000){
    //             //assinging a unique id to the image and making it its new name so if someone uploads a file with the same name, the previous one doesn't get overwritten

    //             //true generates a unique id based on time (in microseconds), so the id literally can't be same, because you know

    //             //concatinating the file extension at the end there
    //             $fileNameNew = uniqid("", true).".".$fileExtension;
    //             $fileDestination = "../img/uploads/".$fileNameNew;

    //             move_uploaded_file($fileTemporaryLocation, $fileDestination);
    //             echo "Recipe Uploaded successfully!";
    //             // header("location: ../index.php?UploadSuccessful");
    //         }
    //         else{
    //             echo "File too big (that's what she said)";
    //         }
    //     }
    //     else{
    //         echo"There was an error uploading your file.";
    //     }
    // }
    // else{
    //     echo "Files of this type are not allowed.";
    // }
}