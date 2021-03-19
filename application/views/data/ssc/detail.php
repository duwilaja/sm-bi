<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Detail CCTV Transjakarta</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Traffic Counting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="ml-3 ml-auto d-flex">
            <div class="">
                <div class="border-right pr-4 mt-2 d-xl-block">
                    <h5 class="text-muted">Filter</h5>
                    <!-- <h6 class="font-weight-semibold mb-0">All Categories</h6> -->
                </div>
            </div>
            <div class="">
                <select name="" id="" class="btn btn-primary btn-icon-text">
                    <option value="">Harian</option>
                    <option value="">Mingguan</option>
                    <option value="">Bulanan</option>
                    <option value="">Tahunan</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card overflow-hidden work-progress">
            <div class="card-header">
                <h3 class="card-title">Pantauan CCTV</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
                    <iframe class="embed-responsive-item" src="http://127.0.0.1:5000/?u=rtsp://10.100.100.2/live.sdp" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div><!-- COL END -->

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <div class="card-order">
                            <div class="row">
                                <div class="col">
                                    <div class=""><b>Kendaraan Hari Ini</b></div>
                                    <div class="h3 mt-2 mb-2"><b>99,459</b></div>
                                </div>
                                <div class="col-auto align-self-center ">
                                    <div class="feature mt-0 mb-0">
                                        <i class="fa fa-automobile project bg-primary-transparent text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="mb-0 text-muted"><span class="text-success"><i class="fa fa-caret-up  mr-1"></i> 0.7%</span> vs hari sebelumnya</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="card text-center">
                    <div class="card-body ">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-stats-up project bg-success-transparent mx-auto text-success "></i>
                        </div>
                        <h6 class="mb-1 text-muted">Total Kendaraan</h6>
                        <h3 class="font-weight-semibold">20,100,900</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Status Volume Kendaraan</h3>
                        <h3 style="margin-bottom:2px !important;"><b>Padat</b></h3>
                        <p class="text-muted">Lonjakan peningkatan jumlah kendaraan perdetik</p>
                        <div class="progress progress-md h-4 mt-5">
                            <!-- <div class="progress-bar bg-success w-40"></div>
                            <div class="progress-bar bg-warning w-50"></div> -->
                            <div class="progress-bar bg-danger w-80"></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <h6 class="mb-1"><span class="dot-label bg-success"></span>Lenggang</h6>
                            </div>
                            <div class="col-md-4  mt-4 mt-xl-0">
                                <h6 class="mb-1"><span class="dot-label bg-warning"></span>Ramai Lancar</h6>
                            </div>
                            <div class="col-md-4 mt-4 mt-xl-0">
                                <h6 class="mb-1"><span class="dot-label bg-danger"></span>Padat</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Statistik Traffic Counting</h3>
            <div class="card-options ">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div id="echartArea3" class="chartsh h-290"></div>
        </div>
    </div>
</div>
