<?php
@session_start();
$kadi = "813471742054136";
$_SESSION["email"] = $kadi;
@header("Location: beta/anasayfa.php");



?>