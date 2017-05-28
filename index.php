<!Doctype html>
<html>
<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
</head>
<body>

<?php
session_start();
include 'db.php';


//start session and save session`s variable
$_SESSION['appleRating'] = round(rate(1), 2);
$_SESSION['beerRating'] = round(rate(3), 2);
$_SESSION['waterRating'] = round(rate(4), 2);
$_SESSION['cheeseRating'] = round(rate(5), 2);

$_SESSION['money'] = 100;

?>
<div class="border">
<h1 class="header">Welcome to our shop!</h1>
<h4>Please, choose the goods</h4>
<h4>Your cash is <?php echo $_SESSION['money']; ?></h4>
</div>
    <form action="cart.php" method="get">
        <div class="flex-container">
        <div class="flex-element">
            <img src="images/apple.jpng" height="200">
            <p class="name">Apple</p>
            <p> Cost <strong>0.3$</strong> </p>
            <p class="showApple"><?php if (isset($_SESSION['apple'])) {
                    if ($_SESSION['apple'] != 0) {
                        echo 'You selected ' . $_SESSION['apple'] . ' products';
                    }
                }

                ?></p>
            <p>Rate: <?php echo $_SESSION['appleRating'] ?></p>
            <input class="apple btn" type="button" value="Add">
            <input class="appleRemove btn" type="button" value="Remove">
            <input class="appleAdd" name="apple" type="hidden" value="<?php
            if (isset($_SESSION['apple'])) {
                echo $_SESSION['apple'];
            } else 0 ?>">
        </div>

        <div class="flex-element">
            <img src="images/beer.png" height="200">
            <p class="name">Beer</p>
            <p> Cost <strong>2$</strong> </p>
            <p class="showBeer"><?php if (isset($_SESSION['beer'])) {
                    if ($_SESSION['beer'] != 0) {
                        echo 'You selected ' . $_SESSION['beer'] . ' products';
                    }
                } ?></p>
            <p>Rate: <?php echo $_SESSION['beerRating'] ?></p>
            <input class="beer btn" type="button" value="Add">
            <input class="beerRemove btn" type="button" value="Remove">
            <input class="beerAdd" name="beer" type="hidden" value="<?php
            if (isset($_SESSION['beer'])) {
                echo $_SESSION['beer'];
            } else 0 ?>">
        </div>
        </div>
        <div class="flex-container">
        <div class="flex-element">
            <img src="images/water.png" height="200">
            <p class="name">Water</p>
            <p>Cost <strong>1$</strong> </p>
            <p class="showWater"><?php if (isset($_SESSION['water'])) {
                    if ($_SESSION['water'] != 0) {
                        echo 'You selected ' . $_SESSION['water'] . ' products';
                    }
                } ?></p>
            <p>Rate: <?php echo $_SESSION['waterRating'] ?></p>
            <input class="water btn" type="button" value="Add">
            <input class="waterRemove btn" type="button" value="Remove">
            <input class="waterAdd" name="water" type="hidden" value="<?php
            if (isset($_SESSION['water'])) {
                echo $_SESSION['water'];
            } else 0 ?>">
        </div>

        <div class="flex-element">
            <img src="images/cheese.png" height="200">
            <p class="name">Cheese</p>
            <p>Cost <strong>3.74$</strong> </p>
            <p class="showCheese"><?php if (isset($_SESSION['cheese'])) {
                    if ($_SESSION['cheese'] != 0) {
                        echo 'You selected ' . $_SESSION['cheese'] . ' products';
                    }
                } ?></p>
            <p>Rate: <?php echo $_SESSION['cheeseRating'] ?></p>
            <input class="cheese btn" type="button" value="Add">
            <input class="cheeseRemove btn" type="button" value="Remove">
            <input class="cheeseAdd" name="cheese" type="hidden" value="<?php
            if (isset($_SESSION['cheese'])) {
                echo $_SESSION['cheese'];
            } else 0 ?>">
        </div>
        </div>
        <br>
        <input type="submit" class="btn" value="Current cart status">

    </form>

<br>
<a class="link" href="rating.php">Change rating</a>
<br>
<br>
</body>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var apple = $(".appleAdd");

        $('.apple').click(function () {
            apple.val(Number(apple.val()) + 1);
            $(".showApple").html('You selected ' + apple.val() + ' products');
            $(".showApple").css('display', 'block');
        });

        $(".appleRemove").click(function () {
            if (apple.val() == 0) {
                alert('Nothing to remove');

            }
            else {
                apple.val(apple.val() - 1);

            }

            if (apple.val() == 0) {

                $(".showApple").css('display', 'none');
            }
            else {

                $(".showApple").html('You selected ' + apple.val() + ' products');
            }

        });

        var beer = $(".beerAdd");
        $('.beer').click(function () {
            beer.val(Number(beer.val()) + 1);
            $(".showBeer").html('You selected ' + beer.val() + ' products');
            $(".showBeer").css('display', 'block');
        });

        $(".beerRemove").click(function () {
            if (beer.val() == 0) {
                alert('Nothing to remove');
            }
            else beer.val(beer.val() - 1);


            if (beer.val() == 0) {
                $(".showBeer").css('display', 'none');
            }
            else  $(".showBeer").html('You selected ' + beer.val() + ' products');


        });

        var water = $(".waterAdd");
        $('.water').click(function () {
            water.val(Number(water.val()) + 1);
            $(".showWater").html('You selected ' + water.val() + ' products');
            $(".showWater").css('display', 'block');
        });

        $(".waterRemove").click(function () {
            if (water.val() == 0) {
                alert('Nothing to remove');
            }
            else water.val(water.val() - 1);

            if (water.val() == 0) {
                $(".showWater").css('display', 'none');
            }
            else $(".showWater").html('You selected ' + water.val() + ' products');
        });

        var cheese = $(".cheeseAdd");
        $('.cheese').click(function () {
            cheese.val(Number(cheese.val()) + 1);
            $(".showCheese").html('You selected ' + cheese.val() + ' products');
            $(".showCheese").css('display', 'block');
        });

        $(".cheeseRemove").click(function () {
            if (cheese.val() == 0) {
                alert('Nothing to remove');
            }
            else cheese.val(cheese.val() - 1);

            if (cheese.val() == 0) {
                $(".showCheese").css('display', 'none');
            }
            else $(".showCheese").html('You selected ' + cheese.val() + ' products');
        });


    })
</script>
</html>

