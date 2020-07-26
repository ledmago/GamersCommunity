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
	
		mysql_query("DELETE `sikayet` WHERE id = '$idq'");
						echo "<script>alert('Şikayet Silindi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=siteayar.php">';
	
	}


}





?>