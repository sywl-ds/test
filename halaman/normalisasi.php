<?php
//-- inisialisasi array pembagi
$pembagi=array();
//-- melakukan iterasi utk setiap kriteria
foreach($kriteria as $id_kriteria=>$value){
    $pembagi[$id_kriteria]=0;
    //-- melakukan iterasi utk setiap alternatif
    foreach($alternatif as $id_alternatif=>$a_value){
        $pembagi[$id_kriteria]=pow($X[$id_alternatif][$id_kriteria],2);
    }
}
//-- inisialisasi matrik Normalisasi R
$R=array();
//-- melakukan iterasi utk setiap alternatif
foreach($X as $id_alternatif=>$a_kriteria) {
    $R[$id_alternatif]=array();
    //-- melakukan iterasi utk setiap kriteria
    foreach($a_kriteria as $id_kriteria=>$nilai){
        $R[$id_alternatif][$id_kriteria]=$nilai/sqrt($pembagi[$id_kriteria]);
    }
}    
?>