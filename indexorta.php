﻿﻿<?php @session_start();if(!isset($_SESSION["email"])){@header("Location: index.php"); }include("ayar.php"); 



$kid = $_GET["kid"];

if($kid == "")
{
	$kid = "0";
}




?><html><head>
       <link rel="stylesheet" type="text/css" href="style.css">
       <META http-equiv=content-type content=text/html;charset=UTF8>
 
 <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="source/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="source/jquery.colorbox.js"></script>
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
	   
	   <style>

#begenipopup
{

  
position: fixed;
  width: 0px;
  height: 0px;
  background: #fff;
  	-moz-box-shadow: 5px 5px 15px #cbcbcb;
	-webkit-box-shadow: 5px 5px 15px #cbcbcb;
	-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
	left:25%;
	overflow:hidden;
	transition:all 2s;

}

#popupbaslik
{background-color:#72818B;
-webkit-border-top-left-radius: 15px;
-webkit-border-top-right-radius: 15px;
-moz-border-radius-topleft: 15px;
-moz-border-radius-topright: 15px;
border-top-left-radius: 15px;
border-top-right-radius: 15px;
height:40px;
color:#FFF;
font-family: 'Roboto Condensed', sans-serif;
text-align:center;
line-height:40px;
font-size:20px;


}
#popupkapat
{
position:absolute;
right:15px;
top:12px;
background-image:url(img/kapat.png);
background-size:100%;
background-repeat:no-repeat;
width:20px;
height:20px;
cursor:pointer;
}
#popupkapat:hover
{
opacity:0.7;

}


</style>

<script>
function popupbegeni(adres)
{
$("#cefa").attr("src", adres);
$("#begenipopup").css("width", "55%");
$("#begenipopup").css("height", "80%");


}

function popupkapat()
{
$("#begenipopup").css("width", "0px");
$("#begenipopup").css("height", "0px");



}

