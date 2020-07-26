<?php
include("ayar.php");
$emailneco = $_SESSION["email"];
$toplamyazilcak = 0;
$mesajlaritopla = 0;

$sorgu=mysql_query("SELECT * FROM gelenkutusu WHERE konu='$emailneco' and okundu='0' "); 
		while($gonderi = mysql_fetch_array($sorgu))   
			{
			$mesajlaritopla = $mesajlaritopla + 1;
			}
			
			
			
			

$bildirimleritopla = 0;

$sorgu31=mysql_query("SELECT * FROM bildirimler2 WHERE email='$emailneco' and sayac='0' "); 
		while($gonderi31 = mysql_fetch_array($sorgu31))   
			{
			$bildirimleritopla = $bildirimleritopla + 1;
			}
			
			$toplamyazilcak = $bildirimleritopla + $mesajlaritopla;
			

			
		
			
			?>





<!-- <script src="img/bildirim.js"></script> -->




<?php
 if($bildirimleritopla != 0)
 {
	 if(isset($_COOKIE["bildirim"]))
	 {
		 $acaba = $_COOKIE["bildirim"];
		 
		 if($acaba  == "goster" and isset($_SESSION["email"]))
		 {
			 
			  $yaz = "'";
echo '<script>kodDostuBildirim('.$yaz.'Yeni Bildiriminiz Var'.$yaz.','.$yaz.''.$bildirimleritopla.' Adet Yeni Bildiriminiz var'.$yaz.','.$yaz.'http://zeonnn.com/bildirimgoster.php'.$yaz.')</script>';
 
 //ses 
 
echo '<script>var vid = document.getElementById("onlinebildirim");
vid.volume = 0.2;</script>';
 echo "<div id='gizle' style='display:hidden'>  <audio id='onlinebildirim' controls autoplay><source src='../img/bildirim2.mp3' type='audio/mpeg'></audio></div>";
 
 
 setcookie("bildirim", "gosterme");
		 }
		 
	 }
	/*  
	 			  $yaz = "'";
echo '<script>kodDostuBildirim('.$yaz.'Sitemize Hoş Geldiniz'.$yaz.','.$yaz.'Koddostu.com da başka hiçbir yerde bulamayacağınız hazır kodlar edinebilirsiniz.'.$yaz.','.$yaz.'http://koddostu.com'.$yaz.')</script>';
 */
	
	// echo '<script>kodDostuBildirim('.$yaz.'Sitemize Hoş Geldiniz'.$yaz.','.$yaz.'Koddostu.com da başka hiçbir yerde bulamayacağınız hazır kodlar edinebilirsiniz.'.$yaz.','.$yaz.'http://koddostu.com'.$yaz.')</script>';
	 
 
 }
 else
 {
	 
	  
 }





 if($mesajlaritopla != 0)
{}
else
{
	
}

	$sorgusx = "SELECT * FROM uyeler2 WHERE email = '$emailneco'";
$admin_sorgusx = mysql_query($sorgusx, $mysqlbaglantisi) or die(mysql_error());
$uyelersx = mysql_fetch_array($admin_sorgusx); 

	
		$paylaspuan = $uyelersx["paylaspuan"];
		
		include("ayar.php");
/* Online Üyeler*/


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
?>

 <!-- Logo -->
        <a href="index.php" class="logo"><b>Zeonnn</b>.com</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

			          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="mesajlar.php" class="dropdown-toggle">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo $mesajlaritopla ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="bildirimgosterse.php" class="dropdown-toggle">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?php echo $bildirimleritopla ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger"><?php echo $paylaspuan ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><?php echo $paylaspuan ?></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Puanın <?php echo $paylaspuan ?>
                            <small class="pull-right"><?php echo $paylaspuan ?></small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only"><?php echo $paylaspuan ?></span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                     
                </ul>
              </li>
              
			