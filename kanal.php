<?php include("header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kanallar
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Kanallar</a></li>
         
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
    <li class="time-label">
        <span class="bg-red">
            Haberler / Duyurular
        </span>
    </li>
    <!-- /.timeline-label -->

	<?php
	$lose = 0;
	$kaetgorigelen = $_GET["id"];
	
	if($kaetgorigelen == "haberler")
	{
		$lose = "0";
		
	}
else if($kaetgorigelen == "duyurular")
{
	
	$lose = "1";
}	
	include("saatayari.php");
	include("rutbesistemi.php");
	$sayfa=$_GET['sayfa'];if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}$kacar=30;
	$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mezdeke_gonderi WHERE kategori = '$lose'"));
	$sayfa_sayisi=$kayit_sayisi['0']/$kacar;if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;	
	mysql_query("SET NAMES UTF8");
	

		$sorgu = mysql_query("SELECT * FROM mezdeke_gonderi  WHERE kategori = '$lose' ORDER BY sabit DESC,id DESC LIMIT $nerden,$kacar"); 
		
	
	
		
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
      