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
						<h1> Duyurular </h1>
						<p>Sitede Üst Kısımda Kayan Şeklindeki Duyurular Buradan Değiştirilir</p>
						<div class="form-group">
									<label>Duyuru</label>
									<textarea name="newduyuru" class="form-control" rows="6" ><?php 
						
	$sorgus = "SELECT * FROM siteayar WHERE id='1'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$duyuru = $uyelers["duyuru"];
		echo $duyuru;
		?></textarea>
								</div>
									
						<button type="submit" name="duyurudegis" class="btn btn-primary">Değiştir</button>
						
						</form>
						
						
								<?php 
						if(isset($_POST["duyurudegis"]))
						{
						$newduyuru = $_POST["newduyuru"];
						mysql_query("UPDATE `siteayar` SET `duyuru`= '$newduyuru' WHERE id = '1'");
						echo "<script>alert('Duyuru Değiştirildi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=siteayar.php">';
						}
						
						
						
						?>
						
						<form method="post" role="form">
						<h1> Siteyi Bakıma Al </h1>
						<p>Siteyi Bakıma ALarak Girişi Sadece Üyelere Kapatabilirsniz</p>
						<div class="form-group">
									<label>Bakım Modu</label>
									<select name="bakim" class="form-control" style="max-width:400">
									
									<option value="acik">Modu Aç</option>
									<option value="kapali">Modu Kapat</option>
									
									</select>
								</div>
									
						<button type="submit" name="moddegis" class="btn btn-primary">Değiştir</button>
						
						</form>
						
						
								<?php 
						if(isset($_POST["moddegis"]))
						{
						$bakimmod = $_POST["bakim"];
						mysql_query("UPDATE `siteayar` SET `bakim`= '$bakimmod' WHERE id = '2'");
						echo "<script>alert('Site Modu Güncellendi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=siteayar.php">';
						}
						
						
						
						?>
						<form method="post" role="form">
						<h2>Kullanıcılar Kayıt Olabilsin mi ?</h2>
						<p>Kayıt'ı Açmak ve Kapama Ayarlarını Buradan yapabilirsiniz</p>
						<div class="form-group">
									<label>Bakım Modu</label>
									<select name="kayitdurum" class="form-control" style="max-width:400">
									
									<option value="1">Kayıtı Aç</option>
									<option value="0">Kayıtı Kapat</option>
									
									</select>
								</div>
									
						<button type="submit" name="kayitibuton" class="btn btn-primary">Değiştir</button>
						
						</form>
						
						
								<?php 
						if(isset($_POST["kayitibuton"]))
						{
						$kayitdurumu = $_POST["kayitdurum"];
						mysql_query("UPDATE `siteayar` SET `kayitdurumu`= '$kayitdurumu' WHERE id = '3'");
						echo "<script>alert('Kayıt Durumu Güncellendi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=siteayar.php">';
						}
						
						
						
						?>
						</div>
			</div>
					<a name="sikayetler">	
						<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Subscribers Şikayet Edilen Konular</div>
					
			
						
						
						
								<div class="fixed-table-body"><div class="fixed-table-loading" style="top: 37px; display: none;">Yükleniyor...</div><table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="margin-top: 0px;">
						    <thead style="display: table-header-group;">
						    <tr><th class="bs-checkbox " style="width: 36px; "><div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
							<div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Konuyu Sil</div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Konu Linki<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Şikayet Edenin Email Adresi</div><div class="fht-cell"></div></th></tr>
						    </thead>
						<tbody><tr>
									<?php					
	$cekw = mysql_query("SELECT * FROM `sikayet_subs` ORDER BY id DESC");
     
	 
	 
	
	
	 
    while($yazf = mysql_fetch_array($cekw))
    {
	$idalqq = $yazf["id"];
	$konuacanemail = $yazf["email"];
	$konuid = $yazf["konuid"];
	echo "
	
	
	
						<tr>
						<td><a href='sikayetsilsubs.php?id=$idalqq'>Şikayeti Sil</a></td>
						<td><a href='../konusil.php?id=$konuid&alan=subs' target='_blank'>Konuyu Sil</a> </td>
								<td><a href='../konu.php?id=$konuid&alan=subs' target='_blank'>Konuyu Göster</a> </td>
										<td>	$konuacanemail </td>
						
						
						</tr>
	
	";
	}
	
	
	?>
						
						</tr></tbody></table></div>
						
						
				</div>
			</div>
			
			
			
			
			
			
				<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Mezdeke Team Şikayet Edilen Konular</div>
					
			
						
						
						
								<div class="fixed-table-body"><div class="fixed-table-loading" style="top: 37px; display: none;">Yükleniyor...</div><table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="margin-top: 0px;">
						    <thead style="display: table-header-group;">
						    <tr><th class="bs-checkbox " style="width: 36px; "><div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
							<div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Konuyu Sil</div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Konu Linki<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Şikayet Edenin Email Adresi</div><div class="fht-cell"></div></th></tr>
						    </thead>
						<tbody><tr>
									<?php					
	$cekw = mysql_query("SELECT * FROM `sikayet` ORDER BY id DESC");
     
	 
	 
	
	
	 
    while($yazf = mysql_fetch_array($cekw))
    {
	$idalqq = $yazf["id"];
	$konuacanemail = $yazf["email"];
	$konuid = $yazf["konuid"];
	echo "
	
	
	
						<tr>
						<td><a href='sikayetsil.php?id=$idalqq'>Şikayeti Sil</a></td>
						<td><a href='../konusil.php?id=$konuid&alan=mezdeke' target='_blank'>Konuyu Sil</a> </td>
								<td><a href='../konu.php?id=$konuid&alan=mezdeke' target='_blank'>Konuyu Göster</a> </td>
										<td>	$konuacanemail </td>
						
						
						</tr>
	
	";
	}
	
	
	?>
						
						</tr></tbody></table></div>
						
						
				</div>
			</div>
			
			
			</a>
			
			
			
			
			
			
				
			
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
