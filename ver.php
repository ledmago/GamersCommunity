<?php

@session_start();


session_register("email");
	
$_SESSION["email"] = "Selam";
echo "onay";

print_r($_SESSION);

?>