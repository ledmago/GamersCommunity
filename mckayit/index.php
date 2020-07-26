<?php session_start(); 
include("../ayar.php");
if(isset($_SESSION["email"]))
{
 echo "<script>window.location = 'http://zeonnn.com/index.php'</script>";

}

?>

<?php





	$sorgus5 = "SELECT * FROM siteayar WHERE id='3'";
$admin_sorgus5 = mysql_query($sorgus5, $mysqlbaglantisi) or die(mysql_error());
$uyelers5 = mysql_fetch_array($admin_sorgus5); 

	
		$bakim = $uyelers5["kayitdurumu"];
		if($bakim == "0")
		{
		echo "<script>alert('Kayıtlar Kapalı, Lütfen Sonra Tekrar Dene !');</script>";
		echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
		echo '<style>body{display:none}</style>';
		
		}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Kayıt Ol</title>
<link rel="stylesheet" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input:checkbox, input:radio, input:file, select").uniform();
      });
    </script>
</head>
<p><font size="50">zeoNNN Minecraft Kayıt</font></p>
<body style="">
<article>
<form method="post" enctype="multipart/form-data">
	<ul>
	<li>
        	<label for="name">Kullanıcı Adın :</label>
            <input type="text" size="40" name="kadi" maxlength="13" required>
        </li>
        <li>
        	<label for="email">Email Adresin:</label>
            <input type="email" size="40" name="email" required>
        </li>
		        <li>
        	<label for="password">Şifre:</label>
            <input type="password" size="40" name="sifre" required>
        </li>
		    
    <p>
                <button type="submit"  name="kayit" class="right">Kayıt Ol</button>
    </p>
</form>
</article>
<?php
if(isset($_POST["kayit"]))
{


$kadi = $_POST["kadi"];
$sifre = $_POST["sifre"];
$sifre  = mysql_escape_string($sifre);
$sifre = md5($sifre);

$ad = $_POST["name"];

$ad  = mysql_escape_string($ad);

$email = $_POST["email"];
$email  = mysql_escape_string($email);
$cinsiyet  = $_POST["car"];
$cinsiyet  = mysql_escape_string($cinsiyet);
$bilgi = $_POST["message"];
$bilgi  = mysql_escape_string($bilgi);
$dogrulama = $_POST["dogrulama"];
$dogrulama  = mysql_escape_string($dogrulama);




if((($ad == "" || $email == "" || $cinsiyet == "" || $bilgi = "")) && $dogrulama == "14")
{
echo "<script>alert('Lütfen Boş Alan Bırakmayınız, Doğrulama Kısmını Doğru Gİriniz')</script>";

}
else
{



$soxr2 = mysql_query("SELECT * FROM minecraft_uyeler WHERE kadi LIKE '$kadi'");


$soxr = mysql_query("SELECT * FROM minecraft_uyeler WHERE email LIKE '$email'");

 

if ($listele = mysql_fetch_array($soxr)) 
{


 echo "<script> alert('E-Posta Zaten Kullanılıyor')</script>";

}
else if ($listelex = mysql_fetch_array($soxr2)) 
{
	echo "<script> alert('Kullanıcı Adı Zaten Kullanılıyor')</script>";
	
}
else{

if($_FILES["resim"]["name"] == "")
{
mysql_query("SET NAME UTF8");

$x1= rand(1,99999);
$x2= rand(1,99999);
$onay = $x1.$x2;
$onaylink = "http://zeonnn.com/emailonay.php?ref=".$onay."&email=$email";

mysql_query("INSERT INTO `minecraft_uyeler` (`id`, `username`, `password`, `ip`, `lastlogin`, `x`, `y`, `z`, `world`, `email`, `isLogged`) VALUES ('','$kadi','$sifre','','','','','','','$email','')");




 header("Location: http://zeonnn.com/mckayit/kayitbasarili.aspx");
}
else
{



 $kaynak         = $_FILES["resim"]["tmp_name"];
    $resim          = $_FILES["resim"]["name"];
    $rtipi         = $_FILES["resim"]["type"];
    $rboyut         = $_FILES["resim"]["size"];
    $ruzanti     = substr($resim, -4);
    $yeniad         = $email;
    $yeniresim      = $yeniad.$ruzanti;
    $dosya = $_POST["email"];
    $hedef          = "../avatar";
	$vthedef = "avatar";
	if($rboyut < 524288 && ($rtipi =="image/jpeg" || $rtipi =="image/png" || $rtipi =="image/pjpeg")){
	
	if(@move_uploaded_file($kaynak,$hedef.'/'.$yeniresim))
 {
                $yol = $hedef.'/'.$yeniresim;
				$vtyol = $vthedef.'/'.$yeniresim;
				
				mysql_query("SET NAME UTF8");


				$x1= rand(1,99999);
$x2= rand(1,99999);
$onay = $x1.$x2;
$onaylink = "http://zeonnn.com/emailonay.php?ref=".$onay."&email=$email";
mysql_query("INSERT INTO `minecraft_uyeler` (`id`, `username`, `password`, `ip`, `lastlogin`, `x`, `y`, `z`, `world`, `email`, `isLogged`) VALUES ('','$kadi','$sifre','','','','','','','$email','')");







				
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



}
}


?>
