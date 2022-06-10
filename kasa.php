<?php include 'inc/header.php'; ?>

<div id="center_div">
<div><!--PROSTOR ZA REKLAME--></div>
<div class="zuto">
    <h2 class="naslov">Kasa</h2>
    <hr>
    <div class="split">
        <div class="side left_side">
            <h3>Proizvodi:</h3>
            <div class="crven_border">
                <?php prikazi_korpu_kasa() ?>
            </div>
            <br>
            Ukupno za plaćanje:  <p id="cena_kasa"> <?php echo format_cena(ukupna_cena_proizvoda()) ?></p>
        </div>
        <div class="side">
            <h3>Podaci:</h3>
            <form method="post" action="porudzbina.php">
                <input required type="text" name="ime" id="ime" class="input_field" placeholder="Ime*">
                <input required type="text" name="prezime" id="prezime" class="input_field" placeholder="Prezime*"></br>
                <input required type="text" name="uluca" id="ulica" class="input_field" placeholder="Ulica*">
                <input required type="text" name="broj" id="broj" class="input_field" placeholder="Broj*"><br>
                <input required type="text" name="grad" id="grad" class="input_field" placeholder="Grad*">
                <input required type="text" name="zip" id="zip" class="input_field" placeholder="Postanski broj*"><br>
                <input required type="tel" name="fon" id="fon" class="input_field" placeholder="Telefon*">
                <input type="email" name="mail" id="mail" class="input_field" placeholder="E-mail"><br>
                <br>
                <h4>Način plaćanja*:</h4>
                <label><input required type="radio" name="nacin" value="pouzecem"> Prilikom preuzimanja </label><br>
                <div class="right">
                <input type="submit" value="PORUČI" class="crven_btn" id="poruci_btn">
                </div>
            </form>
        </div>
    </div>
</div>
<div><!--PROSTOR ZA REKLAME--></div>
</div>

<?php include 'inc/footer.php'; ?>