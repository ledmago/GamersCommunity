<?php
session_start();
include("../ayar.php");
if(isset($_SESSION["email"]))
{
	header("Location: ../mobil/giris");
	
}
require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '605834552881296',
	'secret' => '300b48501065d839253a090a53d8099b'
));

if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl();
	header("Location: $loginUrl");
	
}
else{
	
	$api = $facebook->api('me');
	
	
	
	// as
	$emailal = $api[email];
	
	if($emailal == "")
	{
		$emailal = $api[id];
		
	}


$sorgula = mysql_query("SELECT * FROM `uyeler2` WHERE email = '$emailal' and ban = '0'");
if ($listele = mysql_fetch_array($sorgula)) 
{

$_SESSION["email"] = $emailal;



	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	mysql_query("UPDATE uyeler2 SET sonipadresi = '$kisipadresi' WHERE email = '$emailal'");
echo '<script>window.parent.location.href= "../mobil/giris";</script>';


}
else
{
		$emailal = $api[email];
 $sorgula3 = mysql_query("SELECT * FROM `uyeler2` WHERE email = '$emailal' and ban='1'");
if ($listele3 = mysql_fetch_array($sorgula3)) 
{
 
 echo "<script>alert('Geçmiş Olsun Banlanmışsın')</script>";
 
 
}
else
{
$resim = "http://graph.facebook.com/".$api[id]."/picture?type=large";
$ad = $api[name];


$emailal = $api[email];
	
	if($emailal == "")
	{
		$emailal = $api[id];
		
	}

$emailyaz = $emailal;
$fbid = $api[id];
$cinsiyet = $api[gender];


mysql_query("INSERT INTO uyeler2(id,ad,email,sifre,cinsiyet,yetki,bilgi,resim,paylas,paylaspuan,fbid) VALUES ('','$ad','$emailyaz','facebookgirisiyapti','$cinsiyet','1','$bilgi','$resim','0','0','$fbid')");
$_SESSION["email"] = $emailyaz;
echo '<script>window.parent.location.href= "../mobil/giris";</script>';



	
}

//
	
	
	
	
	
}
}

?>