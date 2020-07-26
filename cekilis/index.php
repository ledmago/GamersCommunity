<?php session_start();
if(isset($_SESSION["email"]))
{
	
}else
{
	header("Location: ../index.php");
}

include("../ayar.php");

?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">



  <style>
/*! normalize.css v3.0.2 | MIT License | git.io/normalize */html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}h1{font-size:2em;margin:0.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace, monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:bold}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}

</style>

    <style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,600,700);
html {
    background: url(http://upload.robinbrons.com/u/1362757499.png);
}
body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
}
.event {
width: 90%;
height: 80px;
background: #fff;
border: 1px solid #CCC;
border-radius: 2px;
margin: 50px;
}
.event:before {
content: '';
display: block;
width: 99%;
height: 70px;
background: #fff;
border: 1px solid #CCC;
border-radius: 2px;
transform: rotate(2deg);
position: relative;
top: 12px;
left: 2px;
z-index: -1;
}
.event:after {
  content: '';
  display: block;
  width: 295px;
  height: 75px;
  background: #fff;
  border: 1px solid #CCC;
  border-radius: 2px; 
  transform: rotate(-2deg);
  position: relative;
  top: -136px;
  z-index: -2;  
}
.event > span {
  display: block;
  width: 30px;
  background: #232323;  
  position: relative;
  top: -55px;
  left: -15px;

  /* Text */
  color: #fff;
  font-size: 10px;
  padding: 2px 7px;
  text-align: right;
}
.event > .info {
  display: inline-block;
  position: relative;
  top: -75px;
  left: 40px;

  /* Text */
  color: #232323;
  font-weight: 600;
  line-height: 25px;
}
.event > .info:first-line {
  text-transform: uppercase;
  font-size: 10px;
  margin: 10px 0 0 0;
  font-weight: 700;
}
.event > .price {
display: inline-block;
width: 60px;
position: relative;
top: -60px;
/* left: 115px; */
color: #E35354;
text-align: center;
font-weight: 700;
float: right;
  /* Text */
  color: #E35354;
  text-align: center;
  font-weight: 700;
}

.event > .prices {
display: inline-block;
width: 60px;
position: relative;
top: -60px;
/* left: 115px; */
color: #53E396;
text-align: center;
font-weight: 700;
float: right;
  /* Text */
  color: #53E396;
  text-align: center;
  font-weight: 700;
}

img{


display: inline-block;
position: relative;
top: -75px;
left: 40px;
color: #232323;
font-weight: 600;
line-height: 25px;
max-width:32px;
max-height:32px;


}
a
{
text-decoration : none;
color:#232323;
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>
<?php

mysql_query("SET NAMES UTF8");
$sorgu=mysql_query("SELECT * FROM cekilisler ORDER BY id DESC"); 
		while($gonderi = mysql_fetch_array($sorgu))   
			{

		$id = $gonderi["id"];
		$tarih = $gonderi["tarih"];
		$ad = $gonderi["ad"];
		$durum = $gonderi["durumu"];
		$sayac = $gonderi["sayac"];
		echo '
		
		<div class="event">
  <span>#'.$id.'</span>
  <img src="css/hediye.png">
  
  <div class="info">
   '.$tarih.' Katılan Sayısı : '.$sayac.'<br />
    <a href="cekilisdetay.php?id='.$id.'">'.$ad.'</a>
  </div>
 ';
  if($durum == "Açık")
  {
	  echo ' <div class="prices">'.$durum;
	  
  }
  else
  {
	  echo ' <div class="price">'.$durum;
	  
  }
  
  
  echo '
  </div>
</div>
		';
		
		
		
			}



?>
  

</body>

</html>