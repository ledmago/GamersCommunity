<?php
session_start();
$vt_host = "localhost"; 
$vt_kullanici = "zeonnnco_site"; 
$vt_sifre = "necozeonnn"; 
$veritabani = "zeonnnco_site"; 
$mysqlbaglantisi = mysql_connect($vt_host, $vt_kullanici, $vt_sifre);
mysql_query("SET COLLATION_CONNECTION = ´utf8_turkish_ci´ ");
mysql_query("SET NAMUES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8_turkish_ci'"); 

if(! $mysqlbaglantisi) die("MySQL’e baðlanýlamýyor"); 

mysql_select_db($veritabani, $mysqlbaglantisi) or die ("Veritabanýna baðlanýlamýyor");

mysql_query("SET NAMES UTF8");


$alan = $_GET["alan"];
if($alan == "")
{
$alan = "mezdeke";
}
	$begeni_mez = "'begen.php?id=$ids&alan=$alan'";
		$begeni_mez2 = "'begen.php?id=$ids&alan=subs'";
		
		
		$email2 = $_SESSION["email"];
$idm = $_GET["id"];
	$sorgusm = "SELECT * FROM uyeler2 WHERE email='$email2'";
$admin_sorgus = mysql_query($sorgusm, $mysqlbaglantisi) or die(mysql_error());
$uyelersm = mysql_fetch_array($admin_sorgus); 

$bankontrol = $uyelersm["ban"];

if($bankontrol == "1")
{
	echo "<script>window.parent.location.href = 'cikis.php'</script>";
}
	$giris = $_GET["giris"];
	$emailyetkisi = $_SESSION["email"];
	$sorgus56 = "SELECT * FROM uyeler2 WHERE email='$emailyetkisi'";
$admin_sorgus56 = mysql_query($sorgus56, $mysqlbaglantisi) or die(mysql_error());
$yetkisi = mysql_fetch_array($admin_sorgus56); 
$emailyetkisi = $yetkisi["yetki"];


	
	$sorgus5 = "SELECT * FROM siteayar WHERE id='2'";
$admin_sorgus5 = mysql_query($sorgus5, $mysqlbaglantisi) or die(mysql_error());
$uyelers5 = mysql_fetch_array($admin_sorgus5); 

	if($giris =="giris")
	{}
else
{$bakim = $uyelers5["bakim"];
		if($bakim == "acik" && $emailyetkisi <3)
		{
		header("Location: bakim.php");
		
		}}			
		
?>