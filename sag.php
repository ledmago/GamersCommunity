
<style>
/*@media screen and (min-width:1200px) {

#sagtaraf
{
	position: fixed;
  right: 0;
  width: 22%;
	
}}*/

</style>
<section id="sagtaraf" class="col-lg-3 connectedSortable" style="">
              <!-- Custom tabs (Charts with tabs)-->
             
<?php 
if(isset($_SESSION["email"]))
{
	
mysql_query("SET NAMES UTF8");
$sorgus = "SELECT * FROM siteayar WHERE id='1'";
$admin_sorgus = mysql_query($sorgus, $mysqlbaglantisi) or die(mysql_error());
$uyelers = mysql_fetch_array($admin_sorgus); 
$duyuru = $uyelers["duyuru"];
$sitebaslik = $uyelers["sitebaslik"];
$yayinsayaci = $uyelers["yayinsayaci"];	
	
}

?>

<script LANGUAGE="javascript">
function ojidanieNG()
{
var today = new Date();
 
var BigDay = new Date("<?php echo $yayinsayaci  ?>");
var timeLeft = (BigDay.getTime() - today.getTime());
 
var e_daysLeft = timeLeft / 86400000;
var daysLeft = Math.floor(e_daysLeft);



 
var e_hrsLeft = (e_daysLeft - daysLeft)*24;
var hrsLeft = Math.floor(e_hrsLeft);


var e_minsLeft = (e_hrsLeft - hrsLeft)*60;
var minsLeft = Math.floor(e_minsLeft);

daysLeft = daysLeft * 24;
 hrsLeft = hrsLeft + daysLeft;
 
var seksLeft = Math.floor((e_minsLeft - minsLeft)*60);
 
if (BigDay.getTime() > today.getTime() )
document.getElementById("yazdirburaya").innerHTML = hrsLeft+':'+minsLeft+':'+seksLeft+''
else
document.getElementById("yazdirburaya").innerHTML = 'Başladı'
}


setInterval("ojidanieNG()", 50)
</SCRIPT>
			 
			 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Yayın Sayacı</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

		 <h1 style="margin:0;text-align:center;" id="yazdirburaya">&nbsp;</h1>		   
            </div><!-- /.box-body -->
      
          </div><!-- /.box -->
			 
			 
			 			 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kanallar</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

		 <a href="kanal.php?id=haberler">#Haberler</a><br>
		 <a href="kanal.php?id=duyurular">#Duyurular</a><br>
            </div><!-- /.box-body -->
      
          </div><!-- /.box -->
			 
			 
			 
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Online Üyeler</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

		<?php
		/* Online Üyeler*/
include("ayar.php");

    $time = time();
    $uyeemailid = $_SESSION["email"];
    mysql_query("UPDATE uyeler2 SET sontarih = '$time' WHERE email='$uyeemailid'");
	
	
	
	$time = time();
	$onlinesayac = 0;
$sorgu = mysql_query("SELECT * FROM uyeler2");
while($row = mysql_fetch_array($sorgu)) {
 $son_etkinlik = $row["sontarih"];
 
 $kontrol_yazma = $row["email"];
 
 if($kontrol_yazma != "")
	 {
 
 
 if($time - $son_etkinlik < 15) {
// echo $row["k_adi"];
$onlinesayac  = $onlinesayac + 1 ;
 }
	 }
}


echo '<a href="onlineler.php">';
echo $onlinesayac + rand(14, 34);

?> Online Üye</a>
		   
            </div><!-- /.box-body -->
      
          </div><!-- /.box -->
		  
		  
		  
		  
		  <div class="box box-primary">
           
                <div class="box-header">
                  <h3 class="box-title">Popülerler</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>İsim</th>
                      <th style="width: 40px">Puanı</th>
                    </tr>
					
					
					<?php
					$sorgu=mysql_query("SELECT * FROM uyeler2 WHERE ban = '0' Order By paylaspuan DESC limit 15"); 
$siralama = 0;
		while($gonderi = mysql_fetch_array($sorgu)) 
			
			{

				if($siralama < 5)
				{
					$siralama = $siralama  +1;
				$resimal = $gonderi["resim"];
				$ad = $gonderi["ad"];
				$puan = $gonderi["paylaspuan"];
				echo '
				
				<tr>
                      <td>'.$siralama.'</td>
                      <td>'.$ad.'</td>

                      <td><span class="badge bg-red">'.$puan.'</span></td>
                    </tr>';
					
				}
				
			}
					
					?>
                    
                   
				   
					                    <tr>
                      <td colspan="3"><center><a href="#">Devamı</a><center></td>
                     

                      
                    </tr>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div>
		  
		  
		  
		  
            </section><!-- /.Left col -->