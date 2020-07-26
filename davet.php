<?php 
@session_start();
include("ayar.php"); 
if(!isset($_SESSION["email"]))
{

@header("Location: index.php"); 

}



?>

<html>
<body>

<?php
$idxx = $_GET["id"];
	$sorgus11 = "SELECT * FROM cekilisler WHERE id='$idxx'";
$admin_sorgus11 = mysql_query($sorgus11, $mysqlbaglantisi) or die(mysql_error());
$uyelers11= mysql_fetch_array($admin_sorgus11); 
$llll = $uyelers11["durumu"];
if($llll == "Açık")
{
	
	
	$id = $_GET["id"];






$aliste = $_SESSION["email"];


 mysql_query("SET NAMES UTF8");
 
 
 
 
 

 $sorgu21 = "SELECT * FROM `cekilisliste` WHERE `email` = '$aliste' and `cekilisid` = '$id'";
$admin_sorgu21 = mysql_query($sorgu21, $mysqlbaglantisi) or die(mysql_error());
$uyeler21 = mysql_fetch_array($admin_sorgu21);
$aha = $uyeler21['email'];
if($aha != "")
{
echo "<script>alert('Çekilişe Zaten Katıldın') </script>";

}
else
{
	mysql_query("insert into cekilisliste  value('','$id','$aliste')");
	


	   $idalsanalo = $_GET["id"];
      $sorgu6x = "SELECT * FROM cekilisler WHERE id='".$idalsanalo."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['sayac'];
$sonbegeni2x = $sonbegeni2x + 1;

$deneme = mysql_query("UPDATE `cekilisler` SET `sayac`='".$sonbegeni2x."' WHERE `id`='".$idalsanalo."'");
   
	
	
	/*  SAAA */
	
	
	 $idalsanaloww = $_GET["ei"];
      $sorgu6xq = "SELECT * FROM uyeler2 WHERE paylas='".$idalsanaloww."'";
$admin_sorgu6xq = mysql_query($sorgu6xq, $mysqlbaglantisi) or die(mysql_error());
$uyeler6xq = mysql_fetch_array($admin_sorgu6xq);
$sonbegeni2xq = $uyeler6xq['email'];
	
	
	mysql_query("insert into cekilisliste  value('','$id','$sonbegeni2xq')");
	
	
	
	
	
	
	
	
	
	
	
	echo "<script>alert('Tebrikler Çekilişe Katıldın') </script>";
}

	
}
else{
	
	
	
}


echo "<meta http-equiv='refresh' content='0;URL=cekilis/cekilisdetay.php?id=$id'>";





?>


</body>
</html>
