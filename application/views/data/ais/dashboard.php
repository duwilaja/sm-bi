<style>

#map {
	height: 277px;
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
                                        <select class="form-control form-control-sm"  name="f_polda" id="f_polda">
											<option value="">-- Pilih Polda --</option>
										</select>
                                    </div>
                                </div>
								<div class="col-md-2">
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
                                <button type="submit" id="cari" class="btn btn-success" type="submit" >Cari</button>
                                <!-- <button type="submit" id="cari" class="btn btn-success" type="submit" onclick="lihatDt()">Cari</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	<div class="col-xl-12  col-lg-12">
		<div class="card">
            <div class="card-body">
				<div class="row">
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-bed primary feature-icon bg-primary"></i>
						</div>
						<div class="ml-3">
							<small class=" mb-0">Meninggal</small><br>
							<h3 class="font-weight-semibold mb-0">5,643</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-ambulance danger feature-icon bg-danger"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Luka Berat</small>
							<h3 class="font-weight-semibold mb-0">2,536</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
						<div class="feature">
							<i class="fa fa-wheelchair secondary feature-icon bg-secondary"></i>
						</div>
						<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Luka Ringan</small>
							<h3 class="font-weight-semibold mb-0">12,863</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex">
						<div class="feature">
							<i class="fa fa-dollar success feature-icon bg-success"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Kerugian Materi</small>
							<h3 class="font-weight-semibold mb-0">7,836</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div id="live-chart" class="worldh h-276" ></div>
		</div>
	</div>

</div>
<!--Row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Live Data Kecelakaan Lalu lintas</h3>
				<div class="card-options">
                        <form >
                            <div class="input-group">
                                <input type="month">
                            </div>
                        </form>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div id="map"></div>
						<div id="map2" style="display:inline-block"></div>
                    </div>
					<div class="col-xl-6 col-lg-6 col-md-12">
						<!-- <h5 class="font-weight-semibold">Wilayah<span class="text-muted fs-12"></span></h5> -->
						<div class="table-responsive text-muted">
							<table class="table text-nowrap border-0 mb-0 ">
                                <thead>
                                    <tr>
                                        <th>Kendaraan</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
								<tbody>
									<tr class="border-bottom">
										<td class="p-2">Motor</td>
										<td class="p-2">40</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-secondary" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Mobil</td>
										<td class="p-2">35</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-primary" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Truk</td>
										<td class="p-2">22</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Umum</td>
										<td class="p-2">10</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-warning" href="#"> Detail</a></td>
									</tr>
								</tbody>
							</table>
                            <div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Selengkapnya</button></a>
                            </div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12">
						<!-- <h5 class="font-weight-semibold">Penyebab Kecelakaan<span class="text-muted fs-12"></span></h5> -->
						<div class="table-responsive text-muted">
							<table class="table text-nowrap border-0 mb-0 ">
                                <thead>
                                    <tr>
                                        <th>Penyebab</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
								<tbody>
									<tr class="border-bottom">
										<td class="p-2">Mengantuk</td>
										<td class="p-2">10</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-secondary" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Mabuk</td>
										<td class="p-2">20</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-primary" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Terserempet</td>
										<td class="p-2">12</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Balap Liar</td>
										<td class="p-2">28</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-warning" href="#"> Detail</a></td>
									</tr>
								</tbody>
							</table>
                            <div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Selengkapnya</button></a>
                            </div>
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
			<div class="card-header">
				<h3 class="card-title">Data Kecelakaan dan Pelanggaran Lalu Lintas</h3>
			</div>
						<!-- <h5 class="font-weight-semibold">Wilayah<span class="text-muted fs-12"></span></h5> -->
						<div class="table-responsive text-muted">
							<!-- <div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Rabu, 29 Desember 2020</button></a>
							</div> -->
							<br>
							<table class="table border table-bordered text-nowrap mb-0" style="color:black">
								<thead>
								<tr height="50" style="background-color:turquoise;">
									<td align="center" width="150" rowspan="2">Polda</td>
									<td align="center" width="150" rowspan="2">Jumlah Pertahun (2020)</td>
									<td align="center" width="300" colspan="3">Korban</td>
									<td align="center" width="150" rowspan="2">Kerugian Materi</td>
								</tr>
								<tr height="50" style="background-color:wheat;">
									<td align="center" width="200">Meninggal</td>
									<td align="center" width="200">Luka Berat</td>
									<td align="center" width="200">Luka Ringan</td>
								</tr>
								</thead>
								<tbody>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150">Aceh</td>
									<td align="center" width="150">100</td>
									<td align="center" width="150">50</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">6.000.000.000</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150">Sumut</td>
									<td align="center" width="150">100</td>
									<td align="center" width="150">50</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">6.000.000.000</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150">Sumbar</td>
									<td align="center" width="150">100</td>
									<td align="center" width="150">50</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">6.000.000.000</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150">Riau</td>
									<td align="center" width="150">100</td>
									<td align="center" width="150">50</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">6.000.000.000</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150">Bengkulu</td>
									<td align="center" width="150">100</td>
									<td align="center" width="150">50</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">25</td>
									<td align="center" width="150">6.000.000.000</td>
								</tr>
								</tbody>
							</table>
                            <div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Selengkapnya</button></a>
                            </div>
						</div>
					</div>
	</div>
</div>
                        

