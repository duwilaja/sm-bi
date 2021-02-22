<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-search"></i><span class="ml-1">Filter Data</span>
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <form action="javascript:void(0);" method="post" id="filter_td">
                        <div class="card-body">
                            <div class="row" id="optional">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p>Data Pembanding</p>
                                        <select class="form-control form-control-sm" id="data_pembanding" multiple name="f_data_pembanding[]">
                                            <option selected value="titik_macet">Titik Macet</option>
                                            <option selected value="jumlah_ranmor">Jumlah Ranmor</option>
                                            <option selected value="jumlah_laka">Jumlah Laka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <p>Polda</p>
                                        <select class="form-control form-control-sm"  name="f_polda" id="f_polda">
                                            <option value="">-- Pilih Polda --</option>
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
    <div class="card">
        <div class="card-header">Trend Data</div>
        <div class="card-body">
            <canvas id="td" width="400" height="400"></canvas>
        </div>
    </div>
</div>