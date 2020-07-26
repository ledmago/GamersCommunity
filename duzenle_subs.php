<?php @session_start();include("ayar.php"); 
if(!isset($_SESSION["email"]))
{@header("Location: index.php"); }
else{
$email = $_SESSION["email"];	
$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 			
$ceza = $uyelers["ceza"];		
if($ceza != 0)	{		
@header("Location: cezahata.php"); 			
}}?>
   





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

    


<div id="yenikonualani" style="
margin-left:auto;
margin-right:auto;
padding-left: 13px;
padding-top: 10px;
background-color: #FFF;
width: 95%;
min-height:300px;
height:auto;


color: #444;
padding-top: 10px;
font-family: 'PT Sans Narrow', sans-serif;

background-color: #ffffff;
box-shadow: 0 1px 2px #c9cccd;
padding-bottom:15px;
">
<div class="iclogo" style="color:#111;font-size:25px;">Düzenle<div style="margin-top:10px"></div>
<form method="post" enctype="multipart/form-data">
<textarea id="noise" name="duzenleicerik" class="widgEditor nothing" style="font-family: 'PT Sans Narrow', sans-serif;">

<?php
$idals = $_GET["id"];

$email_kendi = $_SESSION["email"];

	$sorgus = "SELECT * FROM subs_gonderi WHERE id='$idals'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$email_gonderi = $uyelers["email"];
		
		
		if($email_gonderi == $email_kendi)
		{
		
		
		$cekartik = $_GET["id"];

	$sorgusx = "SELECT * FROM subs_gonderi WHERE id='$idals'";
$admin_sorgusx = mysql_query($sorgusx, $mysqlbaglantisi) or die(mysql_error());
$uyelersx = mysql_fetch_array($admin_sorgusx); 

		$yazdir = $uyelersx["icerik"];
		
		echo $yazdir;
		
		}
		else{
		
		
		@header("Location: index.php");
		
		
		
		}
		?>




</textarea>





<br>
<div style="clear:both"></div>


<br>


<input type="submit" name="duzenle" style="
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


" value="Düzenle">
</form>


</div>



</div>

			<?php
if(isset($_POST["duzenle"]))
{
$idals = $_GET["id"];
$gelencek = $_POST["duzenleicerik"];


$search     = '#(.*?)(?:href="https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch?.*?v=))([\w\-]{10,12}).*#x';
 $replace = $gelencek.'&nbsp;'.'<iframe width="560" height="315" src="http://www.youtube.com/embed/$2" frameborder="0" allowfullscreen></iframe>'.'&nbsp;';
$gelencek      = preg_replace($search,$replace,$gelencek);


mysql_query("SET NAMES UTF8");
mysql_query("UPDATE `subs_gonderi` SET `icerik`='$gelencek' WHERE id='$idals'");

				@header("Location: konu.php?id=$idals?&alan=subs");					


}




?>

</body></html>