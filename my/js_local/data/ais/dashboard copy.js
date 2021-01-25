$(document).ready(function () {
    jml_data_eri();
});

function jml_data_eri() {
    $.getJSON("../Grafik_api_dummy/tabel_penyebab_kecelakaan", function(r) {
        debugger;
       $('#h_prilaku_pribadi').append('<tr>okrek</tr>');
    });
}

/*--details-chart open--*/
var options = {
    chart: {
        height: 320,
        type: 'area',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight',
        width:2
    },
    series: [{
        name: 'Melakukan Aktifitas Lain',
        type: 'bar',
        data: [ 25,29,27,26,27, 24,26,28, 27,29]
    }, 
    {
        name: 'Salah Memberi Isyarat',
        type: 'bar',
        data: [ 35,39,37,36,37, 34,36,38, 37,39]
        // data: [50,25,50,25]
    }, 
    {
        name: 'Gagal Memberi Tanda',
        type: 'bar',
        data: [37, 35, 36,34,32,39, 38,40, 43, 46]
    },
    {
        name: 'Tertidur/Kelelahan',
        type: 'bar',
        data: [ 35,39,37,36,37, 34,36,38, 37,39]
    },
    {
        name: 'Kerugian Materi',
        type: 'bar',
        data: [37, 35, 36,34,32,39, 38,40, 43, 46]
    },
    {
        name: 'Menggunakan Gadget',
        type: 'bar',
        data: [ 25,29,27,26,27, 24,26,28, 27,29]
    },
    {
        name: 'Berhenti Mendadak',
        type: 'bar',
        data: [ 35,39,37,36,37, 34,36,38, 37,39]
    },
    {
        name: 'Mendadak Merubah Kecepatan',
        type: 'bar',
        data: [37, 35, 36,34,32,39, 38,40, 43, 46]
    },
    {
        name: 'Ceroboh Saat Menyalip',
        type: 'bar',
        data: [ 25,29,27,26,27, 24,26,28, 27,29]
    },
    {
        name: 'Tidak Waspada',
        type: 'bar',
        data: [ 25,35,27,26,27, 24,26,29, 17,19]
    }],
     fill: {
     type:'solid',
     opacity: [1, 1,1],
  },
    grid: {
            show: true,
            borderColor: 'rgba(142, 156, 173,0.2)',
        },
    colors: ['#fb1c52', '#ff8519','#fffb14','#44ff1f',' #fc0303','#f8fc05','#c2fc00','#5eff00','#05fce4','#ff00bf'],
    xaxis: {
        // type: 'datetime',
        // categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
        categories: ['2015','2016','2017','2018','2019'],
        color: '#fff',
         style: {
            colors: ['#000'],
         },
        
    },
    tooltip: {
        x: {
            format: 'dd-mm-yyyy'
        },
    }
}
var chart = new ApexCharts(document.querySelector("#bar-perilaku"), options);
chart.render();


