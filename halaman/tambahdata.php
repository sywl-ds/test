
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
		<script src="../libs/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>
        <script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
	
	
    <body>
    		<div class="main-container">	
				<div class="container">
					<div class="col-xs-12 col-sm-9">
					<br>
						<h3><b>MASUKKAN DATA FINANSIAL</b></h3>
					  <div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<Tr><td>Nama Ikan</td><td><input type="text" id="nama" class="form-control" maxlength="16"></td></Tr>
								<Tr><td>Lama Usaha (tahun)</td><td><input type="text" id="lmusaha" class="form-control"></td></Tr>
								<Tr><td>DF(%)</td><td><input type="text" id="df" class="form-control"></td>	</Tr>
								<Tr><td>Harga Ikan</td><td><input type="text" id="hrg" class="form-control"></td></Tr>									
								<Tr><td>Investasi</td><td><input type="text" id="inv" class="form-control"></td></Tr>	
								<Tr><td>Penerimaan</td><td><input type="text" id="pen" class="form-control"></td></Tr>				
								<Tr><td>Operasional</td><td><input type="text" id="opr" class="form-control"></td></Tr>					
								<Tr><td>Suhu</td><td><input type="text" id="suhu" class="form-control"></td></Tr>	
								<Tr><td>Kecerahan</td><td><input type="text" id="kecerahan" class="form-control"></td></Tr>	
								<Tr><td>DO</td><td><input type="text" id="do" class="form-control"></td></Tr>	
								<Tr><td>pH</td><td><input type="text" id="ph" class="form-control"></td></Tr>	
								<!-- <Tr><td></td><td><input type="button" id="btnSave" class="btn btn-primary btn-sm" value="Simpan"></td></Tr>
								<Tr><td></td><td><input type="button" id="btnBack" class="btn btn-primary btn-sm" value="Kembali"></td></Tr> -->
							</table>
			</div>	<!-- table --> 		
			</div>	<!-- col --> 
			<input type="button" id="btnSave" class="btn btn-primary" value="Simpan">
			<input type="button" id="btnBack" class="btn btn-primary" value="Kembali">
			</div>	<!-- panel --> 
			</div>	<!-- container --> 
			</div> <!-- maincontainer --> 
			</body>
		
<script language="javascript">
$(document).ready(function(){
	$("#btnSave").click(function(){
		
		var nama=$("#nama").val();
		var lmusaha=$("#lmusaha").val();
		var df=$("#df").val();
		var hrg=$("#hrg").val();
		var inv=$("#inv").val();
		var opr=$("#opr").val();
		var pen=$("#pen").val();
		var suhu=$("#suhu").val();
		var kecerahan=$("#kecerahan").val();
		var dor=$("#do").val();
		var ph=$("#ph").val();
		
		var dataString= 'nama='+nama + '&lmusaha='+lmusaha + '&df='+df+ '&hrg='+hrg + '&inv='+inv + '&opr='+opr+'&pen='+pen
		+'&suhu='+suhu +'&kecerahan='+kecerahan+'&do='+ dor+'&ph='+ph;
		console.log(dataString);
		// if(Ikan==''){
		// 	alert("NUPTK harus diisi");
		// }else if(!$.isNumeric(lama_usaha)){
		// 	alert("Lama usaha harus angka!");
		// }else if(!$.isNumeric(DF_)){
		// 	alert("DF harus angka!");
		// }else if(!$.isNumeric(harga_ikan)){
		// 	alert("Harga Ikan harus angka!");
		// }else if(!$.isNumeric(Investasi)){
		// 	alert("Investasi harus angka!");
		// }else if(!$.isNumeric(Operasional)){
		// 	alert("Operasional harus angka!");
		// }else if(!$.isNumeric(Penerimaan)){
		// 	alert("Penerimaan harus angka !");
		// }
		// else{
				$.ajax({
				type: "POST",
				url: "insertdata.php",
				data: dataString,
				cache: false,
				success: function(result){
					alert(result);
				}
			});
		// }
	});
});
$(document).ready(function(){
	$("#btnBack").click(function(){
		window.location.href="http://localhost/doan/index.php?page=entridata";	
	});
});
</script>				
				
				
				
		<script src="../libs/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/scripts.js"></script>
		<script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.plugin.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.flexslider-min.js"></script>
        <script src="../js/smooth-scroll.min.js"></script>
        <script src="../js/skrollr.min.js"></script>
        <script src="../js/spectragram.min.js"></script>
        <script src="../js/scrollReveal.min.js"></script>
        <script src="../js/isotope.min.js"></script>
        <script src="../js/twitterFetcher_v10_min.js"></script>
        <script src="../js/lightbox.min.js"></script>
        <script src="../js/jquery.countdown.min.js"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
				