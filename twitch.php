<?php
@session_start();
ob_start();
include("ayar.php");


$url = "https://api.twitch.tv/kraken/streams/zeeoon";
$cekilen_veri = file_get_contents($url);




if (stristr($cekilen_veri, "profile_banner")){
     







      
if(isset($_COOKIE["yasak"]))
{
	
	@header("Location: http://twitch.tv/zeeoon");
	
}
else
{
	

	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	
	 mysql_query("SET NAMES UTF8");
 
 $sorgu21 = "SELECT * FROM `ipadresi` WHERE `ipadresi` = '$kisipadresi'";
$admin_sorgu21 = mysql_query($sorgu21, $mysqlbaglantisi) or die(mysql_error());
$uyeler21 = mysql_fetch_array($admin_sorgu21);
$aha = $uyeler21['ipadresi'];
if($aha == $kisipadresi)
{
	
	
}
else{
	$kod = $_GET["ei"];
	setcookie("yasak", "$kod", time() + (60*60*4));

	$sorgus = "SELECT * FROM uyeler2 WHERE paylas='$kod'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 	
$paylaspuan = $uyelers["paylaspuan"];
$bildirimekle = $uyelers["email"];
$paylaspuan = $paylaspuan  + 10;	

$kisipadresi2 =  $_SERVER['REMOTE_ADDR'];

mysql_query("insert into ipadresi (id,ipadresi) value('','".$kisipadresi2."')");
	
}
	
	


mysql_query("UPDATE `uyeler2` SET `paylaspuan`=$paylaspuan WHERE paylas='$kod'");







mysql_query("insert into bildirimler2 (id,email,veritipi,sayac,konuid) values ('','$bildirimekle','2','0','0')");
@header("Location: http://twitch.tv/zeeoon");
	
}
}
else
	{
		@header("Location: http://twitch.tv/zeeoon");
		
	}




?>