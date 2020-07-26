﻿﻿<?php 
session_start();
include("ayar.php"); 

function puandusur($email32)
{
	
		

     $sorgu6x = "SELECT * FROM uyeler2 WHERE email='".$email32."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['paylaspuan'];
$sonbegeni2x = $sonbegeni2x - 5;
$puandusur = mysql_query("UPDATE `uyeler2` SET `paylaspuan`='".$sonbegeni2x."' WHERE `email`='".$email32."'");



	echo "<script>alert('".$email32.$sonbegeni2x."')</script>";
	
}





if(!isset($_SESSION["email"]))
{

header("Location: index.php"); 

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
		
		
		
		
		
		
		
		

	
	if($alan == "mezdeke")
	{
			$sorgusx = "SELECT * FROM mezdeke_gonderi WHERE id='$id'";
$admin_sorgusx = mysql_query($sorgusx, $mysqlbaglantisi) or die(mysql_error());
$uyelersx = mysql_fetch_array($admin_sorgusx);

$uyeemail = $uyelersx["email"];
puandusur($uyeemail);

$capsisim  = $uyelersx["resim"];
if($capsisim != "")
{
	unlink($capsisim);
	
}
		
		mysql_query("DELETE FROM `mezdeke_gonderi` WHERE id = '$id'");
	}
	else{
	
		$sorgusx = "SELECT * FROM subs_gonderi WHERE id='$id'";
$admin_sorgusx = mysql_query($sorgusx, $mysqlbaglantisi) or die(mysql_error());
$uyelersx = mysql_fetch_array($admin_sorgusx);
$uyeemail = $uyelersx["email"];
puandusur($uyeemail);
$capsisim  = $uyelersx["resim"];
if($capsisim != "")
{
	unlink($capsisim);
	
}

	
	mysql_query("DELETE FROM `subs_gonderi` WHERE id = '$id'");
	}

	

	
	
	
	
	echo "<script>alert('Konu Silinmiştir')</script>";

	
	}


}
if($alan == "subs")
{
		echo '<meta http-equiv="refresh" content="0;URL=indexmezdeke.php">';
}
else{
	echo '<meta http-equiv="refresh" content="0;URL=indexorta.php">';
}





?>