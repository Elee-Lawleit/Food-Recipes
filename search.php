<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <style>
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* margin: 0 auto; */
            margin-left: 6em;
            gap: -1em;
        }
        .cardBottom {
            margin-block: 1em;
        }
        .margin{
            margin-top: 10em;
        }
        .super {
            background: linear-gradient(#f0f9f9, #f0f9f9 calc(100% - 15rem), #fff);
            margin-top: 2em;
            padding: 1.2em;
        }
    </style>
</head>
<body>
    <?php
        include_once 'header.php';
    ?>

</body>
</html>




<?php
    if(isset($_GET["submit"])){
        require_once 'includes/connection.php';
        $userQuery = $_GET["query"];
    
        $querey = "SELECT * from recipe where recipeTitle LIKE '%$userQuery%';";
        $result = mysqli_query($conn, $querey);
        if(!$result){
            echo"couldn't run query<br>";
            exit();
        }
    
        if(mysqli_num_rows($result) === 0){
            echo"<div style='width: 100vw; text-align: center; margin-right: 5em; font-family: Roboto, sans-serif; font-size: 1rem; margin-top: 10em;'>0 search results found.</div>";
        }
        else{
            echo'
            <div class="super">
            <div class="cards margin">';
            while($row = mysqli_fetch_assoc($result)){
                echo'
                <a href="">
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
                            <form action="includes/bookmark.inc.php" method="POST">
                                    <input type="hidden" name="recipeid" value="'. $row['recipeId'] .'">
                                    <button class="bookmarkBtn" type="submit" name="submit"><i class="fa-solid fa-bookmark bookmarkIcon"></i></button>
                                    </form>
                            </p>
                        </div>
                    </div>
                </a>';
                }
                echo'</div>
                </div>';
        }
    }
    else{
        header("location: index.php");
    }
    include_once 'footer.php';
?>