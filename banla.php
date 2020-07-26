﻿﻿<?php 
@session_start();
include("ayar.php"); 
if(!isset($_SESSION["email"]))
{

@header("Location: index.php"); 

}
else{

$email = $_SESSION["email"];
$id = $_GET["id"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki > 2)
	{
	
	
		mysql_query("UPDATE `uyeler2` SET `ban`='1' WHERE id='$id'");
	

	echo "<script>alert('Kullanıcı Banlandı')</script>";



}
	echo '<meta http-equiv="refresh" content="0;URL=indexorta.php">';

}


?>