<?php
//Fetching Values from URL
	require('koneksi.php');

		$nama=$_POST['nama'];
		$id=$_POST['id'];
		$lmusaha=$_POST['lmusaha'];
		$df=$_POST['df'];
		$hrg=$_POST['hrg'];
		$inv=$_POST['inv'];
		$opr=$_POST['opr'];
		$pen=$_POST['pen'];
		// $dfpersen=$_POST['dfpersen'];
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
		$sql = 'UPDATE ikan
                    SET nama      = "'.$nama.'",
                        lmusaha   = "'.$lmusaha.'",
                        df		= "'.$df.'",
						hrg		= "'.$hrg.'",
						inv		= "'.$inv.'",
						opr		= "'.$opr.'",
						pen		= "'.$pen.'",
						suhu	= "'.$suhu.'",
						kecerahan = "'.$kecerahan.'",
						do		= "'.$do.'",
						ph		= "'.$ph.'",
						npv 	= "'.$npv.'",
						roi 	= "'.$roi.'",
						bcr 	= "'.$bcr.'",
						pbp 	= "'.$pbp.'",
						bep 	= "'.$bep.'"
                  WHERE id = "'.$id.'"';


				$rslt=mysqli_query($conn,$sql);
	if($rslt){
		echo "berhasil";
		
	}else{
		echo mysqli_error($conn);
	}
?>