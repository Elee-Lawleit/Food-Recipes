<!DOCTYPE html>
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
            font-family: 'Frank Ruhl Libre', serif;
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
            max-width:55%;
        }
        p{
            font-family: 'Roboto', sans-serif;
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

        img{
            max-width: 400px;
        }
    </style>
</head>
<body>

<?php
    include_once 'header.php';
?>

    <div class="container">
        <h1 class="primaryHeading">Recipe View</h1>
        <div class="innerContainer">
            <div class="headingContainer">
                <img src="recipes/tea.png" alt="recipe image">
            </div>
            <div class="details">
                <h1 class="recipeTitle">Tea made with special indonesian tea leaves</h1>
                <h1>Step 1. Fill up the kettle with water</h1>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum totam perferendis odio!
            </p>
            <h1>Step 2. Boil the kettle.</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex exercitationem et omnis, dicta vero quae delectus labore, ab fuga, facilis laboriosam suscipit cum quidem voluptates aperiam hic ducimus. Quos facilis dolores velit!</p>

            <h1>Step 3. Place a teabag in your favourite mug.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod molestiae accusamus adipisci tempora perferendis atque incidunt harum quisquam commodi, iure, nulla ducimus et?</p>

            <h1>Step 4. Pour boiling water into your favourite mug.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam non dolor quisquam quidem magnam corporis eveniet? Sit nemo cupiditate quidem voluptatum mollitia facilis pariatur magnam nam et, modi asperiores? Enim ratione vel laborum.
                </p>
                <h1>Step 5. Brew the tea for a few moments.</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias ipsa mollitia eum voluptatem nobis ratione tenetur.</p>

                <h1>Remove and dispose of the teabag.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, sed natus veritatis perspiciatis blanditiis delectus sapiente consequuntur vitae dicta aspernatur possimus commodi praesentium consectetur facilis, beatae sequi?</p>

            <h1>Step 6. Add milk.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, totam. Aliquam, laudantium.</p>

            <h1>Step 7. Add sugar</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, porro. Quas, nostrum ipsa? Optio temporibus sequi illum libero quisquam eum incidunt iure voluptate, distinctio in sunt a quos, perferendis doloribus?</p>
        </div>
        </div>
    </div>

    
<?php
    include_once 'footer.php';
?>
</body>
</html>