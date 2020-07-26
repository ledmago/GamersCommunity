<?php include("header.php");
$konuphp = 1;

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Konu
            <small>Konu Görünümü</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Konu</a></li>
            <li class="active">Konu Görünümü</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         
		           <div class="row">
            <!-- Left col -->
	
			  </div>
		 
		 
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
	<section class="col-lg-9 connectedSortable">
		 
			  
			
	
	
	
	
	<ul class="timeline">

    <!-- timeline time label -->

    <!-- /.timeline-label -->

	<?php
	$gelenid = $_GET["id"];
	if(!isset($gelenid))
	{
		echo '<meta http-equiv="refresh" content="0;URL=anasayfa.php">';
		
	}
	include("saatayari.php");
	include("rutbesistemi.php");


	mysql_query("SET NAMES UTF8");
	$sorgu = mysql_query("SELECT * FROM mezdeke_gonderi  where id=$gelenid"); 
		
	include("konugoster.php");
	
	?>
    <!-- timeline item -->
   
	
	<li>
        <!-- timeline icon -->
       
    <!-- END timeline item -->


</ul>
	  
	  
	  
	  <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Yapılan Yorumlar</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
				  
				  
				  
				  <?php
				  $konuid = $_GET["id"];
				   $say = 0;
				  $cek = mysql_query("select * from yorum_mezdeke WHERE konuid = '$konuid' ORDER BY id");	
				  while($gonderiq= mysql_fetch_array($cek))    
	{		
$say = 1;
$idyorum = $gonderiq["id"];	
$kendi_email = $_SESSION["email"];
$yorum_email = $gonderiq["email"];	

$yorum_icerik = $gonderiq["icerik"];
$yorum_icerik=strip_tags($yorum_icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
$yorum_icerik = nl2br($yorum_icerik);


$uzunluk = strlen($yorum_icerik);

$sinir = 1000;

if ($uzunluk> $sinir) {
$yorum_icerik = substr($yorum_icerik,0,$sinir). "...";
}
	
	
	
		$yorum_icerik=strip_tags($yorum_icerik,"<b><a><img><br><br/>");
		$yorum_icerik = nl2br($yorum_icerik);			
		$sorgus4 = "SELECT * FROM uyeler2 WHERE email='$yorum_email'";
		$admin_sorgus4 = mysql_query($sorgus4, $mysqlbaglantisi) or die(mysql_error());
		$uyelers4 = mysql_fetch_array($admin_sorgus4); 		
		$yorum_ad= $uyelers4["ad"];	
		$yorum_yetki = $uyelers4["yetki"];		
		$yorum_id = $uyelers4["id"];	
		$yorum_resim = $uyelers4["resim"];		

		
		
		echo '
		
		 <li class="item">
                      <div class="product-img">
                        <img src="'.$yorum_resim.'" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">'.$yorum_ad.'';
						
						
						if($kendi_email == $yorum_email || $uyelers_yetki > 2 )
						{
							$sillink = "window.location = 'yorumsil.php?id=$idyorum&alan=mezdeke'";
							echo '<span class="label label-warning pull-right" onclick="'.$sillink.'">Sil</span>';
						
						}
						
						echo '</a>
                        <span class="product-description">
                          '.$yorum_icerik.'
                        </span>
                      </div>
                    </li><!-- /.item -->
		
		';
		
	}
	
	if($say == 0)
	{
		
		echo "Yorum Yapılmamış";
	}
				  
				  
				  
				  
				  ?>
				  
				  
                   
                    
					
					
					
					
                  </ul>
                </div><!-- /.box-body -->
<!-- /.box-footer -->
              </div>
	  
	  <?php include("alt.php"); ?>

              <!-- Custom tabs (Charts with tabs)-->
              
				
              


             

            </section><!-- /.Left col -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<?php include("sag.php"); ?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
		
      </div><!-- /.content-wrapper -->
	  <?php include("footer.php"); ?>
      