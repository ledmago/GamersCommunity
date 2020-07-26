<?

include ("config.php");
include ('resize.php');
$kf1 = $kf2 = 1;
$font = "fonts/".$_POST['font'].".ttf";
if(!file_exists($font))
{
	exit("Нет такого шрифта!");
}

function convert($clr)
{
	$mas[1] = base_convert(substr($clr, 0, 2),16,10);
	$mas[2] = base_convert(substr($clr, 2, 2),16,10);
	$mas[3] = base_convert(substr($clr, 4, 2),16,10);
	return $mas;
}

function win2uni($s)
{
    $s = convert_cyr_string($s,'w','i');
    for ($result='', $i=0; $i<strlen($s); $i++) {
      $charcode = ord($s[$i]);
      $result .= ($charcode>175)?"&#".(1040+($charcode-176)).";":$s[$i];
    }
    return $result;
}
  
function center($font_size,$font_name,$text,$iSrcWidth)
{
    $coord = imagettfbbox($font_size,0,$font_name,$text);
	$width = $coord[2] - $coord[0];
	$iSrcWidth = $iSrcWidth + 60;
	$X = ($iSrcWidth - $width) / 2;
	return $X;
}

function imgtext($text,$font_size,$Y)
{
	global $rImage,$iSrcWidth,$font,$font_color,$border_font;
	$X = center($font_size,$font,$text,$iSrcWidth);
	imagettftext($rImage,$font_size,0,$X,$Y+2,$border_font,$font,$text);
	imagettftext($rImage,$font_size,0,$X,$Y,$font_color,$font,$text);
}

function conf($url,$path,$folder)
{
	global $url,$path,$urls;
	for($i=strlen($url);$url[$i]!='/' or $k==0;$i--)
	{
		$k = $i;
	}
	$j = $k;
	$urls = substr($url,0,$k);
	$url = substr($url,0,$k).$folder;
	for($i=strlen($path);$path[$i]!='/' or $k==0;$i--)
	{
		$k = $i;
	}
	$path = substr($path,0,$k).$folder;
	$k = $k*$j;
	return $k;
}

function obr($t1,$numb)
{
	global $iSrcWidth,$text1,$text2,$text3,$text4,$font_size1,$font_size2,$kf1,$kf2;
	$fl = 0;
	$l1 = strlen($t1);
	for($i=0;$i<$l1;$i++)
	{
		if($t1[$i] == " ")
		{
			$fl = $i;
		}
	}		
	if ($fl == 0)
	{
			$optimal = floor($iSrcWidth/strlen($t1));
			if (($optimal > 99) or ($optimal < 3)) { exit("Слишком большая строка!"); }
			else
			{
				$tmp = "font_size".$numb;
				$$tmp = $optimal;
				return true;
			}
	}
	else
	{
		$count = count($tx1);
		$temp = "";
		for($i=0;$i<$fl;$i++)
		{
			$temp = $temp.$t1[$i];
		}
		$ttext1 = $temp;
		$tmp = "text".$numb;
		$$tmp = win2uni($temp);
		$temp = "";
		for($i = $fl;$i<$l1;$i++)
		{
			$temp = $temp.$t1[$i];
		}
		$tmp = "text".($numb+2);
		$$tmp = $temp." ".$$tmp;
		$$tmp = win2uni($$tmp);
		$tmp = "kf".$numb;
		$$tmp = 2;
		$len1 = strlen($ttext1);
		$tmp = "font_size".$numb;
		if($iSrcWidth < $$tmp*strlen($ttext1))
		{
			$ttext1 = trim($ttext1);
			obr($ttext1,$numb);
		}
		else
		{
			return true;
		}
	}
}

