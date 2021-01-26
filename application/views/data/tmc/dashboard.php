<style>
	#map {
		height: 500px;
	}
	#map2 {
		height: 500px;
	}

	#map3 {
		height: 500px;
	}
	#map4 {
		height: 500px;
	}
	#map5 {
		height: 500px;
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
										<select class="form-control form-control-sm" name="f_polda" id="f_polda">
											<option value="">No Selected</option>
											<?php foreach($polda as $row):?>
											<option value="<?php echo $row->da_id;?>"><?php echo $row->da_nam;?></option>
											<?php endforeach;?>
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
										<h3 class="card-title">Informasi Lalin</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab_wrapper first_tab">
												<ul class="tab_list">
													<li class="">Grafik</li>
													<li>Maps</li>
													<li>Table</li>
												</ul>
												
												<div class="content_wrapper">
													<div class="tab_content active">
														<!-- row -->
														<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="row">
																					<div class="col-md-12">
																						<div class="">
																							<p>Kondisi Lalin</p>
																						</div>
																						<div class="overflow-hidden">
																							<div id="status-lalin" class="worldh h-276" ></div>
																						</div>
																					</div>
																					<!-- <div class="col-md-6">
																					    <div class="">
																							<p>Penyebab Kemacetan</p>
																						</div>
																						<div class="overflow-hidden">
																							<div id="penyebab-lalin" class="worldh h-276" ></div>
																						</div>
																					</div> -->
																				</div>
																			</div>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
														<!-- row -->
														<div class="row">
															<div class="col-md-12">
																<div id="map2">
																</div>
															</div>

														</div>

														<!-- end row -->
													</div>
													<div class="tab_content">
														<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-header">
																		<h3 class="card-title">Laporan Informasi Lalin TMC</h3>
																		<div class="card-options">
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table class="table" id="tabel_tmc">
																				<thead>
																					<tr>
																						<!-- <th>Nomer</th> -->
																						<th>Dasar</th>
																						<th>Nama Jalan</th>
																						<th>Lat</th>
																						<th>Lng</th>
																						<th>Waktu</th>
																						<th>Mulai</th>
																						<th>Selesai</th>
																						<th>Status</th>
																						<th>Sumber Info</th>
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
										<h3 class="card-title">Interaksi</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab_wrapper first_tab">
												<ul class="tab_list">
													<li class="">Grafik</li>
													<li>Maps</li>
													<li>Table</li>
												</ul>
												
												<div class="content_wrapper">
													<div class="tab_content active">
														<!-- row -->
														<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="row">
																					<div class="col-md-6">
																						<div class="">
																							<p>Dasar Giat</p>
																						</div>
																						<div class="overflow-hidden">
																							<div id="interaksi-dasar-giat" class="worldh h-276" ></div>
																						</div>
																					</div>
																					<div class="col-md-6">
																					    <div class="">
																							<p>Media</p>
																						</div>
																						<div class="overflow-hidden">
																							<div id="interaksi-sosisal-media" class="worldh h-276" ></div>
																						</div>
																					</div>
																				</div>
																			</div>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
														<!-- row -->
														<div class="row">
															<div class="col-md-12">
																<div id="map">
																</div>
															</div>

														</div>

														<!-- end row -->
													</div>
													<div class="tab_content">
														<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-header">
																		<h3 class="card-title">Laporan Interaksi TMC</h3>
																		<div class="card-options">
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table class="table" id="tabel_tmc_interaksi">
																				<thead>
																					<tr>
																						<!-- <th>Nomer</th> -->
																						<th>Dasar</th>
																						<th>Media</th>
																						<th>Jenis</th>
																						<th>Waktu</th>
																						<th>keterangan</th>
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
										<h3 class="card-title">Publikasi</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab_wrapper first_tab">
												<ul class="tab_list">
													<li class="">Grafik</li>
													<li>Maps</li>
													<li>Table</li>
												</ul>
												
												<div class="content_wrapper">
													<div class="tab_content active">
														<!-- row -->
															<div class="row">
																	<div class="col-md-12">
																				<div class="row">
																					<div class="col-md-6">
																						<div class="">
																							<p>Dasar Giat</p>
																						</div>
																						<div class="overflow-hidden">
																							<div id="publikasi-dasar-giat" class="worldh h-276" ></div>
																						</div>
																					</div>
																					<div class="col-md-6">
																					    <div class="">
																							<p>Media</p>
																						</div>
																						<div class="overflow-hidden">
																							<div id="publikasi-sosisal-media" class="worldh h-276" ></div>
																						</div>
																					</div>
																				</div>
																	</div>
															</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
														<!-- row -->
														<div class="row">
															<div class="col-md-12">
																<div id="map3">
																</div>
															</div>

														</div>

														<!-- end row -->
													</div>
													<div class="tab_content">
														<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-header">
																		<h3 class="card-title">Laporan Publikasi TMC</h3>
																		<div class="card-options">
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table class="table" id="tabel_tmc_publikasi">
																				<thead>
																					<tr>
																						<!-- <th>Nomer</th> -->
																						<th>Dasar</th>
																						<th>Media</th>
																						<th>Jenis</th>
																						<th>Waktu</th>
																						<th>keterangan</th>
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
										<h3 class="card-title">Kordinasi</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab_wrapper first_tab">
												<ul class="tab_list">
													<li class="">Grafik</li>
													<li>Maps</li>
													<li>Table</li>
												</ul>
												
												<div class="content_wrapper">
													<div class="tab_content active">
														<!-- row -->
														<div class="row">
															<div class="col-md-12">
																<div class="row">
																		<div class="col-md-6">
																			<div class="">
																				<p>Dasar Giat</p>
																			</div>
																			<div class="overflow-hidden">
																					<div id="kordinasi-dasar-giat" class="worldh h-276" ></div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="">
																				<p>Media</p>
																			</div>
																			<div class="overflow-hidden">
																					<div id="kordinasi-sosisal-media" class="worldh h-276" ></div>
																			</div>
																		</div>
																</div>
															</div>										
														</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
														<div class="row">
															<div class="col-md-12">
																<div id="map4">
																</div>
															</div>
														</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
													<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-header">
																		<h3 class="card-title">Laporan Publikasi TMC</h3>
																		<div class="card-options">
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table class="table" id="tabel_tmc_kordinasi">
																				<thead>
																					<tr>
																						<!-- <th>Nomer</th> -->
																						<th>Dasar</th>
																						<th>Jenis</th>
																						<th>Waktu</th>
																						<th>Giat</th>
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
										<h3 class="card-title">Prasarana Publik</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab_wrapper first_tab">
												<ul class="tab_list">
													<li class="">Grafik</li>
													<li>Maps</li>
													<li>Table</li>
												</ul>
												
												<div class="content_wrapper">
													<div class="tab_content active">
														<!-- row -->
														<div class="row">
														<div class="col-md-12">
																<div class="row">
																		<div class="col-md-12">
																			<div class="">
																				<p>Dasar Giat</p>
																			</div>
																			<div class="overflow-hidden">
																					<div id="prasarana-dasar-giat" class="worldh h-276" ></div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="">
																				<p>Media</p>
																			</div>
																			<div class="overflow-hidden">
																					<!-- <div id="prasarana-sosisal-media" class="worldh h-276" ></div> -->
																			</div>
																		</div>
																</div>
															</div>
														</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
													<div class="row">
															<div class="col-md-12">
																<div id="map5">
																</div>
															</div>
														</div>
														<!-- end row -->
													</div>
													<div class="tab_content">
															<div class="row">
															<div class="col-md-12">
																<div class="">
																	<div class="card-header">
																		<h3 class="card-title">Laporan Prasarana Publik TMC</h3>
																		<div class="card-options">
																		</div>
																	</div>
																	<div class="card-body">
																		<div class="table-responsive">
																			<table class="table" id="tabel_tmc_prasarana">
																				<thead>
																					<tr>
																						<!-- <th>Nomer</th> -->
																						<th>Prasarana</th>
																						<th>Nama</th>
																						<th>Kapasitas Parkir</th>
																						<th>Tanggal</th>
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
											</div>
										</div>
									</div>
								</div>
							    </div>
							</div>
						


						

