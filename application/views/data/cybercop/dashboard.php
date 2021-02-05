<style>
	#map {
		height: 277px;
	}
	#map2 {
		height: 277px;
	}
</style>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Index Kinerja Cybercorps</div>
			<div class="card-body">
				<canvas id="ikc" width="400" height="400"></canvas>
			</div>
		</div>
	</div>
</div>

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
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
		<div class="card-header">
			<span>Grafik User Per Polda</span>
		</div>
			<div class="overflow-hidden">
				<div id="cybercops-bar-polda" class="worldh h-276" ></div>
			</div>

		</div>
	</div>
	<div class="col-12">
		<div class="card">
		<div class="card-header">
			<span>Grafik User Per Polres</span>
		</div>
			<div class="overflow-hidden">
				<div id="cybercops-bar-polres" class="worldh h-276" ></div>
			</div>

		</div>
	</div>
</div>


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
				<h3 class="card-title">Data User</h3>
				<div class="card-options">
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="tabel_user_cybercops">
						<thead>
							<tr>
								<th>Nrp</th>
								<th>Nama</th>
								<th>Polda</th>
								<th>Polres</th>
								<th>Pangkat</th>
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


