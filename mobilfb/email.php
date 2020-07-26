<?php
session_start();
include("../ayar.php");

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '605834552881296',
	'secret' => '300b48501065d839253a090a53d8099b'
));

if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl(array('email'));
	header("Location: $loginUrl");
	
}
else{
	
	$api = $facebook->api('me');
	
	
	
	// as

	
		echo  $api[email].$api[gender];;
		



}

?>