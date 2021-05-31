<!DOCTYPE html>
<html > <!--<![endif]-->
    <head>
    <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../css/flexslider.min.css" rel="stylesheet" type="text/css" media="all"/>
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
								
		<div class="nav-container">
			<nav class="simple-bar top-bar">
				<div class="container">
					<div class="row nav-menu">
						<div class="col-md-3 col-sm-3 columns">
							<a href="index.php?page=home">
							<img class="logo logo-dark" alt="Logo" src="img/logotype_dark.png">
						</div>
					
						<div class="col-md-9 col-sm-9 columns text-right">
							<ul class="menu">
								<a></a><li><a href="index.php?page=home" target="_self">Home</a></li>
								<li><a href="index.php?page=entridata"><span class="glyphicon glyphicon-th-large"></span> Entri Data</a></li>
								<li><a href="index.php?page=perhitungan"><span class="glyphicon glyphicon-th-large"></span> Perhitungan</a></li>
								<li><a href="proses.php" target="_self">Proses</a></li>
								<li><a href="hasil.php" target="_self">Hasil</a></li>								
							</ul>							
						</div>
					</div>
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
				</div>
			</nav>
		</div>
		
</div>		
		<div class="main-container">
			<div class="panel panel-default">
						<table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                        <th>cost/benefit</th>
                        <th>cost</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        <th>benefit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>Kepentingan</td>
                        <td>5</td>
                        <td>5</td>
                        <td>5</td>
                        <td>5</td>
                        <td>5</td>
                        <td>3</td>
                        <td>3</td>
                        <td>2</td>
                        <td>3</td>
                        </tr>
                        </tbody>
                        <tr>
							<thead>
								<tr>
									<th>Nama Ikan</th>
									<th>Net Present Value</th>
									<th>Return On Investment</th>
									<th>Benefit Cost Ratio</th>
									<th>Pay Back Period</th>
									<th>Break Event Point</th>
									<th>Suhu</th>
									<th>Kecerahan</th>
									<th>DO</th>
									<th>pH</th>
								</tr>
							</thead>
									<tbody>
									<?php require ('koneksi.php');

									$sql="SELECT * from ikan";
									$result = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_object($result)){
									?>
							<tr>
			
								<td><?php echo $row->nama; ?></td>
								<td><?php echo $row->npv;?></td>
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
<hr/>
<h2> MATRIKS TERNORMALISASI</h2>
                                <table class="table table-bordered table-hover table-striped">
									<tbody>
									<?php require ('koneksi.php');
                                    //pembagi npv
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
                                        $norm_npv = $row2->npv/$pembagi_npv;
                                        $norm_roi = $row2->roi/$pembagi_roi;
                                        $norm_bcr = $row2->bcr/$pembagi_bcr;
                                        $norm_pbp = $row2->pbp/$pembagi_pbp;
                                        $norm_bep = $row2->bep/$pembagi_bep;
                                        $norm_suhu = $row2->suhu/$pembagi_suhu;
                                        $norm_kecerahan= $row2->kecerahan/$pembagi_kecerahan;
                                        $norm_do = $row2->do/$pembagi_do;
                                        $norm_ph = $row2->ph/$pembagi_ph;
									?>
							<tr>
								<td><?php echo $row2->nama; ?></td>
								<td><?php echo $norm_npv;?></td>
								<td><?php echo $norm_roi;?></td>
								<td><?php echo $norm_bcr;?></td>
								<td><?php echo $norm_pbp;?></td>
								<td><?php echo $norm_bep;?></td>

								<td><?php echo $norm_suhu;?></td>
								<td><?php echo $norm_kecerahan;?></td>
								<td><?php echo $norm_do;?></td>
								<td><?php echo $norm_ph;?></td>
							</tr>
								<?php } ?>
								</table>
								</div>

                                <hr/>
