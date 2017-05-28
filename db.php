<?php

if ($_GET['update'] == 1) {

    update(1, (int)$_GET['appleRating']);
    update(3, (int)$_GET['beerRating']);
    update(4, (int)$_GET['waterRating']);
    update(5, (int)$_GET['cheeseRating']);

}


function update($name, $rate)// update rating
{

    $array = unserialize(select($name));
     array_shift($array);

    array_push($array, $rate);

    $string = serialize($array);
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=ak1la', 'ak1la', 'cyfqgth100');
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . '<br>';
    }

    $stmt = $dbh->prepare("UPDATE rating SET rate='" . $string . "' WHERE id=" . $name);

    $stmt->execute();

    $dbh = null;

}


function select($id)
{ // select ratting from table
    session_start();
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=ak1la', 'ak1la', 'cyfqgth100');
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . '<br>';
    }
    $res = 0;
    foreach ($dbh->query("SELECT rate FROM rating WHERE id=" . $id) as $row) {
        $res = $row[0];
    }


    return $res;

}

function rate($id)
{
    $array = unserialize(select($id));
    $sum = 0;
    foreach ($array as $el) {
        $sum += $el;
    }

    $res = $sum / 3;
    return $res;
}
