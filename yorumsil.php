<?php
@session_start();
include("ayar.php");
$kendiemail = $_SESSION["email"];
$alan = $_GET["alan"];
$yorumid = $_GET["id"];

if($alan == "subs")
{
	$sorgus4 = "SELECT * FROM yorum_subs WHERE id='$yorumid'";
	
	
}
else
{
	$sorgus4 = "SELECT * FROM yorum_mezdeke WHERE id='$yorumid'";
	
}



		$admin_sorgus4 = mysql_query($sorgus4, $mysqlbaglantisi) or die(mysql_error());
		$uyelers4 = mysql_fetch_array($admin_sorgus4); 		
		$yorum_email = $uyelers4["email"];
		$konuid= $uyelers4["konuid"];
		
		
		
		
		
		$emaila = $_SESSION["email"];
	$sorgusa = "SELECT * FROM uyeler2 WHERE email='$emaila'";
$admin_sorgusa = mysql_query($sorgusa, $mysqlbaglantisi) or die(mysql_error());
$uyelersa = mysql_fetch_array($admin_sorgusa); 

	
		$yetki = $uyelersa["yetki"];
	
		

		
		
		if($yorum_email ==  $kendiemail || $yetki >= 3)
		{
			
			if($alan == "subs")
{
	mysql_query("DELETE FROM `yorum_subs` WHERE id='$yorumid'");
	$sorgus2 = "SELECT * FROM subs_gonderi WHERE id='$konuid'";
	
	$admin_sorgus2 = mysql_query($sorgus2, $mysqlbaglantisi) or die(mysql_error());
		$uyelers2 = mysql_fetch_array($admin_sorgus2); 		
		$yorumsayisi = $uyelers2["yorum"];
		
		$yorumsayisi = $yorumsayisi - 1;
		
		mysql_query("UPDATE `subs_gonderi` SET `yorum`='$yorumsayisi' WHERE id='$konuid'");
		

	
}
else
{
	mysql_query("DELETE FROM `yorum_mezdeke` WHERE id='$yorumid'");
		$sorgus2 = "SELECT * FROM mezdeke_gonderi WHERE id='$konuid'";
		
		$admin_sorgus2 = mysql_query($sorgus2, $mysqlbaglantisi) or die(mysql_error());
		$uyelers2 = mysql_fetch_array($admin_sorgus2); 		
		$yorumsayisi = $uyelers2["yorum"];
		
		$yorumsayisi = $yorumsayisi - 1;
		
		mysql_query("UPDATE `mezdeke_gonderi` SET `yorum`='$yorumsayisi' WHERE id='$konuid'");
}
			
			
			
		}
		
		@header("Location: konu.php?id=$konuid&alan=$alan");

?>