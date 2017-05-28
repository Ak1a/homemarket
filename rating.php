<!Doctype html>
<html>
<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">

</head>
<?php
session_start();

?>
<body>
<h1>Please evaluate the products</h1>
<form class="form">
    <p>
        <label for="apple">Rating of apple</label>
        <input id="apple" name="appleRating" class="appleRating val" type="text" value="3">
    </p>

    <p>
        <label for="beer">Rating of beer</label>
        <input id="beer" name="beerRating" class="beerRating val" type="text" value="3">
    </p>

    <p>
        <label for="water">Rating of water</label>
        <input id="water" class="waterRating val" name="waterRating" type="text" value="3">
    </p>

    <p>
        <label for="cheese">Rating of cheese</label>
        <input id="cheese" name="cheeseRating" class="cheeseRating val" type="text" value="3">
    </p>
    <input name="update" type="hidden" value="1">
    <input class="changeRating btn" type="button" value="Change rating">
</form>
<br>
<a class="link" href="index.php"> Back to main page </a>
<br>
<br>
</body>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
</script>
<script>

    $(document).ready(function () {

        $('.val').bind("change keyup input click", function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        });

        $('.changeRating').click(function () {
            var msg = $('.form').serialize();

            var apple = $('.appleRating').val();
            var beer = $('.beerRating').val();
            var water = $('.waterRating').val();
            var cheese = $('.cheeseRating').val();

            if (apple >= 1 && apple <= 5 && beer >= 1 && beer <= 5 && water >= 1 && water <= 5 && cheese >= 1 && cheese <= 5) {
                $.ajax({
                    url: 'db.php',
                    data: msg,
                    success: function (data) {
                        alert("Change is accpet");
                           var url = "http://homemarket.cba.pl/";
                           $(location).attr('href', url);
                    }
                });
            }else alert("Rating is not more 5 or less 1");

        })

    })

</script>
</html>