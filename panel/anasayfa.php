<?php session_start();
ob_start();
if(!isset($_SESSION["email"])){header("Location: index.php"); }include("ayar.php"); 

$emailyetkisi = $_SESSION["email"];
	$sorgus56 = "SELECT * FROM uyeler2 WHERE email='$emailyetkisi'";
$admin_sorgus56 = mysql_query($sorgus56, $mysqlbaglantisi) or die(mysql_error());
$yetkisi = mysql_fetch_array($admin_sorgus56); 
$emailyetkisi = $yetkisi["yetki"];






	$sorgus5 = "SELECT * FROM siteayar WHERE id='2'";
$admin_sorgus5 = mysql_query($sorgus5, $mysqlbaglantisi) or die(mysql_error());
$uyelers5 = mysql_fetch_array($admin_sorgus5); 

	
		$bakim = $uyelers5["bakim"];
		if($bakim == "acik" && $emailyetkisi <3)
		{
		header("Location: bakim.php");
		
		}


?>
<?php mysql_query("SET NAMES UTF8");$sorgus = "SELECT * FROM siteayar WHERE id='1'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 
$duyuru = $uyelers["duyuru"];
$sitebaslik = $uyelers["sitebaslik"];
$yayinsayaci = $uyelers["yayinsayaci"];

setcookie("bildirim", "goster");

?>
<html><head>       <link rel="stylesheet" type="text/css" href="style.css">     
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
  <META http-equiv=content-type content=text/html;charset=UTF8>  <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>              <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>	   	   	   	   	   	   	   	   	   <title>Zeonnn.Com - Mezdeke ™ Paylaşım Platformu</title><meta name="description" content="Mezdeke Team, Özgür Paylaşım Platformu. Necati 'Zeonnn' Akçay Öncülüğünde Şimdi Hizmette !" /><meta name="abstract" content="Mezdeke Team, Özgür Paylaşım Platformu. Necati 'Zeonnn' Akçay Öncülüğünde Şimdi Hizmette !" /><meta name="keywords" content="mezdeke,team,necati,zeonnn,zeon,zeonn,zeeon,paylaşım,platformu,forum,zeonnn.tv,zeonnn.com" /><meta name="author" content="Fırat Doğan - firatdogan0@gmail.com" /><meta name="copyright" content=" - Fırat Doğan - firatdogan0@gmail.com" /><meta name="robots" content="all" /><meta name="distribution" content="global" /><meta http-equiv="Content-Language" content="tr" /><link rel="shortcut icon" href="img/zeon.ico"></head>

<script src="img/bildirim.js"></script>

<body>	
<script LANGUAGE="javascript">
function ojidanieNG()
{
var today = new Date();
 
var BigDay = new Date("<?php echo $yayinsayaci  ?>");
var timeLeft = (BigDay.getTime() - today.getTime());
 
var e_daysLeft = timeLeft / 86400000;
var daysLeft = Math.floor(e_daysLeft);



 
var e_hrsLeft = (e_daysLeft - daysLeft)*24;
var hrsLeft = Math.floor(e_hrsLeft);


var e_minsLeft = (e_hrsLeft - hrsLeft)*60;
var minsLeft = Math.floor(e_minsLeft);

daysLeft = daysLeft * 24;
 hrsLeft = hrsLeft + daysLeft;
 
var seksLeft = Math.floor((e_minsLeft - minsLeft)*60);
 
if (BigDay.getTime() > today.getTime() )
document.getElementById("yazdirburaya").innerHTML = hrsLeft+':'+minsLeft+':'+seksLeft+''
else
document.getElementById("yazdirburaya").innerHTML = 'Başladı'
}


