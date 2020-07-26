<?php session_start(); 
include("../ayar.php");
    $function = $_POST['function'];
    
    $log = array();
    
    switch($function) {
    
    	 case('getState'):
        	 if(file_exists('chat.txt')){
               $lines = file('chat.txt');
        	 }
             $log['state'] = count($lines); 
        	 break;	
    	
    	 case('update'):
        	$state = $_POST['state'];
        	if(file_exists('chat.txt')){
        	   $lines = file('chat.txt');
        	 }
        	 $count =  count($lines);
        	 if($state == $count){
        		 $log['state'] = $state;
        		 $log['text'] = false;
        		 
        		 }
        		 else{
        			 $text= array();
        			 $log['state'] = $state + count($lines) - $state;
        			 foreach ($lines as $line_num => $line)
                       {
        				   if($line_num >= $state){
                         $text[] =  $line = str_replace("\n", "", $line);
        				   }
         
                        }
        			 $log['text'] = $text; 
        		 }
        	  
             break;
    	 
    	 case('send'):
		  $nickname = htmlentities(strip_tags($_POST['nickname']));
			 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			  $message = htmlentities(strip_tags($_POST['message']));
		 if(($message) != "\n"){
        	
			 if(preg_match($reg_exUrl, $message, $url)) {
       			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				} 
			 
			 
			 $message  = str_replace( ":D", "<img src='../img/smile.png' style='width: 16px;height: 16px;'>", $message );	
			 $message  = str_replace( "xD", "<img src='../img/smile.png' style='width: 16px;height: 16px;'>", $message );	
			 $message  = str_replace( ":)", "<img src='../img/smile.png' style='width: 16px;height: 16px;'>", $message );	

			 		 $message   = str_replace( "necoVAYNE", "<img src='twitchicon/1.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoGGWP", "<img src='../twitchicon/2.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoREKT", "<img src='../twitchicon/3.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoXPEKI", "<img src='../twitchicon/4.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoSUBHYPE", "<img src='../twitchicon/5.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoBAKLAVA", "<img src='../twitchicon/6.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoSWAG", "<img src='../twitchicon/7.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoVAYNE", "<img src='../twitchicon/1.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoMEZDEKE", "<img src='../twitchicon/8.png' style='width: 20px;height: 20px;'" ,  $message  );	
 $message   = str_replace( "necoKEYF", "<img src='../twitchicon/9.png' style='width: 20px;height: 20px;'" ,  $message  );	
		
		
		
		


			  $accents_search     = array('cen0','o&ccedil;','yarrak','sik','orusbu','anan','ananı','skm','orosbu','ananı sikem','amın','siktir','fuck','madafuck',
'pezevenk','sı&ccedil;tığımın','pezeveng','meme','göt','ananın','sikiyim','sikerim','ibne','skrim','biskrem','sıfatını','piç','piçi','taşak','daşak','amınoğlu','amcığını','yarrağına','oc','amk','sıç','bok','yarak'); 

$accents_replace    = '*****'; 

$message = str_replace($accents_search, $accents_replace, $message);
			  
			  
			  
						
			 
			 $emailal = $_SESSION["email"];

$sorgu6 = "SELECT * FROM uyeler2 WHERE email='$emailal'";
$admin_sorgu6 = mysql_query($sorgu6, $mysqlbaglantisi) or die(mysql_error());
$uyeler6 = mysql_fetch_array($admin_sorgu6);
$yetki = $uyeler6['yetki'];

if($yetki == "2")
{
	 fwrite(fopen('chat.txt', 'a'), "<span style='background-color:#4EA953'>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
	
}
else if($yetki >= 3)
{
	fwrite(fopen('chat.txt', 'a'), "<span style='background-color:#BA3B4E'>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
	
}
else
{
	fwrite(fopen('chat.txt', 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
	
}
			 
			 
        	
        	 
		 }
        	 break;
    	
    }
    
    echo json_encode($log);

?>