<?php include("header.php");


?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Capsler
            <small>Paylaşılan Capsler</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Capsler</a></li>
            <li class="active">Paylaşılan Capsler</li>
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
		 <form method="post" action="yenikonu.php" enctype="multipart/form-data">
	 <div class='box box-warning'>

                <div class='box-header'>
                  <h3 class='box-title'>Yeni Konu Aç <small>Kolay ve Hızlı</small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                  
                    <textarea name="icerik" class="textarea" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Birşeyler Yazarak Başlayın...</textarea>
                  
                </div>
				
				<div class="timeline-footer">
				<input type="file"  name="resim" class="btn btn-primary" style="
    margin-bottom: 5px;
    margin-right: auto;
    margin-left: auto;
">
                  <input type="submit" name="konuac" class="btn btn-block btn-warning btn-flat" value="Konuyu Aç">
            </div>
				
              </div>	
			  
			
	</form>
	
	
	
	<ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            Paylaşımlar
        </span>
    </li>
    <!-- /.timeline-label -->

	<?php
	include("saatayari.php");
	include("rutbesistemi.php");
	$sayfa=$_GET['sayfa'];if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}$kacar=30;
	$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM capsler"));
	$sayfa_sayisi=$kayit_sayisi['0']/$kacar;if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;	
	mysql_query("SET NAMES UTF8");
	$sorgu = mysql_query("SELECT * FROM capsler  ORDER BY id DESC LIMIT $nerden,$kacar"); 
		
	
