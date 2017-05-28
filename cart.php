<!Doctype html>
<html>
<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">

</head>
<?php session_start(); ?>
<body>
<div class="border">
<h1 class="header">Is yor goods</h1>
<h4>Your cash is <?php echo $_SESSION['money']; ?></h4>
</div>
<?php

$_SESSION['apple'] = $_GET['apple'];
$_SESSION['beer'] = $_GET['beer'];
$_SESSION['water'] = $_GET['water'];
$_SESSION['cheese'] = $_GET['cheese'];

if ($_SESSION['apple'] == 0 && $_SESSION['beer'] == 0 && $_SESSION['water'] == 0 && $_SESSION['cheese'] == 0) {
    echo '<p class="name">You didn`t select anything</p>';
} else {
    if ($_SESSION['apple'] != 0) echo '<p class="showApple name">Apple: ' . $_SESSION['apple'] . '</p>
 <input class="appleRemove btn" type="button" value="Remove">';
    if ($_SESSION['beer'] != 0) echo '<p class="showBeer name">Beer: ' . $_SESSION['beer'] . '</p>
<input class="beerRemove btn" type="button" value="Remove">';
    if ($_SESSION['water'] != 0) echo '<p class="showWater name">Water: ' . $_SESSION['water'] . '</p>
<input class="waterRemove btn" type="button" value="Remove">';
    if ($_SESSION['cheese'] != 0) echo '<p class="showCheese name">Cheese: ' . $_SESSION['cheese'] . '</p>
<input class="cheeseRemove btn" type="button" value="Remove">';
}

?>
<form id="form" action="result.php" method="get">
    <input class="appleAdd" name="apple" type="hidden" value="<?php echo $_SESSION['apple'] ?>">
    <input class="beerAdd" name="beer" type="hidden" value="<?php echo $_SESSION['beer'] ?>">
    <input class="waterAdd" name="water" type="hidden" value="<?php echo $_SESSION['water'] ?>">
    <input class="cheeseAdd" name="cheese" type="hidden" value="<?php echo $_SESSION['cheese'] ?>">


    <?php
    if ($_GET['apple'] == 0 && $_GET['beer'] == 0 && $_GET['water'] == 0 && $_GET['cheese'] == 0) {

    } else echo '
                  <label for="car">Choose the transport type</label>
                  <select id="car" name="car" class="car">
                    <option>-</option>
                    <option value="pickup">Pick up</option>
                    <option value="USP">UPS</option>
                  </select><p>
                
                <input class="pay btn" type="button" value="Pay"></p>' ?>
</form>
<br>
<a class="link" href="index.php"> Back to main page </a>
<br>
<br>
</body>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

        $('.pay').click(function () {
            var carType = $('.car').val();
            if (carType === '-') {
                alert("Please choose the transport type")
            } else $('#form').submit();
        });



        function ajaxGet() {
            var msg = $('#form').serialize();
            $.ajax({
                url: 'session.php',
                data: msg
            });

        }

        var apple = $(".appleAdd");


        $(".appleRemove").click(function () {
            if (apple.val() == 0) {
                alert('Nothing to remove');

            }
            else {
                apple.val(apple.val() - 1);
                ajaxGet();

            }

            if (apple.val() == 0) {

                $(".showApple").css('display', 'none');
                $(".appleRemove").css('display', 'none');
            }
            else {

                $(".showApple").html("Aplle: " + apple.val());
            }

        });

        var beer = $(".beerAdd");

        $(".beerRemove").click(function () {
            if (beer.val() == 0) {
                alert('Nothing to remove');
            }
            else {
                beer.val(beer.val() - 1);
                ajaxGet();
            }

            if (beer.val() == 0) {
                $(".showBeer").css('display', 'none');
                $(".beerRemove").css('display', 'none');

            }
            else
                $(".showBeer").html("Beer: " + beer.val());

        });

        var water = $(".waterAdd");

        $(".waterRemove").click(function () {
            if (water.val() == 0) {
                alert('Nothing to remove');
            }
            else {
                water.val(water.val() - 1);
                ajaxGet();
            }
            if (water.val() == 0) {
                $(".showWater").css('display', 'none');
                $(".waterRemove").css('display', 'none');
            }
            else $(".showWater").html("Water: " + water.val());
        });

        var cheese = $(".cheeseAdd");
        $(".cheeseRemove").click(function () {
            if (cheese.val() == 0) {
                alert('Nothing to remove');
            }
            else {
                cheese.val(cheese.val() - 1);
                ajaxGet();
            }
            if (cheese.val() == 0) {
                $(".showCheese").css('display', 'none');
                $(".cheeseRemove").css('display', 'none');

            }
            else $(".showCheese").html("Cheese: " + cheese.val());
        });

    })
</script>
</html>
