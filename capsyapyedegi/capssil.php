<?php



$degisken = $_GET["id"];
$parcala = explode('/', $degisken);

$yaz = $parcala [count($parcala )-1];
 $yaz;


unlink("dem/".$yaz);

 echo '<meta http-equiv="refresh" content="0;URL=http://zeonnn.com/capsler.php">';




?>