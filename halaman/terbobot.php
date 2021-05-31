<?php
//-- inisialisasi matrik Normalisasi Terbobot Y
$Y=array();
//-- melakukan iterasi utk setiap alternatif
foreach($R as $id_alternatif=>$a_kriteria) {
    $Y[$id_alternatif]=array();
    //-- melakukan iterasi utk setiap kriteria
    foreach($a_kriteria as $id_kriteria=>$nilai){
        $Y[$id_alternatif][$id_kriteria] = $nilai * $bobot[$id_kriteria];
    }
}    
?>