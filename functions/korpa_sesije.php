<?php

$upit = "select * from proizvodi";
$rez = query($upit);

function prikazi_korpu(){
    global $rez;
    $i = 1;
    foreach($rez as $r)
    {
        if($_SESSION['id'.$r['id_proizvoda']] > 0){
            echo '<tr>';

            echo '<td>' . $i . '.</td>';
            echo '<td><a href="proizvod.php?id='. $r['id_proizvoda'] . '">' . $r['naziv'] . '</a></td>';
            echo '<td>' . format_cena($r['cena']) . '</td>';
            echo '<td>' . $_SESSION['id'.$r['id_proizvoda']] . '</td>';
            echo '<td>' . format_cena($r['cena'] * $_SESSION['id'.$r['id_proizvoda']]) . '</td>';
            echo '<td><a href="korpa.php?delete_id=' . $r['id_proizvoda'] . '" class="delete_btn">x</a></td>';

            echo '</tr>';
            $i++;
        }
    }
    if($i == 1){
        echo '<td colspan="6"><h2>Korpa je prazna!</h2></td>';
    }
}

function prikazi_korpu_kasa(){
    global $rez;
    $i = 1;
    foreach($rez as $r)
    {
        if($_SESSION['id'.$r['id_proizvoda']] > 0){
            $x = '';
            if($_SESSION['id'.$r['id_proizvoda']] > 1){
                $x = ' x' . $_SESSION['id'.$r['id_proizvoda']];
            }
            echo '<div class="li_kasa razdvojeno"><div>' . $i . '. ' . $r['naziv'] . $x . '</div><div>' . format_cena($r['cena'] * $_SESSION['id'.$r['id_proizvoda']]) . '</div></div>';

            $i++;
        }
    }
}

function postoji($id_proizvoda){
    return $_SESSION['id'.$id_proizvoda];
}

function broj_proizvoda()
{
    global $rez;
    $br = 0;
    foreach($rez as $r){
        if($_SESSION['id'.$r['id_proizvoda']] > 0){
            $br++;
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !postoji($_POST['id'])){
        $br++;
    }
    if($_GET['delete_id']){
        $br--;
    }
    return $br;
}

function ukupna_cena_proizvoda()
{
    global $rez;
    $br = 0;
    foreach($rez as $r){
        if($_SESSION['id'.$r['id_proizvoda']] > 0){
            $br += $r['cena'] * $_SESSION['id'.$r['id_proizvoda']];
        }
    }
    return $br;
}

function dodaj_proizvodi_u_porudzbinu($id_porudzbine){
    global $rez;
    $upit = "INSERT INTO poruceni_proizvodi(id_proizvoda,id_porudzbine,kolicina) VALUES ";
    $first = false;
    foreach($rez as $r){
        if($_SESSION['id'.$r['id_proizvoda']] > 0){
            if($first){
                $upit .= ",";
            }
            $first = true;
            $upit .= '(' . $r['id_proizvoda'] . ',' . $id_porudzbine . ',' . $_SESSION['id'.$r['id_proizvoda']] . ')';
        }
    }
    query($upit);
}

?>