function name($count,$fname)
{
	$arr = array(
	0 => "9", 1 => "a", 2 => "b", 3 => "c", 4 => "d", 5 => "e", 6 => "f", 7 => "g", 8 => "h", 9 => "j", 10 => "k",
	11 => "l", 12 => "m", 13 => "n", 14 => "o", 15 => "p", 16 => "q", 17 => "r", 18 => "s", 19 => "t", 20 => "u",
	21 => "v", 22 => "w", 23 => "x", 24 => "y", 25 => "z", 26 => "A", 27 => "B", 28 => "C", 29 => "D", 30 => "E",
	31 => "F", 32 => "G", 33 => "H", 34 => "J", 35 => "K", 36 => "L", 37 => "M", 38 => "N", 39 => "O", 40 => "P", 
	41 => "Q", 42 => "R", 43 => "S", 44 => "T", 45 => "U", 46 => "V", 47 => "W", 48 => "X", 49 => "Y", 50 => "Z",  
	51 => "0", 52 => "1", 53 => "2", 54 => "3", 55 => "4", 56 => "5", 57 => "6", 58 => "7", 59 => "8");
	if ($count < 60)
	{
		$name =	$arr[$count];
	}
	while($count >= 60)
	{
		$ost = $count%60;
		$count = floor($count/60);
		$name .= $arr[$count];
		$name .= $arr[$ost];
	}
	global $fname;
	$fname = preg_replace("/.*?\./", '', $fname);
	if(($fname == "gif") or ($fname == "jpeg") or ($fname == "jpg") or ($fname == "png"))
	{
		$name .= ".$fname";
		return($name);
	}
	else return 0;
}
	$fname = $_FILES["photo"]["name"];
	$fsize = $_FILES["photo"]["size"];
	$ftype = substr($_FILES['photo']['type'], 0, 5);
	$fp = fopen("count.db","r+");
	$file = file("count.db");
	$count = trim($file[0]);
	$name = name($count,$fname);
	fwrite($fp,$count+1);
	fclose($fp);
	conf($url,$path,$folder);	
	if (!$name)
	{
		exit("Неверный формат");
	}	
	if(is_uploaded_file($_FILES["photo"]["tmp_name"]) and ($ftype == "image"))
	{
		move_uploaded_file($_FILES["photo"]["tmp_name"], "$path".$name);
	} else 
	{
      exit("Ошибка загрузки файла");
	}
	if (!extension_loaded('gd')) 
	{
        exit('GD не установлено. Обратитесь к администратору вашего сайта!');
    }
	
	$t1 = trim($_POST['text1']);
	$t2 = trim($_POST['text2']);
	$text1 = win2uni($t1);
	$text2 = win2uni($t2);
	$text3 = "";
	$text4 = "";
	$font_size1 = $_POST['size1'];
	$font_size2 = $_POST['size2'];
	$new_size = $_POST['size3'];
	$izm = 1;
	if ($new_size < 10)
	{
		$izm = 0;
	}
	$bgc = $_POST['bgcolor'];
	$fntclr = $_POST['fontcolor'];
	$bordclr = $_POST['bordercolor'];
	$fbcolor = $_POST['fbcolor'];
	$font_color = "0x".$fntclr;	
	$bg2 = convert($bordclr);
	$bg = convert($bgc);
	$border_font = "0x".$fbcolor;
    $sOrigImg = $url.$name;
    $aImgInfo = @getimagesize($sOrigImg);
	
    if (is_array($aImgInfo) && count($aImgInfo)) {
        $iSrcWidth = $aImgInfo[0];
        $iSrcHeight = $aImgInfo[1];
		$flag = false;
		if($iSrcWidth < $font_size1*strlen($t1))
		{
			obr($t1,1);
		}
		$flag = false;
		if($iSrcWidth < $font_size2*strlen($t2))
		{
			obr($t2,2);
		}
		$width = $iSrcWidth+70;
		$height = $iSrcHeight+100+$kf1*$font_size1+$kf2*$font_size2+20*($kf1-1)+10*($kf2-1);
        $rImage = imagecreatetruecolor($width, $height);	
		imagealphablending($rImage, true); 
		$bgcol = imagecolorallocate($rImage, $bg[1], $bg[2], $bg[3]); 
		imagefilledrectangle($rImage, 0, 0, $width-1, $height-1, $bgcol);	
        if (($fname == "jpg") or ($fname == "jpeg"))
		{
			$rSrcImage = imagecreatefromjpeg($sOrigImg);
		}
		if ($fname == "gif")
		{
			$rSrcImage = imagecreatefromgif($sOrigImg); 
		}
		if ($fname == "png")
		{
			$rSrcImage = imagecreatefrompng($sOrigImg);
		}
		$bgcol = imagecolorallocate($rImage, $bg2[1], $bg2[2], $bg2[3]);
		imagefilledrectangle($rImage, 27, 27, $iSrcWidth+32, $iSrcHeight+32, $bgcol);
        imagecopy($rImage, $rSrcImage, 30, 30, 0, 0, $iSrcWidth, $iSrcHeight);	
		imgtext($text1,$font_size1,$iSrcHeight+50+$font_size1);
		imgtext($text2,$font_size2,$iSrcHeight+80+$font_size2+$kf1*$font_size1);
		imgtext($text3,$font_size1,$iSrcHeight+60+2*$font_size1);
		imgtext($text4,$font_size2,$iSrcHeight+90+$kf2*$font_size2+$kf1*$font_size1);
		imagePng($rImage, $folder.$name);
    } else {
        echo 'Image error!';
        exit;
    }

	if ( ($izm == 1) AND ($new_size < max($width,$height)) )
	{
		if($width > $height)
		{
			$r = $height/$width;
			$new_width = $new_size;
			$new_height = floor($r*$new_width);
			if (!img_resize($folder.$name, $folder.$name, $new_width, $new_height))
			{ exit('Resize failed!'); }
		}
		if ($height >= $width)
		{
			$r = $width/$height;
			$new_height = $new_size;
			$new_width = floor($r*$new_height);
			if (!img_resize($folder.$name, $folder.$name, $new_width, $new_height))
			{ exit('Resize failed!'); }
		}		
	}		
