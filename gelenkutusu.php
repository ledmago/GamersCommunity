﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Mezdeke Team - Puanlar</title>

<style type="text/css">





body, html  { height: 100%; }
html, body, div, span, applet, object, iframe,
/*h1, h2, h3, h4, h5, h6,*/ p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
}
body { line-height: 1; }
ol, ul { list-style: none; }
blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
:focus { outline: 0; }
del { text-decoration: line-through; }
table {border-spacing: 0; } /* IMPORTANT, I REMOVED border-collapse: collapse; FROM THIS LINE IN ORDER TO MAKE THE OUTER BORDER RADIUS WORK */

/*------------------------------------------------------------------ */

/*This is not important*/
body{
	font-family:Arial, Helvetica, sans-serif;
	margin:0 auto;
	width: 85%;
	
}
a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
a:visited {
	color: #666;
	font-weight:bold;
	text-decoration:none;
}
a:active,
a:hover {
	color: #bd5a35;
	text-decoration:underline;
}


/*
Table Style - This is what you want
------------------------------------------------------------------ */
table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child{
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child{
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr{
	text-align: center;
	padding-left:20px;
}
table tr td:first-child{
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table tr td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
	border-bottom:0;
}
table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td{
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

</style>

</head>

<body>

<table cellspacing='0' width="100%"> <!-- cellspacing='0' is important, must stay -->

	<tr><th>Sil</th><th>Sıra</th><th>Cevap Yaz</th><th>Kimden</th><th>Mesaj</th></tr><!-- Table Header -->
    
	
	<?php
	include("ayar.php");
	

	mysql_query("SET NAMES UTF8"); 
	$cekemail = $_SESSION["email"];
		mysql_query("UPDATE gelenkutusu SET okundu = '1' WHERE konu='$cekemail'");
	
	$sorgu=mysql_query("SELECT * FROM gelenkutusu WHERE konu = '$cekemail' and goster='1' Order By id DESC"); 
	$sira = 0;
		while($gonderi = mysql_fetch_array($sorgu))   
			{
			$sira = $sira + 1;
			$id = $gonderi["id"];
			$emailcekxxx = $gonderi["kimden"];
			$mesaj = $gonderi["mesaj"];
			$ad = $gonderi["ad"];
			$paylaspuan = $gonderi["paylaspuan"];
			
			
			
				if($emailcekxxx != "")
			{
			$sorgus5s = "SELECT * FROM uyeler2 WHERE email='$emailcekxxx'";
$admin_sorgus5s = mysql_query($sorgus5s, $mysqlbaglantisi) or die(mysql_error());
$uyelers5 = mysql_fetch_array($admin_sorgus5s); 

	
		$adyaz = $uyelers5["ad"];
		$idyaz = $uyelers5["id"];
			
			
			
			
			
			
			
					$mesaj=strip_tags($mesaj,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
		$mesaj = nl2br($mesaj);
			echo'<tr><td><a href="mesajsil.php?id='.$id.'">Sil</a></td><td>'.$sira.'</td><td><a href="gelenkutucevapyaz.php?email='.$emailcekxxx.'">Cevap Yaz</a></td><td><a href="profil.php?id='.$idyaz.'">'.$adyaz.'</a></td><td>'.$mesaj .'</td></tr>';
			}
			else
			{
				mysql_query("DELETE FROM gelenkutusu Where id='$id'");
				
				
			}
			
			
			
			
				
			}
			if($sira <=0)
			{
				echo'<tr><td colspan="5"><center>Mesajlardan Gösterilecek Mesajınız Yok</center></td></tr>';
				
			}
	
	
	
	
	
	?>

	<tr><td colspan="5">Cevap Yaz<br>
<form method="post">


<input type="text" style="width:30%;padding:5px;color:#444" placeholder="Email Adresi" name="emailcek2"><br><textarea type="text" style="margin-top:5px;padding:5px;color:#444;width: 50%;height: 70px;" name="yenimesaj">Mesajınız</textarea><br>
<input type="submit" value="Gönder" name="gonderisxd">
</td>

</table>



<?php
if(isset($_POST["gonderisxd"]))
{
	$icerik = $_POST["yenimesaj"];
	$emailcek2 = $_POST["emailcek2"];
	

$icerik  = mysql_escape_string($icerik);
	
	
	$kimden = $_SESSION["email"];
	mysql_query("SET NAMES UTF8");
	mysql_query("INSERT gelenkutusu (id,konu,mesaj,okundu,goster,kimden) VALUE('','$emailcek2','$icerik','0','1','$kimden')");
	echo "<script>alert('Mesajın Gönderildi')</script>";
	
}

?>
</body>
</html>
