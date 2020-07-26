<?php
@session_start();
if(!isset($_SESSION["email"]))
{
	@header("Location: index.php");
	
}
else
{
	include("ayar.php");
			if(isset($_POST["yorumgonder"]))
		{				$yorumicerik = $_POST["yorumicerik"];
$yenikonuidcekbildirim = $_POST["idcel"];

	
	
	
$yorumicerik  = mysql_escape_string($yorumicerik);
	$emailyaz = $_SESSION["email"];	
	$idyaz = $_POST["idcel"];			
	$konuid= $idyaz;					
				
				
				
				
				
				if($yorumicerik != "")
				{
		mysql_query("SET NAMES UTF8");	
		mysql_query("INSERT INTO `yorum_mezdeke`(`id`, `email`, `icerik`, `konuid`) VALUES ('','$emailyaz','$yorumicerik','$idyaz')");
			mysql_query("insert into bildirimler2 (id,email,veritipi,sayac,konuid) values ('','$email_post','1','0','$yenikonuidcekbildirim')");
			}
		
		
		
				$sorgusxd = "SELECT * FROM mezdeke_gonderi WHERE id='$idyaz'";
		$admin_sorgusxd = mysql_query($sorgusxd, $mysqlbaglantisi) or die(mysql_error());
		$konuemailxd = mysql_fetch_array($admin_sorgusxd); 
		$konuemailxd2 = $konuemailxd["email"];
		
		if($konuemailxd2  != $emailyaz)
		{
			mysql_query("INSERT INTO `bildirimler2`(`id`, `email`, `veritipi`, `sayac`, `konuid`) VALUES ('','$konuemailxd2','1','0','$idyaz')");
			
		}

		
		
		
		$sorgus1w = "SELECT * FROM mezdeke_gonderi WHERE id='$idyaz'";$admin_sorgus1w = mysql_query($sorgus1w, $mysqlbaglantisi) or die(mysql_error());$uyelers1w = mysql_fetch_array($admin_sorgus1w); 	
		$sonyorum = $uyelers1w["yorum"];	
		$sonyorum++;							
		mysql_query("UPDATE `mezdeke_gonderi` SET`yorum`= '$sonyorum' WHERE id = '$konuid'");
			
			
		
	}	
}
@header("Location: konu.php?id=$idyaz");


?>