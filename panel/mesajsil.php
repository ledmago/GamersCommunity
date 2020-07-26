<?php

include("../ayar.php");

if(isset($_SESSION["email"]))
{
	$getid = $_GET["id"];
		
		mysql_query("DELETE FROM gelenkutusu WHERE id='$getid'");
		
	




	
}
header("Location: mesajgonder.php");
?>