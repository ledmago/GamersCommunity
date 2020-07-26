<html>
<head>


</head>
<body>

<?php
@session_start();
include("ayar.php");

if(isset($_SESSION["email"]))
{
	
	$emailx = $_SESSION["email"];
$sorgus = "SELECT * FROM uyeler2 WHERE email='$emailx'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 	
$id = $uyelers["id"];
$paylas = $uyelers["paylas"];	


$paylaspuan = $uyelers["paylaspuan"];

}

?>
</p><center><p style="font-family: 'Oswald', sans-serif;">
<br><input type="text" class="sayfatext" style="width:60%;" value="<?php echo "http://zeonnn.com/twitch.php?gfe_rd=19820&ei=$paylas"?>">



<br><center><font size="25px" style="font-family: 'Oswald', sans-serif;">Puanın : <?php echo $paylaspuan ?></center></font></p>
</body></html>