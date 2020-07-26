<?
function refer($ref)
{
	if (empty($ref))
	{
		$ref = "Прямая ссылка";
	}

	$fp = fopen("../ref/ref.db","a+");
	$file = file("../ref/ref.db");
	$fp2 = fopen("../ref/refcount.db","a+");
	$file2 = file("../ref/refcount.db");

	for($i=0;$i<=count($file);$i++)
	{
		if(trim($file[$i]) == $ref)
		{
			$file2[$i] = trim($file2[$i]);
			$file2[$i] = $file2[$i]+1;
			$file2[$i] = $file2[$i]."\n";
			fclose($fp2);
			$fp2 = fopen("../ref/refcount.db","w+");
			for($i=0;$i<count($file2);$i++)
			{
				fwrite($fp2,$file2[$i]);
			}
			break;
		}
		if($i == count($file))
		{
			fwrite($fp,$ref."\n");
			fwrite($fp2,"1\n");
		}
	}
	fclose($fp);
	fclose($fp2);
}
?>