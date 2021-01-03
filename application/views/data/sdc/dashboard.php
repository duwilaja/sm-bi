<style>
#map {
		height: 277px;
	}
#map2 {
	height: 277px;
}
</style>


<div class="row">
							<div class="col-lg-12 col-md-12">
								<div  class="card">
									<div class="card-header">
										<h3 class="card-title">Filter By</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group m-0">
											<!-- <label class="form-label">Date of birth</label> -->
											<div class="row gutters-xs">
												<div class="col-5">
													<input type="date" class="form-control pull-right" id="reservation">
												</div>
												<div class="col-3">
													<select name="polda" class="form-control custom-select">
														<option value="">Pilih Polda</option>
														<option value="1">Aceh</option>
														<option value="2">Sumut</option>
														<option value="3">Sumbar</option>
													</select>
												</div>
												<div class="col-4">
													<select name="" class="form-control custom-select">
														<option value="">Pilih Polres</option>
														<option value="">ACEH BARAT</option>
														<option value="">ACEH BARAT DAYA</option>
														<option value="">SABANG</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

<!--Row-->
<div class="row">
	<div class="col-xl-12 col-md-12 col-lg-12">
		<div class="card">
            <div class="card-body">
				<div class="row">
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-user primary feature-icon bg-primary"></i>
						</div>
						<div class="ml-3">
							<small class=" mb-0">Instruktur</small><br>
							<h3 class="font-weight-semibold mb-0">5,643</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-id-card danger feature-icon bg-danger"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">SIM</small>
							<h3 class="font-weight-semibold mb-0">2,536</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
						<div class="feature">
							<i class="fa fa-exclamation-triangle secondary feature-icon bg-secondary"></i>
						</div>
						<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Penindakan Laka Lantas</small>
							<h3 class="font-weight-semibold mb-0">12,863</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex">
						<div class="feature">
							<i class="fa fa-ambulance success feature-icon bg-success"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Laka Lantas</small>
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
                    <div class="row">
						<div class="col-md-6">
                            <div id="map2"></div>
                        </div>
						<div class="col-md-6">
                            <div class="overflow-hidden">
                                <div id="live-chart" class="worldh h-276" ></div>
                            </div>
                        </div>
					</div>
                    </div>
					<div class="col-xl-6 col-lg-6 col-md-12">
						<!-- <h5 class="font-weight-semibold">Wilayah<span class="text-muted fs-12"></span></h5> -->
						<div class="table-responsive text-muted">
							<table class="table text-nowrap border-0 mb-0 ">
                                <thead>
                                    <tr>
                                        <th>Wilayah</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
								<tbody>
									<tr class="border-bottom">
										<td class="p-2">Bandung</td>
										<td class="p-2">40</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-secondary" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Jakarta</td>
										<td class="p-2">35</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-primary" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Riau</td>
										<td class="p-2">22</td>
										<td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
									</tr>
									<tr class="border-bottom">
										<td class="p-2">Bogor</td>
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
	<div class="col-xl-8 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Peta Informasi SDC</h3>
			</div>
			<div class="card-body">
				<div class="row">
				    <div class="col-xl-7 col-lg-7 col-md-12">
                    <div id="map"></div>
						<!-- <div class="overflow-hidden">
						    <div id="world-map-markers" class="worldh h-276" ></div> 
						</div> -->
					</div>
					<div class="col-xl-5 col-lg-5 col-md-12">
					    <h5 class="font-weight-semibold"><span class="text-muted fs-12"></span></h5>
					    <div class="table-responsive text-muted">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" name="polda">
                                                <option value="">-- Pilih Polda --</option>
                                                <option value="1">Polda Jabar</option>
                                                <option value="2">Polda Riau</option>
                                                <option value="3">Polda Metro</option>
                                                <option value="4">Polda Jateng</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div style="
                                                background: #ffffff;
                                                padding: 5px;
                                                width: 100%;
                                                border-radius: 4px;
                                                text-align: center;
                                                border: solid 1px #DDD;
                                            ">Data Masuk</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table text-nowrap border-0 mb-0 ">
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td class="p-2">Polres Cimahi</td>
                                                <td class="p-2">2400</td>
                                                <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="p-2">Polres Cimanggis</td>
                                                <td class="p-2">1500</td>
                                                <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="p-2">Polres Majalengka</td>
                                                <td class="p-2">800</td>
                                                <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="p-2">Polres Cisarua</td>
                                                <td class="p-2">200</td>
                                                <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div class="tombol_detail">
                                        <a href="#"><button class="btn btn-default w-100 mt-3">Detail</button></a>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<div class="col-xl-4 col-md-12 col-lg-12">
		<div class="card overflow-hidden">
			<div class="card-header">
                <div class="mr-3">Penindakan</div>
                <div style="margin-left: auto;display:inherit;">
                    <select class="form-control form-control-sm" name="penindakan">
                        <option value="">-- Pilh --</option>
                        <option value="1">Manual E-Tilang</option>
                        <option value="2">ETLE</option>
                        <option value="3">Olah TKP</option>
                    </select>
                    <a href="#"><button class="btn btn-default btn-sm ml-2">Detail</button></a>
                </div>
			</div>
			<div class="card-body p-0">
				<div class="list-group list-group-flush ">
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround"  src="<?=base_url()?>aronox/assets/images/users/5.jpg" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Tidak Menggunakan Masker</div>
						</div>
						<div class="ml-auto">
							<a>100.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 rounded-circle avatar avatar-md brround" src="<?=base_url()?>aronox/assets/images/users/8.jpg" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Tidak Menggunakan Helm</div>
						</div>
						<div class="ml-auto">
							<a>50.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround" src="<?=base_url()?>aronox/assets/images/users/7.jpg" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Lampu Mati</div>
						</div>
						<div class="ml-auto">
							<a>40.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround" src="<?=base_url()?>aronox/assets/images/users/12.jpg" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Menerobos Lampu Merah</div>
						</div>
						<div class="ml-auto">
							<a>30.000</a>
						</div>
					</div>
					<div class="list-group-item d-flex  align-items-center">
						<div class="mr-2">
							<img class="mr-3 avatar avatar-md brround" src="<?=base_url()?>aronox/assets/images/users/10.jpg" alt="avatar">
						</div>
						<div class="">
							<div class=" h6 mb-0">Overload</div>
						</div>
						<div class="ml-auto">
							<a>10.000</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--Row-->
