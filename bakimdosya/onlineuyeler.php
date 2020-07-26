<?php

include("ayar.php");
/* Online Üyeler*/


    $time = time();
    $uyeemailid = $_SESSION["email"];
    mysql_query("UPDATE uyeler2 SET sontarih = '$time' WHERE email='$uyeemailid'");
	
	
	
	$time = time();
	$onlinesayac = 0;
$sorgu = mysql_query("SELECT * FROM uyeler2");
while($row = mysql_fetch_array($sorgu)) {
 $son_etkinlik = $row["sontarih"];
 
 $kontrol_yazma = $row["email"];
 
 if($kontrol_yazma != "")
	 {
 
 
 if($time - $son_etkinlik < 15) {
// echo $row["k_adi"];
$onlinesayac  = $onlinesayac + 1 ;
 }
	 }
}
$onlinesayac++;
$onlinesayac  = $onlinesayac + 10;
echo "<div id='online' style='float:left;color:red'><a target='content' href='onlineuyegoster.php' style='text-decoration:none;color:red'> - Online Üyeler : ".$onlinesayac.'</a></div>';

?>

