<?php
@session_start();
if(!isset($_SESSION["email"]))
{
	@header("Location: index.php");
}




?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body style="overflow:scroll;">
<?php

include("rutbesistemi.php");
echo '			
		<div id="postaq"><a name="2">	
		<div id="profil" style="height:250px">	
		<center><img class="ppphoto" src="img/bot.jpg" ></center>		
	    <div class="profilyazi">NecoChatBot</div>';	
		
			echo '	    <div class="yetki"><center><br>Site Botu</center></div>';			
		
		
echo '	<div class="yetki"><center>Ben Bir Botum</center></div>	</div>	</div>		';		


		

include("ayar.php");
/* Online Üyeler*/


   
	
	$time = time();
	$onlinesayac = 0;
$sorgu = mysql_query("SELECT * FROM uyeler2 Order By yetki DESC, paylaspuan DESC");
while($row = mysql_fetch_array($sorgu)) {
	$kontrol_yazma = $row["email"];
 $son_etkinlik = $row["sontarih"];
 
 if($time - $son_etkinlik < 15) {
	 
	 if($kontrol_yazma != "")
	 {
		 
		 
	 



		
		$id = $row["id"];		
		$emai_uye = $row["email"];	
		$yetki = $row["yetki"];	
		$ad = $row["ad"];	
		$resim2 = $row["resim"];	
$cercevepuan = $row["paylaspuan"];		
		$profilgoster = "'profil.php?id=$id'";	
		echo '			
		<div id="postaq"><a name="'.$ids.'">	
		<div id="profil" style="height: 250px;overflow: hidden;" onClick="window.location = '.$profilgoster.'">	
		<center><img class="ppphoto" src="'.$resim2.'" ></center>		
	    <div class="profilyazi">'.$ad.'</div>';	





		
		if($yetki == "1")			
			{				
		echo '	    <div class="yetki"><center><br> Kullanıcı';
		
		rutbegoster($cercevepuan);
		echo'</center></div>';	
		
		}		
		else if($yetki == "2")				
		{						
		echo '   <div class="yetki"><center><br> Abone';	
rutbegoster($cercevepuan);
		echo'</center></div>';			
		}				
		else if($yetki == "3")		
			{			
		echo '   <div class="yetki"><center><img src="img/mod.png" width="55px"  ><br> Moderatör</center></div>';		
		}			  
		else if($yetki == "4")	
			{			   			
		echo ' <div class="yetki"><center><img src="img/subs.png" width="55px" ><br> Yetkili / Admin</center></div>';			   
		
		
		}	
		
		
		echo '	<div class="yetki"><center>'.$emai_uye.'</center></div>	</div>	</div></div>		';			
								

		
		
		
		$onlinesayac  = $onlinesayac + 1 ;



}



 }
}
$onlinesayac  = $onlinesayac + 25 ;

$sorgu = mysql_query("SELECT * FROM uyeler2 ORDER BY RAND() ");
 $fakesayac = 0;
while($row = mysql_fetch_array($sorgu)) {
	$kontrol_yazma = $row["email"];
 $son_etkinlik = $row["sontarih"];

 if($time - $son_etkinlik > 15) {
	 
	 if($fakesayac < $onlinesayac )
	 {
	 
	 if($kontrol_yazma != "")
	 {
		 
		 
	 $fakesayac = $fakesayac + 1;


	
		$id = $row["id"];		
		$emai_uye = $row["email"];	
		$yetki = $row["yetki"];	
		$ad = $row["ad"];	
		$resim2 = $row["resim"];	
$cercevepuan = $row["paylaspuan"];		
		$profilgoster = "'profil.php?id=$id'";	
		echo '			
		<div id="postaq"><a name="'.$ids.'">	
		<div id="profil" style="height: 250px;overflow: hidden;" onClick="window.location = '.$profilgoster.'">	
		<center><img class="ppphoto" src="'.$resim2.'" ></center>		
	    <div class="profilyazi">'.$ad.'</div>';	





		
		if($yetki == "1")			
			{				
		echo '	    <div class="yetki"><center><br> Kullanıcı';
		
		rutbegoster($cercevepuan);
		echo'</center></div>';	
		
		}		
		else if($yetki == "2")				
		{						
		echo '   <div class="yetki"><center><br> Abone';	
rutbegoster($cercevepuan);
		echo'</center></div>';			
		}				
		else if($yetki == "3")		
			{			
		echo '   <div class="yetki"><center><img src="img/mod.png" width="55px"  ><br> Moderatör</center></div>';		
		}			  
		else if($yetki == "4")	
			{			   			
		echo ' <div class="yetki"><center><img src="img/subs.png" width="55px" ><br> Yetkili / Admin</center></div>';			   
		
		
		}	
		
		
		echo '	<div class="yetki"><center>'.$emai_uye.'</center></div>	</div>	</div></div>		';			
								

		
		
		


}



 }
 
 
 
 
 
 
 
 
 
 
 
 
 }
 
 
 
 
}





		echo '					    </div>			';	
		echo ' <div style="clear:both"></div>';
echo "<p class='sayfalar-ayrac'>";
$onlinesayac++;
echo "Toplam Online Üyeler : ".$onlinesayac.'</div></div>';

?>
</body>
</html>