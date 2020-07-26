<?php include("header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Akış
            <small>Güncel Olaylar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Akış</a></li>
            <li class="active">Canlı Akış</li>
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
	$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mezdeke_gonderi"));
	$sayfa_sayisi=$kayit_sayisi['0']/$kacar;if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;	
	mysql_query("SET NAMES UTF8");
	$sorgu = mysql_query("SELECT * FROM mezdeke_gonderi  ORDER BY sabit DESC,id DESC LIMIT $nerden,$kacar"); 
		
	include("konugoster.php");
	
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
      