setInterval("ojidanieNG()", 50)
</SCRIPT>


		    <div id="sinemamodu">    <div style="position:absolute" id="kapatsinema" onClick="kapatf()"><img src="img/close.png" width="32" style="margin-left:10px;"></div>	<object style="float:left" bgcolor='#000000' data='http://www.twitch.tv/widgets/archive_embed_player.swf' id='clip_embed_player_flash' type='application/x-shockwave-flash' width='75%' height="100%" ><param name='movie' value='http://www.twitch.tv/widgets/archive_embed_player.swf' /><param name='allowScriptAccess' value='always' /><param name='allowNetworking' value='all' /><param name='allowFullScreen' value='true' /><param name='flashvars' value='channel=zeeoon&start_volume=80&auto_play=falsea' /></object>    <!--<iframe style="float:left" src="http://www.twitch.tv/zeeoon/embed" height="100%" frameborder="0" scrolling="no" width="75%"></iframe>-->     <iframe style="float:left" src="http://www.twitch.tv/zeeoon/chat" height="100%" frameborder="0" scrolling="no" width="24%"></iframe>            </div><!-- Sinema Modu -->  <script>            var genislik = document.body.offsetWidth;var fark = document.body.offsetWidth - 303;document.getElementById("sinemamodu").style.width = fark + "px";document.getElementById("sinemamodu").style.right = -fark + "px";  </script>                <div id="solyer"></div>        <div id="soltaraf">            <div id="iclogo"><center><img src="img/logo.png" style="height:200px;position:bottom:0px"></center></div>            <div class="iclogo">NECATİ "ZEONNN" AKÇAY</div>            <div class="slogan">STREAMER & YOUTUBER</div>     
			<!--<ul class="sosyal">                <li><a href="index.php">Anasayfa</a></li>                <li><a href="http://facebook.com/NecatiAkcay">Facebook</a></li>                <li><a href="https://twitter.com/NecatiAkcay">Twitter</a></li>                <li><a href="http://www.youtube.com/user/NecatiAkcay">Youtube</a></li>                            </ul> -->
			<div id="loginregister">                <h2>Hızlı Menü</h2><br><br>                          <ul class="sosyal2">                <li><a href="karsilama/index.php" target="content">Anasayfa</a></li>								                <li><a href="yenikonu.php" target="content">Yeni Konu Aç</a></li>                <li><a href="uyeler.php" target="content">Üyeler</a></li>                <li><a href="hesap.php" target="content">Hesap Ayarları</a></li>								                <li><a href="panel/">Yönetim Paneli</a></li>                <li><a href="cikis.php">Çıkış</a></li>                            </ul>                                                                                               </tbody></table>                                                        </form>                            </div>            <iframe src="http://www.twitch.tv/zeeoon/chat?popout=" style="width:99%;border:0px;height:600px;" frameborder="0"></iframe>                    </div>        <!-- SOL ATARAF BİTTİ --><script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>        <div id="container">                   <div id="header">	   	   <div class="basliktext"><?php echo $sitebaslik ?></div><div class="basliksag">
			
			<script>var d = new Date();	   	   var dakika = d.getMinutes();	   var yenidk;	   	   switch(dakika)	   {	       case 1 : dakika = "01";break;	       case 2 : dakika = "02";break;	       case 3 : dakika = "03";break;	       case 4 : dakika = "04";break;	       case 5 : dakika = "05";break;	       case 6 : dakika = "06";break;	       case 7 : dakika = "07";break;	       case 8 : dakika = "08";break;	       case 9 : dakika = "09";break;	   }document.write(d.getHours() + ':' + dakika );</script></div><div style="clear:both">						 
			
			

<?php
$url = "https://api.twitch.tv/kraken/streams/zeeoon";
$cekilen_veri = file_get_contents($url);




if (stristr($cekilen_veri, "profile_banner")){
     echo '
	 <img src="img/on.png" width="24" style="float:left;padding-left:30px;"> <div class="yayindurum" style="float:left;padding-left:5px;">
	 
	<div style="float:left"> Yayın Şuan Açık / Stream is Online Now</div>';
     // sen istediğin işlemi yapabilirsin..
}
else
{
	
	echo '
	
		 <img src="img/off.png" width="24" style="float:left;padding-left:30px;"> <div class="yayindurum" style="float:left;padding-left:5px;">
	<div style="float:left">Yayın Kapalı / Stream is Offline Now</div>';
}


	
	

include("onlineuyeler.php");


?>



</div><div style="clear:both">	   </div>                                    <!-- HEADER BİTTİ --></div></div>				<div id="haberbandi"><marquee>


	
<?php echo $duyuru;

	

