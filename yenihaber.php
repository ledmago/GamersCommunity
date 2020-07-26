<?php @session_start();include("ayar.php"); 
if(!isset($_SESSION["email"]))
{@header("Location: index.php"); }
else{
$email = "yonetimekibi@zeonnn.com";
$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 			
$ceza = $uyelers["ceza"];
$sure = $uyelers["konusuresi"];	
$aboneyimabone = $uyelers["yetki"];
if($ceza != 0)	{		
@header("Location: cezahata.php"); 			
}
else
{
	
	$time = time();
	if($aboneyimabone > 1)
	{
	

			$time = time();
			if($time - $sure < 1)
			{
			@header("Location: surehata.php?sure=60"); 
		
			}	
	}
	else
	{
		
			$time = time();
			if($time - $sure < 1)
			{
			@header("Location: surehata.php?sure=300"); 
		
			}
	}
	
	
	
}


}?>
   





<?php 
@session_start();
if(!isset($_SESSION["email"]))
{
@header("Location: index.php"); 

}
include("ayar.php"); 
$selam = $_SESSION["email"];
$sorgus1 = "SELECT * FROM uyeler2 WHERE email='$selam'";
$admin_sorgus1 = mysql_query($sorgus1, $mysqlbaglantisi) or die(mysql_error());
$uyelers1 = mysql_fetch_array($admin_sorgus1); 

$idaldedi = $uyelers1["id"];
?>




<html><head>

       <link rel="stylesheet" type="text/css" href="style.css">

       <META http-equiv=content-type content=text/html;charset=UTF8>

 

 <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>

 <script type="text/javascript" src="editor/scripts/widgEditor.js"></script>

 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">

       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>

       

       <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	   
	   
<style type="text/css" media="all">

	@import "editor/css/main.css";
	@import "editor/css/widgEditor.css";
</style>
	   <style>
	   
	   ::-webkit-scrollbar {

    width: 13px;

}

 

::-webkit-scrollbar-track {

    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 

    

    

    border-radius: 10px;

     

}

 

::-webkit-scrollbar-thumb {

    background-color:#111;

    border-radius: 10px;

   

    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 

}
	   
	   </style>

    </head>

    <body style="overflow-y:scroll;">

    



			<?php
if(isset($_POST["konuac"]))
{
	
	$tarih = date('d.m.Y H:i:s');
$tarihsirala = date('Ymd');
$icerik = $_POST["icerik"];



$icerik  = mysql_escape_string($icerik);



      $sorgu6x = "SELECT * FROM uyeler2 WHERE email='".$email."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['paylaspuan'];
$sonbegeni2x = $sonbegeni2x + 5;
mysql_query("UPDATE `uyeler2` SET `paylaspuan`='".$sonbegeni2x."' WHERE `email`='".$email."'");
 
 
 







$email = "yonetimekibi@zeonnn.com";
if($_FILES["resim"]["name"] == "")
{
mysql_query("SET NAMES UTF8");



mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,`kategori`) VALUES ('','$email','$icerik','resimyok','0','0','0','$tarih','$tarihsirala','$acilacakkategori')");

$tarihguncelle = $_SESSION["email"];
$time = time();
    mysql_query("UPDATE uyeler2 SET konusuresi = '$time' WHERE email='$tarihguncelle'");


 echo '<meta http-equiv="refresh" content="0;URL=anasayfa.php">';


}
else
{

	$dizin="photos";

	 $sorgu = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgu = mysql_query($sorgu, $mysqlbaglantisi) or die(mysql_error());
$uyeler = mysql_fetch_array($admin_sorgu);
$id = $uyeler['id'];
if (!file_exists("$dizin/$id ")) { 
$kolustur = mkdir("$dizin/$id", 0777);}


$acilacakkategori = $_POST["kategori"];
$videolink = $_POST["videolink"];


 $kaynak         = $_FILES["resim"]["tmp_name"];
    $resim          = $_FILES["resim"]["name"];
    $rtipi         = $_FILES["resim"]["type"];
    $rboyut         = $_FILES["resim"]["size"];
    $ruzanti     = substr($resim, -4);
  $yeniad         = substr(uniqid(md5(rand())), 0,35);
    $yeniresim      = $yeniad.$ruzanti;
    $dosya = $_POST["email"];
    $hedef          = "photos";
	

	
$search     = '#(.*?)(?:href="https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch?.*?v=))([\w\-]{10,12}).*#x';
 $replace = $gelencek.'&nbsp;'.'<iframe width="560" height="315" src="http://www.youtube.com/embed/$2" frameborder="0" allowfullscreen></iframe>'.'&nbsp;';
$videolink        = preg_replace($search,$replace,$videolink);
$videolink = mysql_escape_string($videolink);
	
	$icerik = $icerik.$videolink;

	if($rboyut < 8000000 && ($rtipi =="image/jpeg" || $rtipi =="image/png" || $rtipi =="image/pjpeg")){
	
	if(@move_uploaded_file($kaynak,$hedef.'/'.$id.'/'.$yeniresim))
 {
                $yol = $hedef.'/'.$id.'/'.$yeniresim;

				
				mysql_query("SET NAME UTF8");

				
				
				
				
				
				mysql_query("SET NAMES UTF8");
if($yetki >= 2)
{
$alalal = $_POST["acilacakyer"];
if ( $alalal == "genel" )
{
mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,`kategori`) VALUES ('','$email','$icerik','$yol','0','0','0','$tarih','$tarihsirala','$acilacakkategori')");

}
else if ($alalal == "subscribers")
{
mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,`kategori`) VALUES ('','$email','$icerik','$yol','0','0','0','$tarih','$tarihsirala','$acilacakkategori')");

}
else if($alalal == "herikiside")
{
mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,`kategori`) VALUES ('','$email','$icerik','$yol','0','0','0','$tarih','$tarihsirala','$acilacakkategori')");
mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,`kategori`) VALUES ('','$email','$icerik','$yol','0','0','0','$tarih','$tarihsirala','$acilacakkategori')");
}

}
else{

mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,`kategori`) VALUES ('','$email','$icerik','$yol','0','0','0','$tarih','$tarihsirala','$acilacakkategori')");
}



$tarihguncelle = $_SESSION["email"];
$time = time();
    mysql_query("UPDATE uyeler2 SET konusuresi = '$time' WHERE email='$tarihguncelle'");


 echo '<meta http-equiv="refresh" content="0;URL=anasayfa.php">';

				
				
				
				
				
				
				
				
				
				




				
                           }
						   else
						   {
						   
						    echo "<script> alert('Yüklediğiniz Resim Çok Büyük Yada Resim Formatında Değil')</script>";

						   }
							
							
}
else
						   {
						   
						    echo "<script> alert('Yüklediğiniz Resim Çok Büyük Yada Resim Formatında Değil')</script>";

						   }






}


							


}




?>

</body></html>