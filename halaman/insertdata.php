<?php
//Fetching Values from URL
	require('koneksi.php');
		$nama=$_POST['nama'];
		$lmusaha=$_POST['lmusaha'];
		$df=$_POST['df'];
		$hrg=$_POST['hrg'];
		$inv=$_POST['inv'];
		$opr=$_POST['opr'];
		$pen=$_POST['pen'];
		$suhu=$_POST['suhu'];
		$kecerahan=$_POST['kecerahan'];
		$do=$_POST['do'];
		$ph=$_POST['ph'];

		//diskon faktor
		$diskonfaktor =  (1/(1*(1+$df)^$lmusaha));
		$dfp = ($df*(1/100));
		//perhitungan analisis finansial
		$npv = (($pen-($pen*$dfp))-(($opr-($opr*$dfp))));
		$roi = (($npv-$inv)/$inv);
		$bcr = ($pen/$opr);
		$pbp = ($inv/$pen*(1+$dfp));
		$bep = ($opr/$hrg);
		
		$sql_insert="insert into ikan (nama,lmusaha,df,hrg,inv,opr,pen,suhu,kecerahan,do,ph,npv,roi,bcr,pbp,bep) values ('";
		$sql_insert=$sql_insert.
			$nama."','".$lmusaha."','".$df."','".$hrg."','".$inv."','".$opr."','".$pen."',
			'".$suhu."','".$kecerahan."','".$do."','".$ph."','".round($npv,9)."','".round($roi,9)."','".round($bcr,9)."','".round($pbp,9)."','".round($bep,9)."')";
	
				
				$rslt=mysqli_query($conn,$sql_insert);
	if($rslt){
		echo "berhasil";
	}else{
		echo mysqli_error($conn);
	}
?>