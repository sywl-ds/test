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
    <div class="container">

        <div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Jarak Solusi & Nilai Preferensi</b></h3>
		</div>

        <!-- A+ -->
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
                                    $sql2="SELECT min(kecerahan) as kecerahan from ikan ";
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
                                    $sql2="SELECT min(do) as do from ikan ";
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
                                    $sql2="SELECT min(ph) as ph from ikan ";
									$result2 = mysqli_query($conn,$sql2);
									while($row2 = mysqli_fetch_object($result2)){
                                        $norm_ph = ($row2->ph/$pembagi_ph)*5;
                                    }


                                    //D+
                                   

									?>






        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="color:black;">
            <tbody>
                <tr>
                <th>D+</th>
                <tr>
                <th>D-</th>
                <tr>
                <th>V</th>
            </tbody>
            </table>
        </div>  <!-- table responsive -->
        </div>
</div>  <!-- panel-primary -->
</div> <!-- container-->
</div> <!-- halaman -->
</body>