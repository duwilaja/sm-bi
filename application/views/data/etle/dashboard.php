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
								<opn value="">-- Pilih Polres --</option>
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
									<i class="fa fa-list-alt primary feature-icon bg-primary"></i>
								</div>
								<div class="ml-3">
									<small class=" mb-0" style="font-weight:bold;">Total Pelanggaran</small><br>
									<h3 class="font-weight-semibold mb-0" id="total">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda1">Seluruh Indonesia</span></small>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres1"></span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-check danger feature-icon bg-danger"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Tervalidasi</small>
									<h3 class="font-weight-semibold mb-0" id="tervalidasi">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda2">Seluruh Indonesia</span></small>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres2"></span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-book secondary feature-icon bg-secondary"></i>
								</div>
								<div class=" d-flex flex-column ml-3"> <small class=" mb-0" style="font-weight:bold;">Terberkas</small>
									<h3 class="font-weight-semibold mb-0" id="terberkas">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda3">Seluruh Indonesia</span></small>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres3"></span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-paper-plane success feature-icon bg-success"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Terkirim</small>
									<h3 class="font-weight-semibold mb-0" id="terkirim">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda4">Seluruh Indonesia</span></small>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres4"></span></small>
								</div>
							</div>
							<div class="item d-flex">
									<div class="feature">
										<i class="fa fa-users feature-icon bg-success" style="box-shadow: 0 20px 20px -10px rgb(255 193 7 / 52%), 0px 5px 10px 0px rgb(154 103 11 / 15%);
										transition: box-shadow .2s ease;
										background-image: linear-gradient(to right,#FFC107,#FF9800);"></i>
									</div>
									<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Terkonfirmasi</small>
										<h3 class="font-weight-semibold mb-0" id="terkonfirmasi">0</h3>
										<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda5">Seluruh Indonesia</span></small>
										<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres5"></span></small>
									</div>
							</div>
							<div class="item d-flex">
									<div class="feature">
										<i class="fa fa-bank feature-icon bg-success" style="box-shadow: 0 20px 20px -10px rgb(255 193 7 / 52%), 0px 5px 10px 0px rgb(154 103 11 / 15%);
										transition: box-shadow .2s ease;
										background-image: linear-gradient(to right,#fc19e6,#ed09d7);"></i>
									</div>
									<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Terbayar</small>
										<h3 class="font-weight-semibold mb-0" id="terbayar">0</h3>
										<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda6">Seluruh Indonesia</span></small>
										<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres6"></span></small>
									</div>
							</div>
							<div class="item d-flex">
									<div class="feature">
										<i class="fa fa-ban feature-icon bg-danger" style="box-shadow: 0 20px 20px -10px rgb(255 193 7 / 52%), 0px 5px 10px 0px rgb(154 103 11 / 15%);
										transition: box-shadow .2s ease;
										"></i>
									</div>
									<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Blokir Stnk</small>
										<h3 class="font-weight-semibold mb-0" id="blokir">0</h3>
										<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polda7">Seluruh Indonesia</span></small>
										<small class="mb-0 text-muted"><span class="text-success font-weight-semibold" id="polres7"></span></small>
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
							<div class="col-lg-6 col-md-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Grafik  Line Etle</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div id="grafik_line" class="chartsh "></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Grafik Bar Etle</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div id="grafik_bar" class="chartsh "></div>
									</div>
								</div>
							</div>
						</div>










