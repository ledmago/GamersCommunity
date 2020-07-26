<?php include("header.php");?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Hesap
            <small>Hesap Ayarları</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hesap</a></li>
            <li class="active">Hesap Ayarları</li>
          </ol>
        </section>
		 <section class="content">

         
		           <div class="row">
<section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
             

		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Bilgilerini Değiştir</h3>
                </div>
				<div class="box-body">
				
               <form method="post" enctype="multipart/form-data">
                  <div class="input-group input-group-sm">
                    <input type="file" name="resim" class="form-control">
                    <span class="input-group-btn">
                      <input type="submit" class="btn btn-info btn-flat" name="konuac" type="button" value="Değiştir">
                    </span>
                  </div><!-- /input-group -->
				  </form>
				  <br>
				   <form method="post">
				  
				  <div class="input-group input-group-sm">
                    <input type="password" name="sifredegis" placeholder="Şifre Değiştir" class="form-control">
                    <span class="input-group-btn">
                               <input type="submit" class="btn btn-info btn-flat" name="sifreguncelle" type="button" value="Değiştir">
                    </span>
                  </div><!-- /input-group -->
				  </form>
				  
                </div><!-- /.box-body -->
              </div>  
		</div>
		
              </div>
		  
		  <?php
			$email = $_SESSION["email"];
			/*if(isset($_POST["adguncelle"]))
			{
		
			$yeniisim = $_POST["addegis"];
			mysql_query("SET NAMES UTF8");
			mysql_query("UPDATE `uyeler2` SET `ad`='$yeniisim' WHERE email = '$email'");
			echo "<script>alert('Yeni Adınız Güncellenmiştir')</script>";
			
			}*/
			
						if(isset($_POST["sifreguncelle"]))
			{
		
			$yenisifre = $_POST["sifredegis"];
			mysql_query("SET NAMES UTF8");
			mysql_query("UPDATE `uyeler2` SET `sifre`='$yenisifre' WHERE email = '$email'");
			echo "<script>alert('Yeni Şifreniz Güncellenmiştir'.)</script>";
			
			
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
if(isset($_POST["konuac"]))
{
if($_FILES["resim"]["name"] == "")
{
	echo "<script>alert('Bir Resim Seçermisin Kardeşim, Ne Basıyorsun Resim Seçmeden Huylanıyorum :)')</script>";
}
else
{


 $kaynak         = $_FILES["resim"]["tmp_name"];
    $resim          = $_FILES["resim"]["name"];
    $rtipi         = $_FILES["resim"]["type"];
    $rboyut         = $_FILES["resim"]["size"];
    $ruzanti     = substr($resim, -4);
    $yeniad         = $email;
    $yeniresim      = $yeniad.$ruzanti;
    $dosya = $_POST["email"];
    $hedef          = "avatar";
	$vthedef = "avatar";
	
	if($rboyut < 524288 && ($rtipi =="image/jpeg" || $rtipi =="image/jpg" || $rtipi =="image/png" || $rtipi =="image/pjpeg")){

					$email = $_SESSION["email"];
	$sorgus = "SELECT * FROM uyeler2 WHERE email='$email'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 

	
		$avataral2 = $uyelers["resim"];
		if($avataral2 != "avatar/resimyok.png")
		{
				unlink($avataral2);
		}
	
		
	
	if(@move_uploaded_file($kaynak,$hedef.'/'.$yeniresim))
 {
                $yol = $hedef.'/'.$yeniresim;
				$vtyol = $vthedef.'/'.$yeniresim;
				
				mysql_query("SET NAME UTF8");


				

		
				
				
mysql_query("UPDATE `uyeler2` SET `resim`='$vtyol' WHERE email = '$email'");





 echo "<script> alert('Profil Fotoğrafınız Güncellendi')</script>";

				
                           }
						   else
						   {
										    
						    echo "<script> alert('Yüklediğiniz Resim Çok Büyük Yada Resim Formatında Değil')</script>";

						   }
							
							
}
else
						   {
						   	echo "<script>('girmeidim')</script>";
						   
						    echo "<script> alert('Yüklediğiniz Resim Çok Büyük Yada Resim Formatında Değil')</script>";

						   }

}

}



?>

		  
		
            </section><!-- /.Left col -->
			   </section>  </div>
			   <?php include("alt.php");include("footer.php");
			   ?>