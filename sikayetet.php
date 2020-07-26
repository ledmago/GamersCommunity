??<?php 
@session_start();
include("ayar.php"); 
if(!isset($_SESSION["email"]))
{

@header("Location: index.php"); 

}
else{
$email = $_SESSION["email"];
$id = $_GET["id"];
$alan = $_GET["alan"];
if($alan == "mezdeke"){
mysql_query("INSERT INTO `sikayet`(`id`, `email`, `konuid`) VALUES ('','$email','$id')");
echo "<script>alert('İsteğiniz Üzere Şikayet Alınmıştır - Geri Dönüş Yapılcaktır.')</script>";
echo '<meta http-equiv="refresh" content="0;URL=indexorta.php">';
}
else if($alan == "subs"){
mysql_query("INSERT INTO `sikayet_subs`(`id`, `email`, `konuid`) VALUES ('','$email','$id')");

echo "<script>alert('İsteğiniz Üzere Şikayet Alınmıştır - Geri Dönüş Yapılcaktır.')</script>";
echo '<meta http-equiv="refresh" content="0;URL=indexmezdeke.php">';
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=indexorta.php">';
}




}






