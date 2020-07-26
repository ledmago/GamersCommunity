<?php
@session_start();

if(!isset($_SESSION["email"]))
{
	@header("Location: index.php");
	
}
else
{
	include("ayar.php");
	$emailyetkisi = $_SESSION["email"];
	$sorgus56 = "SELECT * FROM uyeler2 WHERE email='$emailyetkisi'";
$admin_sorgus56 = mysql_query($sorgus56, $mysqlbaglantisi) or die(mysql_error());
$yetkisi = mysql_fetch_array($admin_sorgus56); 
$uyelers_ad = $yetkisi["ad"];
$uyelers_resim = $yetkisi["resim"];
$uyelers_yetki = $yetkisi["yetki"];
$uyelers_email = $yetkisi["email"];


function yetkiyazdir($yetkiler)
{
	

if($yetkiler == "1")
{
	echo "Kullanıcı";
	
}
else if($yetkiler == "2")
{
	echo"<a><b>Abone</b></a>";
	
}
else if($yetkiler == "3")
{
	echo "<a><b>Moderatör</b></a>";
	
}
else if($yetkiler == "4")
{
	echo"<a><b>Admin / Yetkili</b></a>";
	
}
else{
	
		echo "Kullanıcı";
}
}


	
}


?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <title>Mezdeke Team | Paylaşım Alanı</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="byrei-dyndiv_0.5.css">
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	

	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
	  
	  
	 
      <header class="main-header" id="bildirimyukle">
	  
	  
       
<?php include("veriler.php"); ?>

      </header>
	   <script>  


</script>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
	  
	  
	  
	  
	  <aside class="control-sidebar control-sidebar-dark control-sidebar-open">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-theme-demo-options-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		  
		  <li onclick=" $.get('bildirimtemizle.php');">
		  
		  <a href="#control-sidebar-home-tab" data-toggle="tab">
		 <i class="fa fa-chain-broken"></i>
		 
<script type="text/javascript">
 setInterval(function() {
	 $( "#divyenilebildirim" ).load( "headerbildiryenile.php" );
   }, 4000);

</script>
<i id="divyenilebildirim">
	<?php 
	
	$bildirimleritopla = 0;
$emailneco = $_SESSION["email"];
$sorgu31s=mysql_query("SELECT * FROM bildirimler2 WHERE email='$emailneco' and sayac='0' "); 
		while($gonderi31a = mysql_fetch_array($sorgu31s))   
			{
			$bildirimleritoplaxd = $bildirimleritoplaxd + 1;
			}
			
			
			if($bildirimleritoplaxd == 0)
			{
					echo "<script>document.title='Mezdeke ™ - Paylaşım Platformu '</script>";
			}
			else
			{
					echo ' <span class="label label-danger" style="
    margin-left: 3px;
">'.$bildirimleritoplaxd.'</span>';

	echo "<script>document.title='(".$bildirimleritoplaxd.") Mezdeke ™ - Paylaşım Platformu '</script>";
			}
			
		
			
			?>
			</i>





		
		  
		  </a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading" style="margin: 0;">Son Aktivitelerim</h3>
            <ul class="control-sidebar-menu">
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<?php

			
$email = $_SESSION["email"];
$cek23 = mysql_query("select * from bildirimler2 WHERE email = '$email' or email = 'all' order by id DESC limit 4");	
	
	$sayac = 0;
	$cokguzelsayac = 0;
	while($gonderiq= mysql_fetch_array($cek23))    
	{
		$cokguzelsayac += 1;
		$gelensayac = $gonderiq["sayac"];
		$sayac = $sayac + 1;
		$mesaj = $gonderiq["veritipi"];
		$konuid = $gonderiq["konuid"];
		$konulink = "window.location = 'konu.php?id=$konuid'";	
		
		if($mesaj == "1")
		{
			$mesaj = '
			<li onClick="'.$konulink .'">
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Yorum Yapıldı</h4>
                    <p>Açtığın Konuya Yorum geldi</p>
                  </div>
                </a>
              </li>
			
			';
			
		}
		else if($mesaj == "2")
		{
			$mesaj = '<li>
                <a href="javascript::;">
                  <i class="menu-icon fa  fa-check bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Yayın paylaşım Onayı</h4>
                    <p>Yayın Paylaştığın için teşekkürler : + 5 Puan</p>
                  </div>
                </a>
              </li>';
			
		}
		else if($mesaj == "3")
		{
			$mesaj ='
			<li>
                <a href="javascript::;">
                  <i class="menu-icon fa  fa-check bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">'.$konuid.'</h4>
                    <p></p>
                  </div>
                </a>
              </li>
			';
			
		}
		else if($mesaj == "4")
		{
			$mesaj = '
			
				<li onClick="'.$konulink .'">
                <a href="javascript::;">
                  <i class="menu-icon fa fa-thumbs-up bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Yeni Beğeni</h4>
                    <p>Konuna Beğeni geldi</p>
                  </div>
                </a>
              </li>
			';
			
		}
		
		
		if($gelensayac == "1")
		{
			echo '<tr><td>'.$mesaj.'</td></tr>';
			
		}
		else
		{
			echo '<tr class="alt"><td>'.$mesaj.'</td></tr>';
			
		}
		
		
	}
	
	
	if($cokguzelsayac == "0")
	{
		
			echo '
			<li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-meh-o bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Hiç Bildirim Yok</h4>
                    <p>Biraz Daha Aktif Olmaya Gayret Göster</p>
                  </div>
                </a>
              </li>
			
			';
			
		
	}
	
	

