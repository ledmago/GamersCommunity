<?php
	include('dbcon.php');
	
	$userip = $_SERVER['REMOTE_ADDR'];
	echo "delete from facebook_posts_comments where c_id ='".$_REQUEST['c_id']."' AND userip ='".$userip."'";
	mysql_query("delete from facebook_posts_comments where c_id ='".$_REQUEST['c_id']."' AND userip ='".$userip."'");
	
?>