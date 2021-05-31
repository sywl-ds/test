<?php
//-- inisialisasi Solusi Ideal A Positif dan Negatif 
$A_max=$A_min=array();
//-- melakukan iterasi utk setiap kriteria
foreach($kriteria as $id_kriteria=>$a_kriteria) {
    $A_max[$id_kriteria]=0;
    $A_min[$id_kriteria]=100;
    //-- melakukan iterasi utk setiap alternatif
    foreach($alternatif as $id_alternatif=>$nilai){
        if($A_max[$id_kriteria]<$Y[$id_alternatif][$id_kriteria]){
            $A_max[$id_kriteria] = $Y[$id_alternatif][$id_kriteria];
        }
        if($A_min[$id_kriteria]>$Y[$id_alternatif][$id_kriteria]){
            $A_min[$id_kriteria] = $Y[$id_alternatif][$id_kriteria]
        };
    }
}    
?>