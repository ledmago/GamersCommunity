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
             

		  <form action="uyeara.php" method="GET">
		  <div class="callout callout-success">
                    
                    <h4>	<i class="icon fa fa-check"></i>&nbsp;Üye Ara</h4>
                    <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="icerik2" placeholder="Üye Adı veya Email Yaz">
                    <span class="input-group-btn">
                      <input type="submit" class="btn btn-info btn-flat">Ara</button>
                    </span>
                  </div>
                  </div>
				  </form>
				  
		  <div class="box box-primary">
           
                <div class="box-header">
                  <h3 class="box-title">Üyeler</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tbody><tr>
                      <th style="width: 10px">Resim</th>
                      <th>Yetki</th>
					  <th>İsim</th>
					  <th>Kullanıcı İd</th>
					   <th>Email</th>
                      <th style="width: 40px">Puanı</th>
                    </tr>
					
					
					<?php
					$sayfa=$_GET['sayfa'];
		if ($sayfa=="" || !is_numeric($sayfa)) { $sayfa='1';}
		$kacar=90;
		$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uyeler2"));
		$sayfa_sayisi=$kayit_sayisi['0']/$kacar;
		if ($kayit_sayisi%$kacar!=0) {$sayfa_sayisi++;}$nerden=($sayfa*$kacar)-$kacar;
		mysql_query("SET NAMES UTF8");$sorgu=mysql_query("SELECT * FROM uyeler2 ORDER BY yetki DESC, id LIMIT $nerden,$kacar");
		while($gonderi = mysql_fetch_array($sorgu)) 
			
			{

				$uyeidis = $gonderi["id"];
					
				$resimal = $gonderi["resim"];
				$ad = $gonderi["ad"];
				$uyeemailalsanaxd = $gonderi["email"];
				$puan = $gonderi["paylaspuan"];
				$resim = $gonderi["resim"];
				$yetki =  $gonderi["yetki"];
				$uyeemail =  $gonderi["kadi"];
				if($uyeemail == "")
				{
					$uyeemail = $gonderi["fid"];
					if($uyeemail == "")
					{
						$uyeemail = $gonderi["email"];
					}
					
					
				}
				if($yetki == "1")
				{
					$yetkiyazdir = "Kullanıcı";
					
				}
				else if($yetki == "2")
				{
					$yetkiyazdir = "Abone";
				}
				else if($yetki == "3")
				{
					$yetkiyazdir = "Moderator";
				}
				else if($yetki == "4")
				{
					$yetkiyazdir = "Yetkili / Admin";
				}
				
				echo '
				
				<tr>
                      <td><center><img style="  height: 50px;width:100px;  max-width: 50px;
  border-radius: 100%;" src="'.$resim.'"></center></td>
  <td style="  width: 100px;">'.$yetkiyazdir.'</td>
                      <td><a href="profil.php?id='.$uyeidis.'">'.$ad.'</a></td>
<td>'.$uyeemail.'</td>

<td>'.$uyeemailalsanaxd.'</td>

                      <td><span class="badge bg-red">'.$puan.'</span></td>
                    </tr>';
					
				
				
			}
					
					?>
                    
                   
				   
					                    <tr>
                      <td colspan="5"><center>
					  
					  <button class="btn bg-navy margin">
					  <a href=
					  <?php
					  $geri = $sayfa - 1;
					  $ileri = $sayfa + 1;
					  
					 echo '<a href=?sayfa='.$geri.' style="color:#FFF;margin-left:5px;"><</a>';
					  for ($i=1; $i<=$sayfa_sayisi; $i++) 
					  {echo '	<a href=?sayfa='.$i.' style="color:#FFF;margin-left:5px;">'.$i.'</a>		 ';		}
				  
				  echo '<a href=?sayfa='.$ileri.' style="color:#FFF;margin-left:5px;">></a>';

				
					?></button>  </a><center></td>
                     

                      
                    </tr>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div>
		  
		  
		  
		
            </section><!-- /.Left col -->
			   </section>  </div>
			   <?php include("alt.php");include("footer.php");
			   ?>