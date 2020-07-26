		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><a href="sikayetler.php"><?php
						
							$result = mysql_query("SELECT * FROM sikayet");
$num_rows = mysql_num_rows($result);

$result2 = mysql_query("SELECT * FROM sikayet_subs");
$num_rows2 = mysql_num_rows($result);
echo $num_rows + $num_rows2 ;
							
							
							
							
							
							
							?></a></div>
							<div class="text-muted">Şikayet</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-comment glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<a href="../anasayfa.php">
							
							<?php
						
							$result = mysql_query("SELECT * FROM mezdeke_gonderi");
$num_rows = mysql_num_rows($result);

$result2 = mysql_query("SELECT COUNT(*) FROM mezdeke_gonderi;");
$num_rows2 = mysql_num_rows($result);
echo $num_rows2 ;
							
							
							
							
							
							
							?>
							
							</div>
							<div class="text-muted">Toplam İçerik</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-user glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<a href="">
							
							
							<?php
						
							$result = mysql_query("SELECT * FROM uyeler2");
$num_rows = mysql_num_rows($result);


echo $num_rows ;
							
							
							
							
							
							
							?>
							
							</a>
							
							
							
							
							</div>
							<div class="text-muted">Kayıtlı Üye</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-stats glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">1.2k</div>
							<div class="text-muted">Ziyaretçi</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		