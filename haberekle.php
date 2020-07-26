<?php include("header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Haber / Duyuru Ekle
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
		 <form method="post" action="yenihaber.php" enctype="multipart/form-data">
	 <div class='box box-warning'>

                <div class='box-header'>
                  <h3 class='box-title'>Haber / Duyuru Ekle <small>Kolay ve Hızlı</small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                  
                    <textarea name="icerik" class="textarea"  style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Birşeyler Yazarak Başlayın...</textarea>
                  
                </div>
				
				<div class="timeline-footer">
					
			<center><p class="btn btn-primary" style="margin-bottom:10px;">Açılacak Yeri Seçin &nbsp;&nbsp;<select name="select" class="btn btn-secondary" style="
    margin-bottom: 5px;
    margin-right: auto;
    margin-left: auto;
    color: black;
">
<option value="Option 1" selected="">#haberler</option>
<option value="Option 2">#duyuru</option>
<option value="Option 3">İkiside</option>
</select></p></center>
				<input type="file"  name="resim" class="btn btn-primary" style="
    margin-bottom: 10px;
    margin-right: auto;
    margin-left: auto;
">
<center><p class="btn btn-primary" style="margin-bottom:10px;">Youtube Embed Kodu &nbsp;&nbsp;<input type="text" name="videolink" class="btn btn-secondary" style="
    margin-bottom: 5px;
    margin-right: auto;
    margin-left: auto;
    color: black;
	width:300px;
">
</p></center>
                  <input type="submit" name="konuac" class="btn btn-block btn-warning btn-flat" value="Konuyu Aç">
            </div>
				
              </div>	
			  
			
	</form>
	
	
	
	<ul class="timeline">

    <!-- timeline time label -->

    <!-- /.timeline-label -->

	
    <!-- timeline item -->
   
	
	<li>
        <!-- timeline icon -->
       
    <!-- END timeline item -->


</ul>
	  
	
	  
	  <?php include("alt.php"); ?>

              <!-- Custom tabs (Charts with tabs)-->
              
				
              


             

            </section><!-- /.Left col -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<?php include("sag.php"); ?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
		
      </div><!-- /.content-wrapper -->
	  
	  

	  <?php include("footer.php"); ?>
      