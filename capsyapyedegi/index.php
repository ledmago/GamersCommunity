<?

?>
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
<div class="block" align="left">
<div>
  <form action="rezult.php" id="dem" enctype="multipart/form-data" method="post" align="center">
  <table class="font-face">
   <tr><td><label>Fotograf</label></td><td><input type="file" name="photo" accept="image/*" required></td></tr>
   <tr><td><label>Metin 1</label></td><td><input type="text" name="text1" placeholder="Metin 1" required></td></tr>
   <tr><td><label>Metin 2</label></td><td><input type="text" name="text2" placeholder="Metin 2"></td></tr>
   <tr><td><label>Metin 1 Buyuklugu [ 0 - 99 ]</label></td><td><input type="text" name="size1" value="30" maxlength="2" size="1" pattern="[0-9]{1,2}" required></td></tr>
   <tr><td><label>Metin 2 Buyuklugu [ 0 - 99 ]</label></td><td><input type="text" name="size2" value="20" maxlength="2" size="1" pattern="[0-9]{1,2}" required></td></tr>
   <tr><td><label>Arka Plan Rengi<</label></td><td>#<input type="text" name="bgcolor" value="FF0000" maxlength="6" size="6"></td></tr>
   <tr><td><label>Yazý Rengi</label></td><td>#<input type="text" name="fontcolor" value="FFFFFF" maxlength="6" size="6"></td></tr>
   <tr><td><label>Cerceve Rengi</label></td><td>#<input type="text" name="bordercolor" value="000" maxlength="6" size="6"></td></tr>
   <tr><td><label>Golge Rengi</label></td><td>#<input type="text" name="fbcolor" value="000000" maxlength="6" size="6"></td></tr>
   <tr><td><label>Azalma</label></td><td><input type="text" name="size3" maxlength="4" size="2" pattern="[0-9]{1,4}">&nbsp;px</td></tr>
   <tr><td><label>Font
<label></td>
   <td>
	<select form="dem" required name="font" >
		<option disabled>Font Secin</option>
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
<img src="sample.png">
</div>
</div>
<div class="bottom">

</div>
</body>
</html>