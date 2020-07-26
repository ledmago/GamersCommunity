<?php include("header.php");?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Üyeler
            <small>Kayıtlı Üyeler</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Üyeler</a></li>
            <li class="active">Kayıtlı Üyeler</li>
          </ol>
        </section>
		 <section class="content">

         
		           <div class="row">
<section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
             

		  
		  
		  <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Online Üyeler</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
				  
				  
				  <?php 
				  
				   
	
	$time = time();
	$onlinesayac = 0;
$sorgu = mysql_query("SELECT * FROM uyeler2");
while($row = mysql_fetch_array($sorgu)) {
	$kontrol_yazma = $row["email"];
 $son_etkinlik = $row["sontarih"];
 
 if($time - $son_etkinlik < 15) {
	 
	 if($kontrol_yazma != "")
	 {
		 
		 
	 



		
		$id = $row["id"];		
		$emai_uye = $row["email"];	
		$yetki = $row["yetki"];	
		$ad = $row["ad"];	
		$resim2 = $row["resim"];		
		$profilgoster = "'profil.php?id=$id'";	
		echo '	


		   <li>
                      <img src="'.$resim2.'" alt="User Image">
                      <a class="users-list-name" href="profil.php?id='.$id.'">'.$ad.'</a>
                      <span class="users-list-date">';
					  
					  yetkiyazdir($yetki);
					  
					  echo '</span></li>';





		
 }
}
}


// FAKE //


$sorgu = mysql_query("SELECT * FROM uyeler2 ORDER BY RAND() LIMIT 0,21");
while($row = mysql_fetch_array($sorgu)) {
	$kontrol_yazma = $row["email"];
 $son_etkinlik = $row["sontarih"];
 
 if($time - $son_etkinlik > 15) {
	 
	 if($kontrol_yazma != "")
	 {
		 
		 
	 



		
		$id = $row["id"];		
		$emai_uye = $row["email"];	
		$yetki = $row["yetki"];	
		$ad = $row["ad"];	
		$resim2 = $row["resim"];		
		$profilgoster = "'profil.php?id=$id'";	
		echo '	


		   <li>
                      <img src="'.$resim2.'" alt="User Image">
                      <a class="users-list-name" href="profil.php?id='.$id.'">'.$ad.'</a>
                      <span class="users-list-date">';
					  
					  yetkiyazdir($yetki);
					  
					  echo '</span></li>';





		
 }
}
}

				  
				  ?>
				  
                 
                   
                  </ul><!-- /.users-list -->
                </div><!-- /.box-body -->

              </div>
		  
		  
              </div>
		  
		  
		  
		
            </section><!-- /.Left col -->
			   </section>  </div>
			   <?php include("alt.php");include("footer.php");
			   ?>