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

<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="yenigirisekrani/jquery.easing.1.3.js" type="text/javascript"></script>  
	

	<script type="text/javascript">
		$(document).ready(function() {
		
			$curtainopen = false;
		
			$(".rope").click(function(){
				$(this).blur();
				if ($curtainopen == false){ 
					$(this).stop().animate({top: '0px' }, {queue:false, duration:350, easing:'easeOutBounce'}); 
					$(".leftcurtain").stop().animate({width:'60px'}, 2000 );
					$(".rightcurtain").stop().animate({width:'60px'},2000 );
					$curtainopen = true;
				}else{
					$(this).stop().animate({top: '-40px' }, {queue:false, duration:350, easing:'easeOutBounce'}); 
					$(".leftcurtain").stop().animate({width:'50%'}, 2000 );
					$(".rightcurtain").stop().animate({width:'51%'}, 2000 );
					$curtainopen = false;
				}
				return false;
			});
			
		});	
	</script>
	<style type="text/css">
	    *{
	    	margin:0;
	    	padding:0;
	    }
	    body {
	    	text-align: center;
	    	background: #4f3722 url('yenigirisekrani/images/darkcurtain.jpg') repeat-x;
	    }
	    img{
			border: none;
		}
	    .leftcurtain{
			width: 50%;
			height: 495px;
			top: 0px;
			left: 0px;
			position: absolute;
			z-index: 2;
		}
		 .rightcurtain{
			width: 51%;
			height: 495px;
			right: 0px;
			top: 0px;
			position: absolute;
			z-index: 3;
		}
		.rightcurtain img, .leftcurtain img{
			width: 100%;
			height: 100%;
		}
		.logo{
			margin: 0px auto;
			margin-top: 150px;
		}
		.rope{
			position: absolute;
			top: -40px;
			left: 70%;
			z-index: 4;
		}
	   @font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v7/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
}


.wrap {
	width:25%;
	height: auto;
	margin: auto;
	margin-top: 10%;
}
.avatar {
	width: 100%;
	margin: auto;
	width: 65px;
	border-radius: 100px;
	height: 65px;
	background: #448ed3 ;
	position: relative;
	bottom: -15px;
}
.avatar img {
	width: 55px;
	height: 55px;
	border-radius: 100px;
	margin: auto;
	border:3px solid #fff;
	display: block;
}
.wrap input {
	border: none;
	background: #fff;
  font-family:Lato ;
  font-weight:700 ;
	display: block;
	height: 40px;
	outline: none;
	width: calc(100% - 24px) ;
	margin: auto;
	padding: 6px 12px 6px 12px;
}
.bar {
	width: 100%;
	height: 1px;
	background: #fff ;
}
.bar i {
	width: 95%;
	margin: auto;
	height: 1px ;
	display: block;
	background: #d1d1d1;
}
.wrap input[type="text"] {
	border-radius: 7px 7px 0px 0px ;
}
.wrap input[type="password"] {
	border-radius: 0px 0px 7px 7px ;
}
.forgot_link {
	color: #83afdf ;
	color: #83afdf;
	text-decoration: none;
	font-size: 11px;
	position: relative;
	left: 193px;
	top: -36px;
}
.wrap button {
	width: 100%;
	border-radius: 7px;
	background: #b6ee65;
	text-decoration: center;
	border: none;
	color: #51771a;
  margin-top:-5px;
	padding-top: 14px;
	padding-bottom: 14px;
	outline: none;
	font-size: 13px;	
	border-bottom: 3px solid #307d63;
	cursor: pointer;
}
	</style>
</head>

<body>
<div class="leftcurtain"><img src="yenigirisekrani/images/frontcurtain.jpg"/></div>
	<div class="rightcurtain"><img src="yenigirisekrani/images/frontcurtain.jpg"/></div>



  <div class="wrap" style="margin-top:0px;padding-top:5%">
		<div class="avatar">
      <img src="img/logoneco.png">
		</div><form method="post">
		<input type="text" name="email" placeholder="Email Adresin" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="sifre" placeholder="Şifren" required>
		<button style="margin-bottom:20px;" name="giris">Giriş</button>
		</form>
				<a href="kayit"><button style="margin-bottom:20px;">Kayıt Ol</button></a>
				<button style="margin-bottom:20px;">
				
				
				<!-- Sayaclar.com Code Start  -->
<script language="Javascript" src="http://sa.sayaclar.com/c/s2.php?a=p6dvsfg&s=2a2"></script>
<!-- Sayaclar.com Code End -->


</button>
				

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
	<a class="rope" href="#">
		<img src="yenigirisekrani/images/rope.png"/>
	</a>
	
	<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Deneme -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px;margin-top: 20px;"
     data-ad-client="ca-pub-4597025419385619"
     data-ad-slot="2968430089"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>

</html>