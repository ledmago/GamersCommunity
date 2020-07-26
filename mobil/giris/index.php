<?php
session_start();
if(isset($_SESSION["email"]))
{
	
	
}
else
{
 echo "<script>window.location = '../index.php'</script>";
	
}

?>
<html>
<head>  	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="author" content="FIRAT">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
    
	<title>ZeoNNN - Mobil</title>
<script> 

$(document).ready(function(){



	
	
	$("#header").css({'margin-left': '0px'});
	$("#girisekran").css({'bottom': '0px'});
		


	
	
});
</script> 

    <link rel="stylesheet" href="css/style.css" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
  </head>
  <body>
  
  <div id="girisekran"><div id="ustlogo"></div>
 
 <center style="margin-top:45px;">
 <h1>Hoşgeldiniz</h1>
 <p>ZeoNNN.com için hazırlanmış mobil uygulamaya hoşgeldiniz. 5 yıldız vermeyi unutmayın.</p>
 
 <img src="img/tel.png" width="50%">
 
 </center>
  
  <ul>
 <li onclick="window.location = '../../profil.php'">
              
			  
               <img src="img/user.png"> <a ><span>Profilim</span>
              </a>
            </li>
						


						<li onclick="window.location = '../../hesap.php'">
               <img src="img/ayarlar.png"> <a> <span>Hesap Ayarları</span>
              </a>
</li>
			
			
			
			<li onclick="window.location = '../../cekilisgoster.php'"><img src="img/cekilis.png">    <a href="cekilisgoster.php"><span>Çekilişler</span></a>
            </li>
			
			
			<li onclick="window.location = '../../anasayfa.php'"><img src="img/akis.png"><a href="anasayfa.php"><span>Akış</span></a>
            </li>
			<li onclick="window.location = '../../mesajlar.php'">
              <img src="img/measjlar.png"><a ><span>Mesajlarım</span> </a>
            </li>
			
			<li onclick="window.location = '../../chatfirat'">
              <img src="img/chat.png"><a><span>Chat</span> </a>
            </li>
			<li onclick="window.location = '../../uyeler.php'">
              <img src="img/uyeler.png"><a ><span>Üyeler</span> </a>
            </li>


			<li onclick="window.location = '../../cikis.php'">
              <img src="img/cikis.png"><a><span>Çıkış</span> </a>
            </li>
  
  </ul>
  
  
  </div>
  </body>

</html>