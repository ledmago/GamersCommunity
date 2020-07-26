<?php 
@session_start();
if(isset($_SESSION["email"]))
{
@header("Location: anasayfa.php"); 

}
include("ayar.php"); 
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

<title>Zeonnn.Tv - Mezdeke ™ Paylaşım Platformu</title>
<meta name="description" content="Mezdeke Team, Özgür Paylaşım Platformu. Necati 'Zeonnn' Akçay Öncülüğünde Şimdi Hizmette !" />
<meta name="abstract" content="Mezdeke Team, Özgür Paylaşım Platformu. Necati 'Zeonnn' Akçay Öncülüğünde Şimdi Hizmette !" />
<meta name="keywords" content="mezdeke,team,necati,zeonnn,zeon,zeonn,zeeon,paylaşım,platformu,forum,zeonnn.tv,zeonnn.com" />
<meta name="author" content="Fırat Doğan - firatdogan0@gmail.com" />
<meta name="copyright" content=" - Fırat Doğan - firatdogan0@gmail.com" />
<meta name="robots" content="all" />
<meta name="distribution" content="global" />
<meta http-equiv="Content-Language" content="tr" />
<link rel="shortcut icon" href="img/zeon.ico">

  <link rel="stylesheet" href="css/resetlogin.css">

    <link rel="stylesheet" href="css/stylelogin.css" media="screen" type="text/css" />

</head>

<body>
<div style="position: fixed; z-index: -99; width: 100%; height: 100%">
  <iframe frameborder="0" height="100%" width="100%" 
    src="https://youtube.com/embed/7cv1BbATFOU?autoplay=1&controls=0&showinfo=0&autohide=1&loop=1">
  </iframe>
</div>


  <div class="wrap" style="margin-top:0px;padding-top:10%">
		<div class="avatar">
      <img src="img/logoneco.png">
		</div><form method="post">
		<input type="text" name="email" placeholder="Email Adresin" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="sifre" placeholder="Şifren" required>
		<a href="" class="forgot_link">Şifremi Unuttum ?</a>
		<button style="margin-bottom:20px;" name="giris">Giriş</button>
		</form>
				<a href="kayit"><button style="margin-bottom:20px;">Kayıt Ol</button></a>
				<button style="margin-bottom:20px;">
				
				
				<!-- Sayaclar.com Code Start  -->
<script language="Javascript" src="http://sa.sayaclar.com/c/s2.php?a=p6dvsfg&s=2a2"></script>
<!-- Sayaclar.com Code End -->


</button>
				<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Deneme -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4597025419385619"
     data-ad-slot="2968430089"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

				<!--<audio controls autoplay>
  <source src="img/muzik.mp3" type="audio/mpeg">
Tarayıcın Html5 Desteklemiyor, Mezdeke Müziği Dinleyemeyeceksin :(
</audio>-->
	</div>

  <script src="js/index.js"></script>
<?php

if(isset($_POST["giris"]))
{
$emailal = $_POST["email"];
$sifreal = $_POST["sifre"];

$sorgula = mysql_query("SELECT * FROM `uyeler2` WHERE email = '$emailal' and sifre = '$sifreal' and ban = '0'");
if ($listele = mysql_fetch_array($sorgula)) 
{

$_SESSION["email"] = $emailal;
	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	mysql_query("UPDATE uyeler2 SET sonipadresi = '$kisipadresi' WHERE email = '$emailal'");
echo "<meta http-equiv="."refresh"." content="."0;URL=anasayfa.php".">";


}
else
{
 echo "<script> alert('Email veya Şifre Hatalı')</script>";
}


}




?>
</body>

</html>