

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backyard Bash Recipes</title>
    <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="style.css" rel="stylesheet">
    <style>
        body{    
            background: linear-gradient(#f0f9f9, #f0f9f9 calc(100% - 15rem), #fff);
            /* display: flex; */
            /* flex-direction: column; */
            /* gap :3em; */
        }
        .cards{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* margin: 0 auto; */
            margin-left: 6em;
            gap: -1em;
        }
        .primaryHeading{
            margin-top: 3.3em;
            margin-bottom: 1em;
            text-align: center;
            font-size: 4rem;
            text-transform: capitalize;
            font-family: 'Frank Ruhl Libre', serif;
            font-weight: 300;
        }
        .cardBottom{
            margin-block: 1em;
        }
    </style>
</head>


<?php
    include_once 'header.php';
?>

<body>

    <h1 class="primaryHeading">All recipes</h1>
    <div class="cards margin">
    <?php
        require_once 'includes/connection.php';
        $query = "SELECT * from recipe order by recipeId desc;";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
        echo'<a href="">
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
    ?>
    </div>


<?php
include_once 'footer.php';
?>
</body>

</html>