?></marquee></div><div id="postalani" style="overflow:hidden">								<iframe name="content" width="100%" height="100%" src="karsilama/index.php"></iframe>													</div><!-- POSTALANI BİTTİ -->			
<div id="sagblock">		
<div id="sayac"><center>Yayın Sayacı</center><center><font id="yazdirburaya" size="13px" id="say">00:00 </font></center></div>	
			   <script type="text/javascript">function ojidanieNG()  {  var today = new Date();     var BigDay = new Date("December 4, 2014, 19:00"); // gelecekteki yılın tarihini buraya yazıyoruz.  var timeLeft = (BigDay.getTime() - today.getTime());     var e_daysLeft = timeLeft / 86400000;  var daysLeft = Math.floor(e_daysLeft); // Kalan gün sayısı     var e_hrsLeft = (e_daysLeft - daysLeft)*24;  var hrsLeft = Math.floor(e_hrsLeft); // Kalan saat sayısı     var e_minsLeft = (e_hrsLeft - hrsLeft)*60;  var minsLeft = Math.floor(e_minsLeft); // Kalan dakika sayısı     var seksLeft = Math.floor((e_minsLeft - minsLeft)*60); // Kalan saniye sayısı     if (BigDay.getTime() > today.getTime() )  document.getElementById("say").innerHTML = '<font color=red>Yeni Yıla</font>: '+daysLeft+' Gün, '+hrsLeft+' Saat, '+minsLeft+' dakika, '+seksLeft+' Saniye'  else  document.getElementById("say").innerHTML = '<font color=red>Hoşgeldin 2013</font>!!!'  }  setInterval("ojidanieNG()", 50)  </script>			
 
 
 
 <script>  

setInterval(function() {$("#bildirimyukle").load('veriler.php');}, 2000);
 
setInterval(function() {$("#online").load('onlineuyeler.php');}, 5000); 
//Her saniye (1000) veriler.php dosyasını tekrar dive çeker. 
</script> 


 <div id="bildirimyukle">
<?php include("veriler.php"); ?></div></div>

<div id="baslikbild" style="margin-top:15px;">Popilerler</div>
<?php



$sorgu=mysql_query("SELECT * FROM uyeler2 WHERE ban = '0' Order By paylaspuan DESC limit 15"); 

		while($gonderi = mysql_fetch_array($sorgu)) 
			
			{
				$resimal = $gonderi["resim"];
				$ad = $gonderi["ad"];
				echo '<div id="bildisim"><img src="'.$resimal.'" class="bildisimimg"><p>'.$ad.'</p></div>';
			}
?>
 
</div>		   			</div><!-- SAG BLOCK -->			<div style="clear:both">        </div><!-- BİTİŞ CONTAİNER -->					<script>	function sagakaydir()	{	    	   document.getElementById("sinemamodu").style.right = "0px";	     document.getElementById("sinemamodu").style.display = "block";	   	}	function kapatf()	{	          var genislik = document.body.offsetWidth;var fark = document.body.offsetWidth - 303;document.getElementById("sinemamodu").style.width = fark + "px";document.getElementById("sinemamodu").style.right = -fark + "px";	}var genislik = document.body.offsetWidth;var fark = document.body.offsetWidth - 303;//document.getElementById("container").style.width= fark + "px";		</script>    	<!-- Renklendir Necoyu :D --><script>setInterval(function(){var sayi = Math.floor(Math.random() * 6);var r1 = "#E24B75";var r2 = "#F3C110";var r3 = "#57BEC7";var r4 = "#F3F7E3";var r5  = "#B5D045";if(sayi == 1){ $('#iclogo').css({'background-color':r1 });}else if(sayi == 2){ $('#iclogo').css({'background-color':r2 });}else if(sayi == 3){ $('#iclogo').css({'background-color':r3 });}else if(sayi == 4){ $('#iclogo').css({'background-color':r4 });}else if(sayi == 5){ $('#iclogo').css({'background-color':r5 });}}, 1000);</script><!-- Renklendir Necoyu --></body></html>