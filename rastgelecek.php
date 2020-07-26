﻿<?php 
@session_start();
include("../ayar.php"); 
if(!isset($_SESSION["email"]))
{

@header("Location: index.php"); 

}
else{

$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki < 3)
	{
	
	@header("Location: ../anasayfa.php"); 
	
	
	}
	else{
		
		
		
		
	
		   $idalsanalo = $_GET["id"];
      $sorgu6x = "SELECT * FROM cekilisliste  Where cekilisid='$idalsanalo' order by rand() limit 1'";
	  

	  
$gonderi = mysql_query($sorgu6x, $mysqlbaglantisi);
$sorgu6x = $gonderi["email"];
	echo "<a href='../gelenkutucevapyaz.php?email=$sonbegeni2x'>Mesaj Gönder</a>";
	

echo "<br>bitti";

	
		

					
						
						
						
						
						
	
	}


}





?>