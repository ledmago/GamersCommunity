<?php
@session_start();
?>
><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="css/style2.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <form method="post" class="login">
    <p>
      <label for="login">Email / Kullanıcı Adı:</label>
       <input type="text" name="email" id="login" placeholder="Email / Kullanıcı Adı">
    </p>

    <p>
      <label for="password">Şifre:</label>
      <input type="password" name="sifre" id="password" placeholder="*****">
    </p>

    <p class="login-submit">
      <button type="submit" name="giris" class="login-button">Giriş</button>
    </p>
	<p onclick="window.location = 'sifremiunuttum/'">Şifreni mi unuttun ? </p>


  </form>
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
		echo '<script>window.parent.location.href= "emailhata/";</script>';
		
	}
	else{
		$_SESSION["email"] = $emailal;
	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	mysql_query("UPDATE uyeler2 SET sonipadresi = '$kisipadresi' WHERE email = '$emailal'");
echo '<script>window.parent.location.href= "anasayfa.php";</script>';
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
		echo '<script>window.parent.location.href= "emailhata/";</script>';
		
	}
	else{
		
		
		
			$sorgus2 = "SELECT * FROM uyeler2 WHERE kadi='$emailal'";
			$admin_sorgus2 = mysql_query($sorgus2, $mysqlbaglantisi) or die(mysql_error());
			$uyelers2 = mysql_fetch_array($admin_sorgus2); 
			$gelenemail = $uyelers2["email"];
		
		
		
		$_SESSION["email"] = $gelenemail ;
	$kisipadresi =  $_SERVER['REMOTE_ADDR'];
	
	mysql_query("UPDATE uyeler2 SET sonipadresi = '$kisipadresi' WHERE email = '$emailal'");
echo '<script>window.parent.location.href= "anasayfa.php";</script>';
	}
	
}
else
{
	 echo "<script> alert('Email veya Şifre Hatalı')</script>";
	
}
	
	

 
 
 
 
 
 
 
 
 
 
}




}




?>

</body>
</html>
