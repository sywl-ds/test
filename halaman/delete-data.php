<?php

	require('koneksi.php');
	$nama=$_GET['nama'];
	$sql="delete from ikan where id='" .$nama."'";
    $result=mysqli_query($conn,$sql);
    header('Location: http://localhost/doan/index.php?page=entridata');
?>