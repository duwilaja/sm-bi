<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--div class="row">
	<div class="col-lg-12">
		<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<<<<<<< HEAD
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
=======
		Welcome <?php echo $session['nama']?> @ <?php echo $session['unit']?></div>
	</div>
</div-->

<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="row">
				<div class=" col-xl-3 col-sm-6 d-flex border-right">
					<div class="card-body text-center">
						<div class="d-flex justify-content-center">
							<div class="mt-3">
								<i class="fe fe-shuffle fs-30 text-orange mr-5"></i>
							</div>
							<div class=" text-center text-left">
								<p class="mb-1 text-left">Kemacetan</p>
								<h3 class="mb-0 text-left font-weight-semibold kemacetan">0</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
					<div class="card-body text-center">
						<div class="d-flex justify-content-center">
							<div class="mt-3">
								<i class="fe fe-users fs-30 text-danger mr-5 "></i>
							</div>
							<div class=" text-center text-left">
								<p class="mb-1 text-left">Kecelakaan</p>
								<h3 class="mb-0 text-left font-weight-semibold kecelakaan">0</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
					<div class="card-body text-center">
						<div class="d-flex justify-content-center">
							<div class="mt-3">
								<i class="fe fe-bar-chart-2 fs-30 text-secondary mr-5 "></i>
							</div>
							<div class=" text-center text-left">
								<p class="mb-1 text-left">Kepadatan</p>
								<h3 class="mb-0 text-left font-weight-semibold kepadatan">0</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 ">
					<div class="card-body text-center">
						<div class="d-flex justify-content-center">
							<div class="mt-3">
								<i class="fe fe-layers fs-30 text-success mr-5 "></i>
							</div>
							<div class=" text-center text-left">
								<p class="mb-1 text-left">Ambang Gangguan</p>
								<h3 class="mb-0 text-left font-weight-semibold gangguan">0</h3>
							</div>
						</div>
					</div>
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

<div class="row">	
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Sebab Kemacetan</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<canvas id="pie_macet" height="250"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Ambang Gangguan</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="card-body">
			   <div class="row">
				   <div class="col-md-12">
						<div class="overflow-hidden  justify-content-center mx-auto text-center align-items-center">
							<canvas id="pie_gangguan" height="250"></canvas>
						</div>
					</div>
>>>>>>> 6d701806af8c4bd7f1a3093b3764b1d85c91b776
				</div>
			</div>
		</div>
	</div>
<<<<<<< HEAD
	
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
=======
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Sebab Kepadatan</h3>
				<div class="card-options ">
					<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="card-body">
			   <div class="row">
				   <div class="col-md-12">
						<div class="overflow-hidden  justify-content-center mx-auto text-center align-items-center">
							<canvas id="pie_padat" height="250"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var map, markers, marker;

function my_map(){
	map = L.map('map').setView([-2, 118], 5);
	
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);
	
	markers = L.markerClusterGroup();
	
	home_data();
	
	//L.geoJSON(indonesia).addTo(map);
//	get_loc();
}

function dttbl(tbl,tname,cols){
	return $(tbl).DataTable({
		dom: 't',
		serverSide: true,
		processing: true,
		pageLength: 5,
		//lengthMenu: [[10,50,100,-1],[10,50,100,"All"]],
		//buttons: ['copy', 'csv'],
		order: [[2,"desc"]],
		ajax: {
			type: 'POST',
			url: 'datatable',
			data: function (d) {
				d.cols= btoa(cols),
				d.tname= btoa(tname),
				d.x= '-';
			}
		}
	});
}
function pie(pieid,type,labels,data,legend=false,colors=[]){
	//-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  if(colors.length==0){
	  for(var x=0;x<labels.length;x++){
		  colors.push(randomColor());
	  }
  }
    var pieChartCanvas = $(pieid).get(0).getContext('2d')
    var pieData        = {
      labels: labels,/*[
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
      ],*/
      datasets: [
        {
          data: data,//[700,500,400,600,300,100],
          backgroundColor : colors,//['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: legend
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: type,
      data: pieData,
      options: pieOptions
    })

  //-----------------
  //- END PIE CHART -
  //-----------------
  
  return pieChart;
}
function series(chrid,type,labels,datasets,legend=false){
	var ctx = $(chrid).get(0).getContext('2d');
	var mixedChart = new Chart(ctx, {
		type: type,
		data: {
			datasets: datasets,/*[{
				label: 'SIUP',
				data: siup,//[10, 20, 30, 40],
				backgroundColor: randomColor()
			}, {
				label: 'NON SIUP',
				data: nonsiup,//[20, 30, 10, 20],
				backgroundColor: randomColor()
			}, {
				label: 'Total',
				data: jumlah,//[50, 50, 50, 50],
				borderColor: randomColor(),
				fill: false,

				// Changes this dataset to become a line
				type: 'line'
			}],*/
			labels: labels//['January', 'February', 'March', 'April'] //nama pasar
		},
		options: {
			legend: {
				display: legend
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						callback: function(value, index, values) {
							if(parseInt(value) >= 1000){
                               return '' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                               return '' + value;
                            }
						}
					}
				}]
			},
			tooltips: {
				  /*callbacks: {
					  label: function(tooltipItem, data) {
						  var value = tooltipItem.yLabel;
							if(parseInt(value) >= 1000){
                               return '' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                               return '' + value;
                            }
					  }
				  }*/
			  }
		}
	});
	
	return mixedChart;
}

