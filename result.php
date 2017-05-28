<?php
session_start();
$apple = 0.3 * $_GET['apple'];
$beer = 2 * $_GET['beer'];
$water = 1 * $_GET['water'];
$cheese = 3.74 * $_GET['cheese'];
$car = 0;
if ($_GET['car'] == 'pickup') {
    $car = 0;
} else $car = 5;

$sum = $apple + $beer + $water + $cheese + $car;

$result = $_SESSION['money'] - $sum;// get the result
?>

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

if ($result < 0) {
    echo '<h1 class="error">Insufficient funds for the purchase</h1>';
    echo '<a class="link" href="index.php"> Back to main page </a>';
} else {
    echo '<div class="border"><h1 class="header">Congratulations you bought</h1></div>';
    if ($_GET['apple'] != 0) {
        echo '<p class="name">Apples : ' . $_GET['apple'] . ' item</p>';
    }
    if ($_GET['beer'] != 0) {

        echo '<p class="name">Beer : ' . $_GET['beer'] . ' item</p>';
    }
    if ($_GET['water'] != 0) {

        echo '<p class="name">Water : ' . $_GET['water'] . ' item</p>';
    }
    if ($_GET['cheese'] != 0) {

        echo '<p class="name">Cheese : ' . $_GET['cheese'] . ' item</p>';
    }
    echo '<h3 >Your cash is ' . $result . '</h3>';
    echo '<br><a class="link" href="index.php">Back to main page</a>';
}

unset($_SESSION['apple']);
unset($_SESSION['beer']);
unset($_SESSION['water']);
unset($_SESSION['cheese']);
?>
<br>
<br>
</body>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</html>