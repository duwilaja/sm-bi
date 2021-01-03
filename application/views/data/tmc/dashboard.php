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
	<div class="col-xl-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-body" style="cursor: all-scroll;">
				<div class="row">
					<div class="col-md-12">
						<div class="owl-carousel">
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-info primary feature-icon bg-primary"></i>
								</div>
								<div class="ml-3">
									<small class=" mb-0" style="font-weight:bold;">Informasi Lalin</small><br>
									<h3 class="font-weight-semibold mb-0" id="t_pnp">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-users danger feature-icon bg-danger"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Interaksi</small>
									<h3 class="font-weight-semibold mb-0" id="t_bus">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-globe secondary feature-icon bg-secondary"></i>
								</div>
								<div class=" d-flex flex-column ml-3"> <small class=" mb-0" style="font-weight:bold;">Publikasi</small>
									<h3 class="font-weight-semibold mb-0" id="t_brg">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-comment success feature-icon bg-success"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Kordinasi</small>
									<h3 class="font-weight-semibold mb-0" id="t_motor">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
									<div class="feature">
										<i class="fa fa-building feature-icon bg-success" style="box-shadow: 0 20px 20px -10px rgb(255 193 7 / 52%), 0px 5px 10px 0px rgb(154 103 11 / 15%);
										transition: box-shadow .2s ease;
										background-image: linear-gradient(to right,#FFC107,#FF9800);"></i>
									</div>
									<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Prasarana Publik</small>
										<h3 class="font-weight-semibold mb-0" id="t_khusus">0</h3>
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


							<div class="row">
								<div class="col">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Grafik Informasi Lalin</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab_wrapper first_tab">
												<ul class="tab_list">
													<li class="">Dasar Giat</li>
													<li>Status</li>
													<li>Detail Status</li>
													<li>Sumber Info</li>
													<li>Maps</li>
													<li>Data Table</li>
												</ul>
												<div class="content_wrapper">
													<div class="tab_content active">
														<!-- row -->
														<div class="row">
															<div class="col-xl-8 col-md-12 col-lg-12">
																<!-- <div class="card"> -->
																	<div class="overflow-hidden">
																		<div id="dasar-giat" class="worldh h-276" ></div>
																	</div>
																<!-- </div> -->
															</div> 
															<div class="col-xl-4 col-md-12 col-lg-12">
																<!-- <div class="card overflow-hidden"> -->
																	<div class="card-header">
																		<div class="mr-3">Dasar Giat</div>
																	</div>
																	<div class="card-body p-0">
																		<div class="list-group list-group-flush ">
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 avatar avatar-md brround"  src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Permintaan Masyarakat</div>
																				</div>
																				<div class="ml-auto">
																					<a>100</a>
																				</div>
																			</div>
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 rounded-circle avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Laporan Pengaduan</div>
																				</div>
																				<div class="ml-auto">
																					<a>50</a>
																				</div>
																			</div>
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Atensi Pimpinan</div>
																				</div>
																				<div class="ml-auto">
																					<a>40</a>
																				</div>
																			</div>
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Surat Perintah</div>
																				</div>
																				<div class="ml-auto">
																					<a>30</a>
																				</div>
																			</div>
																		</div>
																	</div>
																<!-- </div> -->
															</div>
														</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
														<!-- row -->
														<div class="row">
															<div class="col-xl-8 col-md-12 col-lg-12">
																<!-- <div class="card"> -->
																	<div class="overflow-hidden">
																		<div id="status" class="worldh h-276" ></div>
																	</div>
																<!-- </div> -->
															</div> 
															<div class="col-xl-4 col-md-12 col-lg-12">
																<!-- <div class="card overflow-hidden"> -->
																	<div class="card-header">
																		<div class="mr-3">Status</div>
																	</div>
																	<div class="card-body p-0">
																		<div class="list-group list-group-flush ">
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 avatar avatar-md brround"  src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Lancar</div>
																				</div>
																				<div class="ml-auto">
																					<a>100</a>
																				</div>
																			</div>
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 rounded-circle avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Padat</div>
																				</div>
																				<div class="ml-auto">
																					<a>50</a>
																				</div>
																			</div>
																			<div class="list-group-item d-flex  align-items-center">
																				<div class="mr-2">
																					<img class="mr-3 avatar avatar-md brround" src="<?php echo base_url();?>my/images/sm.png" alt="avatar">
																				</div>
																				<div class="">
																					<div class=" h6 mb-0">Macet</div>
																				</div>
																				<div class="ml-auto">
																					<a>40</a>
																				</div>
																			</div>
																		</div>
																	</div>
																<!-- </div> -->
															</div>
														</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
														
													</div>
													<div class="tab_content">
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						

