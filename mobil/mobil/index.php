<?php
session_start();
if(isset($_SESSION["email"]))
{
	
	 echo "<script>window.location = '../giris/index.php'</script>";
}
else
{

	
}

?>
<html>
<head>  	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="author" content="FIRAT">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  
	<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
    
	<title>ZeoNNN - Mobil</title>
<script> 

$(document).ready(function(){



	
	
	$("#header").css({'margin-left': '0px'});
	$("#girisekran").css({'bottom': '15px'});
		


	
	
});
</script> 

    <link rel="stylesheet" href="css/style.css" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
  </head>
  <body>
  <div id="header" >ZeoNNN.com - Mobil Uygulaması</div>
  
  <div id="girisekran"><div id="ustlogo"></div>
 <center> <img src="img/login-logo.png" class="login-logo"></center>
  <hr class="cizgi">
  
  <div id="formic">
  
  <form method="post">
  <input type="text" name="email" placeholder="Kullanıcı Adı Veya Email"><br>
  <input type="password"  name="sifre"  placeholder="Şifre"><br>
 
<div id="butonlarxd">
 <input type="submit" class="buton"  name="giris"  style="margin-bottom:5px  " value="Giriş">
    <button class="buton" style="margin-bottom:5px;float:right" onclick="window.location = '../../kayit/index.php'" >Kayıt</button>
  </div>
  </form>
   <div id="butonlarxd"> <input type="submit" class="butonface" value="Facebook İle Giriş" style="margin-top:-5px;"  onClick="window.parent.location.href= '../../mobilfb/';"> </div>
   
   
     <div id="butonlarxd" style="width: 100%;overflow:hidden"> 
	 
	  <div id="butonlarxd" style="width: 173px;overflow:hidden"> 
	 
	 <div id="icon" class="fb"></div> 
	 	 <div id="icon" class="twitch"></div> 
		 	 <div id="icon" class="twitter"></div> 
			 <div id="icon" class="youtube"></div> 
	 </div>
	 
	 </div>
   
  </div>
  
  
  
  <?php
include("ayar.php");
if(isset($_POST["giris"]))
{
$emailal = $_POST["email"];
$sifreal = $_POST["sifre"];

$sorgula = mysql_query("SELECT * FROM `uyeler2` WHERE email = '$emailal' and sifre = '$sifreal' and ban = '0'");
if ($listele = mysql_fetch_array($sorgula)) 
{
	
	
	$sorgulax2 = mysql_query("SELECT * FROM `uyeler2` WHERE email = '$emailal' and sifre = '$sifreal' and fbid='0'");

	if ($listelexd = mysql_fetch_array($sorgulax2)) 
	{
		echo '<script>window.parent.location.href= "../emailhata/";</script>';
		
	}
	else{
		$_SESSION["email"] = $emailal;
	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	mysql_query("UPDATE uyeler2 SET sonipadresi = '$kisipadresi' WHERE email = '$emailal'");
echo '<script>window.parent.location.href= "../giris/index.php";</script>';
	}
	
	
	
	
	



}
else
{
	
	
	
	$sorgulasss = mysql_query("SELECT * FROM `uyeler2` WHERE kadi = '$emailal' and sifre = '$sifreal' and ban = '0'");
if ($listelesss = mysql_fetch_array($sorgulasss)) 
{
		$sorgulax2 = mysql_query("SELECT * FROM `uyeler2` WHERE email = '$emailal' and sifre = '$sifreal' and fbid='0'");

	if ($listelexd = mysql_fetch_array($sorgulax2)) 
	{
		echo '<script>window.parent.location.href= "../emailhata/";</script>';
		
	}
	else{
		
		
		
			$sorgus2 = "SELECT * FROM uyeler2 WHERE kadi='$emailal'";
			$admin_sorgus2 = mysql_query($sorgus2, $mysqlbaglantisi) or die(mysql_error());
			$uyelers2 = mysql_fetch_array($admin_sorgus2); 
			$gelenemail = $uyelers2["email"];
		
		
		
		$_SESSION["email"] = $gelenemail ;
	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	mysql_query("UPDATE uyeler2 SET sonipadresi = '$kisipadresi' WHERE email = '$emailal'");
echo '<script>window.parent.location.href= "../giris/index.php";</script>';
	}
	
}
else
{
	 echo "<script> alert('Email veya Şifre Hatalı')</script>";
	
}
	
	

 
 
 
 
 
 
 
 
 
 
}




}




?>
  
  
  </div>
  </body>

</html>