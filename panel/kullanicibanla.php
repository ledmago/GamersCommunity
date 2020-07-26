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
						<h1> Banla </h1>
						
						<div class="form-group">
									<label>Kullanıcının Email Adresi</label>
									<input name="banlatext" class="form-control" style="max-width:300px;" placeholder="Kullanıcı Email Adresi">
								</div>
						<button type="submit" name="banla"class="btn btn-primary">Banla</button>
						
						</form>
						
						<?php 
						if(isset($_POST["banla"]))
						{
						$emailbanla = $_POST["banlatext"];
						mysql_query("UPDATE `uyeler2` SET `ban`= '1' WHERE email = '$emailbanla'");
						echo "<script>alert('Kullanıcıyı Banladınız ( Ban Ban Çiki Çiki Ban Ban')</script>";
						}
						
						
						
						?>
						<form role="form" method="post">
						
								<h1> Ban Aç </h1>
						
						<div class="form-group">
									<label>Kullanıcının Email Adresi</label>
									<input name="banactext" class="form-control" style="max-width:300px;" placeholder="Kullanıcı Email Adresi">
								</div>
						<button type="submit"  name="banac" class="btn btn-primary">Ban Aç</button>
						
						</form>
						
						<?php 
						if(isset($_POST["banac"]))
						{
						$emailbanla = $_POST["banactext"];
						mysql_query("UPDATE `uyeler2` SET `ban`= '0' WHERE email = '$emailbanla'");
						echo "<script>alert('Ban Açıldı')</script>";
						}
						
						
						
						?>
					
					<form role="form" method="post">
					<h1> Kullanıcıyı Sil </h1>
						
						<div class="form-group">
									<label>Kullanıcının Email Adresi</label>
									<input name="banactext1" class="form-control" style="max-width:300px;" placeholder="Kullanıcı Email Adresi">
								</div>
						<button type="submit"  name="banac1" class="btn btn-primary">Sil</button>
						
						</form>
						
						<?php 
						if(isset($_POST["banac1"]))
						{
						$emailbanla = $_POST["banactext1"];
						mysql_query("DELETE FROM `uyeler2` WHERE email = '$emailbanla'");
						mysql_query("DELETE FROM `bildirimler2` WHERE email = '$emailbanla'");
						mysql_query("DELETE FROM `capsler` WHERE email = '$emailbanla'");
						mysql_query("DELETE FROM `gelenkutusu` WHERE konu = '$emailbanla'");
						mysql_query("DELETE FROM `mezdeke_gonderi` WHERE email = '$emailbanla'");
						mysql_query("DELETE FROM `subs_gonderi` WHERE email = '$emailbanla'");
						mysql_query("DELETE FROM `yorum_mezdeke` WHERE email = '$emailbanla'");
						mysql_query("DELETE FROM `yorum_subs` WHERE email = '$emailbanla'");
						echo "<script>alert('Silinidi')</script>";
						}
						
						
						
						?></div>
					
					<h1>Şuan Banlı Kullanıcılar </h1>
						
								<div class="fixed-table-body"><div class="fixed-table-loading" style="top: 37px; display: none;">Yükleniyor...</div><table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="margin-top: 0px;">
						    <thead style="display: table-header-group;">
						   
							<div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Durumu</div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Adı Soyadı<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Email Adresi</div><div class="fht-cell"></div></th></tr>
						    </thead>
						<tbody><tr>
									<?php					
	$cekw = mysql_query("SELECT * FROM `uyeler2` WHERE ban='1' ORDER BY id DESC");
     
	 
	 
	
	
	 
    while($yazf = mysql_fetch_array($cekw))
    {
	$idceza = $yazf["id"];
	$emailal = $yazf["email"];
	$isimal = $yazf["ad"];
	echo "
	
	
	
						<tr>
						
						<td>Şuanda Cezalı</td>
								<td>$isimal</td>
										<td>$emailal</td>
						
						
						</tr>
	
	";
	}
	?>
						
						</tr></tbody></table></div>
					
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
