<?php
@session_start();
include("ayar.php");?>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<style>

body {
background-color: #EBEBEB;
margin: 0px;
padding: 0px;
overflow: hidden;
}

</style>
<style>

input[type=text], input[type=password] {
margin-left: auto;
margin-right: auto;
margin: 5px;
padding: 0 10px;
width: 200px;
height: 34px;
color: #404040;
background: white;
border: 1px solid;
border-color: #c4c4c4 #d1d1d1 #d4d4d4;
border-radius: 2px;
outline: 5px solid #eff4f7;
-moz-outline-radius: 3px;
-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}
.sayfatext {
display: block;
width: 50%;
height: 25px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
input {
font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
font-size: 14px;
}
p{

color: #404040;
font-size: 16px;
font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
}
</style>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php

function sifre_uret($uzunluk) { 
   
              $karakterler = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
   
              $karakter_sayi = strlen($karakterler); 
   
              
    
              for ($ras = 0; $ras <$uzunluk; $ras++) { 
    
                 $rakam_ver = rand(0,$karakter_sayi-1); 
    
                  $sifre_ver .= $karakterler[$rakam_ver]; 
    
              } 
    
              return $sifre_ver; 
   
          }  
if(isset($_SESSION["email"]))
{
	
	$emailx = $_SESSION["email"];
$sorgus = "SELECT * FROM uyeler2 WHERE email='$emailx'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 	
$id = $uyelers["id"];
$paylas = $uyelers["paylas"];	

$paylaspuan = $uyelers["paylaspuan"];




          
      

if($paylas == "0")
{
	  $yenipaylas = sifre_uret(11);
	mysql_query("UPDATE `uyeler2` SET `paylas`='$yenipaylas' WHERE id='$id'");
	$paylas = $yenipaylas; 
	
}
	
}
else
{
	@header("Location: index.php");
	
}


?>
<style>
.aciklabunubana:hover
{
	opacity:0.7;
	
}
</style>
<img class="aciklabunubana" src="img/background.png" width="100%">

<p style="margin-left:30px;margin-right:30px">

Merhaba, yayını paylaşarak puan kazanmak istermisin ? Yayın açıkken aşağıdaki adresi(linki) arkadaşların ile paylaş, sende puan kazan, arkadaşlarında kazansın

<br>
Kazandığın puanlar hesabında birikir. En yüksek puan kazananlar ise süpriz ödüller ile ödüllendirilecektir.<br><br><center>
<a style="font-size:20px;font-family: 'Oswald', sans-serif;color:red" href="puanlar.php">Puan listesi</a><div style="margin-left: 10px;" class="fb-share-button" data-href="<?php echo "http://zeonnn.com/twitch.php?gfe_rd=19820&ei=$paylas"?>" data-layout="button_count"></div>
</center>

<div id="yenilemekismi">
</p><center><p style="font-family: 'Oswald', sans-serif;">
<br><input type="text" class="sayfatext" style="width:60%;" value="<?php echo "http://zeonnn.com/twitch.php?gfe_rd=19820&ei=$paylas"?>">



<br><center><font size="25px" style="font-family: 'Oswald', sans-serif;">Puanın : <?php echo $paylaspuan ?></center></font></p>
</div>
</center>

 <script>  


 
setInterval(function() {$("#yenilemekismi").load('puanyenile.php');}, 5000); 
//Her saniye (1000) veriler.php dosyasını tekrar dive çeker. 
</script> 

</body>

</html>