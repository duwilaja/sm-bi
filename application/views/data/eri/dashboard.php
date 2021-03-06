<style>
	#map {
		height: 277px;
	}
	#map2 {
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
	<div class="col-xl-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-body" style="cursor: all-scroll;">
				<div class="row">
					<div class="col-md-12">
						<div class="owl-carousel">
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-database primary feature-icon bg-primary"></i>
								</div>
								<div class="ml-3">
									<small class=" mb-0" style="font-weight:bold;">Mobil Penumpang</small><br>
									<h3 class="font-weight-semibold mb-0" id="t_pnp">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-database danger feature-icon bg-danger"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Bus</small>
									<h3 class="font-weight-semibold mb-0" id="t_bus">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-database secondary feature-icon bg-secondary"></i>
								</div>
								<div class=" d-flex flex-column ml-3"> <small class=" mb-0" style="font-weight:bold;">Mobil Barang</small>
									<h3 class="font-weight-semibold mb-0" id="t_brg">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-database success feature-icon bg-success"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Sepeda Motor</small>
									<h3 class="font-weight-semibold mb-0" id="t_motor">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-database feature-icon bg-success" style="box-shadow: 0 20px 20px -10px rgb(255 193 7 / 52%), 0px 5px 10px 0px rgb(154 103 11 / 15%);
									transition: box-shadow .2s ease;
									background-image: linear-gradient(to right,#FFC107,#FF9800);"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Kendaraan Khusus</small>
									<h3 class="font-weight-semibold mb-0" id="t_khusus">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-database feature-icon bg-success" style="box-shadow: 0 20px 20px -10px #009688, 0px 5px 10px 0px rgb(33 152 130 / 29%);
									transition: box-shadow .2s ease;
									background-image: linear-gradient(to right,#009688,#4CAF50);"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Total</small>
									<h3 class="font-weight-semibold mb-0" id="t_total">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Row-->
<div class="row">
	<div class="col-xl-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tabel Perbandingan Data ERI</h3>
				<!-- <div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
				</div> -->
			</div>
			<div class="card-body">
				<div class="table-responsive text-muted">
					<table class="table text-nowrap border-0 mb-0 table-bordered ">
						<thead>
							<tr style="background-color:turquoise;">
								<th >Ranmor</th>
								<th >Data Bulan Lalu</th>
								<th >Data Bulan ini</th>
								<th>Persentase</th>	
							</tr>
						</thead>
						<tbody id="tabel_eri_bulan">
							<tr class="border-bottom">
								<td class="p-2">Mobil PNP</td>
								<td class="p-2">40</td>
								<td class="p-2">40</td>
								<td class="p-2">40 %</td>
							</tr>
						</tbody>
					</table>
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
				<h3 class="card-title">Statistik Data ERI</h3>
				<div class="card-options">
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<div class="row">
										<div class="col-xl-6 col-lg-4 col-md-4">
											<div class="overflow-hidden">
												<div id="chart-donat"></div>
											</div>
										</div>
										<div class="col-xl-6 col-lg-8 col-md-8">
											<table class="table table-hover mb-0">
												<tbody id="donat_eri_tabel">
												</tbody>
											</table>
										</div>
									</div>
									<div class="mt-4 mt-md-0">
										<h6 class=" mb-0 ">Total</h6>
										<h2 class="mb-0"><span class="font-weight-semibold" id="total_donat">0</span> <span class="fs-12 text-muted" id="persen_nt"></span></h2>
										<p class="mb-0 text-muted">Persentasi Berdasarkan Diagram Lingkaran</p>
									</div>
								</div>                            
							</div>
							<div class="col-md-6">
								<div class="overflow-hidden">
									<div id="live-chart" class="worldh h-276" ></div>
								</div>
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
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div id="map" style="height:450px; z-index: 1;"></div>
			</div>
		</div>
	</div>
</div>	

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Jumlah Data ERI</h3>
				<div class="card-options">
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="tabel_eri">
						<thead>
							<tr>
								<th>Provinsi</th>
								<th>Mobil Penumpang</th>
								<th>Bus</th>
								<th>Mobil Barang</th>
								<th>Sepeda Motor</th>
								<th>Kendaraan Khusus</th>
								<th>Total</th>
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


