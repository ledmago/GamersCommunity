<?php 
session_start();
include("../ayar.php"); 
if(!isset($_SESSION["email"]))
{

header("Location: index.php"); 

}
else{

$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki < 3)
	{
	
	header("Location: ../anasayfa.php"); 
	
	
	}


}





?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<link rel="stylesheet" type="text/css" href="cekilis1/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="cekilis1/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="cekilis1/css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>


			<div class="component">
				<h2>Çekilişler</h2>

				<table>
					<thead>
						<tr>
							<th>Çekiliş Numarası</th>
							<th>Rasgele Çek</th>
							<th>Düzenle</th>
							<th>Başlık</th>
							<th>Durumu</th>
							<th>Tarih</th>
							<th>Katılanlar</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
					include("../ayar.php");
mysql_query("SET NAMES UTF8");
$sorgu=mysql_query("SELECT * FROM cekilisler ORDER BY id DESC"); 
		while($gonderi = mysql_fetch_array($sorgu))   
			{

		$id = $gonderi["id"];
		$tarih = $gonderi["tarih"];
		$ad = $gonderi["ad"];
		$durum = $gonderi["durumu"];
		$sayac = $gonderi["sayac"];
		
		
		echo '
		
			<tr>
							<th>Çekiliş : #'.$id.'</th>
							<td><a href="rastgelecek.php?id='.$id.'">Rastgele Çek</td>
							
							<td><a href="cekilissil.php?id='.$id.'">Sil</a>&nbsp;/ 
							
							';
							
							if($durum == "Açık")
							{
								echo '<a href="cekilisdegis.php?id='.$id.'">Çekilişi Kapat</a></td>';
								
							}
							else
							{
								echo '<a href="cekilisdegis.php?id='.$id.'">Çekilişi Aç</a></td>';
							}
							
							echo '
							
							<td>'.$ad.'</td>
							<td>'.$durum.'</td>
							<td>'.$tarih.'</td>
							<td>'.$sayac.'</td>
						</tr>';
		
			}
					
					?>
					
					
					</tbody>
				</table>
				
		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="cekilis1/js/jquery.stickyheader.js"></script>
	</body>
</html>