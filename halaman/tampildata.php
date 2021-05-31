<?php
	require ('koneksi.php');

									$sql="SELECT * from ikan";
									$result = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_object($result))
									{
										echo "<tr><td>".$row->nama.
											"</td><td>".$row->lmusaha.
											"</td><td>".$row->df.
											"</td><td>".$row->hrg.
											"</td><td>".$row->inv.
											"</td><td>".$row->pen.
											"</td><td>".$row->opr.
											"</td><td>".$row->suhu.
											"</td><td>".$row->kecerahan.
											"</td><td>".$row->do.
											"</td><td>".$row->ph.
											"</td><td>
											<a href='halaman/edit-data.php?nama=".$row->id."'>Edit</a>
											<a href='halaman/delete-data.php?nama=".$row->id."'>Delete</a></td></tr>";
									}
									?>