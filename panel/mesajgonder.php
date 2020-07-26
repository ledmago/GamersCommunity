﻿<?php 
session_start();
include("../ayar.php"); 
if(!isset($_SESSION["email"]))
{

header("Location: index.php"); 

}
else{

$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki < 3)
	{
	
header("Location: ../anasayfa.php"); 
	
	
	}


}





?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kontrol Paneli</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">






/*
Table Style - This is what you want
------------------------------------------------------------------ */
table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child{
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child{
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr{
	text-align: center;
	padding-left:20px;
}
table tr td:first-child{
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table tr td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
	border-bottom:0;
}
table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td{
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

</style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Menü</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Mezdeke ™</span> Kontrol Paneli</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["email"]; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="../index.php"><span class="glyphicon glyphicon-cog"></span> Site</a></li>
							<li><a href="../cikis.php"><span class="glyphicon glyphicon-log-out"></span> Çıkış</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Anasayfa</a></li>
			<li><a href="siteayar.php"><span class="glyphicon glyphicon-th"></span> Site Ayarları</a></li>
			<li><a href="mesajgonder.php"><span class="glyphicon glyphicon-th"></span> Kullanıcıya Mesaj Gönder</a></li>
			<li><a href="kullanicibanla.php"><span class="glyphicon glyphicon-stats"></span> Kullanıcı Banla</a></li>
			<li><a href="cezaver.php"><span class="glyphicon glyphicon-list-alt"></span> Ceza Ver</a></li>
			<li><a href="kullanicilar.php"><span class="glyphicon glyphicon-pencil"></span> Kullanıcıları Görüntüle</a></li>
			<li><a href="yetkiler.php"><span class="glyphicon glyphicon-info-sign"></span> Kullanıcı Yetkilerini</a></li>

			<li role="presentation" class="divider"></li>
			<li><a href="../cikis.php"><span class="glyphicon glyphicon-user"></span> Çıkış</a></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Anasayfa</h1>
			</div>
		</div><!--/.row-->
	<?php include("istatislik.php"); ?>
		
		
						<?php 
						
	$sorgus = "SELECT * FROM siteayar WHERE id='1'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$sitebaslikcek = $uyelers["sitebaslik"];
		$yayinsayaci = $uyelers["yayinsayaci"];

		?>
		
		<div class="col-md-15">
				<div class="panel panel-default">
					<div class="panel-heading">
						Anasayfa
					</div>
					<div class="panel-body">
						<p>Zeonnn Tv Yönetim Paneline Hoşgeldiniz</p>
						
						<!--<h4>Yayın Durumu</h4>
						<form method="post">
						<select name="acikkapali">
						<option value="1">Yayın Açık</option>
						<option value="2">Yayın Kapalı</option>
						</select>
						<button type="submit" name="yayindurumu" class="btn btn-primary">Değiştir</button>
						</form> -->
						
						
		
		
						<h4>Kullanıcılara Özel Mesaj Gönder</h4>
						<iframe src="mesajgonder2.php" frameborder="0" width="100%" scrolling="0" height="600px;"></iframe>
						
						<table cellspacing='0' width="100%"> <!-- cellspacing='0' is important, must stay -->
	<tr><th>Sil</th><th>Sıra</th><th>Mesaj</th></tr><!-- Table Header -->
    
	
	<?php
	include("ayar.php");
	mysql_query("SET NAMES UTF8"); 
	
	$sorgu=mysql_query("SELECT * FROM gelenkutusu WHERE konu = 'yonetim' Order By id DESC"); 
	$sira = 0;
		while($gonderi = mysql_fetch_array($sorgu))   
			{
			$sira = $sira + 1;
			$id = $gonderi["id"];
			$mesaj = $gonderi["mesaj"];
			$ad = $gonderi["ad"];
			$paylaspuan = $gonderi["paylaspuan"];
			echo'<tr><td><a href="mesajsil.php?id='.$id.'">Sil</a></td><td>'.$sira.'</td><td>'.$mesaj .'</td></tr>';
			}
			if($sira <=0)
			{
				echo'<tr><td colspan="3"><center>Gelen Mesajlardan Gösterilecek Yok</center></td></tr>';
				
			}
	
	
	
	
	
	?>


</table>
						
						
						
					</div>
				</div>
			</div>
			
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
