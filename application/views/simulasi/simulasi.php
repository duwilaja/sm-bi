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
                                                    <li class="active"><a href="#polisi" data-toggle="tab" aria-expanded="true">Polisi</a></li>
                                                    <li class=""><a href="#ambulan" data-toggle="tab" aria-expanded="false">Ambulan</a></li>
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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuUVO-e2zvXVWuIHvRPFMFZOfLwsF98W4&callback=initMap&libraries=geometry&v=weekly"
        async
        ></script>
        <script src="<?=base_url('my/js_local/simulasi/simulasi.js')?>"></script>
    </body>
    </html>