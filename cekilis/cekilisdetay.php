<?php 
session_start();
include("../ayar.php"); 
if(!isset($_SESSION["email"]))
{

header("Location: index.php"); 

}


function sifre_uret($uzunluk) { 
   
              $karakterler = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
   
              $karakter_sayi = strlen($karakterler); 
   
              
    
              for ($ras = 0; $ras <$uzunluk; $ras++) { 
    
                 $rakam_ver = rand(0,$karakter_sayi-1); 
    
                  $sifre_ver .= $karakterler[$rakam_ver]; 
    
              } 
    
              return $sifre_ver; 
   
          }  

?>

<html>
<body style="background-color:#EBEBEB">
<div style="width:95%;margin-left:auto;margin-right:auto;background-color:#FFF;box-shadow: 0 1px 2px #c9cccd;height:400px">
<style>
body{
	font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
	color: #404040;
	
}

input[type=text], input[type=password] {
margin-left: auto;
margin-right: auto;
margin: 5px;
padding: 0 10px;
width: 200px;
height: 34px;
color: #404040;
background: white;
border: 1px solid;
border-color: #c4c4c4 #d1d1d1 #d4d4d4;
border-radius: 2px;
outline: 5px solid #eff4f7;
outline-color: rgb(239, 244, 247);
outline-style: solid;
outline-width: 5px;
-moz-outline-radius: 3px;
-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}

</style>
<?php

$id = $_GET["id"];
	$sorgus = "SELECT * FROM cekilisler WHERE id='$id'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$gonderi = mysql_fetch_array($admin_sorgus); 
$id = $gonderi["id"];
		$tarih = $gonderi["tarih"];
		$ad = $gonderi["ad"];
		$durum = $gonderi["durumu"];
		$icerik = $gonderi["icerik"];
		$sayac = $gonderi["sayac"];
		
		
		echo "<h2 style='text-align:center;padding-top: 20px;'>$ad</h2>";


			$emailx = $_SESSION["email"];
$sorgus = "SELECT * FROM uyeler2 WHERE email='$emailx'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 	
$paylas = $uyelers["paylas"];	
		
		
		if($paylas == "0")
{
	  $yenipaylas = sifre_uret(11);
	mysql_query("UPDATE `uyeler2` SET `paylas`='$yenipaylas' WHERE id='$id'");
	$paylas = $yenipaylas; 
	
	
	
}
		

?>
<center>Bunu Arkadaşlarınla Paylaş, Fazladan Çekiliş Hakkı Kazan<br><input type="text" class="sayfatext" style="width:60%;" value="<?php echo "http://zeonnn.com/davet.php?ei=$paylas&id=$id"?>"></center>


<?php


echo "<br><div style='padding:20px;>'$icerik </div></br>";





?>

<center>

<a style="
border-radius: 7px;
background: #6685C7;
text-decoration: center;
border: none;
color: #FFF;
padding-top: 8px;
padding-bottom:8px;
outline: none;
font-size: 18px;
border-bottom: 2px solid #181D86;
cursor: pointer;
/* margin-left: 8%; */
padding-left: 15px;
padding-right: 15px;



margin-right:10px;
"><?php echo $sayac ?> Kişi</a>



<a href="katil.php?id=<?php echo $id ?>" style="
border-radius: 7px;
background: #6685C7;
text-decoration: center;
border: none;
color: #FFF;
padding-top: 8px;
padding-bottom:8px;
outline: none;
font-size: 18px;
border-bottom: 2px solid #181D86;
cursor: pointer;
/* margin-left: 8%; */
padding-left: 15px;
padding-right: 15px;
"><?php


$eaags = $_SESSION["email"];
 $sorgu21 = "SELECT * FROM `cekilisliste` WHERE `email` = '$eaags' and `cekilisid` = '$id'";
$admin_sorgu21 = mysql_query($sorgu21, $mysqlbaglantisi) or die(mysql_error());
$uyeler21 = mysql_fetch_array($admin_sorgu21);
$aha = $uyeler21['email'];


$idxx = $_GET["id"];
	$sorgus11 = "SELECT * FROM cekilisler WHERE id='$idxx'";
$admin_sorgus11 = mysql_query($sorgus11, $mysqlbaglantisi) or die(mysql_error());
$uyelers11= mysql_fetch_array($admin_sorgus11); 
$llll = $uyelers11["durumu"];
if($llll == "Açık")
{
	
	



if($aha != "")
{
echo "Katıldın";
}
else
{
echo "Çekilişe Katıl";
}
}
else
{
	echo "Çekiliş Kapalı";
	
}
?></a></center>





</div>
</body>
</html>
