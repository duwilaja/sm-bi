<input type="hidden" id="cek_detail_q" value="<?=$this->input->get('q');?>">
<input type="hidden" id="ids" value="<?=$this->input->get('id');?>">
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Detail CCTV</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><?php if($q == "traffic_counting"){ echo "Traffic Counting"; }else if($q == "traffic_category"){ echo "Traffic Category"; }else if($q == "average_speed"){ echo "Average Speed"; }else if($q == "length_ocupantion"){ echo "Length Ocupantion"; }?></a></li>
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
                <select name="filter" id="filter" onchange="filter()" class="btn btn-primary btn-icon-text">
                    <option value="day">Harian</option>
                    <option value="week">Mingguan</option>
                    <option value="month">Bulanan</option>
                    <option value="year">Tahunan</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
        <div class="card overflow-hidden work-progress">
            <!-- <div class="card-header">
                <h3 class="card-title">Pantauan CCTV</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div> -->
            <div class="card-body p-0">
                <div class="embed-responsive embed-responsive-16by9" style="width:100%;">
                    <iframe class="embed-responsive-item" src="<?=$rtsp;?>" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div><!-- COL END -->

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
<?php if($q == "traffic_counting"){?>      
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex clearfix">
                            <div class="text-left ">
                                <p class="card-text mb-1"><b>Total Kendaraan</b></p>
                                <h2 class="mb-1 font-weight-semibold mainvalue" id="counting_total"></h2>
                                <p class="mb-0 text-muted" id="p_counting_total"></p>
                            </div>
                            <div class="ml-auto">
                                <span class="bg-primary-transparent icon-service text-primary ">
                                    <i class="fa fa-automobile"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex clearfix">
                            <div class="text-left ">
                                <p class="card-text mb-1"><b>Kendaraan Hari Ini</b></p>
                                <h2 class="mb-1 font-weight-semibold mainvalue" id="counting_total_hari"></h2>
                                <p class="mb-0 text-muted" id="p_counting_total_hari"></p>
                            </div>
                            <div class="ml-auto">
                                <span class="bg-success-transparent icon-service text-success">
                                    <i class="ti-stats-up text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Status Volume Kendaraan</h3>
                        <h3 style="margin-bottom:2px !important;"><b>Padat</b> <span class="sparkline_bar float-right"></span></h3>
                        <p class="text-muted">Lonjakan peningkatan jumlah kendaraan perhari</p>
                    </div>
                </div>
            </div>
        </div>
<?php } else if( $q == "average_speed"){?>
    <div class="col-sm-12 col-lg-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Average Speed</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div id="speed" class="chartsh" ></div>
            </div>
        </div>
    </div>
<?php }else if( $q == "traffic_category"){?>
    <div class="col-sm-12 col-lg-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Traffic Category</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kendaraan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="tcategory">
                        <tr>
                            <td>Mobil</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } else if ($q == "length_ocupantion"){?>
    <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex clearfix">
                            <div class="text-left ">
                                <p class="card-text mb-1"><b>Total Kendaraan</b></p>
                                <h2 class="mb-1 font-weight-semibold mainvalue">80,956</h2>
                                <p class="mb-0 text-muted"><span class="mb-0 text-success fs-13 "><i class="fe fe-arrow-up "></i> 22%</span> vs hari sebelumnya</p>
                            </div>
                            <div class="ml-auto">
                                <span class="bg-primary-transparent icon-service text-primary ">
                                    <i class="fa fa-automobile"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex clearfix">
                            <div class="text-left ">
                                <p class="card-text mb-1"><b>Kendaraan Hari Ini</b></p>
                                <h2 class="mb-1 font-weight-semibold mainvalue">99,459</h2>
                                <p class="mb-0 text-muted"><span class="mb-0 text-success fs-13 "><i class="fe fe-arrow-up "></i> 22%</span> vs hari sebelumnya</p>
                            </div>
                            <div class="ml-auto">
                                <span class="bg-success-transparent icon-service text-success">
                                    <i class="ti-stats-up text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex clearfix">
                            <div class="text-left ">
                                <p class="card-text mb-1"><b>Kendaraan Hari Ini</b></p>
                                <h2 class="mb-1 font-weight-semibold mainvalue">99,459</h2>
                                <p class="mb-0 text-muted"><span class="mb-0 text-success fs-13 "><i class="fe fe-arrow-up "></i> 22%</span> vs hari sebelumnya</p>
                            </div>
                            <div class="ml-auto">
                                <span class="bg-success-transparent icon-service text-success">
                                    <i class="ti-stats-up text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex clearfix">
                            <div class="text-left ">
                                <p class="card-text mb-1"><b>Kendaraan Hari Ini</b></p>
                                <h2 class="mb-1 font-weight-semibold mainvalue">99,459</h2>
                                <p class="mb-0 text-muted"><span class="mb-0 text-success fs-13 "><i class="fe fe-arrow-up "></i> 22%</span> vs hari sebelumnya</p>
                            </div>
                            <div class="ml-auto">
                                <span class="bg-success-transparent icon-service text-success">
                                    <i class="ti-stats-up text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }?>
    </div>
</div>

<?php if($q == "traffic_counting"){?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Statistik Traffic Counting</h3>
        </div>
        <div class="card-body">
            <div id="chartCounting" class="chartsh h-290"></div>
        </div>
    </div>
</div>
<?php } else if($q == "traffic_category"){?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Statistik Traffic Category</h3>
        </div>
        <div class="card-body">
            <div id="chartCategory" class="chartsh h-290"></div>
        </div>
    </div>
</div>
<?php } else if($q == "average_speed"){?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Statistik Average Speed</h3>
            <div class="card-options ">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div id="chartAverage" class="chartsh h-290"></div>
        </div>
    </div>
</div>
<?php } else if($q == "length_ocupantion"){?>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Statistik Length Ocupantion</h3>
            <div class="card-options ">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div id="chartLength" class="chartsh h-290"></div>
        </div>
    </div>
</div>
<?php }?>