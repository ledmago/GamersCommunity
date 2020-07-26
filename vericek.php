<?php

	$data = file_get_contents("http://www.lolespor.com/sayfa/puanlar");
	$icerik = explode('<ol>',$data);
	$icerikson = explode('</ol>',$icerik[2]);
	preg_match_all('@<span class="sampiyonluk-ligi-viewrow_title">(.*?)</span>@si',$icerikson[0],$takim); 
	preg_match_all('@"foaf:Image" src="(.*?)?itok=@si',$icerikson[0],$resim);
	preg_match_all('@<span class="field-content sampiyonluk-ligi-viewrow_yenilgi">(.*?)</span>@si',$icerikson[0],$yenilgi);
	preg_match_all('@<span class="field-content sampiyonluk-ligi-viewrow_zafer">(.*?)</span>@si',$icerikson[0],$zafer);
 
	@header('charset=utf-8');

	echo '{ "takimlar":[';
	
	for ($i = 0; $i <= 7; $i++) {
		
		echo '{';
		echo '"isim":"'.$takim[1][$i].'",';
		echo '"resim":"'.$resim[1][$i].'",';
		echo '"yenilgi":"'.$yenilgi[1][$i].'",';
		echo '"zafer":"'.$zafer[1][$i].'"';
		if($i==7){
			echo '}';
		}else{
			echo '},';
		}
		
	}

	echo ' ] }';


?>