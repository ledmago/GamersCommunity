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
             

		  <div class="box box-solid">
                <div class="box-header">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Dikkat Süre Hatası - <?php echo $_GET["sure"]; ?> Saniye</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6 text-center">
                      <input type="text" class="knob" value="<?php echo $_GET["sure"]; ?>" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#f56954"/>
                      <div class="knob-label">Yeni Konu Açmadan <?php echo $_GET["sure"]; ?> Saniye Beklemen Lazım</div>
                    </div><!-- ./col -->


                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		  
		  
		  
              </div>
		  
		  
		  
		
            </section><!-- /.Left col -->
			   </section>  </div>
			   <?php include("alt.php");include("footer.php");
			   ?>