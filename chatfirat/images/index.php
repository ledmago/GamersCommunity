<?php session_start(); 
ob_start();

if(isset($_SESSION["email"]))
		{
			
		}else
		{
			
			
			header("Location: ../index.php");
		}



		if(isset($_COOKIE["sesackapa"]))
		{
			
		}else
		{
			
			
			setcookie("sesackapa", "kapa");
		}

include("../ayar.php");

$emailal = $_SESSION["email"];

$sorgu6 = "SELECT * FROM uyeler2 WHERE email='$emailal'";
$admin_sorgu6 = mysql_query($sorgu6, $mysqlbaglantisi) or die(mysql_error());
$uyeler6 = mysql_fetch_array($admin_sorgu6);
$chatisim = $uyeler6['ad'];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
	
	<link rel="shortcut icon" href="img/zeon.ico">

	
	<?php echo '<script type="text/javascript">'; ?>



<?php
if(isset($_COOKIE["sesackapa"]))

{
	
	$kontol2 = $_COOKIE["sesackapa"];
	
	if($kontol2 == "ac")
	{
		
			 echo "$('"; 
echo '<div id="gizle" style="display:hidden">  <audio controls autoplay><source src="horse.ogg" type="audio/ogg"><source src="../img/bildirim.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></div>';
echo "').appendTo('body');";
		
	}
	
	
}
else{
	
	 echo "$('"; 
echo '<div id="gizle" style="display:hidden">  <audio controls autoplay><source src="horse.ogg" type="audio/ogg"><source src="../img/bildirim.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></div>';
echo "').appendTo('body');";
	
	
}

?>



<?php echo '</script>'; ?>
    <?php 
	echo '<script type="text/javascript">
    
        // ask user for name with popup prompt    
        var name = "'.$chatisim.'";'; ?>
		
		</script>
            <script type="text/javascript">
			
			function readCookie(name) {
	var cookiename = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(cookiename) == 0) return c.substring(cookiename.length,c.length);
	}
	return null;
}
			
			
			
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "NecoJunior";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)">

<div id="seskontrol" style="
    width: 100%;
    height: 20px;
    position: absolute;
    text-align: center;
                            "><form method="post"><input type="submit" name="sesolayi" value="Sesi Kapat / Aç"></form></div>
        
        <div id="chat-wrap"><div id="chat-area">
		
		<p><span style="background-color:#4D73AE">NecoChatBot</span><font color="red">Chat Alanına Hoşgeldiniz.</font></p>
		
		</div></div>
        
        <form id="send-message-area">
            
          <center>  <textarea style="width:90%" id="sendie" maxlength = '120' ></textarea></center>
        </form>
    
    </div>
	
	<?php
	if(isset($_POST["sesolayi"]))
	{
		if(isset($_COOKIE["sesackapa"]))
		{
			$kontoroletcookie = $_COOKIE["sesackapa"];
			
			if($kontoroletcookie == "kapa")
			{
				
				setcookie("sesackapa", "ac");
			}
			else
			{
				setcookie("sesackapa", "kapa");
			}
			
			
		}
		else
		{
			
			
			setcookie("sesackapa", "kapa");
		}
		
		
	}
	
	?>

</body>

</html>