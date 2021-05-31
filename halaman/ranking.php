<?php
//--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya
arsort($V);
//-- mendapatkan key/index item array yang pertama
$index=key($V);
//-- menampilkan hasil akhir:
echo "Hasilnya adalah alternatif <b>{$alternatif[$index][0]}</b> ";
echo "dengan nilai preferensi <b>{$V[$index]}</b> yang terpilih";
?>