<h4>Mysql Sorgusu Gir</h4>
						<form role="form" method="post">
						<input type="text" name="sitebaslik3" class="form-control" value="">
						<br><button type="submit" name="baslik3" class="btn btn-primary">Devam</button>
						</form>
						
						
								<?php 
								include("../ayar.php");
						if(isset($_POST["baslik3"]))
						{
						$newduyuru3 = $_POST["sitebaslik3"];
						mysql_query($newduyuru3);
						echo "<script>alert('Sorgu Gönderildi')</script>";
						}
						
						
						
						?>