<?php 
include 'inc/header.php';
?>

    <div id="index">
        <div id="leftnbar">
            <?php
                $upit = "select id_kategorije,naziv from kategorije";
                $rezultat = query($upit);

                if($rezultat->num_rows > 0){
                    while($red = $rezultat->fetch_assoc()){
                        $selected = "";
                        if($_GET['category'] == $red['id_kategorije']){
                            $selected = " selected";
                        }
                        echo '<div class="category'.$selected.'"><a href="index.php?category='.$red['id_kategorije'].'"><div class="max">';
                        echo '<p class="cat_naziv">'.$red['naziv'].'</p>';
                        echo '</div></a></div>';
                    }
                }
            ?>
        </div>
        <div id="content">
            <?php
                $upit = "select * from proizvodi";
                if($_POST['search']){
                    $upit = "select * from proizvodi where naziv like '%".$_POST['search']."%'";
                }
                else{
                    $category = $_GET['category'];
                    $search = $_GET['search'];
                    if($category){
                        $upit = "select * from proizvodi where id_kategorije like '".$category."'";
                    }
                    if($search){
                        $upit = "select * from proizvodi where naziv like '%".$search."%'";
                    }   
                }
                $rezultat = query($upit);

                if($rezultat->num_rows > 0){
                    while($red = $rezultat->fetch_assoc()){
                        $slika;
                        if($red['slika']){
                            $slika = $red['slika'];
                        }
                        else{
                            $slika = "blank.png";
                        }
                        echo '<div class="item"><a href="proizvod.php?id='.$red['id_proizvoda'].'"><div class="max">';
                        echo '<img src="images/'.$slika.'" alt="slika proizvoda" class="proizvod_slika">
                            <div class="naziv_cena">
                                <p>'.$red['naziv'].'</p>
                                <p>'.format_cena($red['cena']).'</p>
                            </div>';
                        echo '</div></a></div>';
                    }
                }
                else{
                    echo "<h2>Nije pronadjen nijedan proizvod sa datim kriterijumima!</h2>";
                }
            ?>
        </div>
    </div>

<?php
include 'inc/footer.php';
?>