﻿<?php 
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
	else{
		
		
	$idq=$_GET["id"];
	
	
	$idxx = $_GET["id"];
	$sorgus11 = "SELECT * FROM cekilisler WHERE id='$idxx'";
$admin_sorgus11 = mysql_query($sorgus11, $mysqlbaglantisi) or die(mysql_error());
$uyelers11= mysql_fetch_array($admin_sorgus11); 
$llll = $uyelers11["durumu"];
if($llll == "Açık")
{
		mysql_query("UPDATE `cekilisler` SET `durumu`='Kapalı'  WHERE id ='$idxx'");
}
else{
	
		mysql_query("UPDATE `cekilisler` SET `durumu`='Açık' WHERE id ='$idxx'");
}
	
	
	
	

						echo '<meta http-equiv="refresh" content="0;URL=cekilisduzenle.php">';
	
	}


}





?>