<div class="row">
	<div class="col-xl-5 col-md-12 col-lg-5">
		<div class="card">
		    <div class="card-header">
                <div class="mr-3">Penanganan SIM</div>
                <div style="margin-left: auto;display:inherit;">
                    <!-- <select class="form-control form-control-sm" name="polda_penanganan_sim">
                        <option value="">-- Pilh --</option>
                        <option value="0">Semua</option>
                        <option value="1">Polda Jabar</option>
                        <option value="2">Polda Metro</option>
                        <option value="3">Polda Riau</option>
                    </select> -->
                </div>
			</div>
            <div class="card-body">
						<!-- <h3 class="card-title">Total Sales By Org Unit</h3> -->
						<!-- <small class="text-muted">Total Sales</small>
						<h3 class="font-weight-semibold">69,453</h3> -->
						<div class="progress grouped h-3">
							<div class="progress-bar w-25 bg-primary " role="progressbar"></div>
							<div class="progress-bar w-30 bg-danger" role="progressbar"></div>
							<div class="progress-bar w-20 bg-secondary" role="progressbar"></div>
						</div>
						<div class="row mt-3 pt-3">
							<div class="col border-right">
								<p class=" number-font1 mb-0"><span class="dot-label bg-primary"></span>SIM Baru</p>
								<h5 class="mt-2 font-weight-semibold mb-0">1000</h5>
							</div>
							<div class="col  border-right">
								<p class=" number-font1 mb-0"><span class="dot-label bg-danger"></span>Perpanjang SIM</p>
								<h5 class="mt-2 font-weight-semibold mb-0">500</h5>
							</div>
							<div class="col">
								<p class="number-font1 mb-0"><span class="dot-label bg-secondary"></span>DPS</p>
								<h5 class="mt-2 font-weight-semibold mb-0">200</h5>
							</div>
						</div>
                        <div class="row">
                            <table class="table text-nowrap border-0 mt-1">
                                <tbody>
                                    <tr class="border-bottom">
                                        <td class="p-2">Polres Cimahi</td>
                                        <td class="p-2">2400</td>
                                        <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="p-2">Polres Cimanggis</td>
                                        <td class="p-2">1500</td>
                                        <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="p-2">Polres Majalengka</td>
                                        <td class="p-2">800</td>
                                        <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="p-2">Polres Cisarua</td>
                                        <td class="p-2">200</td>
                                        <td class="p-2 pb-0 pt-3 text-right"><a class="badge badge-pill badge-danger" href="#"> Detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
			</div>
		</div>
	</div>
	<div class="col-xl-7 col-md-12 col-lg-7">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Report Harian SDC</h3>
				<div class="card-options ">
                    <div style="margin-left: auto;display:inherit;">
                        <select class="form-control form-control-sm" name="polda_penanganan_sim">
                            <option value="0">Semua</option>
                            <option value="1">Polda Jabar</option>
                            <option value="2">Polda Metro</option>
                            <option value="3">Polda Riau</option>
                        </select>
                    </div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
						<p class=" mb-0 ">SIM Baru</p>
						<h2 class="mb-0 font-weight-semibold">-2<span class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>0.9%</span>last days</span></h2>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
						<p class=" mb-0 ">Perpanjang SIM</p>
						<h2 class="mb-0 font-weight-semibold">+ 200<span class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>0.15%</span>last days</span></h2>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
						<p class=" mb-0 ">DPS</p>
						<h2 class="mb-0 font-weight-semibold">- 4<span class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>0.4%</span>last days</span></h2>
					</div>
				</div>
				<div class="chart-wrapper">
					<canvas id="sales" class=" chartjs-render-monitor chart-dropshadow2 h-184"></canvas>
			    </div>
			</div>
		</div>
	</div>
</div>
<!--End row-->
                        

