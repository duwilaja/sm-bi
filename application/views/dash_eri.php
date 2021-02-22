<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Welcome <?php echo $session['nama']?> @ <?php echo $session['unit']?></div>
	</div>
</div>

<!--div class="row">
	<div class="col-md-4">
		<img src="<?php echo base_url()?>my/images/infos/rst.jpg" />
	</div>
	<div class="col-md-4">
		<img src="<?php echo base_url()?>my/images/infos/rain.jpg" />
	</div>
	<div class="col-md-4">
		<img src="<?php echo base_url()?>my/images/infos/tip.jpg" />
	</div>
</div-->

						<!-- Row-->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Dashboard ERI</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
									   <div class="row">
										   <div class="col-xl-6 col-lg-4 col-md-4">
												<div class="overflow-hidden  justify-content-center mx-auto text-center align-items-center">
													<div id="chart"></div>
												</div>
											</div>
											<div class="col-xl-6 col-lg-8 col-md-8">
											    <table class="table table-hover mb-0">
													<tbody>
														<tr class="border-bottom">
															<td class="p-2"><div class="w-3 h-3 bg-primary mr-2 mt-1 brround"></div></td>
															<td class="p-2">Mobil PNP</td>
															<td class="p-2">50,000</td>
															<td class="p-2">50%</td>
														</tr>
														<tr class="border-bottom">
															<td class="p-2"><div class="w-3 h-3 bg-orange mr-2 mt-1 brround"></div></td>
															<td class="p-2">Bus</td>
															<td class="p-2">20,000</td>
															<td class="p-2">20%</td>
														</tr>
														<tr class="border-bottom">
															<td class="p-2"><div class="w-3 h-3 bg-warning mr-2 mt-1 brround"></div></td>
															<td class="p-2">Mobil Penumpang</td>
															<td class="p-2">10,000</td>
															<td class="p-2">10%</td>
														</tr>
														<tr class="border-bottom">
															<td class="p-2"><div class="w-3 h-3 bg-teal mr-2 mt-1 brround"></div></td>
															<td class="p-2"> Sepeda Motor</td>
															<td class="p-2">10,000</td>
															<td class="p-2">10%</td>
														</tr>
														<tr class="border-bottom">
															<td class="p-2"><div class="w-3 h-3 bg-danger mr-2 mt-1 brround"></div></td>
															<td class="p-2">Kendaraan Khusus</td>
															<td class="p-2">10,000</td>
															<td class="p-2">10%</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="mt-4 mt-md-0">
											<h6 class=" mb-0 ">Total</h6>
											<h2 class="mb-0"><span class="font-weight-semibold ">100,000</span> <span class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>0.9%</span>last month</span></h2>
										   <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
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


						<!-- Row-->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Table ERI</h3>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table border table-bordered text-nowrap mb-0">
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
													<tr>
														<td><img src="../assets/images/flags/us.svg" class="w-5 h-5 mr-2" alt="">Aceh</td>
														<td>10K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>5K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>2K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>2K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>21K <i class="fe fe-arrow-up text-success"></i>
														</td>
													</tr>
													<tr>
														<td><img src="../assets/images/flags/in.svg" class="w-5 h-5 mr-2" alt="">Sumut</td>
														<td>10K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>5K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>21K <i class="fe fe-arrow-up text-success"></i>
														</td>
													</tr>
													<tr>
														<td><img src="../assets/images/flags/ru.svg" class="w-5 h-5 mr-2" alt="">Sumbar</td>
														<td>10K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>5K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>21K <i class="fe fe-arrow-down text-danger"></i>
														</td>
													</tr>
													<tr>
													    <td><img src="../assets/images/flags/ca.svg" class="w-5 h-5 mr-2" alt="">Riau</td>
														<td>10K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>5K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>21K <i class="fe fe-arrow-down text-danger"></i>
														</td>
													</tr>
													<tr>
														<td><img src="../assets/images/flags/ge.svg" class="w-5 h-5 mr-2" alt="">Bengkulu</td>
														<td>10K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>5K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-down text-danger"></i>
														</td>
														<td>2K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>2K <i class="fe fe-arrow-up text-success"></i>
														</td>
														<td>21K <i class="fe fe-arrow-up text-success"></i>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
<script>

function my_map(){
	map = L.map('map').setView([-2, 118], 5);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);
	
	//L.geoJSON(indonesia).addTo(map);
//	get_loc();
}
function thispage_ready(){
	my_map();
}
</script>