var options = {
    chart: {
        height: 320,
        type: 'area',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight',
        width:2
    },
    series: [{
        name: 'Meninggal',
        type: 'bar',
        // data: [ 25,29,27,26,27, 24,26,28, 27,29,28, 29,27, 25, 26,24, 20,]
        data: [100,50,90,50]
    }, 
    {
        name: 'Luka Berat',
        type: 'bar',
        // data: [ 35,39,37,36,37, 34,36,38, 37,39,38, 39,37, 35, 36,34, 30,]
        data: [50,25,50,25]
    }, 
    {
        name: 'Luka Ringan',
        type: 'bar',
        // data: [37, 35, 36,34,32,39, 38,40, 43, 46,45, 49,50, 52,53,52, 55]
        data: [20,15,20,15]
    },
    {
        name: 'Kerugian Materi',
        type: 'bar',
        data: [30,10,30,10]
    }],
     fill: {
     type:'solid',
     opacity: [1, 1,1],
  },
    grid: {
            show: true,
            borderColor: 'rgba(142, 156, 173,0.2)',
        },
    colors: ['#fb1c52', '#ff8519','#fffb14','#44ff1f'],
    xaxis: {
        // type: 'datetime',
        // categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
        categories: ['Januari 2020','Februari 2020','Maret 2020','April 2020'],
        color: '#fff',
         style: {
            colors: ['#000'],
         },
        
    },
    tooltip: {
        x: {
            format: 'dd-mm-yyyy'
        },
    }
}
var chart = new ApexCharts(document.querySelector("#live-chart"), options);
chart.render();


	/* chartjs (#sales) */
	var myCanvas = document.getElementById("sales");
	
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke = myCanvasContext.createLinearGradient(0, 80, 0, 280);
	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
	var gradientStroke3 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
	
	gradientStroke.addColorStop(0, 'rgb(251 28 82 / 58%)');
	gradientStroke.addColorStop(1, 'rgb(251 28 82 / 87%)');

	gradientStroke2.addColorStop(0, 'rgba(74, 50, 212, 0.8)');
	gradientStroke2.addColorStop(1, 'rgba(74, 50, 212, 0.09)');

	gradientStroke3.addColorStop(0, '#2393ff9e');
	gradientStroke3.addColorStop(1, '#2393ff7d');
	
    var myChart = new Chart( myCanvas, {
		type: 'line',
		data: {
            labels: ["Januari","Februari","Meret", "April","Mei", "Juni","Juli","Agustus","September","Oktober", "November", "Desember" ],
            type: 'line',
            datasets: [ {
				label: 'Perpanjang SIM',
				data: [0, 35, 24, 64, 93, 55, 39,60, 61, 54, 62, 63],
				backgroundColor: gradientStroke,
				borderColor: '#FFF',
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke,
				pointBorderColor :'#007adf',
				pointHoverBorderColor :gradientStroke,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				lineTension: 0.2,
				 borderWidth: 2,
                    fill: 'origin'
            },{
				label: 'SIM Baru',
				data: [90, 35, 24, 64, 43, 55, 39,60, 61, 54, 62, 63],
				backgroundColor: gradientStroke2,
				borderColor: '#FFF',
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke2,
				pointBorderColor :'#007adf',
				pointHoverBorderColor :gradientStroke2,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				lineTension: 0.2,
				 borderWidth: 2,
                    fill: 'origin'
            },{
				label: 'DPS',
				data: [30, 25, 20, 14, 33, 85, 79,90, 61, 54, 62, 63],
				backgroundColor: gradientStroke3,
				borderColor: '#FFF',
				pointBackgroundColor:'#fff',
				pointHoverBackgroundColor:gradientStroke3,
				pointBorderColor :'#007adf',
				pointHoverBorderColor :gradientStroke3,
				pointBorderWidth :0,
				pointRadius :0,
				pointHoverRadius :0,
				lineTension: 0.2,
				 borderWidth: 2,
                    fill: 'origin'
            }, ]
        },
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				cornerRadius: 3,
				intersect: false,
			},
			 stepsize: 200,
                min: 0,
                max: 400,
			legend: {
				display: false,
				labels: {
					usePointStyle: false,
				},
			},
			scales: {
				xAxes: [{
					
					display: true,
					gridLines: {
						display: false,
						drawBorder: false
					},
					ticks: {
                            fontColor: '#b0bac9',
                            autoSkip: true,
                            maxTicksLimit: 9,
                            maxRotation: 0,
                            labelOffset: 10
                        },
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#b0bac9",
					 },
					display: true,
					gridLines: {
						display: false,
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'sales',
						fontColor: 'transparent'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	/* chartjs (#sales) closed */

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: -6.941041, lng: 107.517584},
        styles:[
        {
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#f5f5f5"
            }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
            {
                "visibility": "off"
            }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#616161"
            }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
            {
                "color": "#f5f5f5"
            }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#bdbdbd"
            }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#eeeeee"
            }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#757575"
            }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#e5e5e5"
            }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#9e9e9e"
            }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#ffffff"
            }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#757575"
            }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#dadada"
            }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#616161"
            }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#9e9e9e"
            }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#e5e5e5"
            }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#eeeeee"
            }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#c9c9c9"
            }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#9e9e9e"
            }
            ]
        }
        ]
    });

    var map2 = new google.maps.Map(document.getElementById('map2'), {
        zoom: 10,
        center: {lat: -6.941041, lng: 107.517584},
        styles:[
        {
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#f5f5f5"
            }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
            {
                "visibility": "off"
            }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#616161"
            }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
            {
                "color": "#f5f5f5"
            }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#bdbdbd"
            }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#eeeeee"
            }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#757575"
            }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#e5e5e5"
            }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#9e9e9e"
            }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#ffffff"
            }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#757575"
            }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#dadada"
            }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#616161"
            }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#9e9e9e"
            }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#e5e5e5"
            }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#eeeeee"
            }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
            {
                "color": "#c9c9c9"
            }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
            {
                "color": "#9e9e9e"
            }
            ]
        }
        ]
    });
    
    // Create an array of alphabetical characters used to label the markers.
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    var markers = locations.map(function(location, i) {
        return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
        });
    });

    var markers2 = locations2.map(function(location, i) {
        return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
        });
    });
    
    // Add a marker clusterer to manage the markers.
    var markerCluster = new MarkerClusterer(map, markers,
    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

    // Add a marker clusterer to manage the markers.
    var markerCluster2 = new MarkerClusterer(map2, markers2,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}
var locations = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];

var locations2 = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];