$adr = $urls."dem/".$name;
print <<<HERE
<html>
<head>
<title>Resime Yazi Yaz</title>
<link rel="stylesheet" type="text/css" href="css.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
  $(function() {
    if ($.browser.msie && $.browser.version.substr(0,1)<7)
    {
      $('.tooltip').mouseover(function(){
            $(this).children('span').show();
          }).mouseout(function(){
            $(this).children('span').hide();
          })
    }
  });
</script>
</head>
<body>
<div class="block">
<div align="center">
  <form action="rezult.php" id="dem" enctype="multipart/form-data" method="post" align="center">
  <table class="font-face">
   <tr><td><label>Fotograf</label></td><td><input type="file" name="photo" accept="image/*" required></td></tr>
   <tr><td><label>Metin 1</label></td><td><input type="text" name="text1" value="$text1" placeholder="Metin 1" required></td></tr>
   <tr><td><label>Metin 2</label></td><td><input type="text" name="text2" value="$text2" placeholder="Metin 2"></td></tr>
   <tr><td><label>Metin 1 Buyuklugu [ 0 - 99 ]</label></td><td><input type="text" name="size1" value="$font_size1" maxlength="2" size="1" pattern="[0-9]{1,2}" required></td></tr>
   <tr><td><label>Metin 2 Buyuklugu [ 0 - 99 ]</label></td><td><input type="text" name="size2" value="$font_size2" maxlength="2" size="1" pattern="[0-9]{1,2}" required></td></tr>
   <tr><td><label>Arka Plan Rengi</label></td><td>#<input type="text" name="bgcolor" value="$bgc" maxlength="6" size="6"></td></tr>
   <tr><td><label>Yazэ Rengi</label></td><td>#<input type="text" name="fontcolor" value="$fntclr" maxlength="6" size="6"></td></tr>
   <tr><td><label>Cerceve Rengi</label></td><td>#<input type="text" name="bordercolor" value="$bordclr" maxlength="6" size="6"></td></tr>
   <tr><td><label>Golge Rengi</label></td><td>#<input type="text" name="fbcolor" value="$fbcolor" maxlength="6" size="6"></td></tr>
   <tr><td><label>Azalma</label></td><td><input type="text" name="size3" maxlength="4" value="$new_size" size="2" pattern="[0-9]{1,4}">&nbsp;px</td></tr>
   <tr><td><label>Font 
<label></td>
   <td>
	<select form="dem" required name="font" >
		<option disabled>Выбор шрифта</option>
		<option value="Rockletter_Simple">Rockletter Simple</option>
		<option value="Times">Times New Roman</option>
		<option selected value="Univers_Medium">Univers Medium</option>
		<option value="Century">Century</option>
		<option value="DSCrystal">DSCrystal</option>
		<option value="Arial">Arial</option>
	</select>
<a href="#" class="tooltip">
  DEMO
  <span><img src="font.gif"></span>
</a>
	</td>
	</tr>
   <tr><td>&nbsp;</td><td><input type="submit" value="EKLE"></td></tr>
  </table>
  </form>
</div>
<div class="sample">
<img src="$adr" alt="" title="">
   <form name="form1" method="get" action="http://zeonnn.com/capspaylas.php">
      <input type="hidden" name="adi" value="$adr"><br>

     <input type="submit" class="sayfabutonu" style="width:100%" value="Capsi Paylas ve Puan Kazan"></form>
   </form>
</div>
</div>
<div class="new"></div>
<div class="tag">
1. Baрlanti; <input type="text" value="$adr" size="70"><br>
2. HTML <input type="text" value='<img src="$adr">' size="70"><br>
3. BBCode <input type="text" value='[img]$adr [/img]' size='70'><br>
</div>
<div class="bottom2">

</div>
</body>
</html>
HERE;


if(isset($_POST["paylas"]))
{
	echo '<meta http-equiv="refresh" content="0;URL='.$adr.'>';
	
}
?>