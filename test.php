<?php
$x=5; $y=3; $z=7;
if($x<$z) $y++;
if($x>=$y) $y=--$z;
if ($z>$x) $x=$y++;
echo "$x $y $z $x";
 ?>