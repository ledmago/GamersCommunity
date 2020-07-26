<?php
session_start();
include("ayar.php");



if(isset($_SESSION['email']))
{
$id = $_GET["id"];
$alan = $_GET["alan"];

  if($id != "" and $alan != "")
  {
  
  
   $id = mysql_real_escape_string($id);
   

      $sorgu = "SELECT * FROM subs_gonderi WHERE id='$id'";
   


$admin_sorgu = mysql_query($sorgu, $mysqlbaglantisi) or die(mysql_error());
$uyeler = mysql_fetch_array($admin_sorgu);
   
   $emailal = $uyeler['email'];

   $email = $_SESSION['email'];
 

 
 mysql_query("SET NAMES UTF8");
 
 $sorgu21 = "SELECT * FROM `begeniler_subs` WHERE `email` = '$email' and `konuid` = '$id'";
$admin_sorgu21 = mysql_query($sorgu21, $mysqlbaglantisi) or die(mysql_error());
$uyeler21 = mysql_fetch_array($admin_sorgu21);
$aha = $uyeler21['konuid'];
if($aha == "$id")
{
echo "<script>alert('Zaten Beğendin Kardeşim :)') </script>";

}else
{






 
 
 
 $sorgu2 = "SELECT * FROM subs_gonderi WHERE id='$id'";
$admin_sorgu2 = mysql_query($sorgu2, $mysqlbaglantisi) or die(mysql_error());
$uyeler2 = mysql_fetch_array($admin_sorgu2);
$emailalsanalo = $uyeler2['email'];
$sonbegeni = $uyeler2['begeni'];
$sonbegeni++;

  mysql_query("UPDATE `subs_gonderi` SET `begeni`='$sonbegeni' WHERE `id`='$id'");
  mysql_query("INSERT INTO `begeniler_subs`(`id`, `email`, `konuid`) VALUES ('','$email', '$id')");
   
   
   
   
   





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
echo "<meta http-equiv='refresh' content='0;URL=indexmezdeke.php#$id'>";
?>