function randomColor(){
	return "#"+(Math.random().toString(16)+"000000").slice(2, 8).toUpperCase();
}

function thispage_ready(){
//	my_chart();
	my_map();
	//home_data();
	//donat();
	//barbar();
}

function donat(id,tipe,datas,total,legend){
	var label=[];
	var data=[];
	var tot=0;
	for(var i=0;i<datas.length;i++){
		label.push(datas[i]['label']);
		data.push(datas[i]['value']);
		tot+=parseInt(datas[i]['value']);
	}
	$(total).html(tot);
	return pie(id,tipe,label,data,legend);
}
function barbar(){
	var datasets=[
			{label: 'Alam', data:[10,20,25,15], borderColor: randomColor(), lineTension: 0,fill:false},
			{label: 'Jalan', data:[25,30,40,50], borderColor: randomColor(), lineTension: 0, fill:false}
				];
	var xaxis=["tgl1","tgl2","tgl3","tgl4"];
	series("#bar_macet",'line',xaxis,datasets,true);
}

var dgang=null;
var dmact=null;
var dpadt=null;

function home_data(){
	//getData('','home/home_data');
	
	$.ajax({
		type: 'POST',
		url: 'home/home_data',
		data: {},
		success: function(data){
			var json = JSON.parse(data);
			if(json['code']=='200'){
				//log(json['msgs']);
				if(dgang!=null) {dgang.destroy();}
				dgang=donat("#pie_gangguan","doughnut",json['msgs']['gangguan'],".gangguan",true);
				if(dmact!=null) {dmact.destroy();}
				dmact=donat("#pie_macet","pie",json['msgs']['kemacetan'],".kemacetan",true);
				if(dpadt!=null) {dpadt.destroy();}
				dpadt=donat("#pie_padat","pie",json['msgs']['kepadatan'],".kepadatan");
				var celaka=json['msgs']['kecelakaan'].length>0?json['msgs']['kecelakaan'][0]['value']:0;
				$(".kecelakaan").html(celaka);
				drawMarkers(json['msgs']['maps']);
			}else{
				log(json['msgs']);
			}
		},
		error: function(xhr){
			log('Please check your connection'+xhr);
		}
	});
	
	setTimeout(home_data,30*1000);
}

function drawMarkers(datas){
  map.removeLayer(markers);
  markers.clearLayers();
  //console.log(datas);
	  var data, color, txt;
	  var br='<br />';
	  for(var i=0;i<datas.length;i++){
		  data=datas[i];
		  color=data['color'];
		  txt=data['txt'];
		  icon = L.AwesomeMarkers.icon({icon: data['icon'], prefix: 'fa', markerColor: color});//, className: 'awesome-marker awesome-marker-square'});
		  marker = L.marker([data['lat'], data['lng']], {icon: icon }).bindPopup(txt,{autoClose:false});
		  markers.addLayer(marker);
	  }
	  map.addLayer(markers);
}

</script>
>>>>>>> 6d701806af8c4bd7f1a3093b3764b1d85c91b776
