<?php
include 'inc/header.php';
?>

<?php
    $upit="select * from proizvodi where id_proizvoda like '" . $_GET['id'] . "' limit 1";
    $rezultat = query($upit);
    $postoji = true;
    $proizvod;
    if($rezultat->num_rows == 0 || !$_GET['id']){
        echo "<h2>Greska 404 stranica nije pronadjena!</h2>";
        $postoji = false;
    }
    else{
        $proizvod = $rezultat->fetch_assoc();
    }
?>

    <div id="proizvod" class="split">
        <div id="leftdivpic">
            <?php
                $slika;
                if($proizvod['slika']){
                    $slika = $proizvod['slika'];
                }
                else{
                    $slika = "blank.png";
                }
            ?>
            <img src="images/<?php echo $slika ?>" alt="slika proizvoda" id='proizvod_velika_slika'>
        </div>
        <div id="rightdivdesc">
            <h2 id='naslov_proizvoda'> <?php echo $proizvod['naziv'] ?> </h2>
            <p id='opis_proizvoda'> <?php echo $proizvod['opis'] ?> </p>
            <div id='dodavanje_div'>
                <p class="veci_bold"> <?php echo format_cena($proizvod['cena']) ?> </p>
                <form action="korpa.php" method='post' id="dodavanje_form">
                    <div id="kolicina_div">
                        <p class="veci_bold">Kol:</p>
                        <input type="number" name="kolicina" id="kolicina" value="1">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <input type="submit" value="U KORPU" id="dodaj_btn" class="crven_btn">
                </form>
            </div>
        </div>
    </div>

<?php
include 'inc/footer.php';
?>