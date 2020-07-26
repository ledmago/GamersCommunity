<?php include("ayar.php");

if(isset($_SESSION["email"]))
{
@header("Location: anasayfa.php");
}


 ?><!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mezdeke ™ Paylaşım Platformu | Necati Akçay</title>
		
		<meta name="description" content="Mezdeke Team, Özgür Paylaşım Platformu. Necati 'Zeonnn' Akçay Öncülüğünde Şimdi Hizmette !">
<meta name="abstract" content="Mezdeke Team, Özgür Paylaşım Platformu. Necati 'Zeonnn' Akçay Öncülüğünde Şimdi Hizmette !">
<meta name="keywords" content="mezdeke,team,necati,zeonnn,zeon,zeonn,zeeon,paylaşım,platformu,forum,zeonnn.tv,zeonnn.com">
<meta name="author" content="Fırat Doğan - firatdogan0@gmail.com">
<meta name="copyright" content=" - Fırat Doğan - firatdogan0@gmail.com">
<meta name="robots" content="all">

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="css/stylemodal.css" />
<link rel="stylesheet" href="css/stylelogin.css" media="screen" type="text/css">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="img/zeon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<style>
.logo h1 {text-shadow: 2px 2px 3px #FFF;}
.btn{
	background:#
	
}
</style>
    </head>

    <body style="  border-top: 5px solid #e75967;">

        <!-- Header -->
        <div class="container">
            <div class="row header">
                <div class="col-sm-4 logo">
                    <h1><a href="index.php">ZeoNNN</a> <span style="font-size:25px"> - Mezdeke Team</span></h1>
                </div>
                <div class="col-sm-8 call-us">
                    <p>Email : <span>necati@zeonnn.com</span></p>
                </div>
            </div>
        </div>
<?php


$uyeler = mysql_query("SELECT * FROM uyeler2");
$toplam_uyeler 	= mysql_num_rows($uyeler);

$mezdeke_gonderi = mysql_query("SELECT * FROM mezdeke_gonderi");
$toplam_gonderi 	= mysql_num_rows($mezdeke_gonderi);

$mezdeke_yorum = mysql_query("SELECT * FROM yorum_mezdeke");
$toplam_yorum 	= mysql_num_rows($mezdeke_yorum);


$capsler = mysql_query("SELECT * FROM capsler");
$toplam_capsler 	= mysql_num_rows($capsler);






?>
        <!-- Coming Soon -->
        <div class="coming-soon" style="  /* position: relative; */
  z-index: 0;
  background: none;
  width: 100%;
  position: fixed;
  top: 0;
  z-index: -999;
  bottom: 0;">
            <div class="inner-bg" style="  position: fixed;
  top: 0;
  bottom: 0;
  width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>&nbsp;</h2>
                            <p>&nbsp;</p>
                            <div class="timer">
                                <div class="days-wrapper">
                                    <span class="days"><?php echo $toplam_uyeler ?></span> <br>Kullanıcı
                                </div>
                                <div class="hours-wrapper">
                                    <span class="hours"><?php echo $toplam_gonderi ?></span> <br>Paylaşım
                                </div>
                                <div class="minutes-wrapper">
                                    <span class="minutes"><?php echo $toplam_capsler ?></span> <br>Capsler
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 subscribe">
                            
                    <form class="form-inline" role="form" action="assets/subscribe.php" method="post">

					
                        <a id="modal_trigger" href="#modal" class="btn"><button id="modal_trigger" type="submit" class="btn">Giriş</button></a>
						<button type="submit" onclick="window.location = 'kayit/index.php'" class="btn">Kayıt Ol</button>
                    </form>
                    <div class="success-message"></div>
                    <div class="error-message"></div>
                </div>
				
				<div id="modal" class="popupContainer" style="display:none;height:800px">
		<header class="popupHeader">
			<span class="header_title">Giriş</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Kod Kısmı -->
			
			
			
			
			
			
			
			
			 <div class="wrap" style="margin-top:0px;padding-top:10%;width:40%;">
		<div class="avatar">
      <img src="img/logoneco.png">
		</div><form method="post">
		<input type="text" name="email" style="width:100%;height: 50px;" placeholder="Email Adresin" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="sifre"style="width:100%;height: 50px;" placeholder="Şifren" required>
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
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<!-- Kod Kısmı -->
		</section>
	</div>
				
				
				
				<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 20, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
				
				
				
				
				
				
				
            </div>
            <div class="row">
                <div class="col-sm-12 social">
                    <a href="https://www.facebook.com/NecatiZeoNAkcay" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/necatiakcay" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UCpdJQ9OrynGRA110wHO2_iA" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a>
                    <a href="http://www.twitch.tv/zeeoon" data-toggle="tooltip" data-placement="top" title="Twitch"><i class="fa fa-twitch"></i></a>

                </div>
            </div>
        </div>

        
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>