while($gonderi = mysql_fetch_array($sorgu))   
			{	$ids = $gonderi["id"];	
		$email_post = $gonderi["email"];	
		$icerik = $gonderi["icerik"];	
		
		// Gülücük
						$icerik  = str_replace( ":D", "<img src='img/smile.png' style='width: 19px;height: 19px;min-width: 19px;max-height: 19px;min-height: 19px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
						
		$icerik  = str_replace( "</div>", "<br>", $icerik );		
		$icerik  = str_replace( "</p>", "<br>", $icerik );
		$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
		$icerik = nl2br($icerik);
		$degismis = str_replace( "<img src=", "<img class='postresim2' src=", $icerik );
		$icerik = $icerik;		
		
		$border = $gonderi["sabit"];
		$gonderiid = $gonderi["id"];
		$tarihceksenebe = $gonderi["tarih"];
		$resim = $gonderi["resim"];	
		$begeni = $gonderi["begeni"];	
		$yorum = $gonderi["yorum"];	
		$sorgus = "SELECT * FROM uyeler2 WHERE email='$email_post'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 
		$id = $uyelers["id"];	
		$emai_uye = $uyelers["email"];	
		$yetki = $uyelers["yetki"];
		$cercevepuan = $uyelers["paylaspuan"];
		$ad = $uyelers["ad"];	
		$resim2 = $uyelers["resim"];
		$konusillink = "window.location = 'capssil.php?id=$gonderiid&alan=mezdeke'";
		$cezalink = "window.location = 'cezaver.php?id=$gonderiid'";
		$banlalink = "window.location = 'banla.php?id=$gonderiid'";
		$sabitlelink = "window.location = 'sabitle.php?id=$gonderiid&alan=mezdeke'";
		$sikayetlink = "window.location = 'sikayetet.php?id=$gonderiid&alan=mezdeke'";
		$konulink = "window.location = 'konu.php?id=$gonderiid'";
		
		$begenilink = "capsbegeni('".$gonderiid."')";
		
		
		echo '
		
		 <li>
        <!-- timeline icon -->
        <i style="background-image: url('.$resim2.');
  background-size: 100%;left: 10px;width: 45px;
  height: 45px;'; 
  if($yetki == 4)
  {
	  echo "border:2px solid rgb(221, 75, 57);";
  }
  else if($yetki == 3)
  {
	  echo "border:2px solid  rgb(0, 166, 90);";
	 
  }
  else if($yetki == 2)
  {
	  echo "border:2px solid  rgb(0, 192, 239);";
	 
  }
  
  echo '" class="fa">';rutbegoster($cercevepuan,$yetki); echo '</i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i>&nbsp;'.timeConvert($tarihceksenebe).'</span>

            <h3 class="timeline-header"><a href="#">'.$ad.'</a> / ';
			yetkiyazdir($yetki);
			
			echo'</h3>

            <div class="timeline-body">
                '.$icerik;
				
				if($resim != "resimyok")
				{
					echo '
					<img src="'.$resim.'" style="display: block;
  max-width: 70%;
  max-height: 400px;
  min-height: 200px;
  margin-top: 10px;
  margin-bottom: 10px;
  webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;">
					';
					
				}
				echo '
				
            </div>

            <div class="timeline-footer">
                <a name="'.$gonderiid.'" id="'.$gonderiid.'" class="btn btn-primary btn-xs" onClick="'.$begenilink.'"><i class="fa fa-heart" style="margin-right:5px"></i>'.$begeni.' - Beğen</a>
				 
				 ';
				
				
				
				 if($uyelers_yetki >= 3)
				 {
					 
					 echo '
				 <a class="btn btn-warning btn-xs" onClick="'.$konusillink.'"><i class="fa fa-times-circle" style="margin-right:5px"></i>Konuyu Sil</a>
				 <a class="btn btn-danger btn-xs" onClick="'.$cezalink.'><i class="fa fa-keyboard-o" style="margin-right:5px"></i>Kullancıya Ceza Ver</a>
				 <a class="btn btn-danger btn-xs" onClick="'.$banlalink.'><i class="fa fa-frown-o" style="margin-right:5px"></i>Kullancıyı Banla</a>
				 <a class="btn btn-info btn-xs" onClick="'.$sabitlelink.'><i class="fa fa-level-up" style="margin-right:5px"></i>Konuyu Sabitle</a>';
				 }
				 else{
					 echo ' <a class="btn btn-warning btn-xs" onClick="'.$sikayetlink.'><i class="fa fa-level-up" style="margin-right:5px"></i>Konuyu Şikayet Et</a>';
					 $kendi_email = $_SESSION["email"];
					 if($emai_uye == $kendi_email)
					 {
						 echo '<a class="btn btn-warning btn-xs" onClick="'.$konusillink.'"><i class="fa fa-times-circle" style="margin-right:5px"></i>Konuyu Sil</a>';
						 
					 }
				 }
				 
				
				  echo '
				  
				  <form action="yorumla.php" method="post">
				  <div class="input-group" style="margin-top: 10px;">
                    <input class="form-control" type="text" name="yorumicerik" placeholder="Yorum Yaz"/>
					<input  type="hidden" name="idcel" value="'.$gonderiid.'"/>
                    <div class="input-group-btn">
					<
                      <input type="submit" name="yorumgonder" value="Yorumla" class="btn btn-success">
					  </form>
                    </div>
                  </div>
            </div>
        </div>
    </li>
		
		';
		
			}
			
	
	?>
    <!-- timeline item -->
   
	
	<li>
        <!-- timeline icon -->
       
    <!-- END timeline item -->


</ul>
	  
	  <div class="box box-primary">
           
            <div class="box-body">

		<center>
					  
					  <button class="btn bg-navy margin">
					  <a href=
					  <?php
					  $geri = $sayfa - 1;
					  $ileri = $sayfa + 1;
					  
					 echo '<a href=?sayfa='.$geri.' style="color:#FFF;margin-left:5px;"><</a>';
					  for ($i=1; $i<=36; $i++) 
					  {echo '	<a href=?sayfa='.$i.' style="color:#FFF;margin-left:5px;">'.$i.'</a>		 ';		}
				  
				  echo '<a href=?sayfa='.$ileri.' style="color:#FFF;margin-left:5px;">></a>';

				
					?></button>  </a><center>	   
            </div><!-- /.box-body -->
      
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
      