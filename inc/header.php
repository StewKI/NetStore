<?php
    include 'functions/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Internet prodavnica</title>
</head>
<body>
    <header>
        <div id="header" class="razdvojeno">
            <a href="index.php"><h1 id="logo">NETSTORE</h1></a>
            <div id="nav_grid">
            <a href="korpa.php" class="inline" id="korpa_icon">KORPA (<?php echo broj_proizvoda() ?>) </a>
            <form action="index.php" method="post" id="sbar">
                <input type="text" name="search" id="sbar1">
                <input type="submit" value="Pretraži" id="sbar2" class="crven_btn">
            </form>
            </div>
        </div>
   </header>
    <main>