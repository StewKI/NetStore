<?php
$con = mysqli_connect('localhost', 'miksa', 'miksa123', 'miksa');

function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con, $string);
}

function query($query)
{
    global $con;
    return mysqli_query($con, $query);
}

function confirm($result)
{
    global $con;
    if (!$result) {
        echo(mysqli_error($con));
        die("QUERY FAILED " . mysqli_error($con));
    }
}

function max_id_porudzbine(){
    $upit = "SELECT max(id_porudzbine) from porudzbine";
    $rezultat = query($upit);
    $r = $rezultat->fetch_assoc();
    return $r['max(id_porudzbine)'];
}