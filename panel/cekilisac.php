<?php session_start();include("../ayar.php"); 
if(!isset($_SESSION["email"]))
{header("Location: ../index.php"); }
else{
	
	
	
$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki < 3)
	{
	
	header("Location: ../anasayfa.php"); 
	
	
	}

}?>
   





<?php 
session_start();
if(!isset($_SESSION["email"]))
{
header("Location: index.php"); 

}
include("ayar.php"); 
$selam = $_SESSION["email"];
$sorgus1 = "SELECT * FROM uyeler2 WHERE email='$selam'";
$admin_sorgus1 = mysql_query($sorgus1, $mysqlbaglantisi) or die(mysql_error());
$uyelers1 = mysql_fetch_array($admin_sorgus1); 

$idaldedi = $uyelers1["id"];
?>




<html><head>

       <link rel="stylesheet" type="text/css" href="../style.css">

       <META http-equiv=content-type content=text/html;charset=UTF8>

 

 <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>

 <script type="text/javascript" src="../editor/scripts/widgEditor.js"></script>

 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


       <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">

       <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

       <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

       <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>

       

       <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	   
	   
<style type="text/css" media="all">

	@import "..8editor/css/main.css";
	@import "../editor/css/widgEditor.css";
	
	body{background-color:#FFF}
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


input[type=text]{
	
	
	
	
	font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
font-size: 14px;
margin-left: auto;
margin-right: auto;
margin: 5px;
padding: 0 10px;
width: 200px;
height: 34px;
color: #404040;
background: white;
border: 1px solid;
border-color: #c4c4c4 #d1d1d1 #d4d4d4;
border-radius: 2px;
outline: 5px solid #eff4f7;
-moz-outline-radius: 3px;
-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}
	   
	   </style>

    </head>

    <body style="overflow-y:scroll;">

    



<div class="iclogo" style="color:#111;font-size:25px;">Çekiliş Aç<div style="margin-top:10px"></div>

<form method="post">

<input type="text" name="emailleri" placeholder="Çekiliş Başlık" style="width:50%;margin-bottom:10px;">


<textarea id="noise" name="icerik" class="widgEditor nothing" style="font-family: 'PT Sans Narrow', sans-serif;">Yeni Konu Açın, Dikkat ! Spam Yapanlar Ceza Alacaktır</textarea>





<br>





<br>


<input type="submit" name="konuac" style="
width: 200px;
border-radius: 7px;
background: #b6ee65;
text-decoration: center;
border: none;
color: #51771a;

padding: 10px;
outline: none;
font-size: 13px;
border-bottom: 3px solid #307d63;
cursor: pointer;
margin-top:20px;


" value="Mesajı Gönder">
</form>


</div>



</div>

			<?php
if(isset($_POST["konuac"]))
{
$emailler = $_POST["emailleri"];

$icerik = $_POST["icerik"];


$tarih = date('d/m/Y');

mysql_query("SET NAMES UTF8");
mysql_query("insert into cekilisler value('','$emailler','Açık','0','$tarih','$icerik')");

 
 
echo "<script>alert('Çekiliş Aktif')</script>";








}




?>

</body></html>