</script>
       
       <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>	   	   <style>	   	   ::-webkit-scrollbar {    width: 13px;} ::-webkit-scrollbar-track {    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);             border-radius: 10px;     } ::-webkit-scrollbar-thumb {    background-color:#111;    border-radius: 10px;       -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); }	   	   </style>
    </head>
    <body style="overflow-y:scroll">
    
<div id="begenipopup">
  
 <div id="popupbaslik">Beğenen Kişiler</div>
  <div id="popupkapat" onclick="popupkapat()"></div>
  
  <iframe id="cefa" src="" style="width:99%;height:82%;margin-top:10px;"  frameborder="0"></iframe>
  
  </div>
			
			<div id="bolumler" style="margin-top: -21px;">
			    
			    <div id="subsbolumu" onClick="window.location = 'indexmezdeke.php'"><a href="indexmezdeke.php">SUBSCRİBERS PAYLAŞIM ALANI</a></div>
			     <div id="mtbolumu"  onClick="window.location = 'indexorta.php'"> <a href="indexorta.php">MEZDEKE TEAM PAYLAŞIM ALANI</a></div>
			     <div style="clear:both"></div>
			</div>
					
		

			
		<?php			include("rutbesistemi.php");include("function.php");	$sayfa=$_GET['sayfa'];if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}$kacar=30;
		if($kid == '0')
		{
			$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mezdeke_gonderi"));
		}
		else
		{
			
			$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mezdeke_gonderi Where kategori = '$kid'"));
		}
		
		$sayfa_sayisi=$kayit_sayisi['0']/$kacar;if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;		mysql_query("SET NAMES UTF8");
		
		if($kid == "0")
		{
			$sorgu=mysql_query("SELECT * FROM mezdeke_gonderi ORDER BY sabit DESC,tarihler DESC,id DESC LIMIT $nerden,$kacar"); 
		}
		else{
			$sorgu=mysql_query("SELECT * FROM mezdeke_gonderi Where kategori = '$kid' ORDER BY sabit DESC,tarihler DESC,begeni DESC,id DESC LIMIT $nerden,$kacar"); 
		}
		
		
		while($gonderi = mysql_fetch_array($sorgu))   
			{	$ids = $gonderi["id"];	$email_post = $gonderi["email"];	$icerik = $gonderi["icerik"];	
		
		// Gülücük
						$icerik  = str_replace( ":D", "<img src='img/smile.png' style='width: 19px;height: 19px;min-width: 19px;max-height: 19px;min-height: 19px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
						
		$icerik  = str_replace( "</div>", "<br>", $icerik );		
		$icerik  = str_replace( "</p>", "<br>", $icerik );
		$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
		$icerik = nl2br($icerik);
		$degismis = str_replace( "<img src=", "<img class='postresim2' src=", $icerik );
		$icerik = $icerik;		
		
		$border = $gonderi["sabit"];
		$tarihceksenebe = $gonderi["tarih"];
		$resim = $gonderi["resim"];	
		$begeni = $gonderi["begeni"];	
		$yorum = $gonderi["yorum"];	
		$sorgus = "SELECT * FROM uyeler2 WHERE email='$email_post'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 
		$id = $uyelers["id"];	
		$emai_uye = $uyelers["email"];	
		$yetki = $uyelers["yetki"];
		$cercevepuan = $uyelers["paylaspuan"];
		
		
		/*if($cercevepuan > 0 && $cercevepuan < 51)
		{$cerceverengi = 'background-image: url(img/cerceve/cerceve0.png);background-size: 100% 200px;';}
		else if($cercevepuan > 50 && $cercevepuan < 101)
		{$cerceverengi = 'background-image: url(img/cerceve/cerceve1.png);background-size: 100% 200px;';}
		else if($cercevepuan > 100 && $cercevepuan < 301)
		{$cerceverengi = 'background-image: url(img/cerceve/cerceve2.png);background-size: 100% 200px;';}	
		else if($cercevepuan > 300)
		{$cerceverengi = 'background-image: url(img/cerceve/cerceve3.png);background-size: 100% 200px;';}	
		*/
		
		
		$ad = $uyelers["ad"];	
		$resim2 = $uyelers["resim"];			
		$konugonder = "'konu.php?id=$ids&alan=mezdeke'";	
		$profilgoster = "'profil.php?id=$id'";	
		echo '			<div id="postaq"><a name="'.$ids.'">';

		if($border == "1")
		{
			
			
			
			if($yetki == "1")			

							{	
echo '			
						<div id="profil" style="overflow:hidden;border: 1px solid red;border-right-style: '.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';			
							}				
							else if($yetki == "2")				
							{	
echo '				
						<div id="profil" style="overflow:hidden;background-color:rgba(49, 131, 103, 0.83);border: 1px solid red;border-right-style: none;'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';		
						}	
						
						else if($yetki == "3")	
							{	

							echo '			
						<div id="profil"  style="overflow:hidden;background-color:#3A5988;;border: 1px solid red;border-right-style: none;'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';		
	    			   								}	
						else if($yetki == "4")			
							{	
						
						echo '			
						<div id="profil"  style="overflow:hidden;background-color:#A54250;border: 1px solid red;border-right-style: none;'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';	
	    			    



						}	
			
			
			
			
			
			
			
			
		
			
		}
		else
		{
			
	if($yetki == "1")			

							{	
echo '			
						<div id="profil" style="overflow:hidden;'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';			
							}				
							else if($yetki == "2")				
							{	
echo '				
						<div id="profil" style="overflow:hidden;background-color:rgba(49, 131, 103, 0.83);'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';		
						}	
						
						else if($yetki == "3")	
							{	

							echo '			
						<div id="profil"  style="overflow:hidden;background-color:#3A5988;'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';		
	    			   								}	
						else if($yetki == "4")			
							{	
						
						echo '			
						<div id="profil"  style="overflow:hidden;background-color:#A54250;'.$cerceverengi.'" onClick="window.location = '.$profilgoster.'">';	
	    			    



						}	
			
		}
		
		echo '<center>
		

		
		<img class="ppphoto" src="'.$resim2.'" ></center>			    <div class="profilyazi">'.$ad.'</div>';				
		
	
		
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

echo '<a class="duzenleaog" href="duzenle.php?id='.$ids.'">Düzenle</a><br>';

}
		
		echo $icerik;				
		$begeni_mez = "'begen.php?id=$ids&alan=$alan'";			if($resim != "resimyok")	

			{		
echo '<p><a class="group3" href="'.$resim.'" title="'.$icerik.'"><img class="postresim" src="'.$resim.'"></a></p>';
		

		

			



			}			echo '</div>';					
$sabitle = "window.location = 'sabitle.php?id=$ids&alan=$alan'";
		$sikayetet = "window.location = 'sikayetet.php?id=$ids&alan=mezdeke'";		
		$konusil = "window.location = 'konusil.php?id=$ids&alan=mezdeke'";		
		$banla = "window.location = 'banla.php?id=$id'";			
		$cezaver = "window.location = 'cezaver.php?id = $id'";		
		
		$begeniyerlestir = "popupbegeni('http://zeonnn.com/likelist.php?id=".$ids."')";
		
		$begeniyazzisi = '<a style="cursor:pointer" onclick="'.$begeniyerlestir .'">Beğeni</a>';
		$alemailxd = $_SESSION["email"];			
		$sorgus0 = "SELECT * FROM uyeler2 WHERE email='$alemailxd'";
		$admin_sorgus0 = mysql_query($sorgus0, $mysqlbaglantisi) or die(mysql_error());
		$uyelers0 = mysql_fetch_array($admin_sorgus0); 		
		$yetki = $uyelers0["yetki"];				
		if($yetki == "1")		
			{					
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' '.$begeniyazzisi.'</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> </div>'; 	
		}			
		else if			
		($yetki == "2")		
		{						
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' '.$begeniyazzisi.'</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> </div>'; 	
		}			
		else if($yetki == "3")	
			{						
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' '.$begeniyazzisi.'</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div><div class="durumyeni" id="durumyazi" onClick="'.$sikayetet.'">• Şikayet Et</div> <div class="durumyeni" id="durumyazi" onClick="'.$konusil.'">• Konuyu Sil</div><div class="durumyeni" id="durumyazi" onClick="'.$cezaver.'">• Kullanıcıya Ceza Ver</div> <div class="durumyeni" id="durumyazi" onClick="'.$banla.'">• Kullanıcıyı Banla</div> <div class="durumyeni" id="durumyazi" onClick="'.$sabitle.'">• Konuyu Sabitle</div> </div>'; 
		}			
		else if($yetki == "4")		
			{							
		echo '<div id="durum"><img style="cursor:pointer" onclick="window.location = '.$begeni_mez.' " src="img/begeni.png" height="25px"><div id="durumyazi">'.$begeni.' '.$begeniyazzisi.'</div>  <img style="margin-left:10px;" src="img/yorum.png" height="25px"><div id="durumyazi" style="cursor:pointer;" onclick="window.location = '.$konugonder.' ">'.$yorum.' Yorum </div> <div class="durumyeni" id="durumyazi" onClick="'.$konusil.'">• Konuyu Sil</div><div class="durumyeni" id="durumyazi" onClick="'.$cezaver.'">• Kullanıcıya Ceza Ver</div> <div class="durumyeni" id="durumyazi" onClick="'.$banla.'">• Kullanıcıyı Banla</div> <div class="durumyeni" id="durumyazi" onClick="'.$sabitle.'">• Konuyu Sabitle</div> </div>'; 			
		}																			 		 
		
		echo '			     			    			    			   			    			</div>						</div><div style="clear:both;">			    	</a></div>			';		
		}	
		
		if($sayfa_sayisi > 30)
		{
			$sayfa_sayisi = 30;
			
		}
		$gosterxd = $sayfa;
		$gosterxd -=1;
				echo "<p class='sayfalar-ayrac'><a href='indexorta.php?sayfa=$gosterxd&kid=$kid'><</a>";for ($i=1; $i<=$sayfa_sayisi; $i++) {echo "	[<a href=?sayfa=$i&kid=$kid>$i</a>]		 ";		}$gosterxd = $gosterxd+2;	echo "<a href='indexorta.php?sayfa=$gosterxd&kid=$kid'>></a></p>";	?>  

		

	
	
			
			<br>
			
</body></html>