?>










			
			
			
			
			
			<li onClick=" window.location = 'bildirimler.php'">
			<a href="javascript::;">
                  
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Tümünü Göster</h4>
                
                  </div>
                </a>
			</li>
			
			
			
            </ul><!-- /.control-sidebar-menu -->

         
            

          </div><div id="control-sidebar-theme-demo-options-tab" class="tab-pane active"><div>
		  
		  
		  
		  
		  
		  
		  
		  <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $uyelers_resim ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $uyelers_ad ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Ara..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
		        <li class="header">ARAÇLAR</li>
				
					<li>
              <a href="indirmeler.php">
                <i class=" fa fa-download"></i> <span>İndirmeler</span>
              </a>
            </li>
			<li>
					<li>
              <a href="sunucular.php">
                <i class="fa fa-tasks"></i> <span>Sunucularımız</span>
              </a>
            </li>
			<li>
				
				
				
		  <?php 
			if($uyelers_yetki > 2)
			{
				echo '
		<li class="header">YÖNETİM ARAÇLARI</li>
			  
			  
				<li>
              <a href="haberekle.php">
                <i class="fa fa-gamepad"></i> <span>Duyuru / Haber Ekle</span>
              </a>
            </li>
           
				<li>
              <a href="panel/">
                <i class="fa fa-thumb-tack"></i> <span>Yönetim Paneli</span>
              </a>
            </li>
				';
				
			}
			
			
			?>
		  
            <li class="header">ANA MENU</li>
           
			
			
			
			
			
			<li>
              <a href="anasayfa.php">
                <i class="fa fa-laptop"></i> <span>Akış</span> <small class="label pull-right bg-green">Açık</small>
              </a>
            </li>
			<li>

              <a href="paylasyayin.php">
                <i class="fa fa-map-marker"></i> <span>Yayını Paylaş</span> 
				
				
				<?php
				
				$url = "https://api.twitch.tv/kraken/streams/zeeoon";
$cekilen_veri = file_get_contents($url);




if (stristr($cekilen_veri, "profile_banner")){
	echo '<small class="label pull-right bg-green">Açık</small>';
}
else{
	
	echo '<small class="label pull-right bg-red">Kapalı</small>';
}
				
				
				?>
				
				
				
              </a>
            </li>
			<li>
              <a href="profil.php">
                <i class="fa fa-user"></i> <span>Profilim</span>
              </a>
            </li>
			<li>
						 <li>
              <a href="hesap.php">
                <i class="fa fa-th"></i> <span>Hesap Ayarları</span>
              </a>
            </li>
			<li>
              <a href="cekilisgoster.php">
                <i class="fa fa-archive"></i> <span>Çekilişler</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
			<li>
              <a href="capsler.php">
                <i class="fa fa-desktop"></i> <span>Capsler</span> <small class="label pull-right bg-green">Paylaşılmış</small>
              </a>
            </li>
			<li>
              <a href="capsyapsana.php">
                <i class="fa fa-camera"></i> <span>Caps Yap</span> <small class="label pull-right bg-green">Yükle</small>
              </a>
            </li>
			
			
			
			
           <li>
              <a href="uyeler.php">
                <i class="fa fa-user"></i> <span>Üyeler</span> <small class="label pull-right bg-green">
				<?php
				
				$bilgi=mysql_query("SELECT COUNT(id) FROM uyeler2 ");
