<?php

function rutbegoster($rutbeemail,$yetki)
{
	
	if($yetki == 3)
	{
		
		echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/6.png">';
		
		
	}
	else if($yetki == 4)
		
		{
			
			echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/7.png">';
			
		}
		else{
		if($rutbeemail < 99)
		{
			echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/1.png">';
			
			
		}
		else if($rutbeemail < 349)
		{
				echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/2.png">';
			
			
		}
		else if($rutbeemail < 649)
		{
				echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/3.png">';
			
			
		}
		else if($rutbeemail < 849)
		{
				echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/4.png">';
			
			
		}
		else if($rutbeemail < 1249)
		{
				echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/5.png">';
			
			
		}
		else if($rutbeemail < 1749)
		{
				echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/6.png">';
			
			
		}
		else if($rutbeemail > 2849)
		{
				echo '<img style="width:32px;margin-top:55px;" src="img/rutbe/7.png">';
			
			
		}
		}
	
}

?>