<?php
include("ayar.php");
$bildirimleritopla = 0;
$emailneco = $_SESSION["email"];
$sorgu31s=mysql_query("SELECT * FROM bildirimler2 WHERE email='$emailneco' and sayac='0' "); 
		while($gonderi31a = mysql_fetch_array($sorgu31s))   
			{
			$bildirimleritoplaxd = $bildirimleritoplaxd + 1;
			}
			
			
			if($bildirimleritoplaxd == 0)
			{
					echo "<script>document.title='Mezdeke ™ - Paylaşım Platformu '</script>";
			}
			else
			{
					echo ' <span class="label label-danger" style="
    margin-left: 3px;
">'.$bildirimleritoplaxd.'</span>';

	echo "<script>document.title='(".$bildirimleritoplaxd.") Mezdeke ™ - Paylaşım Platformu '</script>";
			}
			
		
			
			?>