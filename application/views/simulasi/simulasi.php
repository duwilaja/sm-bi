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
    height: auto;
    width: 180%;
    border-radius:10px ;
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

  .iconss {
    display: inline-flex!important;
    width: 30px;
    height: 30px;
    text-align: center;
    border-radius: 50% !important;
    align-items: center;
    justify-content: center;
    font-size:15px!important;
  }

  a:link {
    text-decoration:none!important;
  }

  iframe {
	height: 100%;
	min-height: 40px;
}

.popover {
    max-width: 400px;
}

  </style>
  <body>
    <!-- <div id="floating-panel">
      <input type="button" value="Auto Rotate" onclick="autoRotate();" />
    </div> -->
    <div id="map"></div>
    <div class="floating-panel">
      <div class="row">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active bg-primary icons text-white mx-1" id="pills-maps-tab" data-toggle="pill" href="#pills-maps" role="tab" aria-controls="pills-maps" aria-selected="false"><i class="fa fa-map-marker"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active bg-warning icons text-white mx-1" id="pills-cctv-tab" data-toggle="pill" href="#pills-cctv" role="tab" aria-controls="pills-cctv" aria-selected="false"><i class="fa fa-video-camera"></i></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active bg-success icons text-white mx-1" id="pills-car-tab" data-toggle="pill" href="#pills-car" role="tab" aria-controls="pills-car" aria-selected="false"><i class="fa fa-car"></i></a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane panel2 fade" id="pills-maps" role="tabpanel" aria-labelledby="pills-maps-tab">
            <div class="row">
              <div class="col-md-4 pr-1">
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/polri.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Polisi</p>
                    </div>
                  </a>
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/ambulan.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Ambulance</p>
                    </div>
                  </a>
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/damkar.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Damkar</p>
                    </div>
                  </a>
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/dishub.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Dishub</p>
                    </div>
                  </a>
              </div>
              <div class="col-md-8 pl-0">
                  <div class="mb-2">
                    <div class="row" style="margin-right:0!important;margin-left:0!important;">
                      <div class="col">
                        <select name="" id="" class="btn btn-info">
                          <option value="">Filter</option>
                          <option value="">All</option>
                        </select>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div> 
                  </div>
                  <div class="border-top pt-2">
                  <ul class="list-group">
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="tab-pane panel2 fade" id="pills-cctv" role="tabpanel" aria-labelledby="pills-cctv-tab">
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/korlantas.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Korlantas</p>
                    </div>
                </a>
                <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/dishub.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Dishub</p>
                    </div>
                </a>
              </div>
            </div>
            <div class="col-md-8 pl-0">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Lorem</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">lorem</div>
              </div>
            </div>
          </div>
          </div>
          <div class="tab-pane panel2 fade" id="pills-car" role="tabpanel" aria-labelledby="pills-car-tab">
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-police-tab" data-toggle="pill" href="#v-car-police" role="tab" aria-controls="v-car-police" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/polri.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Polisi</p>
                      </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-ambulan-tab" data-toggle="pill" href="#v-car-ambulan" role="tab" aria-controls="v-car-ambulan" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/ambulan.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Ambulance</p>
                    </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-damkar-tab" data-toggle="pill" href="#v-car-damkar" role="tab" aria-controls="v-car-damkar" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/damkar.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Damkar</p>
                    </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-dishub-tab" data-toggle="pill" href="#v-car-dishub" role="tab" aria-controls="v-car-dishub" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/dishub.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Dishub</p>
                    </div>
                  </a>
                </div>
                  <!-- <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/polri.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Polisi</p>
                    </div>
                  </a>
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/ambulan.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Ambulance</p>
                    </div>
                  </a>
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/damkar.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Damkar</p>
                    </div>
                  </a>
                  <a href="#" class="list d-flex align-items-center border-bottom border-right py-3">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>aronox/simulasi/dishub.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Dishub</p>
                    </div>
                  </a> -->
              </div>
              <div class="col-md-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-car-police" role="tabpanel" aria-labelledby="v-car-police-tab">
                    <div class="owl-carousel owl-theme mb-4">
                        <div class="item"><a href="#" onclick="tes(1)"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                        <div class="item"><a href="#" onclick="tes(2)"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center d-none" id="profil">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3" id="nama"></h4>
                        <p class="card-text" id="ket"></p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a>
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-car-ambulan" role="tabpanel" aria-labelledby="v-car-ambulan-tab">
                    <div class="owl-carousel owl-theme mb-4">
                        <div class="item"><a href="#"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3">James</h4>
                        <p class="card-text">Ambulan 1</p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a>
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-car-damkar" role="tabpanel" aria-labelledby="v-car-damkar-tab">
                    <div class="owl-carousel owl-theme mb-4">
                        <div class="item"><a href="#"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3">Jhon</h4>
                        <p class="card-text">Damkar 1</p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a>
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-car-dishub" role="tabpanel" aria-labelledby="v-car-dishub-tab">
                    <div class="owl-carousel owl-theme mb-4">
                        <div class="item"><a href="#"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3">Jhon James</h4>
                        <p class="card-text">Dishub 1</p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a>
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                  
              </div>
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
    <!-- Owl  -->
	  <script src="<?= base_url('my/vendor/owl/owl.carousel.min.js')?>"></script>
    <script src="<?= base_url()?>aronox/assets/js/popover.js"></script>
    <script src="<?=base_url('my/js_local/simulasi/simulasi.js')?>"></script>
    <script>
      $(function(){
            // Enables popover
            $(".bot-popover").popover({
                trigger: 'focus',
                html : true, 
                sanitize: false,
                placement: 'bottom',
                content: function() {
                return '<iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen style="border:none">'+
                        '</iframe>';    
                },
                title: function() {
                  return `Camera`;
                }
            });
        });

      $('.owl-carousel').owlCarousel({
          // loop:true,
          margin:10,
          nav:false,
          dots:false,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:5
              }
          }
      })
      $(document).ready(function(){
          $(".nav-link").click(function(){
              if ($(this).hasClass('active')){
                  $('#' + this.hash.substr(1).toLowerCase()).toggleClass('active');
              }
          });
      });
      function tes(id){
        if (id == 1) {
          $('#profil').removeClass('d-none');
          $('#nama').html('Diva');
          $('#ket').html('Polisi 1');
        } else {
          $('#profil').removeClass('d-none');
          $('#nama').html('Wardana');
          $('#ket').html('Polisi 2');
        }
      }
    </script>
  </body>
</html>