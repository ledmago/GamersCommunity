<?php include("header.php");




function rutbegoster2($rutbeemail,$yetki)
{
	
	if($yetki == 3)
	{
		
		echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/6.png">';
		
		
	}
	else if($yetki == 4)
		
		{
			
			echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/7.png">';
			
		}
		else{
		if($rutbeemail < 99)
		{
			echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/1.png">';
			
			
		}
		else if($rutbeemail < 349)
		{
				echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/2.png">';
			
			
		}
		else if($rutbeemail < 649)
		{
				echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/3.png">';
			
			
		}
		else if($rutbeemail < 849)
		{
				echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/4.png">';
			
			
		}
		else if($rutbeemail < 1249)
		{
				echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/5.png">';
			
			
		}
		else if($rutbeemail < 1749)
		{
				echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/6.png">';
			
			
		}
		else if($rutbeemail > 2849)
		{
				echo '<img style="width:50px;float: right;margin-top: 35px;" src="img/rutbe/7.png">';
			
			
		}
		}
	
}

?>


<?php
$profilid = $_GET["id"];

if($profilid == "")
{
	$gelenmail = $_SESSION["email"];
			$sorgus = "SELECT * FROM uyeler2 WHERE email='$gelenmail'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 
		$iduyel = $uyelers["id"];	
	
	$profilid = $iduyel;
}


// --------------------------------------- İSİM ÇEK ------------------------- //

		$sorgus = "SELECT * FROM uyeler2 WHERE id='$profilid'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 
		$profilad = $uyelers["ad"];	
		$profilresim = $uyelers["resim"];
		$profilemail = $uyelers["email"];
		$yetki = $uyelers["yetki"];
		$cercevepuan = $uyelers["paylaspuan"];
		$profilcinsiyet = $uyelers["cinsiyet"];
		
		if($profilcinsiyet == "male")
		{
			$profilcinsiyet = "Erkek";
			
		}
		else{
			
			$profilcinsiyet = "Kadın";
		}

		// --------------------------------------- İSİM ÇEK ------------------------- //

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profil >
            <small><?php echo $profilad  ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Profil</a></li>
            <li class="active"><?php echo $profilad  ?></li>
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
		 
	 <div class='box box-warning'>

                <div class='box-header' style="overflow:hidden;">
                  <h2 class='box-title' style="font-size: 30px;"><img src="<?php echo $profilresim; ?>" style="
    max-width: 100px;
    margin-right: 10px;
    border-radius: 100%;
">

<?php echo $profilad  ?>  </h2>      &nbsp;<font color="#dd4b39" size="4px;"><?php   yetkiyazdir($yetki)  ?> </font><?php rutbegoster2($cercevepuan,$yetki); ?>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                  
                 <span class="label label-danger" style="padding: 10px;font-size: 15px;cursor:pointer;"><i class="fa fa-map-marker"></i> Puan :  <?php echo $cercevepuan ?></span>
				 <span class="label label-warning" style="padding: 10px;font-size: 15px;cursor:pointer;"><i class="fa fa-user"></i> Cinsiyet :  <?php echo $profilcinsiyet ?></span>
				 <span class="label label-success" style="padding: 10px;font-size: 15px;cursor:pointer;" onclick="window.location = 'mesajgonder.php?email=<?php echo $profilemail ?>'"><i class="fa fa-envelope"></i> Mesaj Gönder</span>
				 
				 
				 <br>
                  
                </div>
				
				<div class="timeline-footer">
&nbsp;
            </div>
				
				
				</div>
				
			
			  
			

	
	
	
	<ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            Paylaştıkları
        </span>
    </li>
    <!-- /.timeline-label -->

	<?php
	include("saatayari.php");
	include("rutbesistemi.php");
	$sayfa=$_GET['sayfa'];if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}$kacar=30;
	$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM mezdeke_gonderi where email = '$profilemail'"));
	$sayfa_sayisi=$kayit_sayisi['0']/$kacar;if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;	
	mysql_query("SET NAMES UTF8");
	
	
		$sorgu = mysql_query("SELECT * FROM mezdeke_gonderi  Where  email = '$profilemail' ORDER BY sabit DESC,id DESC LIMIT $nerden,$kacar"); 
		

	
		
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
					  
					 echo '<a href=?id='.$_GET["id"].'&sayfa='.$geri.' style="color:#FFF;margin-left:5px;"><</a>';
					  for ($i=1; $i<=36; $i++) 
					  {echo '	<a href=?id='.$_GET["id"].'&sayfa='.$i.' style="color:#FFF;margin-left:5px;">'.$i.'</a>		 ';		}
				  
				  echo '<a href=?id='.$_GET["id"].'&sayfa='.$ileri.' style="color:#FFF;margin-left:5px;">></a>';

				
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
      