<h2>MATRIKS TERBOBOT</h2>
                <table class="table table-bordered table-hover table-striped">
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
                                        $norm_terb_bep = ($row2->bep/$pembagi_bep)*5;
                                        $norm_terb_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                        $norm_terb_kecerahan= ($row2->kecerahan/$pembagi_kecerahan)*3;
                                        $norm_terb_do = ($row2->do/$pembagi_do)*2;
                                        $norm_terb_ph = ($row2->ph/$pembagi_ph)*3;
									?>
							<tr>
								<td><?php echo $row2->nama; ?></td>
								<td><?php echo $norm_terb_npv;?></td>
								<td><?php echo $norm_terb_roi;?></td>
								<td><?php echo $norm_terb_bcr;?></td>
								<td><?php echo $norm_terb_pbp;?></td>
								<td><?php echo $norm_terb_bep;?></td>
								<td><?php echo $norm_terb_suhu;?></td>
								<td><?php echo $norm_terb_kecerahan;?></td>
								<td><?php echo $norm_terb_do;?></td>
								<td><?php echo $norm_terb_ph;?></td>
							</tr>
								<?php } ?>
								</table>
                                </hr>

                                <h2>Matriks Solusi Ideal</h2>

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
                                        $norm_npv = ($row2->npv/$pembagi_npv)*5;
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
                                        $norm_roi = ($row2->roi/$pembagi_roi)*5;
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
                                        $norm_bcr = ($row2->bcr/$pembagi_bcr)*5;
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
                                        $norm_pbp = ($row2->pbp/$pembagi_pbp)*5;
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
                                        $norm_bep = ($row2->bep/$pembagi_bep)*5;
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
                                        $norm_suhu = ($row2->suhu/$pembagi_suhu)*5;
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
                                        $norm_kecerahan = ($row2->kecerahan/$pembagi_kecerahan)*5;
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
                                        $norm_do = ($row2->do/$pembagi_do)*5;
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
                                        $norm_ph = ($row2->ph/$pembagi_ph)*5;
                                    }

									?>
                                    
                                <table class="table table-bordered table-hover table-striped">
                                <tbody><tr>
                                <th>A+</th>
                                <th><?php echo $norm_npv; ?></th>
                                <th><?php echo $norm_roi; ?></th>
                                <th><?php echo $norm_bcr; ?></th>
                                <th><?php echo $norm_pbp; ?></th>
                                <th><?php echo $norm_bep; ?></th>
                                <th><?php echo $norm_suhu; ?></th>
                                <th><?php echo $norm_kecerahan; ?></th>
                                <th><?php echo $norm_do; ?></th>
                                <th><?php echo $norm_ph; ?></th>
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
                                        $norm_min_bep = ($row2->bep/$pembagi_bep)*5;
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
                                        $norm_min_suhu = ($row2->suhu/$pembagi_suhu)*5;
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
                                        $norm_min_kecerahan = ($row2->kecerahan/$pembagi_kecerahan)*5;
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
                                        $norm_min_do = ($row2->do/$pembagi_do)*5;
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
                                        $norm_min_ph = ($row2->ph/$pembagi_ph)*5;
                                    }
                                        ?>
                                <tr>
                                <th>A-</th>
                                <th><?php echo $norm_min_npv; ?></th>
                                <th><?php echo $norm_min_roi; ?></th>
                                <th><?php echo $norm_min_bcr; ?></th>
                                <th><?php echo $norm_min_pbp; ?></th>
                                <th><?php echo $norm_min_bep; ?></th>
                                <th><?php echo $norm_min_suhu; ?></th>
                                <th><?php echo $norm_min_kecerahan; ?></th>
                                <th><?php echo $norm_min_do; ?></th>
                                <th><?php echo $norm_min_ph; ?></th>
                                </tr>
                                </tbody>
                                </table>


                                <h2>Jarak Solusi Ideal</h2>

                                <table class="table table-bordered table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <th>D+</th>
                                            <th>D-</th>
                                            <th>V</th>
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
                                        $norm_terb_bep = ($row2->bep/$pembagi_bep)*5;
                                        $norm_terb_suhu = ($row2->suhu/$pembagi_suhu)*3;
                                        $norm_terb_kecerahan= ($row2->kecerahan/$pembagi_kecerahan)*3;
                                        $norm_terb_do = ($row2->do/$pembagi_do)*2;
                                        $norm_terb_ph = ($row2->ph/$pembagi_ph)*3;
                                        // ---------JARAK SOLUSI IDEAL
                                        $dplus = sqrt(
                                                pow(($norm_npv - $norm_terb_npv),2) + 
                                                pow(($norm_roi - $norm_terb_roi),2)+ 
                                                pow(($norm_bcr - $norm_terb_bcr),2)+ 
                                                pow(($norm_pbp - $norm_terb_pbp),2)+ 
                                                pow(($norm_bep - $norm_terb_bep),2)+ 
                                                pow(($norm_suhu - $norm_terb_suhu),2)+ 
                                                pow(($norm_kecerahan - $norm_terb_kecerahan),2)+ 
                                                pow(($norm_do - $norm_terb_do),2)+ 
                                                pow(($norm_ph - $norm_terb_ph),2)
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


									?>
                                    <tr>
                                        <td><?php echo $dplus; ?></td>
                                        <td><?php echo $dmin; ?></td>
                                    </tr>
								<?php } ?>
                                 
                                </tbody>

                                </table>

                                







				</div> <!--panel-default-->
							</div> <!--main-container-->
					
		
    </body>
</html>
		
				