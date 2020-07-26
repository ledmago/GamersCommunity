<?php
@session_start();

?>

<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
#kisicontent
{
width:100%;
height:60px;
border-bottom:1px solid #CCC;
}
#kisicontent img
{
width:50px;
height:50px;
-webkit-border-radius: 100%;
-moz-border-radius: 100%;
border-radius: 100%;
float:left;
border:1px solid #CCC;


}
.baslik{

font-family: 'Cuprum', sans-serif;
color:rgb(33, 59, 189);
font-size:23px;
float:left;
margin-top:0px;
line-height:50px;
margin-left:10px;
}
.yetkiler
{
font-family: 'Raleway', sans-serif;
color:#333;
float:left;
margin-top:0px;
font-size:15px;
line-height:50px;
margin-left:12px;

}
</style>
</head>
<body>
<?php
if(isset($_SESSION["email"]))
{
	include("ayar.php");
	$konuid = $_GET["id"];
	$sorgu=mysql_query("SELECT * FROM begeniler Where konuid = '$konuid' ORDER BY id DESC"); 
		
	while($gonderi = mysql_fetch_array($sorgu))   
			{
				$email=$gonderi["email"];

				
				
				
				$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
		$uyelers = mysql_fetch_array($admin_sorgus); 
		
		$yetki = $uyelers["yetki"];
		$resim_uye = $uyelers["resim"];
		$text= "Kullanıcı";
		if($yetki == "1")
		{
			$text= "Kullanıcı";
		}
		else if($yetki == "2")
		{
			$text= "Abone";
			
		}
		else if($yetki == "3")
		{
			$text= "Moderatör";
			
		}
		else if($yetki == "4")
		{
			$text= "Yetkili / Admin";
			
		}
		
		$ad_uye = $uyelers["ad"];
				
					echo '
	
	<div id="kisicontent">

<img src="'.$resim_uye.'"><p class="baslik">'.$ad_uye.'</p><p class="yetkiler">'.$text.'</p>
</div>
<div style="clear:both"></div>
	
	
	
	';
				
			}
	
	

	
	
}






?>


</body>
</html>
