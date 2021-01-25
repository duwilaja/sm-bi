<style>
	#map {
		height: 277px;
	}

	view {
	margin: auto;
	width: 600px;
	}

	.wrapper {
	position: relative;
	overflow: auto;
	border: 1px solid black;
	white-space: nowrap;
	}

	.sticky-col {
	position: sticky;
	position: -webkit-sticky;    
	background-color: white;
	}

	.first-col {
	background: #EEE;
	width: auto;
	min-width: auto;
	max-width: auto;
	left: 0px;    
	}

	.second-col {
	width: 150px;
	min-width: 150px;
	max-width: 150px;
	left: 100px;    
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
							<h3 class="font-weight-semibold mb-0"><?=$md?></h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
						<div class="feature">
							<i class="fa fa-ambulance danger feature-icon bg-danger"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Luka Berat</small>
							<h3 class="font-weight-semibold mb-0"><?=$lb?></h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
						<div class="feature">
							<i class="fa fa-wheelchair secondary feature-icon bg-secondary"></i>
						</div>
						<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Luka Ringan</small>
							<h3 class="font-weight-semibold mb-0"><?=$lr?></h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
					<div class=" col-xl-3 col-sm-6 d-flex">
						<div class="feature">
							<i class="fa fa-dollar success feature-icon bg-success"></i>
						</div>
						<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Kerugian Materi</small>
							<h3 class="font-weight-semibold mb-0"><?=torp($rumat)?></h3>
							<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--End row-->
<!-- <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div id="live-chart" class="worldh h-276" ></div>
		</div>
	</div>
</div> -->

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data AIS</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="card-body p-6">
				<div class="panel panel-primary">
					<div class="tab_wrapper first_tab">
						<ul class="tab_list">
							<li>Grafik</li>
							<li>Persentase</li>
							<li>Maps</li>
						</ul>
						<div class="content_wrapper">
							<div class="tab_content active">
								<div class="row">
									<div class="col-md-12">
										<div id="bar-perilaku" class="worldh h-276" ></div>
									</div>
									<div class="col-md-12">
										<div class="">
											<!-- <div class="card-header">
												<h3 class="card-title">Data Kecelakaan dan Pelanggaran Lalu Lintas</h3>
											</div> -->
											<!-- <h5 class="font-weight-semibold">Wilayah<span class="text-muted fs-12"></span></h5> -->
											<div class="view">
												<div class="wrapper"> 
													<table class="table" id="t_prilaku_pribadi">
													<thead id="h_prilaku_pribadi">
														<tr>
															<th class="sticky-col first-col"></th>
														</tr>
													</thead>
													<tbody id="b_prilaku_pribadi">
													
													</tbody>
													</table>
												</div>
											</div> 
										</div>
									</div>
								</div>	
							</div>
							<div class="tab_content">
								<!-- row -->
								<div class="row">
									<div class="col-md-12">
										<div id="pie-perilaku" class="worldh h-276"></div>
									</div>
								</div>
								<!-- end row -->
							</div>
							<div class="tab_content">
								<!-- row -->
								<div class="row">
									<div class="col-md-12">
										<div id="map"></div>
										<div id="map2" style="display:inline-block"></div>
									</div>
								</div>
								<!-- end row -->
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


