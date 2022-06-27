<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us - Food Recipes</title>
    <link rel="stylesheet" href="Font Awesome/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="style.css" rel="stylesheet">

    <style>
        
        /* body{
            display: flex;
            align-items: center;
            min-height: 100vh;
            /* justify-content: center; 
        } */
        .contactContainer{
            max-width: 80rem;
            display: flex;
            margin: 0 auto;
            justify-content: space-evenly;
            align-items: center;
            padding: 5em;
            margin-top: 11em;
            /* border: 2px solid red; */
        }
        .leftContact{
            display: flex;
            flex-direction: column;
            gap: 2em;
        }
        .first{
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        .touchHeading{
            font-family: 'Frank Ruhl Libre', serif;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 3.4rem;
        }
        .leftContact p{
            font-family: 'Roboto', sans-serif;
        }
        .second, .third, .fourth{
            display: flex;
            flex-direction: column;
            gap: .6em;
        }
        .second, .third, .fourth > p{
            text-transform: capitalize;
        }
        .first{
            max-width: 60%;
        }
        .email{
            text-transform: lowercase !important;
        }


        .rightContact{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .block{
            padding-block: 1.5em;
        }
        .blocknth{
            display: flex;
            flex-direction: column;
        }
        input{
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            padding-left: .875rem;
            border: 1px solid #cc754981;
            width: 300px;
            padding-block: .50em;
            outline: none;
        }
        textarea{
            border: 1px solid #cc754981;
            outline: none;
        }
        .block1{
            display: flex;
            flex-direction: column;
        }

        .block2{
            display: flex;
            flex-direction: column;
        }

        .newsBtn{
            padding-block: .60em;
            padding-inline: 1.6em;
            background-color: #ac4511;
            border: none;
            border-radius: 4px;
            color: white;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            text-transform: uppercase;
            margin-top: .4em;
        }
        .newsBtn:hover{
            cursor: pointer;
            background-color: rgb(143, 67, 29);
        }
        label{
            font-family: 'Roboto', sans-serif;
            margin-block: .3em;
        }
        i{
            color: #ac4511;
        }

    </style>
</head>
<body>
        <?php
            include_once 'header.php';
        ?>
    <div class="contactContainer">
        <div class="leftContact">
            <div class="first">
                <h1 class="touchHeading">get in touch</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, ad dolores? Aperiam, rerum!</p>
            </div>
            <div class="second">
                <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;visit us</p>
                <p>ABC st. xy town</p>
            </div>
            <div class="third">
                <p><i class="fa-solid fa-phone-flip"></i>&nbsp;&nbsp;call us</p>
                <p>+923370443869</p>
            </div>
            <div class="fourth">
                <p><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;email us</p>
                <p class="email">foodrecipes@gmail.com</p>
            </div>
        </div>
        <div class="rightContact">
            <form action="">
                <div class="block1">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname">
                </div>
                <div class="block2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="blocknth">
                    <label for="query">Your queries</label>
                    <textarea name="" id="" cols="70" rows="10"></textarea>
                </div>
                <button class="newsBtn" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>

        <?php
            include_once 'footer.php';
        ?>
</body>
</html>