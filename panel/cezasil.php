﻿﻿<?php 
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
	
		mysql_query("UPDATE `uyeler2` SET `ceza`= '0' WHERE id = '$idq'");
						echo "<script>alert('Kullanıcı Cezası Açıldı')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=cezaver.php">';
	
	}


}





?>