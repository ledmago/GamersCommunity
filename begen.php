<?php
@session_start();
include("ayar.php");


$begenidusur  = -5;
if(isset($_SESSION['email']))
{
$id = $_GET["id"];
$alan = $_GET["alan"];

  if($id != "" and $alan != "")
  {
  
  
   $id = mysql_real_escape_string($id);
   
   if($alan == "subs")
   {
   
      $sorgu = "SELECT * FROM subs_gonderi WHERE id='$id'";
   
   }
   else if($alan == "mezdeke")
   {
   $sorgu = "SELECT * FROM mezdeke_gonderi WHERE id='$id'";
   
   }

$admin_sorgu = mysql_query($sorgu, $mysqlbaglantisi) or die(mysql_error());
$uyeler = mysql_fetch_array($admin_sorgu);
   
   $emailal = $uyeler['email'];

   $email = $_SESSION['email'];
 

 
 mysql_query("SET NAMES UTF8");
 
 $sorgu21 = "SELECT * FROM `begeniler` WHERE `email` = '$email' and `konuid` = '$id'";
$admin_sorgu21 = mysql_query($sorgu21, $mysqlbaglantisi) or die(mysql_error());
$uyeler21 = mysql_fetch_array($admin_sorgu21);
$aha = $uyeler21['konuid'];
$begeniyazdir = $uyeler21["begeni"];
if($aha == "$id")
{
	
	$sorgu2 = "SELECT * FROM mezdeke_gonderi WHERE id='$id'";
$admin_sorgu2 = mysql_query($sorgu2, $mysqlbaglantisi) or die(mysql_error());
$uyeler2 = mysql_fetch_array($admin_sorgu2);
$sonbegeni = $uyeler2['begeni'];
$begeniyazdir	= $sonbegeni;
	$begenidusur = $sonbegeni - 1;

	
mysql_query("DELETE from begeniler where email = '$email' and konuid='$id'");
mysql_query("UPDATE mezdeke_gonderi set begeni='$begenidusur' where id='$id'");

}else
{






 
 
 
 $sorgu2 = "SELECT * FROM mezdeke_gonderi WHERE id='$id'";
$admin_sorgu2 = mysql_query($sorgu2, $mysqlbaglantisi) or die(mysql_error());
$uyeler2 = mysql_fetch_array($admin_sorgu2);
$emailalsanalo = $uyeler2['email'];
$sonbegeni = $uyeler2['begeni'];
$sonbegeni++;
$begeniyazdir	= $sonbegeni;



  mysql_query("UPDATE `mezdeke_gonderi` SET `begeni`='$sonbegeni' WHERE `id`='$id'");
  mysql_query("INSERT INTO `begeniler`(`id`, `email`, `konuid`) VALUES ('','$email', '$id')");
   
   
   mysql_query("insert into bildirimler2 (id,email,veritipi,sayac,konuid) values ('','$emailalsanalo','4','0','$id')");
   
   
      $sorgu6x = "SELECT * FROM uyeler2 WHERE email='".$emailalsanalo."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['paylaspuan'];
$sonbegeni2x = $sonbegeni2x + 1;
mysql_query("UPDATE `uyeler2` SET `paylaspuan`='".$sonbegeni2x."' WHERE `email`='".$emailalsanalo."'");
   
   
   





$sorgu6 = "SELECT * FROM uyeler2 WHERE email='$emailalsanalo'";
$admin_sorgu6 = mysql_query($sorgu6, $mysqlbaglantisi) or die(mysql_error());
$uyeler6 = mysql_fetch_array($admin_sorgu6);
$sonbegeni2 = $uyeler6['begeni'];
$sonbegeni2++;
  mysql_query("UPDATE `uyeler2` SET `begeni`=$sonbegeni2 WHERE `email`='$emailalsanalo");
 
   
   
   
 
 
 }

     /* else
{
echo "<script> alert('Kendi Konunuzu Begenemezsiniz')</script>";
} */
   
   

  
  
  }
  }
  
 
if($begenidusur == -5)
{
	
	 echo '<i class="fa fa-heart" style="margin-right:5px"></i>'.$sonbegeni.' - Beğenmekten Vazgeç';
}
else
{
	
	 echo '<i class="fa fa-heart" style="margin-right:5px"></i>'.$begenidusur.' - Beğen';
}

 
?>