<?php include 'inc/header.php'; ?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_SESSION['id'.$_POST['id']] += $_POST['kolicina'];
}
if($_GET['delete_id']){
    $_SESSION['id'.$_GET['delete_id']] = 0;
}
?>

<table>
    <tr>
        <th>Rb</th>
        <th>Naziv</th>
        <th>Cena</th>
        <th>Kolicina</th>
        <th>Ukupno</th>
        <th></th>
    </tr>
    <?php prikazi_korpu() ?>
    <tr>
        <td colspan="2" class="no_pad crven_btn"><a class="velik_btn" href="index.php" id="nastavi">Nastavi kupovinu</a></td>
        <td colspan="2" class="no_pad crven_btn"><a class="velik_btn" href="kasa.php" id="idinakasu">Idi na kasu</a></td>
        <td colspan="2" id="ukupna_cena"><?php echo format_cena(ukupna_cena_proizvoda()); ?></td>
    </tr>
</table>

<?php include 'inc/footer.php'; ?>