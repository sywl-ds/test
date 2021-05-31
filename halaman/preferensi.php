<?php
//-- inisialisasi variabel array V 
$V=array();
//-- melakukan iterasi utk setiap alternatif
foreach($D_min as $id_alternatif=>$d_min){
    //-- perhitungan nilai Preferensi V dari nilai jarak solusi ideal D
    $V[$id_alternatif] = $d_min/($d_min + $D_plus[$id_alternatif]);
}
?>