<?php include 'inc/header.php' ?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ime = clean($_POST['ime']);
        $prezime = clean($_POST['prezime']);
        $ulica = clean($_POST['uluca']);
        $broj = clean($_POST['broj']);
        $grad = clean($_POST['grad']);
        $zip = clean($_POST['zip']);
        $fon = clean($_POST['fon']);
        $email = clean($_POST['mail']);

        $upit = "INSERT INTO porudzbine(id_porudzbine,cena,ime,prezime,ulica,broj,grad,postanski,telefon,email) VALUES";
        $id = 0;
        $max = max_id_porudzbine();
        if($max){
            $id = $max;
        }
        $podatak = ' (' . ($id+1) . ',' . ukupna_cena_proizvoda() . ',"' . $ime . '","' . $prezime . '","' . $ulica . '","' . $broj . '","' . $grad . '","' . $zip . '","' . $fon . '","' . $email . '")';
        query($upit . $podatak);
        dodaj_proizvodi_u_porudzbinu($id+1);
    }
    else{
        header("Location: index.php");
    }

    echo '<h2 style="text-align:center">Uspešno ste poručili vaše proizvode!</h2>';
?>

<?php include 'inc/footer.php' ?>