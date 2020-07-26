<?php
@session_start();
include("ayar.php");
$emailcektemizle = $_SESSION["email"];
mysql_query("UPDATE bildirimler2 set sayac = '1' where email = '$emailcektemizle'");
?>