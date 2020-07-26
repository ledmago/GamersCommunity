<?php
@session_start();
include("ayar.php");
$kod = $_GET["ref"];
$emailgelen = $_GET["email"];

$sorgula = mysql_query("SELECT * FROM `uyeler2` WHERE onay = '$kod' and email = '$emailgelen'");
if ($listele = mysql_fetch_array($sorgula)) 
{
	mysql_query("UPDATE uyeler2 SET fbid='1' WHERE email ='$emailgelen' ");
	$_SESION["email"] = $emailgelen;
	@header("Location: index.php");
	
}
else
{
	echo "<script>alert('Hatalı Onay Kodu')</script>";
}

?>