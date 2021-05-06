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
							<i class="fa fa-ambulance primary feature-icon bg-primary"></i>
						</div>
						<div class="ml-3">
							<small class=" mb-0">Ambulan</small><br>
							<h3 class="font-weight-semibold mb-0" id="ambulance">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="ambulance_loc"></span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-home danger feature-icon bg-danger"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Pos Pol</small>
							<h3 class="font-weight-semibold mb-0" id="pos_polisi">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="pos_polisi_loc"></span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
						<div class="feature">
							<i class="fa fa-search secondary feature-icon bg-secondary"></i>
						</div>
						<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Patrol</small>
							<h3 class="font-weight-semibold mb-0" id="pos_pjr">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="pos_pjr_loc"></span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex">
						<div class="feature">
							<i class="fa fa-hospital-o success feature-icon bg-success"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Faskes</small>
							<h3 class="font-weight-semibold mb-0" id="faskes">0</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="faskes_loc"></span></small>
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
				<h3 class="card-title">Live Data Inteligent Traffic Analytic (INTAN)</h3>
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
  						<div class="mb-2"><a href="javascript:void(0)" onclick="export_excel_intan()" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a></div>
						<div class="table-responsive text-muted">
							<table class="table border table-bordered text-nowrap mb-0" style="color:black" id="tabel">
								<thead style="background-color:turquoise;">
									<tr height="50">
										<td align="center" width="150">Case</td>
										<td align="center" width="150">Lokasi</td>
										<!-- <td align="center" width="300" colspan="2">Kordinat</td> -->
										<td align="center" width="150">Time Call</td>
										<td align="center" width="150">Respons Time</td>
										<td align="center" width="150">Durasi</td>
										<td align="center" width="150">Tanggal</td>
										<td align="center" width="150">Status</td>
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
			<div class="card-status card-status-left bg-warning br-bl-7 br-tl-7"></div>
			<div class="card-header">
				<h3 class="card-title">Statistik Data</h3>
				<div class="card-options">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        <!-- <form >
                            <div class="input-group">
                                <input type="date">
                            </div>
                        </form> -->
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-3">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<div class="panel panel-warning">
								<div class="list-group">
									<a class="nav-link list-group-item" id="trend-data-tab" data-toggle="pill" href="#trend-data" role="tab" aria-controls="trend-data" aria-selected="false">Trend Data</a>
									<a class="nav-link list-group-item" id="case-fatality-rate-tab" data-toggle="pill" href="#case-fatality-rate" role="tab" aria-controls="case-fatality-rate" aria-selected="false">Case Fatality Rate</a>
									<a class="nav-link list-group-item" id="fatality-index-tab" data-toggle="pill" href="#fatality-index" role="tab" aria-controls="fatality-index" aria-selected="false">Fatality Index</a>
									<a class="nav-link list-group-item" id="index-kinerja-tab" data-toggle="pill" href="#index-kinerja" role="tab" aria-controls="index-kinerja" aria-selected="false">Index Kinerja</a>
									<a class="nav-link list-group-item" id="index-ketertiban-tab" data-toggle="pill" href="#index-ketertiban" role="tab" aria-controls="index-ketertiban" aria-selected="false">Index Ketertiban</a>
									<a class="nav-link list-group-item" id="index-kecelakaan-tab" data-toggle="pill" href="#index-kecelakaan" role="tab" aria-controls="index-kecelakaan" aria-selected="false">Index Kecelakaan</a>
									<a class="nav-link list-group-item" id="index-keamanan-tab" data-toggle="pill" href="#index-keamanan" role="tab" aria-controls="index-keamanan" aria-selected="false">Index Keamanan</a>
									<a class="nav-link list-group-item" id="index-keselamatan-tab" data-toggle="pill" href="#index-keselamatan" role="tab" aria-controls="index-keselamatan" aria-selected="false">Index Keselamatan</a>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-9">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade konten-card" id="trend-data" role="tabpanel" aria-labelledby="trend-data-tab">
								<div class="card">
									<div class="card-header">Trend Data - Polrestabes Surakarta</div>
									<div class="card-body">
										<canvas id="td" width="400" height="400"></canvas>
									</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="case-fatality-rate" role="tabpanel" aria-labelledby="case-fatality-rate-tab">
								<div class="card">
									<div class="card-header">Case Fatality Rate - Polrestabes Surkarta</div>
									<div class="card-body">
										<canvas id="cfr" width="400" height="400"></canvas>
									</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="fatality-index" role="tabpanel" aria-labelledby="fatality-index-tab">
								<div class="card">
									<div class="card-header">Fatality Index - Polrestabes Surkarta</div>
									<div class="card-body">
										<canvas id="fi1" width="400" height="400"></canvas>
									</div>
								</div>
								<div class="card">
									<div class="card-header"> Indeks Fatalitas per Provinsi</div>
									<div class="card-body">
										<canvas id="fi2" width="400" height="400"></canvas>
									</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="index-kinerja" role="tabpanel" aria-labelledby="index-kinerja-tab">
								<div class="card">
								<!-- <div class="card-header">Index Kinerja Cybercorps<span style="position:relative;left:8px;"><b>Polrestabes Surakarta  - Januari 2021</b></span></div> -->
								<div class="card-header">Index Kinerja Cybercorps<span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
								<div class="card-body">
									<canvas id="ikc" width="800" height="280"></canvas>
								</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="index-ketertiban" role="tabpanel" aria-labelledby="index-ketertiban-tab">
								<div class="card">
									<div class="card-header">Indesk Ketertiban<span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
									<div class="card-body">
										<canvas id="ikt1" width="800" height="280"></canvas>
									</div>
								</div>
								<div class="card">
									<div class="card-header">Indesk Kepatuhan Remaja terhadap tata cara tertib berlalu lintas<span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
									<div class="card-body">
										<canvas id="ikt2" width="800" height="280"></canvas>
									</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="index-kecelakaan" role="tabpanel" aria-labelledby="index-kecelakaan-tab">
								<div class="card">
								<div class="card-header">Indesk Target Kecelakaan <span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
								<div class="card-body">
									<canvas id="itc" width="800" height="280"></canvas>
								</div>
								</div>
								<div class="card">
								<div class="card-header">Indesk fatalitas korban kecelakaan lalu lintas <span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
								<center><span><b>Per Kecamatan</b></span></center>
								<div class="card-body">
									<canvas id="itc2" width="800" height="280"></canvas>
								</div>
								</div>
								<div class="card">
								<div class="card-header">Indeks Perbandingan Jumlah Kecelakaan Dan Jumlah Korban  <span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
								<center><span><b>Per Kecamatan</b></span></center>
								<div class="card-body">
									<canvas id="itc3" width="800" height="280"></canvas>
								</div>
								</div>
								<div class="card">
								<div class="card-header">Indeks Perbandingan Jumlah Kecelakaan Dan Jumlah Korban <span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
								<!-- <center><span><b>Jumlah Korban Meninggal Dunia</b></span></center> -->
								<center><span><b>Per Jenis Kendaraan</b></span></center>
								<div class="card-body">
									<canvas id="itc4" width="800" height="280"></canvas>
								</div>
								</div>
								<div class="card">
								<div class="card-header">Kecelakaan Disebabkan Perilaku Pengemudi <span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
								<center><span><b>Jumlah Korban Meninggal Dunia</b></span></center>
								<div class="card-body">
									<canvas id="itc5" width="800" height="400"></canvas>
								</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="index-keamanan" role="tabpanel" aria-labelledby="index-keamanan-tab">
								<div class="card">
									<div class="card-header">Indeks Keamanan<span style="position:relative;left:8px;"><b>Polrestabes Surakarta</b></span></div>
									<div class="card-body">
										<canvas id="ikc2" width="800" height="280"></canvas>
									</div>
								</div>
							</div>
							<div class="tab-pane fade konten-card" id="index-keselamatan" role="tabpanel" aria-labelledby="index-keselamatan-tab">
								<div class="card">
									<div class="card-header">Indesk Keselamatan<span style="position:relative;left:8px;"><b>Polrestabes Surakarta </b></span></div>
									<div class="card-body">
										<canvas id="ikc3" width="800" height="280"></canvas>
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

