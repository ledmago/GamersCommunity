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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Fırat Doğan <span class="caret"></span></a>
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
		<div class="col-md-15">
				<div class="panel panel-default">
					<div class="panel-heading">
						Anasayfa
					</div>
					<div class="panel-body">
						<form role="form" method="post">
						<h1> Yetkileri Değiştir </h1>
						
						<div class="form-group">
									<label>Kullanıcının Email Adresi</label>
									<input name="emails" class="form-control" style="max-width:300px;" placeholder="Kullanıcı Email Adresi">
								</div>
								
								<div class="form-group">
									<label>Yetki İsmi</label>
									<select name="yetkisi" class="form-control" style="max-width:300px;">
									<option value="1">Normal Kullanıcı</option>
										<option value="2">Subscriber</option>
											<option value="3"> Moderator</option>
												<option value="4">Admin / Yönetici</option>
												
									</select>
								</div>
						<button type="submit" name="banla"class="btn btn-primary">Değiştir</button>
						
						</form>
						
						<?php 
						if(isset($_POST["banla"]))
						{
						$emailalsana2 = $_POST["emails"];
						$yetkisi = $_POST["yetkisi"];
						mysql_query("UPDATE `uyeler2` SET `yetki`= '$yetkisi' WHERE email = '$emailalsana2'");
						echo "<script>alert('Yetki Güncellendi')</script>";
						}
						
						
						
						?>
		
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
