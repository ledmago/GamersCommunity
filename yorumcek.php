<?php

include("ayar.php");
	mysql_query("SET NAMES UTF8");	
	
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
		echo '		<div id="yorumpost"><div id="yorumprofil"><img class="yprof" src="'.$yorum_resim.'"><div id="yorumyazi">'.$yorum_ad.'</div>';
		if($yorum_yetki == "1")	
			{			
		echo '	    <div class="yetki"><center><br> Kullanıcı</center></div>';	
		}				
		else if($yorum_yetki == "2")		
			{							
		echo '   <div class="yetki"><center><img src="img/subs.png" width="17px" ><br> Subscribers</center></div>';	
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
	
		
		?>