if($bilgi)
{
        $tek=mysql_fetch_array($bilgi);    
        echo $tek[0];
}

				?>
				
				
				</small>
              </a>
            </li>
			<!--<li>
              <a href="capsler.php">
                <i class="fa fa-th"></i> <span>Capsler</span>
              </a>
            </li>-->
            <li>
              <a href="hesap.php">
                <i class="fa fa-th"></i> <span>Hesap Ayarları</span>
              </a>
            </li>
            <li>
              <a target="_blank" href="https://docs.google.com/forms/d/1cWCa5e1_KaCqt-5vYjjkXeWqQKln1yyuRRlUd9kejb4/viewform?edit_requested=true">
                <i class="fa fa-edit"></i> <span>İstek Kutusu</span>
              </a>
            </li>
			 <li>
              <a href="#" onclick="chatac()">
                <i class="fa fa-pencil"></i> <span>Chat</span>
              </a>
            </li>
			 <li>
              <a href="mesajlar.php">
                <i class="fa fa-envelope"></i> <span>Mesajlarım</span>
              </a>
            </li>
            <li>
              <a href="bilgi.php">
                <i class="fa fa-book"></i> <span>Puan Bilgilendirme</span>
              </a>
            </li>
			           <li>
              <a href="cikis.php">
                <i class="fa fa-power-off"></i> <span>Çıkış</span>
              </a>
            </li>
			
			
            
          </ul>
        </section>
		  
		  
		  
		  
		  
		  
		  
		</div></div><!-- /.tab-pane -->

          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">Genel Ayarlar</h3>
              <div class="form-group">
                
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
        <!-- sidebar: style can be found in sidebar.less -->
        
        <!-- /.sidebar -->
      </aside>
  <script>
  function ekleBegeni(ceno)
  {
	 $("#" + ceno).load('begen.php?alan=mezdeke&id=' + ceno);
	  
  }
  function capsbegeni(ceno)
  {
	 $("#" + ceno).load('capsbegen.php?alan=mezdeke&id=' + ceno);
	  
  }
  </script>
<link rel="stylesheet" type="text/css" href="byrei-dyndiv_0.5.css">
<script type="text/javascript" src="byrei-dyndiv_1.0rc1.js"></script>	
<div id="chatkapatxd">
<div id="chat" onClick="chatac()" class="dynDiv_moveDiv" style="z-index:50;position:fixed;background: #0099cc;height: 435px;width:21%;padding:5px;">
 <p style="margin:5px;font-family: 'Oswald', sans-serif;text-align:center;color:#FFF;font-size:20px;">Sohbet / Chat</p>
 <div class="dynDiv_resizeDiv_tl"></div>
 <div class="dynDiv_resizeDiv_tr"></div>
 <div class="dynDiv_resizeDiv_bl"></div>
 <div class="dynDiv_resizeDiv_br"></div>
 <div id="kapat" style="
    position: absolute;    right: 15px;    top: 8px;    background-image: url(http://zeonnn.com/img/kapat.png);    background-size: 100%;    background-repeat: no-repeat;    width: 20px;    height: 20px;    cursor: pointer;
"></div>
<iframe id="chatfirat" src="chatfirat/index.php" style="width: 100%; height: 92%; transition: all 2s; -webkit-transition: all 2s;" frameborder="0" scrolling="0"></iframe>
</div></div>



<div id="altpanel">

<div id="geributon" onClick="javascript:history.go(-1)">< Geri</div>
<div id="ileributon" onClick="javascript:history.go(1)">> İleri</div>
<div id="midbuton" onClick="window.location = 'mobil/giris/' "><i class="fa fa-laptop"></i>  &nbsp;Ana Panel</div>











</div>

<script>

var chatgoster = 0;



function chatac()
{
	
	if(chatgoster == 0)
	{
	

document.getElementById("chat").style.right = "0%";

document.getElementById("chat").style.bottom = "2%";

	document.getElementById("chat").style.width = "21%";
	document.getElementById("chatfirat").style.width = "100%";
	document.getElementById("chatfirat").style.height = "92%";
	document.getElementById("chat").style.opacity = "1";
document.getElementById("chat").style.display = "block";
	chatgoster = 1;
	}
	else
	{

document.getElementById("chat").style.right = "0";

document.getElementById("chat").style.bottom = "0";
	document.getElementById("chat").style.width = "120px";
	document.getElementById("chatfirat").style.width = "0px";
	document.getElementById("chatfirat").style.height = "0px";
	document.getElementById("chat").style.opacity = "0.8";
	document.getElementById("chat").style.display = "none";
	
	chatgoster = 0;
	}
	

	
}

</script>


<script>

document.getElementById("chat").style.right = "0%";

document.getElementById("chat").style.bottom = "2%";

	document.getElementById("chat").style.width = "300px";
	document.getElementById("chatfirat").style.width = "100%";
	document.getElementById("chatfirat").style.height = "400px";
	document.getElementById("chat").style.opacity = "1";
document.getElementById("chat").style.display = "block";
	chatgoster = 1;

</script>
  