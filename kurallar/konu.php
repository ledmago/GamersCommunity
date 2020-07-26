﻿﻿<?php session_start();if(!isset($_SESSION["email"])){header("Location: index.php"); }include("ayar.php"); ?>﻿<html><head>
       <link rel="stylesheet" type="text/css" href="style.css">
       <META http-equiv=content-type content=text/html;charset=UTF8>
 
 <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
       <script src="source/jquery.colorbox.js"></script>
		<link rel="stylesheet" href="source/colorbox.css" />
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
       <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>	   	   <style>	   	   ::-webkit-scrollbar {    width: 13px;} ::-webkit-scrollbar-track {    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);             border-radius: 10px;     } ::-webkit-scrollbar-thumb {    background-color:#111;    border-radius: 10px;       -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); }	   	   </style>
    </head>
    <body style="overflow-y:scroll">
   <!-- <div id="yorumyapdiv"><center><form method="post"><input type="text" name="yorum" placeholder="Yorum Yap" style="width:85%;"><input type="submit" value="Gönder" name="yorumgonder"></form></center></div> -->		  <div id="yorumyapdiv" style="background-color:#A33838"><center><form method="post"><textarea name="yorumicerik" placeholder="Yorum Yap" style="width:80%;margin-left: auto;margin: 5px;padding: 0 10px;height: 34px;color: #404040;background: white;border: 1px solid;border-color: #c4c4c4 #d1d1d1 #d4d4d4;border-radius: 2px;outline: 5px solid #eff4f7;-moz-outline-radius: 3px;-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;font-size: 14px;float:left;margin-left:3%;"></textarea><input type="submit" value="Gönder" name="yorumgonder" style="float:left;height:34px;margin:5px"></form></center></div><div style="clear:both"></div>

			
						<div id="bolumler" style="margin-top: -21px;">			    			    <div id="subsbolumu" onClick="window.location = 'indexmezdeke.php'"><a href="indexmezdeke.php">SUBSCRİBERS PAYLAŞIM ALANI</a></div>			     <div id="mtbolumu"  onClick="window.location = 'indexorta.php'"> <a href="indexorta.php">MEZDEKE TEAM PAYLAŞIM ALANI</a></div>			     <div style="clear:both"></div>			</div>	



<div id="sayfaislemleri" style="overflow:hidden">

<center><button class="sayfabutonu" style="float:left;" onClick="window.location.reload(false)">Sayfayı Yenile</button>

<div style="float:left;margin-top:10px;">&nbsp;&nbsp;Link :</div> <input type="text" class="sayfatext" style="float:left;width:60%;margin-left:20px" value="http://zeonnn.com/konugoster.php?id=<?php echo $_GET["id"]."&alan=".$_GET["alan"];?>"></center>

</div>
<div style="clear:both"></div>


						<?php	include("function.php");$idalsana2= $_GET["id"];

if($idalsana2 == "" || $idalsana2 == "0")
{
	
	header("Location: indexorta.php");
	
}

						$alan = $_GET["alan"];	$cek2 = "";		if($alan == "subs")	{			mysql_query("SET NAMES UTF8");$sorgus1 = "SELECT * FROM subs_gonderi WHERE id='$idalsana2'";	}	else if($alan == "mezdeke")	{	mysql_query("SET NAMES UTF8");$sorgus1 = "SELECT * FROM mezdeke_gonderi WHERE id='$idalsana2'";		}	else{			mysql_query("SET NAMES UTF8");$sorgus1 = "SELECT * FROM mezdeke_gonderi WHERE id='$idalsana2'";		}					$admin_sorgus1 = mysql_query($sorgus1, $mysqlbaglantisi) or die(mysql_error());$gonderi = mysql_fetch_array($admin_sorgus1); 			  	$ids = $gonderi["id"];	
						
						$tarihceksenebe = $gonderi["tarih"];
						$email_post = $gonderi["email"];	$icerik = $gonderi["icerik"];	
						
						$icerik  = str_replace( "</div>", "<br>", $icerik );	


						$icerik  = str_replace( ":D", "<img src='img/smile.png' width='32' height='32'>", $icerik );	
						
		$icerik  = str_replace( "</p>", "<br>", $icerik );
						
						$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");$degismis = str_replace( "<img src=", "<img class='postresim2' src=", $icerik );$icerik = $icerik;		$resim = $gonderi["resim"];	$begeni = $gonderi["begeni"];	$yorum = $gonderi["yorum"];				$sorgus = "SELECT * FROM uyeler2 WHERE email='$email_post'";$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 		$id = $uyelers["id"];		$emai_uye = $uyelers["email"];		$yetki = $uyelers["yetki"];		$ad = $uyelers["ad"];		$resim2 = $uyelers["resim"];			$konugonder = "'konu.php?id=$ids'";	$profilgoster = "'profil.php?id=$id'";		
						
						
								

						if($yetki == "1")			

							{	
echo '		<div id="postaq"><a name="'.$ids.'">		
						<div id="profil" onClick="window.location = '.$profilgoster.'">		
	    			    <center><img class="ppphoto" src="'.$resim2.'" ></center>		
						<div class="profilyazi">'.$ad.'</div>';								
							echo '	    <div class="yetki"><center><br> Kullanıcı</center></div>';			
							}				
							else if($yetki == "2")				
							{	
echo '		<div id="postaq"><a name="'.$ids.'">		
						<div id="profil" style="background-color:rgba(49, 131, 103, 0.83)" onClick="window.location = '.$profilgoster.'">		
	    			    <center><img class="ppphoto"  src="'.$resim2.'" ></center>		
						<div class="profilyazi">'.$ad.'</div>';							
						echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Abone</center></div>';		
						}	
						
						else if($yetki == "3")	
							{	

							echo '		<div id="postaq"><a name="'.$ids.'">		
						<div id="profil"  style="background-color:#3A5988" onClick="window.location = '.$profilgoster.'">		
	    			    <center><img class="ppphoto" src="'.$resim2.'" ></center>		
						<div class="profilyazi">'.$ad.'</div>';	
						
							echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Moderatör</center></div>';								}	
						else if($yetki == "4")			
							{	
						
						echo '		<div id="postaq"><a name="'.$ids.'">		
						<div id="profil"  style="background-color:#A54250" onClick="window.location = '.$profilgoster.'">	
	    			    <center><img class="ppphoto" src="'.$resim2.'" ></center>		
						<div class="profilyazi">'.$ad.'</div>';	
						
						echo ' <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Yetkili / Admin</center></div>';			



						}	
						
						
						
						
						
						echo '		</div>			<div id="post">	<div id="postyazisi">';
						
						
						
								$kontrolduzenle = $_SESSION["email"];
echo timeConvert($tarihceksenebe).'<br>';
if($kontrolduzenle == $email_post)
{
if($alan == "subs")
{
echo '<a class="duzenleaog" href="duzenle_subs.php?id='.$ids.'">Düzenle</a><br>';

}
else
{
echo '<a class="duzenleaog" href="duzenle.php?id='.$ids.'">Düzenle</a><br>';

}

}
						
						echo $icerik;			

$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
$icerik = nl2br($icerik);
						
		$begeni_mez = "'begen.php?id=$ids&alan=$alan'";			if($resim != "resimyok")			{			echo '<p><a class="group3" href="'.$resim.'" title="'.$icerik.'"><img class="postresim" src="'.$resim.'"></a></p>';							}			echo '</div>';					

		$sikayetet = "window.location = 'sikayetet.php?id=$ids&alan=$alan'";		
		$konusil = "window.location = 'konusil.php?id=$ids&alan=$alan'";		
		$banla = "window.location = 'banla.php?id=$id'";	
$sabitle = "window.location = 'sabitle.php?id=$ids&alan=$alan'";		
		$cezaver = "window.location = 'cezaver.php?id = $id'";		
		$alemailxd = $_SESSION["email"];			
		$sorgus0 = "SELECT * FROM uyeler2 WHERE email='$alemailxd'";
		$admin_sorgus0 = mysql_query($sorgus0, $mysqlbaglantisi) or die(mysql_error());
		$uyelers0 = mysql_fetch_array($admin_sorgus0); 		
		$yetki = $uyelers0["yetki"];				
		if($yetki == "1")		
			{					
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' Beğeni</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> </div>'; 	
		}			
		else if			
		($yetki == "2")		
		{						
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' Beğeni</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> </div>'; 	
		}			
		else if($yetki == "3")	
			{						
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' Beğeni</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> <div class="durumyeni" id="durumyazi" onClick="'.$konusil.'">• Konuyu Sil</div><div class="durumyeni" id="durumyazi" onClick="'.$cezaver.'">• Kullanıcıya Ceza Ver</div> <div class="durumyeni" id="durumyazi" onClick="'.$banla.'">• Kullanıcıyı Banla</div> <div class="durumyeni" id="durumyazi" onClick="'.$sabitle.'">• Konuyu Sabitle</div> </div>'; 
		}			
		else if($yetki == "4")		
			{							
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' Beğeni</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> <div class="durumyeni" id="durumyazi" onClick="'.$konusil.'">• Konuyu Sil</div><div class="durumyeni" id="durumyazi" onClick="'.$cezaver.'">• Kullanıcıya Ceza Ver</div> <div class="durumyeni" id="durumyazi" onClick="'.$banla.'">• Kullanıcıyı Banla</div> </div> <div class="durumyeni" id="durumyazi" onClick="'.$sabitle.'">• Konuyu Sabitle</div> </div>';  			
		}								
		echo '			     			    			    			   			    			</div>						</div><div style="clear:both;">			    	</a></div>			';	
		
		
		


						




						?>
	
	<?php	mysql_query("SET NAMES UTF8");	
	if($alan == "subs"){		 
	$cek23 = mysql_query("select * from yorum_subs WHERE konuid = '$idalsana2' ORDER BY id");	

	}	
	else	{		 
	$cek23 = mysql_query("select * from yorum_mezdeke WHERE konuid = '$idalsana2' ORDER BY id");	
	}  
	
	while($gonderiq= mysql_fetch_array($cek23))    
	{		
$idyorum = $gonderiq["id"];	
$kendi_email = $_SESSION["email"];
$yorum_email = $gonderiq["email"];	

$silme = "";
if($kendi_email == $yorum_email )
{
	$silme = '<br><a href="yorumsil.php?id='.$idyorum.'&alan='.$alan.'">Yorumu Sil</a>';
	
}

$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki >= 3)
	{
	
 $silme = '<br><a href="yorumsil.php?id='.$idyorum.'&alan='.$alan.'">Yorumu Sil</a>';
	
	
	}



$yorum_icerik = $gonderiq["icerik"];
$yorum_icerik=strip_tags($yorum_icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
$yorum_icerik = nl2br($yorum_icerik);


$uzunluk = strlen($yorum_icerik);

$sinir = 1000;

if ($uzunluk> $sinir) {
$yorum_icerik = substr($yorum_icerik,0,$sinir). "...";
}
	
	
	
		$yorum_icerik=strip_tags($yorum_icerik,"<b><a><img><br><br/>");
		$yorum_icerik = nl2br($yorum_icerik);			
		$sorgus4 = "SELECT * FROM uyeler2 WHERE email='$yorum_email'";
		$admin_sorgus4 = mysql_query($sorgus4, $mysqlbaglantisi) or die(mysql_error());
		$uyelers4 = mysql_fetch_array($admin_sorgus4); 		
		$yorum_ad= $uyelers4["ad"];	
		$yorum_yetki = $uyelers4["yetki"];		
		$yorum_id = $uyelers4["id"];	
		$yorum_resim = $uyelers4["resim"];		
		
		
		
		
		
		if($yorum_yetki == "1")			

							{	
							echo '		<div id="yorumpost"><div id="yorumprofil"><img class="yprof" src="'.$yorum_resim.'"><div id="yorumyazi">'.$yorum_ad.'</div>';		
							}				
							else if($yorum_yetki == "2")				
							{	
						
						
						echo '		<div id="yorumpost"><div id="yorumprofil" style="background-color:rgba(49, 131, 103, 0.83)"><img class="yprof" src="'.$yorum_resim.'"><div id="yorumyazi">'.$yorum_ad.'</div>';




	
						}	
						
						else if($yorum_yetki == "3")	
							{	
echo '		<div id="yorumpost"><div id="yorumprofil" style="background-color:#3A5988"><img class="yprof" src="'.$yorum_resim.'"><div id="yorumyazi">'.$yorum_ad.'</div>';
								
							
							
							}
						else if($yorum_yetki == "4")			
							{	
						
						
						echo '		<div id="yorumpost"><div id="yorumprofil" style="background-color:#A54250"><img class="yprof" src="'.$yorum_resim.'"><div id="yorumyazi">'.$yorum_ad.'</div>';
								



						}	
		
		
		
		
		
		
		
		
		
		
		
		
		if($yorum_yetki == "1")	
			{			
		echo '	    <div class="yetki"><center><br> Kullanıcı</center></div>';	
		}				
		else if($yorum_yetki == "2")		
			{							
		echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Abone</center></div>';	
		}				else if($yorum_yetki == "3")	
			{			
		echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Moderatör</center></div>';	
		}			   else if($yorum_yetki == "4")			
			{			   	
		echo ' <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Yetkili / Admin</center></div>';
		}
		echo '</div><div id="yorumyorum">'.$yorum_icerik.' '.$silme.'<br></div></div><div style="clear:both"></div>							
		';								
		}		
		if(isset($_POST["yorumgonder"]))
		{				$yorumicerik = $_POST["yorumicerik"];
$yenikonuidcekbildirim = $_GET["id"];
	mysql_query("insert into bildirimler2 (id,email,veritipi,sayac,konuid) values ('','$email_post','1','0','$yenikonuidcekbildirim')");
	
	
	
$yorumicerik  = mysql_escape_string($yorumicerik);
	$emailyaz = $_SESSION["email"];		$idyaz = $_GET["id"];				$konuid= $idyaz;								if($alan == "subs")		{		mysql_query("SET NAMES UTF8");		mysql_query("INSERT INTO `yorum_subs`(`id`, `email`, `icerik`, `konuid`) VALUES ('','$emailyaz','$yorumicerik','$idyaz')");						$sorgus1w = "SELECT * FROM subs_gonderi WHERE id='$idyaz'";$admin_sorgus1w = mysql_query($sorgus1w, $mysqlbaglantisi) or die(mysql_error());$uyelers1w = mysql_fetch_array($admin_sorgus1w); 		$sonyorum = $uyelers1w["yorum"];		$sonyorum++;						mysql_query("UPDATE `subs_gonderi` SET `yorum`= '$sonyorum' WHERE id = '$konuid'");			echo '<meta http-equiv="refresh" content="0;URL=konu.php?id='.$idyaz.'&alan='.$alan.'">';											}		else{				mysql_query("SET NAMES UTF8");		mysql_query("INSERT INTO `yorum_mezdeke`(`id`, `email`, `icerik`, `konuid`) VALUES ('','$emailyaz','$yorumicerik','$idyaz')");				$sorgus1w = "SELECT * FROM mezdeke_gonderi WHERE id='$idyaz'";$admin_sorgus1w = mysql_query($sorgus1w, $mysqlbaglantisi) or die(mysql_error());$uyelers1w = mysql_fetch_array($admin_sorgus1w); 		$sonyorum = $uyelers1w["yorum"];		$sonyorum++;												mysql_query("UPDATE `mezdeke_gonderi` SET`yorum`= '$sonyorum' WHERE id = '$konuid'");							echo '<meta http-equiv="refresh" content="0;URL=konu.php?id='.$idyaz.'&alan='.$alan.'">';		}		}																				?>
	

			<div id="yertut" style="height:70px;width:100%;"></div>
			
			
</body></html>