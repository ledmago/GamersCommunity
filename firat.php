<?php
include("ayar.php");
$email = $_GET["email"];
$sorgu = mysql_query("SELECT * FROM bildirimler2 WHERE email = '$email' and veritipi ='2'");
$sayactopla = 0;
while($listele = mysql_fetch_array($sorgu))
{
	
	$sayactopla += 5;
	
}
echo $sayactopla;
?>