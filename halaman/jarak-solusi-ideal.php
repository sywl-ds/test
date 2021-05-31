<?php
//-- inisialisasi Jarak Solusi Ideal Positif/Negatif
$D_plus=$D_min=array();
//-- melakukan iterasi utk setiap alternatif
foreach($Y as $id_alternatif=>$n_a){
    $D_plus[$id_alternatif]=0;
    $D_min[$id_alternatif]=0;
    //-- melakukan iterasi utk setiap kriteria
    foreach($n_a as $id_kriteria=>$y){
        $D_plus[$id_alternatif]+=pow($y-$A_max[$id_kriteria],2);
        $D_min[$id_alternatif]+=pow($y-$A_min[$id_kriteria],2);
    }
    $D_plus[$id_alternatif]=sqrt($D_plus[$id_alternatif]);
    $D_min[$id_alternatif]=sqrt($D_min[$id_alternatif]);
}
?>