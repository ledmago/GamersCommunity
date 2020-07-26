<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '605834552881296',
	'secret' => '300b48501065d839253a090a53d8099b'
));

$facebook->destroySession();
header('Location: index.php');
?>