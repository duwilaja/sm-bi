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
									<i class="fa fa-dollar primary feature-icon bg-primary"></i>
								</div>
								<div class="ml-3">
									<small class=" mb-0" style="font-weight:bold;">Total</small><br>
									<h3 class="font-weight-semibold mb-0" id="total">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-check danger feature-icon bg-danger"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Tervalidasi</small>
									<h3 class="font-weight-semibold mb-0" id="tervalidasi">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-book secondary feature-icon bg-secondary"></i>
								</div>
								<div class=" d-flex flex-column ml-3"> <small class=" mb-0" style="font-weight:bold;">Terberkas</small>
									<h3 class="font-weight-semibold mb-0" id="terberkas">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-paper-plane success feature-icon bg-success"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Terkirim</small>
									<h3 class="font-weight-semibold mb-0" id="terkirim">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
								</div>
							</div>
							<div class="item d-flex">
								<div class="feature">
									<i class="fa fa-building feature-icon bg-success" style="box-shadow: 0 20px 20px -10px rgb(255 193 7 / 52%), 0px 5px 10px 0px rgb(154 103 11 / 15%);
									transition: box-shadow .2s ease;
									background-image: linear-gradient(to right,#FFC107,#FF9800);"></i>
								</div>
								<div class=" d-flex flex-column  ml-3"> <small class=" mb-0" style="font-weight:bold;">Terkonfirmasi</small>
									<h3 class="font-weight-semibold mb-0" id="terkonfirmasi">0</h3>
									<small class="mb-0 text-muted"><span class="text-success font-weight-semibold">Seluruh Indonesia</span></small>
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







