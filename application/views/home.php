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
	
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Jumlah Laporan Hari Ini</h3>
					<div class="card-options ">
						<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
					</div>
				</div>
				<div class="card-body">
					<div class="chart-container">
						<canvas id="chart-legend-top"></canvas>
					</div>
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
	
	<!-- Row -->
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Kemacetan</h3>
					<div class="card-options ">
						<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
						<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table card-table table-vcenter text-nowrap table-primary" >
						<thead  class="bg-primary text-white">
							<tr >
								<th class="text-white">No.</th>
								<th class="text-white">Polsek</th>
								<th class="text-white">Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Polsek Pelawean</td>
								<td>50</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Polsek Pasar Keliwon</td>
								<td>20</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Polsek Serengan</td>
								<td>10</td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Polsek Banjarsari</td>
								<td>5</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Polsek Jebres</td>
								<td>1</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Polsek Weru</td>
								<td>1</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- table-responsive -->
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
		
		var siid=Date.now();
		window.chartColors = {
			red: 'rgb(250, 98, 107)',
			orange: 'rgb(255, 159, 64)',
			yellow: 'rgb(255, 205, 86)',
			green: 'rgb(94, 216, 79)',
			blue: 'rgb(50, 202, 254)',
			purple: 'rgb(159, 120, 255)',
			grey: 'rgb(201, 203, 207)'
		};
		
		function randomScalingFactor() {
			return Math.round(rand(0, 100));
		};
		
		function rand(min,max){
			var seed=siid;
			min = min === undefined ? 0 : min;
			max = max === undefined ? 1 : max;
			siid = (seed * 9301 + 49297) % 233280;
			return min + (siid / 233280) * (max - min);
		}
		function my_chart(){
			var color = Chart.helpers.color;
			function createConfig(legendPosition, colorName) {
				return {
					type: 'line',
					data: {
						labels: ['06:00-07:00', '07:00-08:00', '08:00-09:00', '09:00-10:00', '14:00-15:00', '15:00-16:00', '16:00-17:00'],
						datasets: [{
							label: 'Jumlah Kemacetan',
							data: [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
							],
							backgroundColor: color(window.chartColors[colorName]).alpha(0.5).rgbString(),
							borderColor: window.chartColors[colorName],
							borderWidth: 1
						}]
					},
					
					options: {
						responsive: true,
						legend: {
							position: legendPosition,
						},
						
						scales: {
							xAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Jam'
								}
							}],
							yAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Jumlah'
								}
							}]
						},
						
					}
				};
			}
			var ctx = document.getElementById("chart-legend-top").getContext('2d');
			var config = createConfig("top", "blue");
			new Chart(ctx, config);
			ctx.shadowBlur = 10;
			ctx.shadowOffsetX = 8;
			ctx.shadowOffsetY = 8;
		}
		function thispage_ready(){
			my_chart();
			my_map();
		}
	</script>