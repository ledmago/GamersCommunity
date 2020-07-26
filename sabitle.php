<?php
@session_start();
include("ayar.php");
$yorumid = $_GET["id"];
$kendiemail = $_SESSION["email"];
$sorgusa = "SELECT * FROM uyeler2 WHERE email='$kendiemail'";
$admin_sorgusa = mysql_query($sorgusa, $mysqlbaglantisi) or die(mysql_error());
$uyelersa = mysql_fetch_array($admin_sorgusa); 

	
		$yetki = $uyelersa["yetki"];
	
		

		
		
		if($yetki >= 3)
		{
$kendiemail = $_SESSION["email"];
$alan = $_GET["alan"];
$yorumid = $_GET["id"];

if($alan == "subs")
{
	$sorgus4 = "SELECT * FROM subs_gonderi WHERE id='$yorumid'";
	
	$admin_sorgus4 = mysql_query($sorgus4, $mysqlbaglantisi) or die(mysql_error());
		$uyelers4 = mysql_fetch_array($admin_sorgus4); 		
		$sabit= $uyelers4["sabit"];
		
		if($sabit == "1")
		{
			
			mysql_query("UPDATE `subs_gonderi` SET `sabit`='0' WHERE id='$yorumid'");
			
		}
		else
		{
			mysql_query("UPDATE `subs_gonderi` SET `sabit`='1' WHERE id='$yorumid'");
			
			}
	
}
else
{
	$sorgus4 = "SELECT * FROM mezdeke_gonderi WHERE id='$yorumid'";
	
	$admin_sorgus4 = mysql_query($sorgus4, $mysqlbaglantisi) or die(mysql_error());
		$uyelers4 = mysql_fetch_array($admin_sorgus4); 		
		$sabit= $uyelers4["sabit"];
		
		if($sabit == "1")
		{
			
			mysql_query("UPDATE `mezdeke_gonderi` SET `sabit`='0' WHERE id='$yorumid'");
			
		}
		else
		{
			mysql_query("UPDATE `mezdeke_gonderi` SET `sabit`='1' WHERE id='$yorumid'");
			
			}
			
}



		
		
		}
		
		if($alan == "subs")
		{
			
		@header("Location: anasayfa.php");	
		}
		else
		{
			
			@header("Location: anasayfa.php");
		}
	
	
		
		

?>