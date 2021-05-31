<!DOCTYPE html>
<html > <!--<![endif]-->
    <head>
    <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../css/flexslider.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="../css/line-icons.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../css/elegant-icons.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../css/lightbox.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../css/theme-1.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../css/custom.css" rel="stylesheet" type="text/css" media="all"/>
        <!--[if gte IE 9]>
        	<link rel="stylesheet" type="text/css" href="css/ie9.css" />
		<![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
				<!-- deklarasi script -->
		<script src="libs/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </head>
	
	
    <body>	
        <div class="halaman">
		<div class="main-container">
		<div class="container">
			<!-- <a href="halaman/perankingan.php" class="btn btn-primary btn-sm" id="btnNew" value="hasil">Hasil</a><br><br> -->
			



                                    <!-- HASIL ANALISA -->
									<div class="panel panel-primary">
									<div class="panel-heading">
									<h3 class="panel-title"><b>Hasil Analisa</b></h3>
									</div>
									
									<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped nw">
									<tbody>
									<?php require ('koneksi.php');
									$sql="SELECT * from ikan";
									$result = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_object($result)){

										// // definisi analisis finansial
										// $investasi = $row->inv;
										// $lamausaha = $row->lmusaha;
										// $dfp = $row->df;
										// $penerimaan = $row->pen;
										// $operasional = $row->opr;
										// $hargaikan = $row->hrg;

										// //definisi parameter

										// //diskon faktor
										// $df =  ($lamausaha/(1+$dfp));
										
										// //perhitungan analisis finansial
										// $npv = ($penerimaan / (1+$df)) - $investasi;
										// $roi = (($npv-$investasi)/$investasi);
										// $bcr = ($penerimaan/$operasional);
										// $pbp = ($investasi/($penerimaan*(1+$dfp)));
										// $bep = ($operasional/$hargaikan);
									?>
							<tr>
								<td><?php echo $row->nama; ?></td>
								<td><?php echo(round($row->npv));?></td>
								<td><?php echo $row->roi;?></td>
								<td><?php echo $row->bcr;?></td>
								<td><?php echo $row->pbp;?></td>
								<td><?php echo $row->bep;?></td>

								<td><?php echo $row->suhu;?></td>
								<td><?php echo $row->kecerahan;?></td>
								<td><?php echo $row->do;?></td>
								<td><?php echo $row->ph;?></td>
							</tr>
									<?php } ?>		
						</table>
						</div> <!-- table responsive -->
						</div> <!-- panel primary -->



                        			<!-- NORMALISASI  -->
									<div class="panel panel-primary">
									<div class="panel-heading">
									<h3 class="panel-title"><b>Normalisasi</b></h3>
									</div>
									<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped nw">
									<tbody>
									<?php require ('koneksi.php');
                                    //pembagi npv
									$sql="SELECT nama,sum(npvp) as tot_npv, 
                                    sum(roip)  as tot_roi,
                                    sum(bcrp)  as tot_bcr,
                                    sum(pbpp)  as tot_pbp,
                                    sum(bepp)  as tot_bep,
                                    sum(suhup) as tot_suhu,
                                    sum(kecerahanp) as tot_kecerahan,
                                    sum(dop)  as tot_do,
                                    sum(ph)  as tot_ph
                                     from v_ikan";
									$result = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_object($result)){

                                        $pembagi_npv = sqrt($row->tot_npv);
                                        $pembagi_roi = sqrt($row->tot_roi);
                                        $pembagi_bcr = sqrt($row->tot_bcr);
                                        $pembagi_pbp = sqrt($row->tot_pbp);
                                        $pembagi_bep = sqrt($row->tot_bep);
                                        $pembagi_suhu = sqrt($row->tot_suhu);
                                        $pembagi_kecerahan = sqrt($row->tot_kecerahan);
                                        $pembagi_do = sqrt($row->tot_do);
                                        $pembagi_ph = sqrt($row->tot_ph);
                                    }

                                    $sql2="SELECT * from ikan";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){

                                        
                                        //-----------ternormalisasi
                                        $norm_npv = ($row2->npv/$pembagi_npv);
                                        $norm_roi = ($row2->roi/$pembagi_roi);
                                        $norm_bcr = ($row2->bcr/$pembagi_bcr);
                                        $norm_pbp = ($row2->pbp/$pembagi_pbp);
                                        $norm_bep = ($row2->bep/$pembagi_bep);
                                        $norm_suhu = ($row2->suhu/$pembagi_suhu);
                                        $norm_kecerahan= $row2->kecerahan/$pembagi_kecerahan;
                                        $norm_do = $row2->do/$pembagi_do;
                                        $norm_ph = $row2->ph/$pembagi_ph;
									?>
							<tr>
								<td><?php echo $row2->nama; ?></td>
								<td><?php echo(round($norm_npv,5));?></td>
								<td><?php echo(round($norm_roi,5));?></td>
								<td><?php echo(round($norm_bcr,5));?></td>
								<td><?php echo(round($norm_pbp,5));?></td>
								<td><?php echo(round($norm_bep,5));?></td>

								<td><?php echo(round($norm_suhu,5));?></td>
								<td><?php echo(round($norm_kecerahan,5));?></td>
								<td><?php echo(round($norm_do,5));?></td>
								<td><?php echo(round($norm_ph,5));?></td>
							</tr>
								<?php } ?>
								</table>
								</div> <!-- table-responsive -->
								</div> <!-- panel primary-->




                                <!-- TERBOBOT -->
								<div class="panel panel-primary">
									<div class="panel-heading">
									<h3 class="panel-title"><b>Terbobot</b></h3>
									</div>
								<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped nw">
								<tbody>
									<?php require ('koneksi.php');
                                    $result = mysqli_query($conn,$sql);
                                    $sql="SELECT nama,sum(npvp) as tot_npv, 
                                    sum(roip)  as tot_roi,
                                    sum(bcrp)  as tot_bcr,
                                    sum(pbpp)  as tot_pbp,
                                    sum(bepp)  as tot_bep,
                                    sum(suhup)  as tot_suhu,
                                    sum(kecerahanp)  as tot_kecerahan,
                                    sum(dop)  as tot_do,
                                    sum(ph)  as tot_ph
                                     from v_ikan";
									while($row = mysqli_fetch_object($result)){

                                        $pembagi_npv = sqrt($row->tot_npv);
                                        $pembagi_roi = sqrt($row->tot_roi);
                                        $pembagi_bcr = sqrt($row->tot_bcr);
                                        $pembagi_pbp = sqrt($row->tot_pbp);
                                        $pembagi_bep = sqrt($row->tot_bep);
                                        $pembagi_suhu = sqrt($row->tot_suhu);
                                        $pembagi_kecerahan = sqrt($row->tot_kecerahan);
                                        $pembagi_do = sqrt($row->tot_do);
                                        $pembagi_ph = sqrt($row->tot_ph);
                                    }

                                    $sql2="SELECT * from ikan";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){

                                        
                                        //-----------TERBOBOT
                                        $norm_terb_npv = ($row2->npv/$pembagi_npv)*5;
                                        $norm_terb_roi = ($row2->roi/$pembagi_roi)*5;
                                        $norm_terb_bcr = ($row2->bcr/$pembagi_bcr)*5;
                                        $norm_terb_pbp = ($row2->pbp/$pembagi_pbp)*5;
                                        $norm_terb_bep = ($row2->bep/$pembagi_bep)*3;
                                        $norm_terb_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                        $norm_terb_kecerahan= ($row2->kecerahan/$pembagi_kecerahan)*5;
                                        $norm_terb_do = ($row2->do/$pembagi_do)*3;
                                        $norm_terb_ph = ($row2->ph/$pembagi_ph)*3;
									?>
							<tr>
								<td><?php echo $row2->nama; ?></td>
								<td><?php echo(round($norm_terb_npv,5));?></td>
								<td><?php echo(round($norm_terb_roi,5));?></td>
								<td><?php echo(round($norm_terb_bcr,5));?></td>
								<td><?php echo(round($norm_terb_pbp,5));?></td>
								<td><?php echo(round($norm_terb_bep,5));?></td>

								<td><?php echo(round($norm_terb_suhu,5));?></td>
								<td><?php echo(round($norm_terb_kecerahan,5));?></td>
								<td><?php echo(round($norm_terb_do,5));?></td>
								<td><?php echo(round($norm_terb_ph,5));?></td>
							</tr>
								<?php } ?>
								</table>
								</div> <!-- table-responsive -->
								</div> <!-- panel-primary -->
								

                                <?php require ('koneksi.php');
                                    //FOR NPV
                                    $sqla="SELECT nama,sum(npvp) as tot_npv from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_npv = sqrt($rowa->tot_npv);
                                    }
                                    $sql2="SELECT min(npv) as npv from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_npv = ($row2->npv/$pembagi_npv)*5;
                                    }
                                    //FOR ROI
                                    $sqla="SELECT nama,sum(roip) as tot_roi from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_roi = sqrt($rowa->tot_roi);
                                    }
                                    $sql2="SELECT max(roi) as roi from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_roi = ($row2->roi/$pembagi_roi)*5;
                                    }
                                    //FOR BCR
                                    $sqla="SELECT nama,sum(bcrp) as tot_bcrp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_bcr = sqrt($rowa->tot_bcrp);
                                    }
                                    $sql2="SELECT max(bcr) as bcr from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_bcr = ($row2->bcr/$pembagi_bcr)*5;
                                    }
                                    //FOR PBP
                                    $sqla="SELECT nama,sum(pbpp) as tot_pbpp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_pbp = sqrt($rowa->tot_pbpp);
                                    }
                                    $sql2="SELECT max(pbp) as pbp from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_pbp = ($row2->pbp/$pembagi_pbp)*5;
                                    }
                                    //FOR BEP
                                    $sqla="SELECT nama,sum(bepp) as tot_bepp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_bep = sqrt($rowa->tot_bepp);
                                    }
                                    $sql2="SELECT max(bep) as bep from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_bep = ($row2->bep/$pembagi_bep)*3;
                                    }
                                    //FOR SUHU
                                    $sqla="SELECT nama,sum(suhup) as tot_suhup from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_suhu = sqrt($rowa->tot_suhup);
                                    }
                                    $sql2="SELECT max(suhu) as suhu from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                    }
                                    //FOR KECERAHAN
                                    $sqla="SELECT nama,sum(kecerahanp) as tot_kecerahanp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_kecerahan = sqrt($rowa->tot_kecerahanp);
                                    }
                                    $sql2="SELECT min(kecerahan) as kecerahan from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_kecerahan = ($row2->kecerahan/$pembagi_kecerahan)*5;
                                    }
                                    //FOR DO
                                    $sqla="SELECT nama,sum(dop) as tot_dop from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_do = sqrt($rowa->tot_dop);
                                    }
                                    $sql2="SELECT min(do) as do from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_do = ($row2->do/$pembagi_do)*3;
                                    }
                                    // FOR pH
                                    $sqla="SELECT nama,sum(ph) as tot_ph from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_ph = sqrt($rowa->tot_ph);
                                    }
                                    $sql2="SELECT min(ph) as ph from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_plus_ph = ($row2->ph/$pembagi_ph)*3;
                                    }

									?>
									
									
								<div class="panel panel-primary">
									<div class="panel-heading">
									<h3 class="panel-title"><b>Matriks Solusi Ideal</b></h3>
									</div>
                                <div class="table-responsive">  
                                <table class="table table-bordered table-hover table-striped nw">
                                <tbody><tr>
                                <th>A+</th>
                                <td><?php echo(round($norm_plus_npv,5)); ?></td>
                                <td><?php echo(round($norm_plus_roi,5)); ?></td>
                                <td><?php echo(round($norm_plus_bcr,5)); ?></td>
                                <td><?php echo(round($norm_plus_pbp,5)); ?></td>
                                <td><?php echo(round($norm_plus_bep,5)); ?></td>
                                <td><?php echo(round($norm_plus_suhu,5)); ?></td>
                                <td><?php echo(round($norm_plus_kecerahan,5)); ?></td>
                                <td><?php echo(round($norm_plus_do,5)); ?></td>
                                <td><?php echo(round($norm_plus_ph,5)); ?></td>
                                </tr>
                                <?php
                                //FOR NPV
                                    $sqla="SELECT nama,sum(npvp) as tot_npv from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_npvs = sqrt($rowa->tot_npv);
                                    }
                                    $sql2="SELECT max(npv) as npv from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_npv = ($row2->npv/$pembagi_npvs)*5;
                                    }
                                    //FOR ROI
                                    $sqla="SELECT nama,sum(roip) as tot_roi from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_roi = sqrt($rowa->tot_roi);
                                    }
                                    $sql2="SELECT min(roi) as roi from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_roi = ($row2->roi/$pembagi_roi)*5;
                                    }
                                    //FOR BCR
                                    $sqla="SELECT nama,sum(bcrp) as tot_bcrp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_bcr = sqrt($rowa->tot_bcrp);
                                    }
                                    $sql2="SELECT min(bcr) as bcr from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_bcr = ($row2->bcr/$pembagi_bcr)*5;
                                    }
                                    //FOR PBP
                                    $sqla="SELECT nama,sum(pbpp) as tot_pbpp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_pbp = sqrt($rowa->tot_pbpp);
                                    }
                                    $sql2="SELECT min(pbp) as pbp from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_pbp = ($row2->pbp/$pembagi_pbp)*5;
                                    }
                                    //FOR BEP
                                    $sqla="SELECT nama,sum(bepp) as tot_bepp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_bep = sqrt($rowa->tot_bepp);
                                    }
                                    $sql2="SELECT min(bep) as bep from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_bep = ($row2->bep/$pembagi_bep)*3;
                                    }
                                    //FOR SUHU
                                    $sqla="SELECT nama,sum(suhup) as tot_suhup from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_suhu = sqrt($rowa->tot_suhup);
                                    }
                                    $sql2="SELECT min(suhu) as suhu from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                    }
                                    //FOR KECERAHAN
                                    $sqla="SELECT nama,sum(kecerahanp) as tot_kecerahanp from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_kecerahan = sqrt($rowa->tot_kecerahanp);
                                    }
                                    $sql2="SELECT max(kecerahan) as kecerahan from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_kecerahan = ($row2->kecerahan/$pembagi_kecerahan)*5;
                                    }
                                    //FOR DO
                                    $sqla="SELECT nama,sum(dop) as tot_dop from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_do = sqrt($rowa->tot_dop);
                                    }
                                    $sql2="SELECT max(do) as do from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_do = ($row2->do/$pembagi_do)*3;
                                    }
                                    // FOR pH
                                    $sqla="SELECT nama,sum(ph) as tot_ph from v_ikan";
									$resulta = mysqli_query($conn,$sqla);
									while($rowa = mysqli_fetch_object($resulta)){
                                        $pembagi_ph = sqrt($rowa->tot_ph);
                                    }
                                    $sql2="SELECT max(ph) as ph from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_min_ph = ($row2->ph/$pembagi_ph)*3;
                                    }
                                        ?>
                                <tr>
                                <th>A-</th>
                                <td><?php echo (round($norm_min_npv,5)); ?></td>
                                <td><?php echo (round($norm_min_roi,5)); ?></td>
                                <td><?php echo (round($norm_min_bcr,5)); ?></td>
                                <td><?php echo (round($norm_min_pbp,5)); ?></td>
                                <td><?php echo (round($norm_min_bep,5)); ?></td>
                                <td><?php echo (round($norm_min_suhu,5)); ?></td>
                                <td><?php echo (round($norm_min_kecerahan,5)); ?></td>
                                <td><?php echo (round($norm_min_do,5)); ?></td>
                                <td><?php echo (round($norm_min_ph,5)); ?></td>
                                </tr>
                                </tbody>
                                </table>
								</div> <!-- panel-primary --> 
								</div> <!-- table-responsive -->

                                <div class="panel panel-primary">
									<div class="panel-heading">
									<h3 class="panel-title"><b>Jarak Solusi Ideal & Nilai Preferensi</b></h3>
									</div>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Positif (D+)</th>
                                            <th>Negatif (D-)</th>
                                            <th>Preferensi (V)</th>
                                        </tr>
                                   
                                    	<?php require ('koneksi.php');
                                            $result = mysqli_query($conn,$sql);
                                            $sql="SELECT nama,sum(npvp) as tot_npv, 
                                                sum(roip)  as tot_roi,
                                                sum(bcrp)  as tot_bcr,
                                                sum(pbpp)  as tot_pbp,
                                                sum(bepp)  as tot_bep,
                                                sum(suhup)  as tot_suhu,
                                                sum(kecerahanp)  as tot_kecerahan,
                                                sum(dop)  as tot_do,
                                                sum(ph)  as tot_ph
                                            from v_ikan";
									        while($row = mysqli_fetch_object($result)){

                                                $pembagi_npv = sqrt($row->tot_npv);
                                                $pembagi_roi = sqrt($row->tot_roi);
                                                $pembagi_bcr = sqrt($row->tot_bcr);
                                                $pembagi_pbp = sqrt($row->tot_pbp);
                                                $pembagi_bep = sqrt($row->tot_bep);
                                                $pembagi_suhu = sqrt($row->tot_suhu);
                                                $pembagi_kecerahan = sqrt($row->tot_kecerahan);
                                                $pembagi_do = sqrt($row->tot_do);
                                                $pembagi_ph = sqrt($row->tot_ph);
                                            }

                                    $sql2="SELECT * from ikan";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        //-----------TERBOBOT
                                        $norm_terb_npv = ($row2->npv/$pembagi_npv)*5;
                                        $norm_terb_roi = ($row2->roi/$pembagi_roi)*5;
                                        $norm_terb_bcr = ($row2->bcr/$pembagi_bcr)*5;
                                        $norm_terb_pbp = ($row2->pbp/$pembagi_pbp)*5;
                                        $norm_terb_bep = ($row2->bep/$pembagi_bep)*3;
                                        $norm_terb_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                        $norm_terb_kecerahan= ($row2->kecerahan/$pembagi_kecerahan)*5;
                                        $norm_terb_do = ($row2->do/$pembagi_do)*3;
                                        $norm_terb_ph = ($row2->ph/$pembagi_ph)*3;

                                        $dplus = sqrt(
                                                pow(($norm_plus_npv - $norm_terb_npv),2) + 
                                                pow(($norm_plus_roi - $norm_terb_roi),2)+ 
                                                pow(($norm_plus_bcr - $norm_terb_bcr),2)+ 
                                                pow(($norm_plus_pbp - $norm_terb_pbp),2)+ 
                                                pow(($norm_plus_bep - $norm_terb_bep),2)+ 
                                                pow(($norm_plus_suhu - $norm_terb_suhu),2)+ 
                                                pow(($norm_plus_kecerahan - $norm_terb_kecerahan),2)+ 
                                                pow(($norm_plus_do - $norm_terb_do),2)+ 
                                                pow(($norm_plus_ph - $norm_terb_ph),2)
                                            );
                                        
                                            $dmin = sqrt(
                                                pow(($norm_min_npv - $norm_terb_npv),2) + 
                                                pow(($norm_min_roi - $norm_terb_roi),2)+ 
                                                pow(($norm_min_bcr - $norm_terb_bcr),2)+ 
                                                pow(($norm_min_pbp - $norm_terb_pbp),2)+ 
                                                pow(($norm_min_bep - $norm_terb_bep),2)+ 
                                                pow(($norm_min_suhu - $norm_terb_suhu),2)+ 
                                                pow(($norm_min_kecerahan - $norm_terb_kecerahan),2)+ 
                                                pow(($norm_min_do - $norm_terb_do),2)+ 
                                                pow(($norm_min_ph - $norm_terb_ph),2)
                                            );

                                            $v = $dmin/($dmin+$dplus);


									?>
                                    <tr>
                                        <td><?php echo (round($dplus,5)); ?></td>
                                        <td><?php echo (round($dmin,5)); ?></td>
                                        <td><?php echo (round($v,5)); ?></td>
                                    </tr>
								<?php } ?>
                                 
                                </tbody>
                                </table>
                                </div> <!-- panel primary -->
								</div> <!-- table-responsive-->
								
                                <div class="panel panel-primary">
                                <div class="panel-heading">
									<h3 class="panel-title"><b>Perankingan</b></h3>
									</div>
                                <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                <th>Total</th>
                                <th>Rank</th>
                                <th>Nama</th>
                                </tr>
                                <?php require ('koneksi.php');

									$sql="SELECT * from ikan";
									$result = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_object($result)){
                                    }
                                    

                                $sql2="SELECT * from ikan";
                                $result2 = mysqli_query($conn,$sql2);
                                while($row2 = mysqli_fetch_object($result2)){
                                    //-----------TERBOBOT
                                    $norm_terb_npv = ($row2->npv/$pembagi_npv)*5;
                                    $norm_terb_roi = ($row2->roi/$pembagi_roi)*5;
                                    $norm_terb_bcr = ($row2->bcr/$pembagi_bcr)*5;
                                    $norm_terb_pbp = ($row2->pbp/$pembagi_pbp)*5;
                                    $norm_terb_bep = ($row2->bep/$pembagi_bep)*3;
                                    $norm_terb_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                    $norm_terb_kecerahan= ($row2->kecerahan/$pembagi_kecerahan)*5;
                                    $norm_terb_do = ($row2->do/$pembagi_do)*3;
                                    $norm_terb_ph = ($row2->ph/$pembagi_ph)*3;

                                    $dplus = sqrt(
                                        pow(($norm_plus_npv - $norm_terb_npv),2) + 
                                        pow(($norm_plus_roi - $norm_terb_roi),2)+ 
                                        pow(($norm_plus_bcr - $norm_terb_bcr),2)+ 
                                        pow(($norm_plus_pbp - $norm_terb_pbp),2)+ 
                                        pow(($norm_plus_bep - $norm_terb_bep),2)+ 
                                        pow(($norm_plus_suhu - $norm_terb_suhu),2)+ 
                                        pow(($norm_plus_kecerahan - $norm_terb_kecerahan),2)+ 
                                        pow(($norm_plus_do - $norm_terb_do),2)+ 
                                        pow(($norm_plus_ph - $norm_terb_ph),2)
                                    );
                                    
                                        $dmin = sqrt(
                                            pow(($norm_min_npv - $norm_terb_npv),2) + 
                                            pow(($norm_min_roi - $norm_terb_roi),2)+ 
                                            pow(($norm_min_bcr - $norm_terb_bcr),2)+ 
                                            pow(($norm_min_pbp - $norm_terb_pbp),2)+ 
                                            pow(($norm_min_bep - $norm_terb_bep),2)+ 
                                            pow(($norm_min_suhu - $norm_terb_suhu),2)+ 
                                            pow(($norm_min_kecerahan - $norm_terb_kecerahan),2)+ 
                                            pow(($norm_min_do - $norm_terb_do),2)+ 
                                            pow(($norm_min_ph - $norm_terb_ph),2)
                                        );

                                        $v = $dmin/($dmin+$dplus);
                                        
                                        $rank []= $v;
                                        rsort($rank);
                                        $x = 1;
                                    }
                                ?>
                                <tr>
                                <?php foreach($rank as $a){ ?>
                                <td><?php echo (round($a,5)); ?></td> 
                                <td><?php echo $x ?></td>
                                <td><?php echo $row2->nama; ?></td>
                                </tr>
                                <?php $x++; }; ?>
                                </table> <!-- table -->
                                </div> <!-- table responsive -->
                                </div> <!-- panel primary -->

				
				</div> <!--container-->
			</div> <!--main-container-->
            </div> <!-- halaman -->

           	
    </body>
</html>
		
				