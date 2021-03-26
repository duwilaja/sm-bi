<!DOCTYPE html>
<html>
  <head>
    <title>Simulasi</title>
    		<!--Favicon -->
		    <link rel="icon" href="<?php echo base_url();?>aronox/assets/images/brand/favicon.ico" type="image/x-icon"/>

      <!-- Style css -->
      <link href="<?php echo base_url();?>aronox/assets/css/style.css" rel="stylesheet" />

      <!--Horizontal css -->
          <link id="effect" href="<?php echo base_url();?>aronox/assets/plugins/horizontal-menu/dropdown-effects/fade-up.css" rel="stylesheet" />
          <link href="<?php echo base_url();?>aronox/assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet" />

      <!-- P-scroll bar css-->
      <link href="<?php echo base_url();?>aronox/assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

      <!---Icons css-->
      <link href="<?php echo base_url();?>aronox/assets/plugins/iconfonts/icons.css" rel="stylesheet" />
      <link href="<?php echo base_url();?>aronox/assets/plugins/iconfonts/font-awesome/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>aronox/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

      <!-- WYSIWYG Editor css -->
      <link href="<?php echo base_url();?>aronox/assets/plugins/wysiwyag/richtext.css" rel="stylesheet" />

      <!-- Select2 css -->
      <link href="<?php echo base_url();?>aronox/assets/plugins/select2/select2.min.css" rel="stylesheet" />

      <link href="<?php echo base_url();?>aronox/assets/css/apexcharts.css" rel="stylesheet" />

      <!-- Skin css-->
      <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>aronox/assets/skins/hor-skin/hor-skin1.css" />

      <!-- datatables CSS-->
      <!--link rel="stylesheet" href="my/vendor/datatables/datatables.min.css"-->
      <link href="<?php echo base_url();?>aronox//assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">

      <!-- bootstrap CSS-->
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/bootstrap/css/bootstrap-select.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/bootstrap/css/bootstrap-datetimepicker.min.css">

      <!-- fancybox CSS-->
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/jquery-fancybox/jquery.fancybox.min.css">

      <!-- leaflet CSS-->
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/leaflet/leaflet.css">
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/leaflet/MarkerCluster.css">
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/leaflet/MarkerCluster.Default.css">
      <link rel="stylesheet" href="<?php echo base_url();?>my/vendor/leaflet/leaflet.awesome-markers.css">

      <!-- overwrite css -->
      <link href="<?php echo base_url();?>my/css/custom.css" rel="stylesheet" />

      <!-- Owl -->
      <link rel="stylesheet" href="<?php echo base_url('my/vendor/owl/')?>owl.carousel.min.css">
      <link rel="stylesheet" href="<?php echo base_url('my/vendor/owl/')?>owl.theme.default.min.css">


      <!-- Tabs css-->
      <link href="<?php echo base_url();?>aronox/assets/plugins/tabs/style.css" rel="stylesheet" />


      <link href="<?php echo base_url();?>aronox/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- jsFiddle will insert css and js -->
  </head>
  <style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

.floating-panel {
    position: absolute;
    top: 10px;
    right: 80px;
    z-index: 5;
    /* background-color: #fff; */
    padding: 5px;
    text-align: center;
    font-family: "Roboto", "sans-serif";
    /* line-height: 30px; */
    /* padding-left: 10px; */
  }

  .panel2 {
    position: absolute;
    top: 100px;
    right: 0;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    font-family: "Roboto", "sans-serif";
    height: 100%;
    width: 100%;
    /* line-height: 30px; */
    /* padding-left: 10px; */
  }

  .icons {
    display: inline-flex!important;
    width: 70px;
    height: 70px;
    text-align: center;
    border-radius: 50% !important;
    align-items: center;
    justify-content: center;
    font-size:30px!important;
  }

  </style>
  <body>
    <!-- <div id="floating-panel">
      <input type="button" value="Auto Rotate" onclick="autoRotate();" />
    </div> -->
    <div id="map"></div>
    <div class="floating-panel">
      <div class="row">
        <!-- <a href="#" class="bg-danger icon-service text-white mr-2">
          <i class="fa fa-map-marker"></i>
        </a>
        <a href="#" class="bg-warning icon-service text-white mr-2 ">
          <i class="fa fa-camera"></i>
        </a>
        <a href="#" class="bg-success icon-service text-white mr-2 ">
          <i class="fa fa-car"></i>
        </a> -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link bg-primary icons text-white mx-1" id="pills-maps-tab" data-toggle="pill" href="#pills-maps" role="tab" aria-controls="pills-maps" aria-selected="true"><i class="fa fa-map-marker"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link bg-warning icons text-white mx-1" id="pills-cctv-tab" data-toggle="pill" href="#pills-cctv" role="tab" aria-controls="pills-cctv" aria-selected="false"><i class="fa fa-camera"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link bg-success icons text-white mx-1" id="pills-car-tab" data-toggle="pill" href="#pills-car" role="tab" aria-controls="pills-car" aria-selected="false"><i class="fa fa-car"></i></a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane panel2 fade show active" id="pills-maps" role="tabpanel" aria-labelledby="pills-maps-tab">
            <div class="row">
              <div class="col">maps</div>
              <div class="col">testing maps</div>
            </div>
          </div>
          <div class="tab-pane panel2 fade show active" id="pills-cctv" role="tabpanel" aria-labelledby="pills-cctv-tab">
            <div class="row">
              <div class="col">cctv</div>
              <div class="col">testing cctv</div>
            </div>
          </div>
          <div class="tab-pane panel2 fade show active" id="pills-car" role="tabpanel" aria-labelledby="pills-car-tab">
            <div class="row">
              <div class="col">car</div>
              <div class="col">testing car</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- <div class="panel2">
        <div class="row">
          <div class="col"></div>
          <div class="col">tes</div>
        </div>
    </div> -->

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuUVO-e2zvXVWuIHvRPFMFZOfLwsF98W4&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    <script src="<?=base_url('my/js_local/simulasi/simulasi.js')?>"></script>
  </body>
</html>