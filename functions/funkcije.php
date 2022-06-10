<?php
    function format_cena($cena){
        $r = "";
        $skupovi = array();
        $i = 0;
        while($cena > 0){
            $skupovi[$i] = $cena%1000;
            $cena = intdiv($cena,1000);
            $i++;
        }
        $j = $i-1;
        while($j >= 0){
            if($r != ""){
                $r .= ".";
            }
            $r .= $skupovi[$j];
            $j--;
        }
        return $r . " RSD";
    }

    function clean($str)
    {
        return htmlentities($str);
    }
?>