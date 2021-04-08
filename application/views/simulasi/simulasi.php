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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
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
  .img-circle {
      border-radius: 50%;
  }
  .c-abu{
      color:#CCC;
  }
  .list-rwy{
      font-size: 12px;
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
      opacity: 0.9;
      /* line-height: 30px; */
      /* padding-left: 10px; */
  }

  .menus {
      position: absolute;
      top: 100px;
      z-index: 5;
      background-color: #fff;
      padding: 5px;
      text-align: center;
      font-family: "Roboto", "sans-serif";
      opacity: 0.9;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
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
  
  .info-jarak{
      background: aliceblue;
      font-size: 12px;
      padding: 3px;
      border-radius: 2px;
      text-align: center
  }

  #list_cctv{
    margin: 5px;
    padding: 5px;
    height: 300px;
    font-size: 12px;
    overflow: auto;
  }

  /*******************************
  * MODAL AS LEFT/RIGHT SIDEBAR
  * Add "left" or "right" in modal parent div, after class="modal".
  * Get free snippets on bootpen.com
  *******************************/
  .modal-left.left .modal-dialog,
  .modal-left.right .modal-dialog {
      position: fixed;
      margin: auto;
      width: 320px;
      height: 100%;
      -webkit-transform: translate3d(0%, 0, 0);
      -ms-transform: translate3d(0%, 0, 0);
      -o-transform: translate3d(0%, 0, 0);
      transform: translate3d(0%, 0, 0);
  }
  
  .modal-left.left .modal-content,
  .modal-left.right .modal-content {
      height: 100%;
      overflow-y: auto;
  }
  
  .modal-left.left .modal-body,
  .modal-left.right .modal-body {
      padding: 15px 15px 80px;
  }
  
  /*Left*/
  .modal-left.left.fade .modal-dialog{
      left: -320px;
      -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
      -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
      -o-transition: opacity 0.3s linear, left 0.3s ease-out;
      transition: opacity 0.3s linear, left 0.3s ease-out;
  }
  
  .modal-left.left.fade.in .modal-dialog{
      left: 0;
  }
  
  /*Right*/
  .modal-left.right.fade .modal-dialog {
      right: -320px;
      -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
      -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
      -o-transition: opacity 0.3s linear, right 0.3s ease-out;
      transition: opacity 0.3s linear, right 0.3s ease-out;
  }
  
  .modal-left.right.fade.in .modal-dialog {
      right: 0;
  }
  
  /* ----- MODAL STYLE ----- */
  .modal-content {
      border-radius: 0;
      border: none;
  }
  
  .modal-header {
      border-bottom-color: #EEEEEE;
      background-color: #FAFAFA;
  }
  
  .btn-demo {
      margin: 15px;
      padding: 10px 15px;
      border-radius: 0;
      font-size: 16px;
      background-color: #FFFFFF;
  }
  
  .btn-demo:focus {
      outline: 0;
  }
  
  .demo-footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      padding: 15px;
      background-color: #212121;
      text-align: center;
  }
  
  .demo-footer > a {
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
      color: #fff;
  }

  .txt-status{
      border: solid 1px #9e9e9e;
      padding: 2px 6px;
      border-radius: 3px;
      display: inline-flex;
      font-size: 10px;
      color: #9e9e9e;
      margin: 5px 0px;
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

  .panel2 {
    position: absolute;
    top: 100px;
    right: 0;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    font-family: "Roboto", "sans-serif";
    height: auto;
    width: 380px;
    border-radius:10px ;
    /* line-height: 30px; */
    /* padding-left: 10px; */
  }

  .panel3 {
    position: absolute;
    top: 100px;
    right: 0;
    z-index: 5;
    font-family: "Roboto", "sans-serif";
  }

  .button_wrap{
      position: relative;
      width: 200px;
      height:40px;
      overflow:hidden;
      font-weight:bold;
      font-size:11px;
      margin:10px;
  }
  .button_aLeft{
      width:40px;
      height:40px;
      -moz-border-radius:20px;
    -webkit-border-radius:20px;
      background-color:#fff;
      color:black;
      top:0px;
      right:0px;
      position:absolute;
      line-height:36px;
      text-align:left;
  }
  .button_aLeft span{
      display:none;
      padding-left:20px;
  }
  .button_bLeft{
      width:40px;
      /* height:30px; */
      background-color:#fff;
      -moz-border-radius:20px;
    -webkit-border-radius:20px;
      color:#000;
      position:absolute;
      top:0px;
      right:0px;
      text-transform:uppercase;
      line-height:30px;
      text-align:center;
      cursor:pointer;
  }
  .button_bLeft span{
      color:#008ddd;
  }

  .btn-slider{
    position: absolute;
    top: 100px;
    left: 0px;
    height: 25px;
    width: 65px;
    text-align: center;
    background: #fff;
    border-radius: 3px;
    cursor: pointer;
    transition: left 0.4s ease;
    z-index: 5;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    opacity:0.9;
  }
  .btn-slider.click{
    left: 698px;
    z-index: 5;
  }
  .btn-slider i{
    color: black;
    font-size: 20px;
    line-height: 25px;
  }
  .btn-slider.click i:before{
    content: '\f100';
    z-index: 5;
  }
  .sidebar{
    position: fixed;
    width: 700px;
    height: 100%;
    top:100px;
    left: -700px;
    background: #fff;
    transition: left 0.4s ease;
    z-index: 5;
    opacity:0.9;
  }
  .sidebar.show{
    left: 0px;
    top: 100px;
  }

</style>
<body>

  <!-- Modal -->
  <div class="modal fade" id="modal_progress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            Calling ...
        </div>
      </div>
    </div>
  </div>
    
    <div class="container demo">
        
        <!-- Modal -->
        <div class="modal modal-left left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="head" style="border-bottom: 1px #DDD solid;padding: 15px 15px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close" style="text-align:left;"><span aria-hidden="true" id="myModalLabel">KEMBALI</span></button> 
                                </div>
                                <div class="col-md-4">
                                    <button  class="btn btn-sm btn-outline-warning" ><span aria-hidden="true" id="myModalLabel">PENDING</span></button> 
                                </div>
                            </div>
                        </div>
                        <div class="tab_" style="padding: 0px 15px;margin-top: 5px;">
                            <div id="exTab2">	
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#1" data-toggle="tab" aria-expanded="true">Detail</a>
                                    </li>
                                    <li class=""><a href="#2" data-toggle="tab" aria-expanded="false">Bantuan</a>
                                    </li>
                                    <li class=""><a href="#3" data-toggle="tab" aria-expanded="false">Riwayat</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="1">
                                        <div class="body" style="padding: 5px;margin-top: 15px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="txt-nama">Sahrul Rizal</div>
                                                            <div class="txt-label c-abu">Pelapor</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="txt-date text-right">
                                                        <div class="txt-tgl">03 Maret 2021</div>
                                                        <div class="txt-jam c-abu">10:10:00</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="list-gambar mt-4">
                                                        <div class="row">
                                                            <div class="col-md-12"><img src="https://malangvoice.com/wp-content/uploads/2016/01/Lokasi-kejadian-kecelakaan2.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-5">
                                                    <p><b>Pesan</b></p>
                                                    <div>
                                                        Telah terjadi kecalakaan di jalan juanda hj.nangka pada pukul 09:50 WIB tadi, korban mengalami luka sedang dan ada korban yang tidak sadarkan diri, mohon bantuannya segera untuk mengamankan lokasi kejadiaan dan mengevakuasi korban, terima kasih. 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="2">
                                        <div class="tab_1 mt-3">
                                            <div id="exTab2">	
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#polisi" data-toggle="tab" aria-expanded="true">Pos Polisi</a></li>
                                                    <li class=""><a href="#ambulan" data-toggle="tab" aria-expanded="false">Rumah Sakit</a></li>
                                                    <li class=""><a href="#dishub" data-toggle="tab" aria-expanded="false">Dishub</a></li>
                                                </ul>
                                                <div class="tab-content ">
                                                    <div class="tab-pane active" id="polisi">
                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Patwal</div>
                                                                                <div style="font-size: 10px;">71021</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Korlantas</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 13:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">1450 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">On Going</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm" onclick="jalankan('polisi')">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Patwal</div>
                                                                                <div style="font-size: 10px;">81021</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Korlantas</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 12:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">1692 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="tab-pane" id="ambulan">
                                                        
                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Ambulan</div>
                                                                                <div style="font-size: 10px;">B 761 HAS</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Rs Slamet Riyadi</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 12:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">892 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">On Going</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm" onclick="jalankan('ambulan')">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Ambulan</div>
                                                                                <div style="font-size: 10px;">B 511 JIS</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>RS Kasih Ibu</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 14:80:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">998 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="dishub">
                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Kendaraan</div>
                                                                                <div style="font-size: 10px;">B 261 HAS</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Dishub Surakarta</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 17:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">3892 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Kendaraan</div>
                                                                                <div style="font-size: 10px;">71121</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Dishub Surakarta</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 14:50:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">4992 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
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
                                    </div>
                                    <div class="tab-pane" id="3">
                                        <div class="list-rwy mt-4">
                                            <div class="list mb-2 pb-2" style="border-bottom: solid 1px #DDD;">
                                                <div><b>Ambulan (B 761 HAS)</b></div>
                                                <div style="font-size:11px;color:#999;">20 Maret 2021, 14:15:11</div>
                                                <div class="txt-status">Menuju lokasi kejadian</div>
                                            </div>
                                            <div class="list mb-2 pb-2" style="border-bottom: solid 1px #DDD;">
                                                <div><b>Patwal (71021)</b></div>
                                                <div style="font-size:11px;color:#999;">20 Maret 2021, 13:45:11</div>
                                                <div class="txt-status">Menuju lokasi kejadian</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        
    </div><!-- container -->
    
    <!-- <div id="floating-panel">
        <input type="button" value="Auto Rotate" onclick="autoRotate();" />
    </div> -->
    <!-- <div class="menus">
      <span>Index <i class="fa fa-angle-double-right"></i><span>
    </div> -->
    <div class="btn-slider">
      <span style="font-size: 15px;">Index <i class="fa fa-angle-double-right"></i></span>
    </div>
    <div class="sidebar">
      <div class="mx-5 my-5">
        <h4>Index</h4>
        <div class="border-bottom pb-3">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="trend-data-tab" data-toggle="pill" href="#trend-data" role="tab" aria-controls="trend-data" aria-selected="false">Trend Data</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="case-fatality-rate-tab" data-toggle="pill" href="#case-fatality-rate" role="tab" aria-controls="case-fatality-rate" aria-selected="false">Case Fatality Rate</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="fatality-index-tab" data-toggle="pill" href="#fatality-index" role="tab" aria-controls="fatality-index" aria-selected="false">Fatality Index</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="index-kinerja-tab" data-toggle="pill" href="#index-kinerja" role="tab" aria-controls="index-kinerja" aria-selected="false">Index Kinerja</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Index Ketertiban</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Index Kecelakaan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Index Keamanan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Index Keselamatan</a>
            </li>
          </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade" id="trend-data" role="tabpanel" aria-labelledby="trend-data-tab">
            <canvas id="td" width="400" height="400"></canvas>
          </div>
          <div class="tab-pane fade" id="case-fatality-rate" role="tabpanel" aria-labelledby="case-fatality-rate-tab">
            <canvas id="cfr" width="400" height="400"></canvas>
          </div>
          <div class="tab-pane fade" id="fatality-index" role="tabpanel" aria-labelledby="fatality-index-tab">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="fi-1" role="tabpanel" aria-labelledby="fi-1-tab">...</div>
              <div class="tab-pane fade" id="fi-2" role="tabpanel" aria-labelledby="fi-2-tab">...</div>
            </div>
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="fi-1-tab" data-toggle="pill" href="#fi-1" role="tab" aria-controls="fi-1" aria-selected="false">Fatality Index-Polrestabes Surakarta</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="fi-2-tab" data-toggle="pill" href="#fi-2" role="tab" aria-controls="fi-2" aria-selected="false">Indeks Fatalitas per Provinsi</a>
              </li>
            </ul>
          </div>
          <div class="tab-pane fade" id="index-kinerja" role="tabpanel" aria-labelledby="index-kinerja-tab">
            <canvas id="ikc" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div id="map"></div>
    <div class="floating-panel">
      <div class="row">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active icons mx-1" id="pills-maps-tab" data-toggle="pill" href="#pills-maps" role="tab" aria-controls="pills-maps" aria-selected="false"><img src="<?=base_url()?>my/simulasi/location1.png" alt="" style="width:70px;"></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active bg-warning icons text-white mx-1" id="pills-cctv-tab" data-toggle="pill" href="#pills-cctv" role="tab" aria-controls="pills-cctv" aria-selected="false"><img src="<?=base_url()?>my/simulasi/cctv1.png" alt="" style="width:70px;"></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active bg-success icons text-white mx-1" id="pills-car-tab" data-toggle="pill" href="#pills-car" role="tab" aria-controls="pills-car" aria-selected="false"><img src="<?=base_url()?>my/simulasi/car1.png" alt="" style="width:70px;"></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active icons text-white mx-1" id="pills-more-tab" data-toggle="pill" href="#pills-more" role="tab" aria-controls="pills-more" aria-selected="false"><img src="<?=base_url()?>my/simulasi/more.png" alt="" style="width:70px;"></a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane panel2 fade" id="pills-maps" role="tabpanel" aria-labelledby="pills-maps-tab">
            <div class="row">
            <div class="col-md-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-maps-police-tab" data-toggle="pill" href="#v-maps-police" role="tab" aria-controls="v-maps-police" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/polri.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Polisi</p>
                      </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-maps-damkar-tab" data-toggle="pill" href="#v-maps-damkar" role="tab" aria-controls="v-maps-damkar" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/damkar.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Damkar</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-maps-police" role="tabpanel" aria-labelledby="v-maps-police-tab">
                  <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_maps_polisi"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="">
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-maps-polisi" name="">
                          <span class="">Kantor Polisi 1</span>
                      </div>
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-maps-polisi" name="">
                          <span class="">Kantor Polisi 2</span>
                      </div>
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-maps-polisi" name="">
                          <span class="">Kantor Polisi 3</span>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-maps-damkar" role="tabpanel" aria-labelledby="v-maps-damkar-tab">
                  <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_maps_damkar"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top">
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-maps-damkar" name="">
                          <span class="">Kantor Damkar 1</span>
                      </div>
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-maps-damkar" name="">
                          <span class="">CKantor Damkar2</span>
                      </div>
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-maps-damkar" name="">
                          <span class="">CKantor Damkar3</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane panel2 fade" id="pills-cctv" role="tabpanel" aria-labelledby="pills-cctv-tab">
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-cctv-korlantas-tab" onclick="cctv()" data-toggle="pill" href="#v-cctv-korlantas" role="tab" aria-controls="v-cctv-korlantas" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/korlantas.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Korlantas</p>
                      </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-cctv-dishub-tab" data-toggle="pill" href="#v-cctv-dishub" role="tab" aria-controls="v-cctv-dishub" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/dishubb.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Dishub</p>
                      </div>
                  </a>
                </div>
              </div>
              <div class="col-md-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-cctv-korlantas" role="tabpanel" aria-labelledby="v-cctv-korlantas-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_cctv_korlantas" onchange="check_cctv()"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_cctv">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-cctv-dishub" role="tabpanel" aria-labelledby="v-cctv-dishub-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_cctv_dishub"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top">
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-cctv-dishub" name="">
                          <span class="">CCTV Dishub 1</span>
                      </div>
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-cctv-dishub" name="">
                          <span class="">CCTV Dishub 2</span>
                      </div>
                      <div class="list-group-item list-group-item-action">
                          <input type="checkbox" class="mr-2 check-cctv-dishub" name="">
                          <span class="">CCTV Dishub 3</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane panel2 fade" id="pills-car" role="tabpanel" aria-labelledby="pills-car-tab">
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-police-tab" data-toggle="pill" href="#v-car-police" role="tab" aria-controls="v-car-police" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/polri.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Polisi</p>
                      </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-ambulan-tab" data-toggle="pill" href="#v-car-ambulan" role="tab" aria-controls="v-car-ambulan" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/ambulan.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Ambulance</p>
                    </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-damkar-tab" data-toggle="pill" href="#v-car-damkar" role="tab" aria-controls="v-car-damkar" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/damkar.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Damkar</p>
                    </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-car-dishub-tab" data-toggle="pill" href="#v-car-dishub" role="tab" aria-controls="v-car-dishub" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/simulasi/dishubb.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Dishub</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-car-police" role="tabpanel" aria-labelledby="v-car-police-tab">
                    <div class="owl-carousel owl-theme mb-4">
                        <div class="item"><a href="#" onclick="tes(1,'Diva','Polisi 1')"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                        <div class="item"><a href="#" onclick="tes(2,'Wardana','Polisi 2')"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center d-none" id="profil">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3" id="nama"></h4>
                        <p class="card-text" id="ket"></p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <!-- <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a> -->
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-car-ambulan" role="tabpanel" aria-labelledby="v-car-ambulan-tab">
                    <div class="owl-carousel owl-theme mb-4">
                      <div class="item"><a href="#" onclick="tes2(1,'Diva','Ambulan 1')"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center d-none" id="profil2">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3" id="nama2"></h4>
                        <p class="card-text" id="ket2"></p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <!-- <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a> -->
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-car-damkar" role="tabpanel" aria-labelledby="v-car-damkar-tab">
                    <div class="owl-carousel owl-theme mb-4">
                    <div class="item"><a href="#" onclick="tes3(1,'Wardana','Damkar 1')"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center d-none" id="profil3">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3" id="nama3"></h4>
                        <p class="card-text" id="ket3"></p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <!-- <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a> -->
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-car-dishub" role="tabpanel" aria-labelledby="v-car-dishub-tab">
                    <div class="owl-carousel owl-theme mb-4">
                    <div class="item"><a href="#" onclick="tes4(1,'Diva','Dishub 1')"><img class="avatar brround w-80" src="<?= base_url();?>aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>
                    </div>
                    <div class="border-top pt-2">
                      <div class="text-center d-none" id="profil4">
                        <img src="<?= base_url();?>aronox/assets/images/users/16.jpg" class="avatar avatar-xxl brround" alt="">
                        <h4 class="h4 mb-0 mt-3" id="nama4"></h4>
                        <p class="card-text" id="ket4"></p>
                        <a href="#" class="iconss bg-success text-white"><i class="fa fa-phone"></i></a>
                        <!-- <a href="#" class="iconss bg-warning text-white"><i class="fa fa-commenting-o"></i></a> -->
                        <a href="#" class="iconss bg-primary text-white bot-popover"><i class="fa fa-video-camera"></i></a>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-more" role="tabpanel" aria-labelledby="pills-more-tab">
          <div class="panel3">
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>VVIP</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/vvip.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Blackspot</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/blackspot.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Trouble Spot</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/troublespot.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Ambang Gangguan</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/ambanggangguan.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Traffic Counting</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/trafficcounting.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Traffic Category</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/trafficcategory.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Average Speed</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/avgspeed.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Length Ocupantion</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/lengthocc.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Face Recognation</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/facerecog.png" alt=""></a>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Giat Masyarakat</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/simulasi/giatmasyarakat.png" alt=""></a>
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
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuUVO-e2zvXVWuIHvRPFMFZOfLwsF98W4&callback=initMap&libraries=geometry&v=weekly"
      async
    ></script>
    <!-- Owl  -->
	  <script src="<?= base_url('my/vendor/owl/owl.carousel.min.js')?>"></script>
    <script src="<?= base_url()?>aronox/assets/js/popover.js"></script>
    <script src="<?=base_url('my/js_local/simulasi/simulasi.js')?>"></script>

    <!--Othercharts js-->
    <script src="<?= base_url();?>aronox/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

    <!-- Peitychart js-->
    <script src="<?= base_url();?>aronox/assets/plugins/peitychart/jquery.peity.min.js"></script>

    <script src="<?= base_url();?>aronox/assets/plugins/charts-c3/d3.v5.min.js"></script>
		<script src="<?= base_url();?>aronox/assets/plugins/charts-c3/c3-chart.js"></script>

    <script src="<?= base_url();?>my/vendor/chart.js/Chart.min.js"></script>

    <script src="<?= base_url();?>aronox/assets/plugins/echarts/echarts.js"></script>

    <script src="<?= base_url();?>aronox/assets/js/apexcharts.js"></script>
							
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <script src="<?=base_url('my/js_local/simulasi/statistik.js')?>"></script>
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
          
          //select all checkboxes
          $("#select_all_cctv_korlantas").change(function(){
            var status = this.checked;
            $('.check-cctv-korlantas').each(function(){
              this.checked = status;
            });
          });

          $('.check-cctv-korlantas').change(function(){ 
            if(this.checked == false){
              $("#select_all_cctv_korlantas")[0].checked = false;
            }
            
            if ($('.check-cctv-korlantas:checked').length == $('.check-cctv-korlantas').length ){ 
              $("#select_all_cctv_korlantas")[0].checked = true;
            }
          });

          //select all checkboxes
          $("#select_all_cctv_dishub").change(function(){
            var status = this.checked;
            $('.check-cctv-dishub').each(function(){
              this.checked = status;
            });
          });

          $('.check-cctv-dishub').change(function(){ 
            if(this.checked == false){
              $("#select_all_cctv_dishub")[0].checked = false;
            }
            
            if ($('.check-cctv-dishub:checked').length == $('.check-cctv-dishub').length ){ 
              $("#select_all_cctv_dishub")[0].checked = true;
            }
          });

          //select all checkboxes
          $("#select_all_maps_polisi").change(function(){
            var status = this.checked;
            $('.check-maps-polisi').each(function(){
              this.checked = status;
            });
          });

          $('.check-maps-polisi').change(function(){ 
            if(this.checked == false){
              $("#select_all_maps_polisi")[0].checked = false;
            }
            
            if ($('.check-maps-polisi:checked').length == $('.check-maps-polisi').length ){ 
              $("#select_all_maps_polisi")[0].checked = true;
            }
          });

          //select all checkboxes
          $("#select_all_maps_damkar").change(function(){
            var status = this.checked;
            $('.check-maps-damkar').each(function(){
              this.checked = status;
            });
          });

          $('.check-maps-damkar').change(function(){ 
            if(this.checked == false){
              $("#select_all_maps_damkar")[0].checked = false;
            }
            
            if ($('.check-maps-damkar:checked').length == $('.check-maps-damkar').length ){ 
              $("#select_all_maps_damkar")[0].checked = true;
            }
          });
      });
      function tes(id,nama,ket){
          $('#profil').removeClass('d-none');
          $('#nama').html(nama);
          $('#ket').html(ket);
      }
      function tes2(id,nama,ket){
          $('#profil2').removeClass('d-none');
          $('#nama2').html(nama);
          $('#ket2').html(ket);
      }
      function tes3(id,nama,ket){
          $('#profil3').removeClass('d-none');
          $('#nama3').html(nama);
          $('#ket3').html(ket);
      }
      function tes4(id,nama,ket){
          $('#profil4').removeClass('d-none');
          $('#nama4').html(nama);
          $('#ket4').html(ket);
      }

      $(function() {
        $('.slidebttn').hover(
					function () {
						var $this 		= $(this);
						var $slidelem 	= $this.prev();
						$slidelem.stop().animate({'width':'170px'},300);
						$slidelem.find('span').stop(true,true).fadeIn();
						$this.addClass('button_c');
					},
					function () {
						var $this 		= $(this);
						var $slidelem 	= $this.prev();
						$slidelem.stop().animate({'width':'40px'},200);
						$slidelem.find('span').stop(true,true).fadeOut();
						$this.removeClass('button_c');
					}
				);
      });

      $('.btn-slider').click(function(){
        $(this).toggleClass("click");
        $('.sidebar').toggleClass("show");
      });

    </script>
  </body>
</html>
