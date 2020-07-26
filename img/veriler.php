<?php
include("ayar.php");
$emailneco = $_SESSION["email"];
$mesajlaritopla = 0;

$sorgu=mysql_query("SELECT * FROM gelenkutusu WHERE konu='$emailneco' and okundu='0' "); 
		while($gonderi = mysql_fetch_array($sorgu))   
			{
			$mesajlaritopla = $mesajlaritopla + 1;
			}
			
			
			
			

$bildirimleritopla = 0;

$sorgu31=mysql_query("SELECT * FROM bildirimler2 WHERE email='$emailneco' and sayac='0' "); 
		while($gonderi31 = mysql_fetch_array($sorgu31))   
			{
			$bildirimleritopla = $bildirimleritopla + 1;
			}
			
			
			?>

 <div id="bildirimler"><div id="baslikbild">Bildirimler</div>

<div id="bildpanel">



<script src="img/bildirim.js"></script>




<?php
 if($bildirimleritopla != 0)
 {
	 if(isset($_COOKIE["bildirim"]))
	 {
		 $acaba = $_COOKIE["bildirim"];
		 
		 if($acaba  == "goster")
		 {
			 
			  $yaz = "'";
echo '<script>kodDostuBildirim('.$yaz.'Yeni Bildiriminiz Var'.$yaz.','.$yaz.'1 Adet Yeni Bildiriminiz var'.$yaz.','.$yaz.'http://zeonnn.com/bildirimgoster.php'.$yaz.')</script>';
 
 //ses 
 echo "<div id='gizle' style='display:hidden'>  <audio controls autoplay><source src='../img/bildirim2.mp3' type='audio/mpeg'></audio></div>";
 
 
 setcookie("bildirim", "gosterme");
		 }
		 
	 }
	/*  
	 			  $yaz = "'";
echo '<script>kodDostuBildirim('.$yaz.'Sitemize Hoş Geldiniz'.$yaz.','.$yaz.'Koddostu.com da başka hiçbir yerde bulamayacağınız hazır kodlar edinebilirsiniz.'.$yaz.','.$yaz.'http://koddostu.com'.$yaz.')</script>';
 */
	
	// echo '<script>kodDostuBildirim('.$yaz.'Sitemize Hoş Geldiniz'.$yaz.','.$yaz.'Koddostu.com da başka hiçbir yerde bulamayacağınız hazır kodlar edinebilirsiniz.'.$yaz.','.$yaz.'http://koddostu.com'.$yaz.')</script>';
	 echo '<img src="img/ikon/bildirim.png"> <a class="isik" target="content" href="bildirimler.php">Bildirim : '.$bildirimleritopla.'</a><div style="clear:both"></div>';
 
 
 }
 else
 {
	 
	  echo '<img src="img/ikon/bildirim.png"> <a target="content" href="bildirimler.php">Bildirim : '.$bildirimleritopla.'</a><div style="clear:both"></div>';
 }





 if($mesajlaritopla != 0)
{echo '<img src="img/ikon/mail.png"> <a target="content" class="isik" href="gelenkutusu.php">Mesajlar : '.$mesajlaritopla.'</a><div style="clear:both"></div>';}
else
{
	echo '<img src="img/ikon/mail.png"> <a target="content" href="gelenkutusu.php">Mesajlar : '.$mesajlaritopla.'</a><div style="clear:both"></div>';

}

	$sorgusx = "SELECT * FROM uyeler2 WHERE email = '$emailneco'";
$admin_sorgusx = mysql_query($sorgusx, $mysqlbaglantisi) or die(mysql_error());
$uyelersx = mysql_fetch_array($admin_sorgusx); 

	
		$paylaspuan = $uyelersx["paylaspuan"];
?>


<img src="img/ikon/puanlar.png"> <a target="content" href="puanlar.php">Puanlar : <?php echo $paylaspuan ?></a><div style="clear:both"></div>
</div>

