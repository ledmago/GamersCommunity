<?php 
if(!isset($sorgu))
{
	@header("Location: anasayfa.php");
}
while($gonderi = mysql_fetch_array($sorgu))   
			{	$ids = $gonderi["id"];	
		$email_post = $gonderi["email"];	
		$icerik = $gonderi["icerik"];	
		$gosterim = $gonderi["gosterim"];	
		$yenigosterim = $gosterim + 1;
		mysql_query("UPDATE mezdeke_gonderi set gosterim='$yenigosterim' where id='$ids' ");
		
		
		if($icerik != "Birşeyler Yazarak Başlayın...")
		{
		
		
		// Gülücük
						$icerik  = str_replace( ":D", "<img src='img/smile.png' style='width: 19px;height: 19px;min-width: 19px;max-height: 19px;min-height: 19px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
		//Twitch İkonları
$icerik  = str_replace( "necoVAYNE", "<img src='twitchicon/1.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoGGWP", "<img src='twitchicon/2.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoREKT", "<img src='twitchicon/3.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoXPEKI", "<img src='twitchicon/4.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoSUBHYPE", "<img src='twitchicon/5.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoBAKLAVA", "<img src='twitchicon/6.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoSWAG", "<img src='twitchicon/7.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	$icerik  = str_replace( "necoVAYNE", "<img src='twitchicon/1.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoMEZDEKE", "<img src='twitchicon/8.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	
$icerik  = str_replace( "necoKEYF", "<img src='twitchicon/9.png' style='width: 25px;height: 25px;min-width: 25px;max-height: 25px;min-height: 25px;display: inline;margin: 0;padding: 0;margin-right:1px;'>", $icerik );	


					
	
		
		$degismis = str_replace( "<img src=", "<img class='postresim2' src=", $icerik );
		$icerik = $icerik;		
	
		
		$border = $gonderi["sabit"];
		$gonderiid = $gonderi["id"];
		$tarihceksenebe = $gonderi["tarih"];
		$resim = $gonderi["resim"];	
		$kategori = $gonderi["kategori"];
		$begeni = $gonderi["begeni"];	
		
		
		$yorum = $gonderi["yorum"];	
		$sorgus = "SELECT * FROM uyeler2 WHERE email='$email_post'";
		$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());$uyelers = mysql_fetch_array($admin_sorgus); 
		$id = $uyelers["id"];	
		$emai_uye = $uyelers["email"];	
		$yetki = $uyelers["yetki"];
		
		if($yetki >2)
		{

		}else
		{
			
			$icerik  = str_replace( "</div>", "<br>", $icerik );		
		$icerik  = str_replace( "</p>", "<br>", $icerik );
		$icerik=strip_tags($icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
		
		}
			
		
		$cercevepuan = $uyelers["paylaspuan"];
		$ad = $uyelers["ad"];	
		$resim2 = $uyelers["resim"];
		$konusillink = "window.location = 'konusil.php?id=$gonderiid&alan=mezdeke'";
		$cezalink = "window.location = 'cezaver.php?id=$gonderiid'";
		$banlalink = "window.location = 'banla.php?id=$gonderiid'";
		$sabitlelink = "window.location = 'sabitle.php?id=$gonderiid&alan=mezdeke'";
		$sikayetlink = "window.location = 'sikayetet.php?id=$gonderiid&alan=mezdeke'";
		$duzenlelink = "window.location = 'duzenle.php?id=$gonderiid'";
		$konulink = "window.location = 'konu.php?id=$gonderiid'";
		
		$begenilink = "ekleBegeni('".$gonderiid."')";
		
		
		echo '
		
		 <li>
        <!-- timeline icon -->
        <i style="background-image: url('.$resim2.');
  background-size: 100%;left: 10px;width: 45px;
  height: 45px;
 background-repeat:no-repeat;
background-position:center; 
  ';
  
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
            <span class="time">';
			
			if($kategori == "0")
			{
				echo '<a href="kanal.php?id=haberler">#Haberler</a>&nbsp;';
			}
			else if( $kategori == "1")
			{
				
				echo '<a href="haberler.php?id=duyurular">#Duyurular</a>&nbsp;';
			}
			else if($kategori == "2")
			{
				echo '<a href="kanal.php?id=haberler">#Haberler</a>';
				echo '&nbsp;<a href="haberler.php?id=duyurular">#Duyurular</a>';
			}
			else{
				
				
			}
			
			$gosterim = $gosterim / 2;
			echo '<i class="fa fa-clock-o"></i>&nbsp;'.timeConvert($tarihceksenebe).'</span> <span class="time"><i class="fa fa-eye"></i>&nbsp;'.ceil($gosterim).' Görüntülenme</span>

            <h3 class="timeline-header"><a href="profil.php?id='.$id.'">'.$ad.'</a> / ';
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
                <a name="'.$gonderiid.'" id="'.$gonderiid.'" class="btn btn-primary btn-xs" onClick="'.$begenilink.'"><i class="fa fa-heart" style="margin-right:5px"></i>'.$begeni.' - ';
				
				
				$kendiemail23 = $_SESSION["email"];
				$sorgu21 = "SELECT * FROM `begeniler` WHERE `email` = '$kendiemail23' and `konuid` = '$ids'";
$admin_sorgu21 = mysql_query($sorgu21, $mysqlbaglantisi) or die(mysql_error());
$uyeler21 = mysql_fetch_array($admin_sorgu21);
$aha = $uyeler21['konuid'];
$begeniyazdir = $uyeler21["begeni"];
if($aha == "$ids")
{
	echo "Beğenmekten Vazgeç";
}
else{
	
	echo "Beğen";
}
				
				
				
				
				echo '</a>
				 <a class="btn btn-success btn-xs" onClick="'.$konulink.'"><i class="fa fa-comment" style="margin-right:5px"></i>'.$yorum.' - Yorumlar</a>
				
				 ';
				
				
				
				 if($uyelers_yetki >= 3)
				 {
					 
					 echo '
					  <a class="btn btn-warning btn-xs" onClick="'.$duzenlelink .'"><i class="fa fa-pencil" style="margin-right:5px"></i>Düzenle</a>
				 <a class="btn btn-warning btn-xs" onClick="'.$konusillink.'"><i class="fa fa-times-circle" style="margin-right:5px"></i>Konuyu Sil</a>
				 <a class="btn btn-danger btn-xs" onClick="'.$cezalink.'"><i class="fa fa-keyboard-o" style="margin-right:5px"></i>Kullancıya Ceza Ver</a>
				 <a class="btn btn-danger btn-xs" onClick="'.$banlalink.'"><i class="fa fa-frown-o" style="margin-right:5px"></i>Kullancıyı Banla</a>
				 <a class="btn btn-info btn-xs" onClick="'.$sabitlelink.'"><i class="fa fa-level-up" style="margin-right:5px"></i>Konuyu Sabitle</a>';
				 }
				 else{
					 echo ' <a class="btn btn-warning btn-xs" onClick="'.$sikayetlink.'><i class="fa fa-level-up" style="margin-right:5px"></i>Konuyu Şikayet Et</a>';
					 $kendi_email = $_SESSION["email"];
					 if($emai_uye == $kendi_email)
					 {
						 echo ' <a class="btn btn-warning btn-xs" onClick="'.$duzenlelink .'"><i class="fa fa-pencil" style="margin-right:5px"></i>Düzenle</a>
						 <a class="btn btn-warning btn-xs" onClick="'.$konusillink.'"><i class="fa fa-times-circle" style="margin-right:5px"></i>Konuyu Sil</a>';
						 
					 }
				 }
				 
				
				  echo '
				  
				  <form action="yorumla.php" method="post">
				  <div class="input-group" style="margin-top: 10px;">
                    <input class="form-control" type="text" name="yorumicerik" placeholder="Yorum Yaz"/>
					<input  type="hidden" name="idcel" value="'.$gonderiid.'"/>
                    <div class="input-group-btn">
					
                      <input type="submit" name="yorumgonder" value="Yorumla" class="btn btn-success">
					  </form>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  </div>
					  
                    </div><div>
					
				
					';
	
					if(!isset($konuphp))
					{
						
					
					
					
					
					
					echo '<div class="box box-success" style="position: relative;margin-top:10px;">

                <div class="box-body" style="background-color: #F5F5F5;">
                  <ul class="products-list product-list-in-box">
				  
				  
				  
				  
		
		';
		
		
		 
		 //Yorumlar Başlıyo
				  $konuid = $ids;
				   $say = 0;
				   $say2 = 0;
				  $cek = mysql_query("select * from yorum_mezdeke WHERE konuid = '$konuid' ORDER BY id");	
				  while($gonderiq= mysql_fetch_array($cek))    
	{		
$say = 1;

if($say2<3)
{
$say2++;
$idyorum = $gonderiq["id"];	
$kendi_email = $_SESSION["email"];
$yorum_email = $gonderiq["email"];	

$yorum_icerik = $gonderiq["icerik"];
$yorum_icerik=strip_tags($yorum_icerik,"<b><a><img><br><br/><iframe><li><ul><ol><i>");
$yorum_icerik = nl2br($yorum_icerik);


$uzunluk = strlen($yorum_icerik);

$sinir = 1000;

if ($uzunluk> $sinir) {
$yorum_icerik = substr($yorum_icerik,0,$sinir). "...";
}
	
	
	
		$yorum_icerik=strip_tags($yorum_icerik,"<b><a><img><br><br/>");
		$yorum_icerik = nl2br($yorum_icerik);			
		$sorgus4 = "SELECT * FROM uyeler2 WHERE email='$yorum_email'";
		$admin_sorgus4 = mysql_query($sorgus4, $mysqlbaglantisi) or die(mysql_error());
		$uyelers4 = mysql_fetch_array($admin_sorgus4); 		
		$yorum_ad= $uyelers4["ad"];	
		$yorum_yetki = $uyelers4["yetki"];		
		$yorum_id = $uyelers4["id"];	
		$yorum_resim = $uyelers4["resim"];		

		
		
		echo '
		
		 <li class="item" style="background-color: #F5F5F5;">
                      <div class="product-img">
                        <img src="'.$yorum_resim.'" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="profil.php?id='.$yorum_id.'" class="product-title">'.$yorum_ad.'';
						
						
						if($kendi_email == $yorum_email || $uyelers_yetki > 2 )
						{
							$sillink = "window.location = 'yorumsil.php?id=$idyorum&alan=mezdeke'";
							echo '<span class="label label-warning pull-right" onclick="'.$sillink.'">Sil</span>';
						
						}
						
						echo '</a>
                        <span class="product-description">
                          '.$yorum_icerik.'
                        </span>
                      </div>
                    </li><!-- /.item -->
		
		';
		
	}
	}
	
	if($say == 0)
	{
		
		echo "Yorum Yapılmamış";
	}
				  
				  
				  
				  
				 
				  
		
		
		echo '
		
						  
				  
                   
                    
					
					
					
					
                  </ul>
                </div><!-- /.box-body -->
<!-- /.box-footer -->
              </div>
			  ';
			  
			  }
					echo'
					
					
					
					
					
					
					
                  </div>
            </div>
        </div>
    </li>
		
		';
		
			}
			}
			
			?>