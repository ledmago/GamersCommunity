﻿<?php session_start();
include("../ayar.php"); 
if(!isset($_SESSION["email"]))
{

echo '<meta http-equiv="refresh" content="0;URL=../index.php">';

}
else{

$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$yetki = $uyelers["yetki"];
	
	if($yetki < 3)
	{
	echo '<meta http-equiv="refresh" content="0;URL=../anasayfa.php">';

	
	
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
						
						
		
		
		<h4>ÇEKİLİŞLER</h4>
						
						<a href="cekilisac.php" target="_blank" class="btn btn-primary"> ÇEKİLİŞ AÇ</a>
						<a href="cekilisduzenle.php" target="_blank" class="btn btn-primary"> ÇEKİLİŞLERİ DÜZENLE</a>
						<br><br>
						
						
						
						
						
						
						
						
						
						
						
						
						
		
						<h4>Site Başlığı</h4>
						<form role="form" method="post">
						<input type="text" name="sitebaslik" class="form-control" value="<?php echo $sitebaslikcek ?>">
						<br><button type="submit" name="baslik" class="btn btn-primary">Değiştir</button>
						</form>
						
						
								<?php 
						if(isset($_POST["baslik"]))
						{
						$newduyuru = $_POST["sitebaslik"];
						mysql_query("UPDATE `siteayar` SET `sitebaslik`= '$newduyuru' WHERE id = '1'");
						echo "<script>alert('Başlık Kaydedildi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=index.php">';
						}
						
						
						
						?>
						
						
						
						
						<h4>Yayın Sayacı Başlığı</h4>
						<form role="form" method="post">
						<input type="text" name="sitebaslik2" class="form-control" value="<?php echo $yayinsayaci ?>">
						<br><button type="submit" name="baslik2" class="btn btn-primary">Değiştir</button>
						</form>
						
						
								<?php 
						if(isset($_POST["baslik2"]))
						{
						$newduyuru2 = $_POST["sitebaslik2"];
						mysql_query("UPDATE `siteayar` SET `yayinsayaci`= '$newduyuru2' WHERE id = '1'");
						echo "<script>alert('Başlık Kaydedildi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=index.php">';
						}
						
						
						
						?>
						
						
							<h4>Mysql Sorgusu Gir</h4>
						<form role="form" method="post">
						<input type="text" name="sitebaslik3" class="form-control" value="">
						<br><button type="submit" name="baslik3" class="btn btn-primary">Devam</button>
						</form>
						
						
								<?php 
						if(isset($_POST["baslik3"]))
						{
						$newduyuru3 = $_POST["sitebaslik3"];
						mysql_query($newduyuru3);
						echo "<script>alert('Sorgu Gönderildi')</script>";
						}
						
						
						
						?>
						
						<hr style="border-top: 1px solid red;">
							<h4>Puanları Sıfırla</h4>
						<form role="form" method="post">
					
						<br><button type="submit" name="sifirlapuan" class="btn btn-primary">Sıfırla</button>
						</form>
						
						
								<?php 
						if(isset($_POST["sifirlapuan"]))
						{

						mysql_query("UPDATE uyeler2 SET paylaspuan = '0'");

						}
						
						
						
						?>
						<hr style="border-top: 1px solid red;">
						<h4>Chat Geçmişini Sil</h4>
						<form role="form" method="post">
					
						<br><button type="submit" name="sifirlapuanxxx" class="btn btn-primary">Chat Geçmişini Sıfırla (Dikkat Geri Dönüşü yoktur)</button>
						</form>
						
						
								<?php 
						if(isset($_POST["sifirlapuanxxx"]))
						{

						unlink("../chatfirat/chat.txt");

						}
						
						
						
						?>
						
						
							<h4>Chat Geçmişini</h4>
						
						
						
								<?php 
					

						$dosyaAc = fOpen("../chatfirat/chat.txt" , "r");
$dosyaOku = fRead ($dosyaAc , fileSize ("../chatfirat/chat.txt"));

$dosyaOku = str_replace( "</span>", " : ", $dosyaOku );
$dosyaOku=strip_tags($dosyaOku,"<b>");

echo "<textarea style='width:80%; height:120px'>".$dosyaOku."</textarea>";
fClose($dosyaAc);
						

						
						
						
						
						?>
						
						
						<hr style="border-top: 1px solid red;">
						<h4>KULLANICI PUANI</h4>
						<form role="form" method="post">
						<input type="text" name="emailals22" class="form-control" placeholder="Kullanıcı Emaili"><br>
						<input type="text" name="puanlars" class="form-control" placeholder="PUANI"><br>
						<br><button type="submit" name="sifirlapuanxxxqqq" class="btn btn-primary">Puanları Güncelle</button>
						</form>
						
						
								<?php 
						if(isset($_POST["sifirlapuanxxxqqq"]))
						{
							$emailkera = $_POST["emailals22"];
							$puanlarx = $_POST["puanlars"];
							mysql_query("UPDATE uyeler2 SET paylaspuan = '$puanlarx' WHERE email = '$emailkera'");
							echo "<script>alert('Puanlar Güncellendi')</script>";

						}
						
						
						
						?>
					
						
						<br>
							<hr style="border-top: 1px solid red;">
							<br>
						
						
						
						
						<h4>Takvime Olay Ekle</h4>
						<form role="form" method="post">
						<input type="text" name="basliksar" class="form-control" value="Başlık">
						<input type="text" name="basliksar2" class="form-control" value="2015-03-05 19:00">
						<input type="text" name="basliksar3" class="form-control" value="2015-03-06 19:00">
						<br><button type="submit" name="baslikzzzz" class="btn btn-primary">Değiştir</button>
						</form>
						
						
								<?php 
						if(isset($_POST["baslikzzzz"]))
						{
						$basliksar = $_POST["basliksar"];
						$basliksar2 = $_POST["basliksar2"];
						$basliksar3 = $_POST["basliksar3"];
						mysql_query("SET NAMES UTF8");
						mysql_query("insert into takvim  value('','$basliksar','$basliksar2','$basliksar3')");
						echo "<script>alert('Kaydedildi')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=index.php">';
						}
						
						
						
						?>
						
						
						
						<h1>Takvim </h1>
						
								<div class="fixed-table-body"><div class="fixed-table-loading" style="top: 37px; display: none;">Yükleniyor...</div><table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="margin-top: 0px;">
						    <thead style="display: table-header-group;">
						    <tr><th class="bs-checkbox " style="width: 36px; "><div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
							<div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Başlık</div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Başlangıç Tarihi<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div><div class="fht-cell"></div></th><th style="">
							<div class="th-inner sortable">Bitiş Tarihi</div><div class="fht-cell"></div></th></tr>
						    </thead>
						<tbody><tr>
									<?php					
	$cekw = mysql_query("SELECT * FROM `takvim` ORDER BY id DESC");
     
	 
	 
	
	
	 
    while($yazf = mysql_fetch_array($cekw))
    {
		$id = $yazf["id"];
	$baslik = $yazf["baslik"];
	$tarih = $yazf["tarih"];
	$tarihbitis = $yazf["tarihbitis"];
	echo "
	
	
	
						<tr>
						<td><a href='takvimsil.php?id=$id'>Sil</a></td>
						<td>$baslik</td>
								<td>$tarih </td>
										<td>$tarihbitis</td>
						
						
						</tr>
	
	";
	}
	?>
						
						</tr></tbody></table></div>
						
						
						
						
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
