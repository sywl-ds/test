
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->


    <head>
        <meta charset="utf-8">
        <title>Sistem Pendukung Keputusan AF-TOPSIS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="css/flexslider.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/line-icons.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/elegant-icons.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/theme-1.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all"/>
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
	<!-- <style>
       
        body
        {
            background-image: url('bg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style> -->
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
								<a></a><li><a href="index.php?page=home"><span class="glyphicon glyphicon-home"></span>Home</a></li>
								<li><a href="index.php?page=kriteria"><span class="glyphicon glyphicon-th-list">Kriteria</a></li>
								<li><a href="index.php?page=entridata"><span class="glyphicon glyphicon-edit">Entri Data</a></li>
								<li><a href="index.php?page=perhitungan"><span class="glyphicon glyphicon-calendar">Perhitungan</a></li>								
							</ul>							
						</div>
					</div>
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
				</div>
			</nav>
		</div>
		
<div class="main-container">
		
				
								<?php 
								if(isset($_GET['page'])){
								$page = $_GET['page'];
 
								switch ($page) {
								case 'home':
								include "halaman/home.php";
								break;
								case 'kriteria':
								include "halaman/kriteria.php";
								break;
								case 'entridata':
								include "halaman/entridata.php";
								break;	
								case 'perhitungan':
								include "halaman/perhitungan.php";
								break;			
								default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
												}
								}else{
								include "halaman/home.php";
								}
 
								?>
								
</div> <!--main-container-->
		


<!--deklarasiscript-->
		<script src="libs/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
<!--deklarasiscript-->	

		
<!-- bawaan -->
		<script src="js/jquery.min.js"></script>
        <script src="js/jquery.plugin.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/skrollr.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/scrollReveal.min.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/twitterFetcher_v10_min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/scripts.js"></script>
<!-- bawaan -->
    </body>

	<footer class="bg-primary short-2">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<span class="text-white">Sistem Pendukung Keputusan Memilih Budidaya Ikan Hias Air Tawar dengan AF-TOPSIS</a>.</span>
							<br>
							<br>
							<a class="text-white"><span class="text-white"> 55201115034</i></span></a>
						</div>
					</div>
				</div>
				
			</footer>
</html>
				