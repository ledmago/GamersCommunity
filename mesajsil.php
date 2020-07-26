<?php

include("ayar.php");

if(isset($_SESSION["email"]))
{
	$kendiemail = $_SESSION["email"];
	$getid = $_GET["id"];
	
		$sorgus = "SELECT * FROM gelenkutusu WHERE id='$getid'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 	
$emailgelen = $uyelers["konu"];


echo $emailgelen ."<br>". $kendiemail;

if($emailgelen == $kendiemail)
	
	{
		
		mysql_query("UPDATE gelenkutusu SET goster = '0' WHERE id=$getid");
		
	}




	
}
@header("Location: gelenkutusu.php");
?>