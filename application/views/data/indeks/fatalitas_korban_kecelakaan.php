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
</div>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Indesk fatalitas korban kecelakaan <span style="position:relative;left:8px;"><b>Data Pertahun</b></span></div>
            <center><span><b>Jumlah Korban Meninggal Dunia</b></span></center>
			<div class="card-body">
				<canvas id="ifakl" width="400" height="400"></canvas>
			</div>
		</div>
	</div>
</div>	

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Indesk fatalitas korban kecelakaan lalu lintas <span style="position:relative;left:8px;"><b>Terhadap 100.000  populasi penduduk</b></span></div>
            <center><span><b>Jumlah Korban Meninggal Dunia</b></span></center>
			<div class="card-body">
				<canvas id="ifak2" width="400" height="400"></canvas>
			</div>
		</div>
	</div>
</div>	

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Perbandingan Jumlah Kecelakaan Dan Jumlah Korban  <span style="position:relative;left:8px;"><b>(Data 2019-2020),</b></span></div>
            <!-- <center><span><b>Jumlah Korban Meninggal Dunia</b></span></center> -->
			<div class="card-body">
				<canvas id="per_jml_kec" width="400" height="400"></canvas>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Grafik Kecelakaan  <span style="position:relative;left:8px;"><b>(Data 2019-2020),</b></span></div>
            <!-- <center><span><b>Jumlah Korban Meninggal Dunia</b></span></center> -->
			<div class="card-body">
				<canvas id="grafik_kecelakaan" width="400" height="400"></canvas>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Kecelakaan Disebabkan Perilaku Pengemudi <span style="position:relative;left:8px;"><b>(Data 2019-2020),</b></span></div>
            <!-- <center><span><b>Jumlah Korban Meninggal Dunia</b></span></center> -->
			<div class="card-body">
				<canvas id="indeks_penyebab_kecelakaan" width="400" height="200"></canvas>
			</div>
		</div>
	</div>
</div>




				


						

