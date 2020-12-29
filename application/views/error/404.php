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

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo $base_url;?>aronox/assets/skins/hor-skin/hor-skin1.css" />
		
		<!-- datatables CSS-->
		<!--link rel="stylesheet" href="my/vendor/datatables/datatables.min.css"-->
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

        </head>
        
        <body class="h-100vh">

        <div class="page ">
            <div class="page-content">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <img src="<?php echo $base_url;?>aronox/assets/images/svgs/not-found.svg" class="construction-img" alt="">
                        </div>
                        <div class="col-xl-6  col-lg-6 col-md-12 ">
                            <div class="display-1 text-primary text-primary-gradient mb-3">400</div>
                            <h1 class="h2  mb-3">Page Not Found</h1>
                            <p class="h4 font-weight-normal mb-6 leading-normal ">Halaman Ini Tidak Tersedia / Sedang Dalam Perbaikan</p>
                            <button class="btn btn-primary-gradient" onclick="goBack()">
                                Back
							</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<button >Go Back</button>

		<script>
		function goBack() {
		window.history.back();
		}
		</script>

	

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

		<script src="<?php echo $base_url;?>aronox/assets/js/apexcharts.js"></script>

					
	<script src="<?php echo $base_url;?>my/vendor/bootstrap/js/moment.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    
	<script src="<?php echo $base_url;?>my/vendor/datatables/datatables.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
	
    <script src="<?php echo $base_url;?>my/vendor/swal2/sweetalert.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/chart.js/Chart.min.js"></script>
	<script src="<?php echo $base_url;?>my/vendor/leaflet/leaflet.js"></script>

	<?php if(@$js_local){ ?>
		<script src="<?= base_url('my/js_local/'.$js_local);?>"></script>
	<?php } ?>
    
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
