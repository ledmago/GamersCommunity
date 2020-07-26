<?php @session_start();
 include("ayar.php"); ?><html>
<body style="margin:0;padding:0;background: #207cca; /* Old browsers */
background: -moz-linear-gradient(top, #207cca 0%, #5f9ac6 0%, #466e99 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#207cca), color-stop(0%,#5f9ac6), color-stop(100%,#466e99)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #207cca 0%,#5f9ac6 0%,#466e99 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #207cca 0%,#5f9ac6 0%,#466e99 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #207cca 0%,#5f9ac6 0%,#466e99 100%); /* IE10+ */
background: linear-gradient(to bottom, #207cca 0%,#5f9ac6 0%,#466e99 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#207cca', endColorstr='#466e99',GradientType=0 ); /* IE6-9 */">


<?php
if(!isset($_SESSION["email"]))
{@header("Location: index.php"); }
else{
$email = $_SESSION["email"];	
$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 			
$ceza = $uyelers["ceza"];
$sure = $uyelers["konusuresi"];	
$aboneyimabone = $uyelers["yetki"];
if($ceza != 0)	{		
@header("Location: cezahata.php"); 			
}
else
{
	
	$time = time();
	if($aboneyimabone > 1)
	{
	

			$time = time();
			if($time - $sure < 60)
			{
			@header("Location: surehata.php?sure=60"); 
		
			}	
			else
			{
				
				$tarihguncelle = $_SESSION["email"];
$time = time();
    mysql_query("UPDATE uyeler2 SET konusuresi = '$time' WHERE email='$tarihguncelle'");



				
			}
	}
	else
	{
		
			$time = time();
			if($time - $sure < 150)
			{
			@header("Location: surehata.php?sure=150"); 
		
			}
			else
			{
				
				$tarihguncelle = $_SESSION["email"];
$time = time();
    mysql_query("UPDATE uyeler2 SET konusuresi = '$time' WHERE email='$tarihguncelle'");

				
			}
	}
	
	
	
}


}




?>
<iframe src="http://cuemk.com/capsyap/" style="width:100%;height:500px;" scrolling="no" frameborder='0'></iframe>
</body>
</html>