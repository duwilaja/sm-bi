<?php
$page_title = isset($title)?$title:"";
$base_url = base_url();
$avatar=$session['unit']!=''?$session['unit'].'.png':'sm.png';
$avatar=$base_url.'my/images/'.$avatar;
/*$farr=glob('./uploads/avatars/'.$session['nrp'].'.*');
if(count($farr)>0&&$session['nrp']!=''){
	$avatar=$farr[0];
}*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<!-- Title -->
		<title>Smart Manajemen : <?php echo $page_title?></title>

		<!--Favicon -->
		<link rel="icon" href="<?php echo $base_url;?>aronox/assets/images/brand/favicon.ico" type="image/x-icon"/>

		<!-- Style css -->
		<link href="<?php echo $base_url;?>aronox/assets/css/style.css" rel="stylesheet" />

		<!--Horizontal css -->
        <link id="effect" href="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/dropdown-effects/fade-up.css" rel="stylesheet" />
        <link href="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

		<!---Icons css-->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link href="<?php echo $base_url;?>aronox/assets/plugins/iconfonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo $base_url;?>aronox/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		
		<!-- WYSIWYG Editor css -->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/wysiwyag/richtext.css" rel="stylesheet" />
		
		<!-- Select2 css -->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<link href="<?php echo $base_url;?>aronox/assets/css/apexcharts.css" rel="stylesheet" />

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo $base_url;?>aronox/assets/skins/hor-skin/hor-skin1.css" />
		
		<!-- datatables CSS-->
		<!--link rel="stylesheet" href="my/vendor/datatables/datatables.min.css"-->
		<link href="<?php echo $base_url;?>aronox//assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
		
		<!-- bootstrap CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/bootstrap-datetimepicker.min.css">
		
		<!-- fancybox CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.css">
		
		<!-- leaflet CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/leaflet/leaflet.css">
		
		<!-- overwrite css -->
		<link href="<?php echo $base_url;?>my/css/custom.css" rel="stylesheet" />

		<!-- Owl -->
		<link rel="stylesheet" href="<?=base_url('my/vendor/owl/')?>owl.carousel.min.css">
		<link rel="stylesheet" href="<?=base_url('my/vendor/owl/')?>owl.theme.default.min.css">


		<!-- Tabs css-->
		<link href="<?php echo $base_url;?>aronox/assets/plugins/tabs/style.css" rel="stylesheet" />


		<link href="<?php echo $base_url;?>aronox/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

	</head>

	<body class="app"><!-- Start Switcher -->
		
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="<?php echo $base_url;?>aronox/assets/images/svgs/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
							<div class="header top-header">
					<div class="container">
						<div class="d-flex">
							<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
							<a class="header-brand" href="<?php echo $base_url;?>home">
								<img src="<?php echo $base_url;?>my/images/logo.png" class="header-brand-img desktop-lgo" alt="Aronox logo">
								<img src="<?php echo $base_url;?>my/images/sm.png" class="header-brand-img mobile-logo" alt="Aronox logo">
							</a>

							<div class="d-flex order-lg-2 ml-auto">
								<!--a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a-->
								<div class="dropdown   header-fullscreen" >
									<a  class="nav-link icon full-screen-link"  id="fullscreen-button">
										<i class="mdi mdi-arrow-collapse"></i>
									</a>
								</div>
								
								<div class="dropdown ">
									<a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
									    <div class="profile-details mt-2">
											<span class="mr-3 font-weight-semibold"><?php echo isset($session)?$session['nrp']:""?></span>
											<small class="text-muted mr-3"><?php echo isset($session)?$session['unit']:""?></small>
										</div>
										<img class="avatar avatar-md brround" src="<?php echo $avatar?>" alt="image">
									 </a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<!--a class="dropdown-item" href="<?php echo $base_url?>profile">
											<i class="dropdown-icon mdi mdi-account-outline "></i> My Profile
										</a-->
										<a class="dropdown-item" href="<?php echo $base_url?>login/out">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
		<?php if(!isset($incomplete_profile)){?>
				<!-- Horizontal-menu -->
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="<?php echo $base_url?>home" class=""><i class="fa fa-at"></i> Home</a>
								</li>
								<!-- <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-map-o"></i> Laporan <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="#">Standard</a></li>
										<li aria-haspopup="true"><a href="#">Bulanan</a></li>
										<li aria-haspopup="true"><a href="#">Periodic</a></li>
										<li aria-haspopup="true"><a href="#">Tabulasi Silang</a></li>
									</ul>
								</li> -->
								 <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-file-text"></i> Data <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<!-- <li aria-haspopup="true"><a href="<?=site_url('data/cybercop')?>">Cybercop</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/eri')?>">ERI</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/sdc')?>">SDC</a></li> -->
										<li aria-haspopup="true"><a href="<?=site_url('data/ssc')?>">SSC</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/tmc')?>">TMC</a></li>
										<!-- <li aria-haspopup="true"><a href="<?=site_url('data/etle')?>">ETLE</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/intan')?>">INTAN</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/ais')?>">AIS</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/taa')?>">TAA</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/tarc')?>">TARC</a></li> -->
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-line-chart"></i> Statistic <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="<?=site_url('statistik/trend_data')?>">Trend Data</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('statistik/case_fatality_rate')?>">Case Fatality Rate</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('statistik/fatality_index')?>">Fatality Index</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('statistik/index_kinerja')?>">Indek Kinerja</a></li>
										<!-- <li aria-haspopup="true"><a href="#">Risk Exposure</a></li>
										<li aria-haspopup="true"><a href="#">Ambang Gangguan</a></li> -->
										<li aria-haspopup="true"><a href="<?=site_url('data/ketertiban')?>">Index Ketertiban</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/kecelakaan')?>">Index Kecelakaan</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/keamanan')?>">Index Keamanan</a></li>
										<li aria-haspopup="true"><a href="<?=site_url('data/keselamatan')?>">Index Keselamatan</a></li>
									</ul>
								</li>
								<!-- <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-bullhorn"></i> Action <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="#">Rekomendasi</a></li>
										<li aria-haspopup="true"><a href="#">RSPA</a></li>
										<li aria-haspopup="true"><a href="#">Road Safety Campaign</a></li>
										<li aria-haspopup="true"><a href="#">Literasi Road Safety</a></li>
										<li aria-haspopup="true"><a href="#">Road Safety Program</a></li>
									</ul>
								</li> -->
							</ul>
						</nav>
						<!--Nav end -->
					</div>
				</div>
				<!-- Horizontal-menu end -->
		<?php } ?>

				<div class="app-content page-body">
					<div class="container">
						<?php if(isset($title)){?>
						<!--Page header-->
						<!-- <div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title"><?php echo $page_title?></h4>
							</div>

						</div> -->
						<!--End Page header-->
						<?php
						} ?>
						
						<?php echo $contents;?>
						
					</div>
				</div><!-- end app-content-->
				
			</div>

			<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright ©2020 <a target="_blank" href="http://www. .co.id"> </a>. All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->

		</div>
	
		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- Jquery js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/vendors/jquery-3.4.0.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/vendors/circle-progress.min.js"></script>

		<!--Horizontal js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/horizontal-menu/horizontal.js"></script>

		<!-- P-scroll js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
		
		<!-- Peitychart js-->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/peitychart/jquery.peity.min.js"></script>
		
		<!-- Custom js-->
		<script src="<?php echo $base_url;?>aronox/assets/js/custom.js"></script>
		
		<!-- WYSIWYG Editor js -->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/wysiwyag/jquery.richtext.js"></script>
		
		<!--Select2 js -->
		<script src="<?php echo $base_url;?>aronox/assets/plugins/select2/select2.full.min.js"></script>

		<script src="<?php echo $base_url;?>aronox/assets/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/js/tabs.js"></script>


		<script src="<?php echo $base_url;?>aronox/assets/plugins/charts-c3/d3.v5.min.js"></script>
		<script src="<?php echo $base_url;?>aronox/assets/plugins/charts-c3/c3-chart.js"></script>

					
	<script src="<?php echo $base_url;?>my/vendor/bootstrap/js/moment.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    
	<script src="<?php echo $base_url;?>my/vendor/datatables/datatables.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
	
	<script src="<?php echo $base_url;?>aronox/assets/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="<?php echo $base_url;?>aronox/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo $base_url;?>aronox/assets/js/datatables.js"></script>

	
    <script src="<?php echo $base_url;?>my/vendor/swal2/sweetalert.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/chart.js/Chart.min.js"></script>
	<script src="<?php echo $base_url;?>my/vendor/leaflet/leaflet.js"></script>

	<script src="<?php echo $base_url;?>aronox/assets/js/apexcharts.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>

	<?php if(@$js_local){ ?>
		<script src="<?= base_url('my/js_local/'.$js_local);?>"></script>
	<?php } ?>

	<!-- Owl  -->
	<script src="<?= base_url('my/vendor/owl/owl.carousel.min.js')?>"></script>
	
	
	<script src="https://unpkg.com/@google/markerclustererplus@5.1.0/dist/markerclustererplus.min.js"></script>
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUFXBbjbdO3QWCZHn_HLR4DbTO878fT6E&callback=initMap"></script>
    
	<!-- global vars -->
	<script>
	var ext='';
	var page='';
	var base_url='<?php echo $base_url;?>';
	</script>
	
	<!-- my own custom js -->
	<script src="<?php echo $base_url;?>my/js/custom_dw.js"></script>
	
<!-- this page's JavaScript -->
<script>
$(document).ready(function(){
	page_ready();
	if(typeof(thispage_ready)=='function'){
		thispage_ready();
	}
});
</script>

  </body>
</html>
