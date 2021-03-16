<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<!-- Title -->
		<title>Smart Manajemen</title>

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
		
		<!-- overwrite css -->
		<link href="<?php echo $base_url;?>my/css/custom.css" rel="stylesheet" />

	</head>

	<body class="app"><!-- Start Switcher -->
		
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="<?php echo $base_url;?>aronox/assets/images/svgs/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
							<div class="container text-center single-page single-pageimage construction-body">
				    <div class="row justify-content-center">
						<div class="col-xl-7 col-lg-6 col-md-12">
							<img src="<?php echo $base_url;?>aronox/assets/images/svgs/undraw.svg" class="construction-img mb-7 h-480  mt-5 mt-xl-0" alt="">
							<!--img src="<?php echo $base_url;?>my/images/gambar-login.png" class="mb-7 mt-5 mt-xl-0" alt=""-->
						</div>
						<div class="col-xl-5 col-lg-6 col-md-12 ">
							<div class="col-lg-12">
							    <img src="<?php echo $base_url;?>my/images/logo.png" class=" light-view mb-4" alt="Aronox logo">
								<div class="wrapper wrapper2">
									<form id="login" method="post" class="card-body" tabindex="500" action="<?php echo $base_url;?>login">
										<h2 class="mb-1 font-weight-semibold">Login</h2>
										<p class="mb-6">Sign In to your account</p>
										<div class="input-group mb-3">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="user" class="form-control" placeholder="NRP" value="">
										</div>
										<div class="input-group mb-4">
											<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
											<input type="password" name="passwd" class="form-control" placeholder="Password" value="">
										</div>
										<div class="row mb-0">
											<div class="col-12">
												<button type="submit" class="btn btn-primary btn-block">Login</button>
												<!--a class="btn btn-primary btn-block" href="welcome/blank">Login</a-->
											</div>
											<!--div class="col-12 mb-0">
												<a href="#" onclick="openForm('',0,'#reset_form');" data-toggle="modal" data-target="#modal_reset" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
												<p class=" mb-0">Don't have account?<a href="#" onclick="openForm('',0,'#register_form');" data-toggle="modal" data-target="#modal_register" class="text-primary ml-1">Sign UP</a></p>
											</div-->
										</div>
									</form>
									<div class="card-body social-icons border-top">
										<!--a class="btn  btn-social btn-fb mr-2"><i class="fa fa-facebook"></i> </a>
										<a class="btn  btn-social btn-googleplus mr-2"><i class="fa fa-google-plus"></i></a>
										<a class="btn  btn-social btn-twitter-transparant  "><i class="fa fa-twitter"></i></a-->
										Smart Management BI
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

	  <div class="modal fade" id="modal_register">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Register</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<form id="register_form">
				  <div class="row">
				    <div class="form-group col-md-6">
						<label>Nama</label>
						<input type="text" name="nama" placeholder="..." class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>NRP</label>
						<input type="text" name="nrp" placeholder="..." class="form-control">
					</div>
				  </div>
				  <div class="row">
					<div class="form-group col-md-6">
						<label>Pangkat</label>
		<?php
		//$opt=array('class'=>'form-control','id'=>'pangkat');
		//echo form_dropdown('pangkat', $pangkat, '', $opt);
		?>
					</div>
					<div class="form-group col-md-6">
						<label>Telp.</label>
						<input type="text" name="telp" placeholder="..." class="form-control">
					</div>
				  </div>
				  <div class="row">
				  </div>
				  <div class="row">
					<div class="form-group col-md-6">
						<label>Email</label>
						<input type="text" name="email" placeholder="..." class="form-control">
					</div>

				  </div>
				  
				</form>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="sendData('#register_form','account/register');">Register</button>
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  <div class="modal fade" id="modal_reset">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reset Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form id="reset_form">
			  <div class="row">
				<div class="form-group col-md-12">
					<label>NRP</label>
					<input type="text" name="rnip" placeholder="..." class="form-control">
				</div>
			  </div>
			  <div class="row">
				<div class="form-group col-md-12">
					<label>Email</label>
					<input type="text" name="remail" placeholder="..." class="form-control">
				</div>
			  </div>
			</form>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="sendData('#reset_form','account/forgot');">Reset My Password</button>
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
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

	  <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Delete this data?</p>
            </div>
			<div class="modal-footer justify-content-between">
				
				<button type="button" class="btn btn-danger" onclick="deleteData();">Delete</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				
			</div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  <div class="modal fade" id="modal_process">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="process_title">Process</h4>
              <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button-->
            </div>
            <div class="modal-body" id="process_result">
              <p>Processing, please wait ...</p>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
    
	<!-- global vars -->
	<script>
	var ext='.php';
	var page='';
	</script>
	<!-- my own custom js -->
	<script src="<?php echo $base_url;?>my/js/custom_dw.js"></script>
	
	<!-- this page's JavaScript -->
	<script>
<?php
$m=""; $x="";
if(isset($retval)){
	$m=$retval[2];
	$x=$retval[3];
}
?>
var x="<?php echo $x?>";
var m="<?php echo $m?>";

var base_url='<?php echo $base_url;?>';

var jvalidate, jvalidate2, jvalidate3;
$(document).ready(function (){
	$(".page-main").addClass("page-single");
	jvalidate = $("#login").validate({
    rules :{
        "user" : {
            required : true
        },
		"passwd" : {
			required : true
		}
    }});
	showAlert();
	
	jvalidate2 = $("#reset_form").validate({
    rules :{
        "rnip" : {
            required : true
        },
		"remail" : {
			required : true,
			email: true
		}
    }});
	
	jvalidate3 = $("#register_form").validate({
    rules :{
        "nrp" : {
            required : true
        },
		"nama" : {
            required : true
        },
		"pangkat" : {
            required : true
        },
		"polres" : {
            required : true
        },
		"unit" : {
            required : true
        },
		"email" : {
			required : true,
			email: true
		}
    }});
});

function showAlert(){
	if(m!=""){
		alrt(m,x);
	}
}


</script>
  </body>
</html>
