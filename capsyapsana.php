<?php include("header.php");?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Capsler
            <small>Caps Yap</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>  Capsler</a></li>
            <li class="active">Caps Yap</li>
          </ol>
        </section>
		 <section class="content">

         
		           <div class="row">
<section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
             
<?php
if(!isset($_SESSION["email"]))
{@header("Location: index.php"); }
else{
$email = $_SESSION["email"];	
$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 			
$ceza = $uyelers["ceza"];
$sure = $uyelers["konusuresi"];	
$aboneyimabone = $uyelers["yetki"];
if($ceza != 0)	{		
		echo '<meta http-equiv="refresh" content="0;URL=cezahata.php?">';	
}
else
{

	$time = time();
	if($aboneyimabone > 1)
	{
		

			$time = time();
			if($time - $sure < 60)
			{
				
		echo '<meta http-equiv="refresh" content="0;URL=surehata.php?sure=60">';
			}	
			else
			{
				
				$tarihguncelle = $_SESSION["email"];
$time = time();
    mysql_query("UPDATE uyeler2 SET konusuresi = '$time' WHERE email='$tarihguncelle'");


				
			}
	}
	else
	{
		
			$time = time();
			if($time - $sure < 150)
			{
					echo '<meta http-equiv="refresh" content="0;URL=surehata.php?sure=150">';
		
			}
			else
			{
				
				$tarihguncelle = $_SESSION["email"];
$time = time();
    mysql_query("UPDATE uyeler2 SET konusuresi = '$time' WHERE email='$tarihguncelle'");

				
			}
	}
	
	
	
}


}




?>
			  
			  
		<iframe src="http://cuemk.com/capsyap/" style="width:100%;height:450px;" frameborder="0"></iframe>
              
		</div>
		
              </div>
		  
		  

		  
		
            </section><!-- /.Left col -->
			   </section>  </div>
			   <?php include("alt.php");include("footer.php");
			   ?>