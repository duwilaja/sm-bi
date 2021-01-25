<style>
#map {
		height: 350px;
	}
</style>

<!--Row-->
<div class="row">
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
							<h3 class="font-weight-semibold mb-0">5,643</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-home danger feature-icon bg-danger"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Pos Pol</small>
							<h3 class="font-weight-semibold mb-0">2,536</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
						<div class="feature">
							<i class="fa fa-search secondary feature-icon bg-secondary"></i>
						</div>
						<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Patrol</small>
							<h3 class="font-weight-semibold mb-0">12,863</h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex">
						<div class="feature">
							<i class="fa fa-hospital-o success feature-icon bg-success"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Faskes</small>
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

<!-- Row -->	
<div class="row">
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
                <!-- <div style="margin-left: auto;display:inherit;">
                    <select class="form-control form-control-sm" name="penindakan">
                        <option value="">-- Pilh --</option>
                        <option value="1">Manual E-Tilang</option>
                        <option value="2">ETLE</option>
                        <option value="3">Olah TKP</option>
                    </select>
                    <a href="#"><button class="btn btn-default btn-sm ml-2">Detail</button></a>
				</div> -->
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
							<a>120</a>
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
							<a>80</a>
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
							<a>46</a>
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
</div>
<!-- End Row -->

<!--Row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Live Data Inteligent Traffic Analytic (INTAN)</h3>
				<!-- <div class="card-options">
                        <form >
                            <div class="input-group">
                                <input type="date">
                            </div>
                        </form>
				</div> -->
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="list-group list-group-flush ">
									<div class="list-group-item d-flex  align-items-center">
										<div class="mr-2">
											<img class="mr-3 avatar avatar-md brround" src="http://localhost/sm-bi/my/images/sm.png" alt="avatar">
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
											<img class="mr-3 rounded-circle avatar avatar-md brround" src="http://localhost/sm-bi/my/images/sm.png" alt="avatar">
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
											<img class="mr-3 avatar avatar-md brround" src="http://localhost/sm-bi/my/images/sm.png" alt="avatar">
										</div>
										<div class="">
											<div class=" h6 mb-0">Penutupan Jalur</div>
										</div>
										<div class="ml-auto">
											<a>40.000</a>
										</div>
									</div>
								</div>
								<div class="owl-carousel mt-4">
									<div class="item d-flex">
										<div class=" d-flex flex-column  ml-3 text-center">
											<small class="mb-0" style="font-weight:bold;">Bus</small>
											<div class="feature">
												<i class="fa fa-database danger feature-icon bg-danger"></i>
											</div>
											<div class="mt-2" id="t_bus">0</div>
										</div>
									</div>

									<div class="item d-flex">
										<div class=" d-flex flex-column  ml-3 text-center">
											<small class=" mb-0" style="font-weight:bold;">Bus</small>
											<div class="feature">
												<i class="fa fa-database danger feature-icon bg-danger"></i>
											</div>
											<div class="mb-0" id="t_bus">0</div>
										</div>
									</div>

									<div class="item d-flex">
										<div class=" d-flex flex-column  ml-3 text-center">
											<small class=" mb-0" style="font-weight:bold;">Bus</small>
											<div class="feature">
												<i class="fa fa-database danger feature-icon bg-danger"></i>
											</div>
											<div class="mb-0" id="t_bus">0</div>
										</div>
									</div>

									<div class="item d-flex">
										<div class=" d-flex flex-column  ml-3 text-center">
											<small class=" mb-0" style="font-weight:bold;">Bus</small>
											<div class="feature">
												<i class="fa fa-database danger feature-icon bg-danger"></i>
											</div>
											<div class="mb-0" id="t_bus">0</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="col-md-8">
								<div id="map"></div>
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
				<div class="card-body">
				<div class="table-responsive text-muted">
							<div class="tombol_detail">
                                <a href="#"><button class="btn btn-default w-100 mt-3">Rabu, 29 Desember 2020</button></a>
							</div>
							<br>
							<table class="table border table-bordered text-nowrap mb-0" style="color:black">
								<thead>
								<tr height="50" style="background-color:turquoise;">
									<td align="center" width="150" rowspan="2">Case</td>
									<td align="center" width="150" rowspan="2">Lokasi</td>
									<td align="center" width="300" colspan="2">Kordinat</td>
									<td align="center" width="150" rowspan="2">Time Call</td>
									<td align="center" width="150" rowspan="2">Respons Time</td>
									<td align="center" width="150" rowspan="2">durasi</td>
								</tr>
								<tr height="50" style="background-color:wheat;">
									<td align="center" width="200">Latitude</td>
									<td align="center" width="200">Longitude</td>
								</tr>
								</thead>
								<tbody>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150"><a href="#" class="badge badge-pill badge-warning">Kemacetan</a></td>
									<td align="center" width="150">Bandung</td>
									<td align="center" width="150">-6.115607757159791</td>
									<td align="center" width="150">106.78673766775614</td>
									<td align="center" width="150">15.30</td>
									<td align="center" width="150">15.40</td>
									<td align="center" width="150">10 Menit</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150"><a href="#" class="badge badge-pill badge-danger">Kecelakaan</a></td>
									<td align="center" width="150">Jakarta</td>
									<td align="center" width="150">-7.115607757159791</td>
									<td align="center" width="150">107.78673766775614</td>
									<td align="center" width="150">17.30</td>
									<td align="center" width="150">17.35</td>
									<td align="center" width="150">5 Menit</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150"><a href="#" class="badge badge-pill badge-warning">Kemacetan</a></td>
									<td align="center" width="150">Bandung</td>
									<td align="center" width="150">-6.115607757159791</td>
									<td align="center" width="150">106.78673766775614</td>
									<td align="center" width="150">15.30</td>
									<td align="center" width="150">15.40</td>
									<td align="center" width="150">10 Menit</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150"><a href="#" class="badge badge-pill badge-danger">Kecelakaan</a></td>
									<td align="center" width="150">Jakarta</td>
									<td align="center" width="150">-7.115607757159791</td>
									<td align="center" width="150">107.78673766775614</td>
									<td align="center" width="150">17.30</td>
									<td align="center" width="150">17.35</td>
									<td align="center" width="150">5 Menit</td>
								</tr>
								<tr height="50" style="background-color:whitesmoke;">
									<td align="center" width="150"><a href="#" class="badge badge-pill badge-warning">Kemacetan</a></td>
									<td align="center" width="150">Bandung</td>
									<td align="center" width="150">-6.115607757159791</td>
									<td align="center" width="150">106.78673766775614</td>
									<td align="center" width="150">15.30</td>
									<td align="center" width="150">15.40</td>
									<td align="center" width="150">10 Menit</td>
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

