   
					<div class="halaman">
					<div class="container">
					<a href="halaman/submit.php" class="btn btn-primary" id="btnNew" value="Submit">Submit</a><br><br>
					
					
   						<div class="panel panel-primary">
							<div class="panel-heading">
									<h3 class="panel-title"><b>Analisis Finansial</b></h3>
									</div>
						<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
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
						
						</div> <!-- table-responsive -->
						</div> <!-- panel primary -->
						
						</div> <!-- container -->
						</div><!-- halaman -->

<script language="javascript">
$(document).ready(function(){
		window.location.href="submit.php";	
	});
});
</script>
							

				
		
				