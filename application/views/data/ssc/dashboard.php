<style>
#map {
		height: 350px;
	}
.konten-card {
    /* margin: 5px;
    padding: 5px; */
    height: 410px;
    overflow-y: auto;
  }
</style>

<!--Row-->
<div class="row">
<div class="col-md-12">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-search"></i><span class="ml-1">Filter Data</span>
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <form action="javascript:void(0);" method="post" id="filter_karyawan">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p>Start Date</p>
                                        <input class="form-control form-control-sm" type="date" name="f_date_start" id="f_date_start">
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <p>End Date</p>
                                        <input class="form-control form-control-sm" type="date" name="f_date_end" id="f_date_end">
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <p>Polda</p>
                                        <select class="form-control form-control-sm"  name="f_polda" id="f_polda" onchange="getCombo('intan_polres',this.value,'#f_polres','','-- Pilih Polres --');">
											<option value="">-- Pilih Polda --</option>
											<?php foreach($polda as $row){?>
											<option value="<?php echo $row->da_id?>"><?php echo $row->da_nam?></option>
											<?php }?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <p>Polres</p>
                                        <select class="form-control form-control-sm"  name="f_polres" id="f_polres">
											<option value="">-- Pilih Polres --</option>
										</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer overflow-hidden">
                            <div style="float:right;">
                                <button type="reset" onclick="reset_form()" class="btn btn-warning">Reset</button>
                                <button type="button" id="cari" class="btn btn-success" onclick="getSum(); reloadtbl();" >Cari</button>
                                <!-- <button type="submit" id="cari" class="btn btn-success" type="submit" onclick="lihatDt()">Cari</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	<div class="col-xl-12 col-md-12 col-lg-12">
		<div class="card">
            <div class="card-body">
				<div class="row">
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-user-secret danger feature-icon bg-danger"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Pos Pol</small>
							<h3 class="font-weight-semibold mb-0" id="pos_polisi">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold loc"></span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-fire primary feature-icon bg-primary"></i>
						</div>
						<div class="ml-3">
							<small class=" mb-0">Gangguan</small><br>
							<h3 class="font-weight-semibold mb-0" id="gangguan">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold loc"></span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
						<div class="feature">
							<i class="fa fa-institution secondary feature-icon bg-secondary"></i>
						</div>
						<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Yan Publik</small>
							<h3 class="font-weight-semibold mb-0" id="yanpublik">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold loc"></span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex">
						<div class="feature">
							<i class="fa fa-ambulance success feature-icon bg-success"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Yan Darurat</small>
							<h3 class="font-weight-semibold mb-0" id="yandarurat">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold loc"></span></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End row-->

<!-- Row -->	
<!-- <div class="row">
	<div class="col-xl-8 col-md-12 col-lg-12">
		<div class="card">
			<div class="overflow-hidden">
				<div id="live-chart" class="worldh h-276" ></div>
			</div>
		</div>
	</div> 
	<div class="col-xl-4 col-md-12 col-lg-12">
		<div class="card overflow-hidden">
			<div class="card-header">
                <div class="mr-3">Kondisi Jalan</div>
				<div class="card-options">
				</div>
			</div>
			<div class="card-body p-0">
				<div class="list-group list-group-flush ">
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround"  src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Ambang Gangguan</div>
						</div>
						<div class="ml-auto">
							<a>100.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 rounded-circle avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Kegiatan Masyarakat</div>
						</div>
						<div class="ml-auto">
							<a>50.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Penutupan Jalur</div>
						</div>
						<div class="ml-auto">
							<a>40.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Kecelakaan</div>
						</div>
						<div class="ml-auto">
							<a>40.000</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- End Row -->

<!--Row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data SSC&nbsp;<span style="font-weight:bold;" class="loc"></span></h3>
				<div class="card-options">
                        <!-- <form >
                            <div class="input-group">
                                <input type="date">
                            </div>
                        </form> -->
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
                    <div class="row">
						<div class="col-md-12">
                            <!-- <div id="map"></div> -->
                        </div>
					</div>
                    </div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<!-- <h5 class="font-weight-semibold">Wilayah<span class="text-muted fs-12"></span></h5>
						<div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Rabu, 29 Desember 2020</button></a>
							</div>
							<br> -->
  						<!--div class="mb-2"><a href="javascript:void(0)" onclick="export_excel_intan()" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a></div-->
						<div class="table-responsive text-muted">
							<table class="table border table-bordered text-nowrap mb-0" style="color:black" id="tabel">
								<thead style="background-color:turquoise;">
									<tr height="50">
										<td align="center" width="150">Layanan</td>
										<td align="center" width="150">Jenis</td>
										<td align="center" width="150">Jalan</td>
										<td align="center" width="150">Nama</td>
										<td align="center" width="150">Tanggal</td>
										<td align="center" width="150">Polda</td>
										<td align="center" width="150">Polres</td>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
                            <!-- <div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Selengkapnya</button></a>
                            </div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Grafik Data SSC&nbsp;<span style="font-weight:bold;" class="loc"></span></div>
            <div class="card-body">
                <canvas id="intanchart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

