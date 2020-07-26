﻿﻿<?php session_start();include("ayar.php"); if(!isset($_SESSION["email"])){header("Location: index.php"); }else{$email = $_SESSION["email"];	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 			$yetki = $uyelers["yetki"];		if($yetki < 2)	{		/*header("Location: subshata.php"); */			}}?><html><head>
       <link rel="stylesheet" type="text/css" href="style.css">
       <META http-equiv=content-type content=text/html;charset=UTF8>
 
 <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
       
       <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>	   	   <style>	   	   ::-webkit-scrollbar {    width: 13px;} ::-webkit-scrollbar-track {    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);             border-radius: 10px;     } ::-webkit-scrollbar-thumb {    background-color:#111;    border-radius: 10px;       -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); }	   	   </style>
    </head>
    <body style="overflow-y:scroll">
    

			
			<div id="bolumler" style="margin-top: -21px;">
			    
			    <div id="subsbolumu" onClick="window.location = 'indexmezdeke.php'"><a href="indexmezdeke.php">SUBSCRİBERS PAYLAŞIM ALANI</a></div>
			     <div id="mtbolumu"  onClick="window.location = 'indexorta.php'"> <a href="indexorta.php">MEZDEKE TEAM PAYLAŞIM ALANI</a></div>
			     <div style="clear:both"></div>				 			
			</div>	 <div style="float:left;margin-left:20px;"><form action="uyeara.php" method="get"><input type="text" placeholder="İsim İle Arama" name="isimarama"><input type="submit" value="Ara"></form></div>				 				<div style="float:left;margin-left:20px;">  <form  action="uyeara.php"  method="get"><input type="text" placeholder="Email ile arama" name="emailarama"><input type="submit" value="Ara"></form></div> <div style="clear:both"></div>
					
		

			
		<?php				$sayfa=$_GET['sayfa'];
		if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}
		$kacar=90;
		$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uyeler2"));
		$sayfa_sayisi=$kayit_sayisi['0']/$kacar;
		if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;
		mysql_query("SET NAMES UTF8");$sorgu=mysql_query("SELECT * FROM uyeler2 ORDER BY  yetki DESC LIMIT $nerden,$kacar");
		while($gonderi = mysql_fetch_array($sorgu))  
			{	$ids = $gonderi["id"];	
		$email_post = $gonderi["email"];	
		$icerik = $gonderi["icerik"];	
		$emailyaz2 = $gonderi["email"];
		$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe>");
		$icerik = nl2br($icerik);
		$degismis = str_replace( "<img src=", "<img class='postresim2' src=", $icerik );$icerik = $icerik;		
		$resim = $gonderi["resim"];	$begeni = $gonderi["begeni"];	
		$yorum = $gonderi["yorum"];			
		$sorgus = "SELECT * FROM uyeler2 WHERE email='$email_post'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
		$uyelers = mysql_fetch_array($admin_sorgus); 	
		$id = $uyelers["id"];	
		$emai_uye = $uyelers["email"];
		$yetki = $uyelers["yetki"];	
		$ad = $uyelers["ad"];		
		$resim2 = $uyelers["resim"];	
		$konugonder = "'konu.php?id=$ids&alan=subs'";	
		$profilgoster = "'profil.php?id=$id'";		
		echo '			<div id="postaq"><a name="'.$ids.'">			<div id="profil"  style="height:230px" onClick="window.location = '.$profilgoster.'">			    			    <center><img class="ppphoto" src="'.$resim2.'" ></center>			    <div class="profilyazi">'.$ad.'</div>';		
		if($yetki == "1")				{				echo '	    <div class="yetki"><center><br> Kullanıcı</center></div>';				}				else if($yetki == "2")				{								echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Subscribers</center></div>';				}				else if($yetki == "3")				{				echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Moderatör</center></div>';								}			   else if($yetki == "4")			   {			   			   echo ' <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Yetkili / Admin</center></div>';			   }		echo '	<div class="yetki"><center>'.$emailyaz2.'</center></div>	</div>			';				echo '			</div>			    </div>			';								}	echo ' <div style="clear:both"></div>';
			echo "<p class='sayfalar-ayrac'>";for ($i=1; $i<=$sayfa_sayisi; $i++) {echo "	[<a href=?sayfa=$i>$i</a>]		 ";		}	echo "</p>";	 ?>			      


	
	
			
			<br>
			
</body></html>