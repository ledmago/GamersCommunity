<?php

include("../ayar.php");

	
	   $idalsanalo = $_GET["id"];
      $sorgu6x = "SELECT * FROM cekilisler WHERE id='".$idalsanalo."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['sayac'];
$sonbegeni2x = $sonbegeni2x + 1;
echo $sonbegeni2x;
$deneme = mysql_query("UPDATE `cekilisler` SET `sayac`='".$sonbegeni2x."' WHERE `id`='".$idalsanalo."'");
if($deneme)
{
	
	
	
}

?>