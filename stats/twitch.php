<?php
session_start();
ob_start();
include("ayar.php");


if(isset($_COOKIE["yasak"]))
{
	
	header("Location: http://twitch.tv/zeeoon");
	
}
else
{
	

	
	
	$kod = $_GET["ie"];
	setcookie("yasak", "$kod");

	$sorgus = "SELECT * FROM uyeler2 WHERE paylas='$kod'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 	
$paylaspuan = $uyelers["paylaspuan"];

$paylaspuan = $paylaspuan  + 1;	


mysql_query("UPDATE `uyeler2` SET `paylaspuan`='$paylaspuan' WHERE paylas = '$kod'");

header("Location: http://twitch.tv/zeeoon");
	
}




	





?>