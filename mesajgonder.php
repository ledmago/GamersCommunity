<?php include("header.php");
if(!isset($_GET["email"]))
{
	@header("Location: anasayfa.php");
	
	
}
$emailgonder = $_GET["email"];


?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Mesaj
            <small> Mesaj Gönder</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Mesaj Gönder</a></li>
          </ol>
        </section>
		 <section class="content">

         
		           <div class="row">
<section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
             

			  
			  
		<iframe src="gelenkutucevapyaz.php?email=<?php echo $emailgonder ?>" style="width:100%;height:450px;" frameborder="0"></iframe>
              
		</div>
		
              </div>
		  
		  

		  
		
            </section><!-- /.Left col -->
			   </section>  </div>
			   <?php include("alt.php");include("footer.php");
			   ?>