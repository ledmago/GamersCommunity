<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Şifremi Unuttum</title>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">

    
	 <section class="notif notif-notice">
      <h6 class="notif-title">Email Adresinizi Yazın</h6>
	  <form method="post">
	  <input type="text" name="emailtekrar" placeholder="örn; info@zeonnn.com" style="padding: 0 10px;
  width: 220px;
  height: 40px;
  color: #E70000;
  text-shadow: 1px 1px 1px white;
  background: rgba(0, 0, 0, 0.16);
  border: 0;
  border-radius: 5px;
  -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);">
      <input type="submit" name="emailtekrargonder" style="  padding: 0 10px;
  width: 220px;
  height: 40px;
  color: #FFFFFF;
  text-shadow: 1px 1px 1px white;
  background: rgba(85, 128, 209, 1);
  border: 0;
  border-radius: 5px;
  margin: 8px;">
</form>
    </section>
	
	<?php
	if(isset($_POST["emailtekrargonder"]))
	{
	include("../ayar.php");
	$emailyetkisi = $_POST["emailtekrar"];
	
	$sorgus56 = "SELECT * FROM uyeler2 WHERE email='$emailyetkisi'";
$admin_sorgus56 = mysql_query($sorgus56, $mysqlbaglantisi) or die(mysql_error());
$yetkisi = mysql_fetch_array($admin_sorgus56); 
$onay = $yetkisi["sifre"];







mail($emailyetkisi, "ZeoNNN - Aktivasyon Kodu", "Merhaba,\nMezdeke ™ Şifreni Unuttum Talebi Göndermişsin \nMevcut Şifren : $onay \nEğer bu Talebi siz yapmadıysanız bu maili dikkate almayın");


	
	}
	
	
	?>
	
  </div>
</body>
</html>
