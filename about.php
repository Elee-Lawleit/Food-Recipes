<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Food Recipes</title>
    <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="style.css" rel="stylesheet">

    <style>
        .aboutContainer {
            max-width: 80rem;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            margin-top: 10em;
            /* margin-bottom:10em; */
        }

        .aboutContainer h1 {
            /* text-align: center; */
            font-family: 'Frank Ruhl Libre', serif;
            color: #222;
            font-weight: 400;
            text-transform: capitalize;
            margin: 1em;
        }

        .primaryheading {
            text-align: center;
            font-size: 3rem;
        }

        .usContainer {
            display: flex;
            flex-direction: column;
        }

        .usList {
            display: flex;
            list-style-type: none;
            justify-content: center;
            gap: 1em;
        }

        .usList li a {
            text-decoration: none;
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            color: #004d4d;
            font-size: .9rem;
            font-weight: 500;
        }

        .usList li a:hover {
            text-decoration: underline;
        }

        .aboutWidth {
            max-width: 45%;
            margin: 0 auto;
        }

        p {
            font-family: 'Roboto', sans-serif;
            letter-spacing: .2px;
            line-height: 1.5em;
            margin-block: 1em;
        }
    </style>
</head>

<body>

        <?php 
            include_once 'header.php';
        ?>

    <div class="aboutContainer">
        <div class="usContainer">
            <h1 class="primaryheading">About Food Recipes</h1>
            <ul class="usList">
                <li><a href="#who">who we are</a></li>
                <li><a href="#history">our history</a></li>
                <li><a href="#rdt">recipe developent & testing</a></li>
                <li><a href="#diversity">diversity & inculsion</a></li>
                <li><a href="#comment">comments</a></li>

            </ul>
            <div class="aboutWidth">
                <div class="whoContainer" id="who">
                    <h1>
                        who we are
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quisquam odit, quo, deleniti
                        id cum
                        distinctio non laboriosam pariatur sapiente autem illum provident, accusamus voluptatum.
                        Voluptates, aut
                        molestias. Sunt, dicta.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique voluptatum placeat provident
                        voluptates voluptas recusandae, tempore facere. Ipsa aliquam, provident dolore odit enim quam
                        vel illo
                        maxime maiores sapiente quod nam pariatur nostrum adipisci reiciendis iure blanditiis quos nulla
                        aspernatur alias ut corporis? Rerum, adipisci minima? Itaque rem ut delectus numquam mollitia
                        odio
                        aspernatur, tempora distinctio?</p>
                </div>

                <div class="historyContainer" id="history">
                    <h1>our history</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat incidunt recusandae fugit velit.
                        Cum expedita animi provident nihil ipsam explicabo corrupti voluptatem dolorum maxime itaque
                        dignissimos placeat, ex amet consequuntur eaque voluptatibus, iusto odit recusandae vero libero?
                        Nemo maiores officiis id aut tenetur facilis, quisquam nesciunt non molestiae, consequuntur
                        soluta iste nam aliquam error minima ipsa?</p>
                </div>

                <div class="rdtContainer" id="rdt">
                    <h1>Recipe Development & Testing</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis unde tenetur laboriosam,
                        omnis in voluptates, sapiente tempora, officiis ratione aperiam labore a delectus?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, odit.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nostrum recusandae beatae
                        quasi ipsam dicta illum ex, quos voluptas quis magni veritatis?</p>
                </div>

                <div class="diversityContainer" id="diversity">
                    <h1>
                        diversity and inclusion
                    </h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum sit, quos voluptate accusamus earum
                        sint dolores itaque fuga eaque hic maxime aliquid quae. Ut officiis, adipisci iste labore
                        repellat aperiam eius saepe doloribus? Tempora officiis pariatur reiciendis hic repudiandae
                        eveniet magni corporis minus rerum.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto laboriosam, assumenda eaque
                        dolor, voluptates minima molestias perspiciatis dolores atque cupiditate obcaecati vitae.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum veniam ratione sequi, sint
                        voluptatem eum fugiat necessitatibus magni officiis nisi nemo distinctio ipsum rem assumenda
                        dolorum! Quo ex dignissimos molestias nostrum quidem ea quisquam, velit praesentium expedita
                        optio nihil dolor natus eos aliquid voluptate.</p>
                </div>

                <div class="commentCotainer" id="comment">
                    <h1>comments</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta repellendus dignissimos facere non
                        assumenda maiores nisi repudiandae cum quos illum deleniti, est quod, enim aut, reiciendis
                        consequuntur eos ea cupiditate excepturi sunt qui in nam quia eum! Animi tempora quam beatae
                        repellat veniam, ratione labore quibusdam, quod deserunt minima culpa? Voluptatum at odio error.
                    </p>
                </div>
            </div>
        </div>


        <?php 
            include_once 'footer.php';
            ?>
</body>

</html>