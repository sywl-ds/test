<?php
	require ('koneksi.php');
?>
		<div class="halaman">
		<div class="container">
		<form class="form-inline">
		<div class="form">
		<a href="halaman/tambahdata.php" class="btn btn-primary " id="btnNew" value="Tambah Data">
		<span class="glyphicon glyphicon-edit"></span>Tambah Data</a><br><br>
		</div>
		</form>
		<div class="panel panel-primary">
		<div class="panel-heading">
									<h3 class="panel-title"><b>Data Finansial dan Parameter</b></h3>
									</div>
							<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Nama Ikan</th>
									<th>Lama Usaha(tahun)</th>
									<th>Discount Rate(%)</th>
									<th>Harga Ikan</th>
									<th>Investasi</th>
									<th>Penerimaan</th>				
									<th>Operasional</th>
									<th>Suhu</th>
									<th>Kecerahan</th>
									<th>DO</th>
									<th>pH</th>
									<th>Aksi</th>
									</tr>
									</thead>
									<!-- <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style="background-color:#0000FF"> -->
 
	<!-- script references -->
<script language="javascript">
$(document).ready(function(){
		window.location.href="tambahdata.php";	
	});
});
</script>
									
							<?php require ('tampildata.php');?>
							</table>		
  </div></div></div>

				