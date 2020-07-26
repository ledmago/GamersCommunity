﻿﻿<?php 
@session_start();
include("ayar.php");


function puandusur($email32)
{
	
		include("ayar.php"); 

     $sorgu6x = "SELECT * FROM uyeler2 WHERE email='".$email32."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['paylaspuan'];
$sonbegeni2x = $sonbegeni2x - 5;
mysql_query("UPDATE `uyeler2` SET `paylaspuan`='$sonbegeni2x' WHERE `email`='$email32'");




	
}

 
if(!isset($_SESSION["email"]))
{

@header("Location: index.php"); 

}
else{

$email = $_SESSION["email"];
$alan = $_GET["alan"];
$id = $_GET["id"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki > 2)
	{
	
	$sorgusx = "SELECT * FROM capsler WHERE id='$id'";
$admin_sorgusx = mysql_query($sorgusx, $mysqlbaglantisi) or die(mysql_error());
$uyelersx = mysql_fetch_array($admin_sorgusx);

$uyeemail = $uyelersx["email"];
puandusur($uyeemail);

$capsisim  = $uyelersx["resim"];
unlink($capsisim);
	
	
	
		mysql_query("DELETE FROM `capsler` WHERE id = '$id'");
	
	
	

	echo "<script>alert('Caps Silinmiştir')</script>";

	
	}


}
	echo '<meta http-equiv="refresh" content="0;URL=capsler.php">';




?>