﻿﻿<?php @session_start();include("ayar.php"); if(!isset($_SESSION["email"])){@header("Location: index.php"); }else{$email = $_SESSION["email"];	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 			$yetki = $uyelers["yetki"];		if($yetki < 2)	{		@header("Location: subshata.php"); 			}}?><html><head>
       <link rel="stylesheet" type="text/css" href="style.css">
       <META http-equiv=content-type content=text/html;charset=UTF8>
 
 <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
    

			
			<div id="bolumler" style="margin-top: -21px;">
			    
			    <div id="subsbolumu" onClick="window.location = 'indexmezdeke.php'"><a href="indexmezdeke.php">SUBSCRİBERS PAYLAŞIM ALANI</a></div>
			     <div id="mtbolumu"  onClick="window.location = 'indexorta.php'"> <a href="indexorta.php">MEZDEKE TEAM PAYLAŞIM ALANI</a></div>
			     <div style="clear:both"></div>
			</div>
					
					
					
					
		

			
		<?php	include("rutbesistemi.php");include("function.php");	$alan = "subs";			$sayfa=$_GET['sayfa'];if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}$kacar=90;$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM subs_gonderi"));$sayfa_sayisi=$kayit_sayisi['0']/$kacar;if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;		mysql_query("SET NAMES UTF8");
		$sorgu=mysql_query("SELECT * FROM subs_gonderi ORDER BY sabit DESC,tarihler DESC,begeni DESC,id DESC LIMIT $nerden,$kacar"); 
		while($gonderi = mysql_fetch_array($sorgu))   
			{	
		$ids = $gonderi["id"];
		$tarihceksenebe = $gonderi["tarih"];
		$border = $gonderi["sabit"];
		$email_post = $gonderi["email"];
		$icerik = $gonderi["icerik"];
		// Gülücük
						$icerik  = str_replace( ":D", "<img src='img/smile.png' style='width: 19px;height: 19px;min-width: 19px;max-height: 19px;min-height: 19px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
						
		$icerik  = str_replace( "</div>", "<br>", $icerik );		
		$icerik  = str_replace( "</p>", "<br>", $icerik );
		$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
		$icerik = nl2br($icerik);
		$degismis = str_replace( "<img src=", "<img class='postresim2' src=", $icerik );
		$icerik = $icerik;		
		$resim = $gonderi["resim"];	
		$begeni = $gonderi["begeni"];
		$yorum = $gonderi["yorum"];			
		$sorgus = "SELECT * FROM uyeler2 WHERE email='$email_post'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
		$uyelers = mysql_fetch_array($admin_sorgus); 	
		$id = $uyelers["id"];	
		$emai_uye = $uyelers["email"];
		$cercevepuan = $uyelers["paylaspuan"];		
		$yetki = $uyelers["yetki"];		
		$ad = $uyelers["ad"];	
		
		$resim2 = $uyelers["resim"];		
		$konugonder = "'konu.php?id=$ids&alan=subs'";	
		$profilgoster = "'profil.php?id=$id'";

		echo '			<div id="postaq"><a name="'.$ids.'">';

		

				if($border == "1")
		{
			
			
			
			if($yetki == "1")			

							{	
echo '			
						<div id="profil" style="border: 1px solid red;border-right-style: none;" onClick="window.location = '.$profilgoster.'">';			
							}				
							else if($yetki == "2")				
							{	
echo '				
						<div id="profil" style="background-color:rgba(49, 131, 103, 0.83);border: 1px solid red;border-right-style: none;" onClick="window.location = '.$profilgoster.'">';		
						}	
						
						else if($yetki == "3")	
							{	

							echo '			
						<div id="profil"  style="background-color:#3A5988;;border: 1px solid red;border-right-style: none;" onClick="window.location = '.$profilgoster.'">';		
	    			   								}	
						else if($yetki == "4")			
							{	
						
						echo '			
						<div id="profil"  style="background-color:#A54250;border: 1px solid red;border-right-style: none;" onClick="window.location = '.$profilgoster.'">';	
	    			    



						}	
			
			
			
			
			
			
			
			
		
			
		}
		else
		{
			
	if($yetki == "1")			

							{	
echo '			
						<div id="profil"  onClick="window.location = '.$profilgoster.'">';			
							}				
							else if($yetki == "2")				
							{	
echo '				
						<div id="profil" style=";background-color:rgba(49, 131, 103, 0.83)" onClick="window.location = '.$profilgoster.'">';		
						}	
						
						else if($yetki == "3")	
							{	

							echo '			
						<div id="profil"  style="background-color:#3A5988" onClick="window.location = '.$profilgoster.'">';		
	    			   								}	
						else if($yetki == "4")			
							{	
						
						echo '			
						<div id="profil"  style="background-color:#A54250" onClick="window.location = '.$profilgoster.'">';	
	    			    



						}	
			
		}
		
		
		
		
echo'	<center><img class="ppphoto" src="'.$resim2.'" ></center>			    <div class="profilyazi">'.$ad.'</div>';				

if($yetki == "1")			
			{			
	
		echo '	    <div class="yetki"><center><br> Kullanıcı';			
rutbegoster($cercevepuan);
echo "</center></div>";

		}	
		else if($yetki == "2")			
			{								echo '   <div class="yetki"><center><br> Abone';
		
			
		
echo "</center></div>";
		}			
		else if($yetki == "3")			
			{				echo '   <div class="yetki"><center><img src="img/mod.png" width="55px"  ><br> Moderatör</center></div>';		
		
			
		
		}			   
		else if($yetki == "4")			
			{			   			   echo ' <div class="yetki"><center><img src="img/subs.png" width="55px" ><br> Yetkili / Admin</center></div>';

		}		
		
	
		
		
		if($border == "1")
		{
					echo '		</div>			<div id="post" style="border:1px solid red">	<div id="postyazisi">';
		}
		else
		{
					echo '		</div>			<div id="post">	<div id="postyazisi">';
			
		}
		
		
		
		
		$kontrolduzenle = $_SESSION["email"];
echo timeConvert($tarihceksenebe)."<br>";
if($kontrolduzenle == $email_post)
{

echo '<a class="duzenleaog" href="duzenle_subs.php?id='.$ids.'">Düzenle</a><br>';

}
		
		echo $icerik;			




		$begeni_mez = "'begen_subs.php?id=$ids&alan=$alan'";			if($resim != "resimyok")			{		
	echo '<p><a class="group3" href="'.$resim.'" title="'.$icerik.'"><img class="postresim" src="'.$resim.'"></a></p>';			


		}			echo '</div>';					
$sabitle = "window.location = 'sabitle.php?id=$ids&alan=$alan'";
		$sikayetet = "window.location = 'sikayetet.php?id=$ids&alan=subs'";		
		$konusil = "window.location = 'konusil.php?id=$ids&alan=subs'";		
		$banla = "window.location = 'banla.php?id=$id'";			
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
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' Beğeni</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"> <div class="durumyeni" id="durumyazi" onClick="'.$konusil.'">• Konuyu Sil</div><div class="durumyeni" id="durumyazi" onClick="'.$cezaver.'">• Kullanıcıya Ceza Ver</div> <div class="durumyeni" id="durumyazi" onClick="'.$banla.'">• Kullanıcıyı Banla</div> <div class="durumyeni" id="durumyazi" onClick="'.$sabitle.'">• Konuyu Sabitle</div> </div>'; 			
		}
		echo '			     			    			    			   			    			</div>						</div><div style="clear:both;">			    	</a></div>			';		
		}		



				echo "<p class='sayfalar-ayrac'>";for ($i=1; $i<=$sayfa_sayisi; $i++) {echo "	[<a href=?sayfa=$i>$i</a>]		 ";		}	echo "</p>";	?>  


	
	
			
			<br>
			
</body></html>