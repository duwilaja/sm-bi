/*--details-chart open--*/
var no = 1;

$(document).ready(function () {

    $("#cari").click(function(event){
        alert("Fitur Pencarian Data Masih Dalam Tahap Pengembangan");
    });

    // donat_eri();
    bar_tmc_kondisi();
    bar_tmc_penyebab(); 
    
    bar_tmc_interaksi_giat();
    bar_tmc_interaksi_media(); 


    bar_tmc_publikasi_giat();
    bar_tmc_publikasi_media(); 
    // donat_eri_tabel();
    // tabel_eri_bulan();
    dt_tabel_tmc();
    dt_tabel_tmc_interaksi();
    dt_tabel_tmc_publikasi();
    slide();
});

function slide() {
    $('.owl-carousel').owlCarousel({
        margin:10,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        rewind:true,
        nav:false,
        autoplay:true,
        pagination: false,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
}

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
    series: [],
     fill: {
     type:'solid',
     opacity: [1, 1,1],
  },
//   plotOptions: {
//     bar: {
//       horizontal: false,
//       columnWidth: '50%',
//       endingShape: 'rounded'
//     },
//   },
  grid: {
    yaxis: {
      lines: {
        show: false,
        offsetX: 0,
        offsetY: 0
      }
    }
  },
  colors:['#4a32d4','#f7592d','#f7be2d','#3abc1d'],
  xaxis: {
      // type: 'datetime',
      // categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
      categories: ['31-11-2020'],
      color: '#fff',
       style: {
          colors: ['#000'],
       },
  },
//   yaxis : {
//     max : 6
//   },
  tooltip: {
      x: {
          format: 'dd-mm-yyyy'
      },
  }
}
var chart_bar_status_lalin = new ApexCharts(document.querySelector("#status-lalin"), options);
var chart_bar_penyebab_lalin = new ApexCharts(document.querySelector("#penyebab-lalin"), options);

var chart_bar_interaksi_giat = new ApexCharts(document.querySelector("#interaksi-dasar-giat"), options);
var chart_bar_interaksi_media = new ApexCharts(document.querySelector("#interaksi-sosisal-media"), options);

var chart_bar_publikasi_giat = new ApexCharts(document.querySelector("#publikasi-dasar-giat"), options);
var chart_bar_publikasi_media = new ApexCharts(document.querySelector("#publikasi-sosisal-media"), options);

chart_bar_status_lalin.render();
chart_bar_penyebab_lalin.render();

chart_bar_interaksi_giat.render();
chart_bar_interaksi_media.render();


chart_bar_publikasi_giat.render();
chart_bar_publikasi_media.render();



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

    var map3 = new google.maps.Map(document.getElementById('map3'), {
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
    
    var markers3 = locations3.map(function(location, i) {
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

    var markerCluster3 = new MarkerClusterer(map3, markers3,
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

var locations3 = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];



function bar_tmc_kondisi() { 
    $.getJSON("../Grafik_api/bar_tmc_kondisi_lalin", function(response) {
        chart_bar_status_lalin.updateSeries(response.data);
        chart_bar_status_lalin.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_penyebab() { 
    $.getJSON("../Grafik_api/bar_tmc_penyebab_lalin", function(response) {
        chart_bar_penyebab_lalin.updateSeries(response.data);
        chart_bar_penyebab_lalin.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_interaksi_giat() { 
    $.getJSON("../Grafik_api/bar_tmc_interaksi_giat", function(response) {
        chart_bar_interaksi_giat.updateSeries(response.data);
        chart_bar_interaksi_giat.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_interaksi_media() { 
    $.getJSON("../Grafik_api/bar_tmc_interaksi_media", function(response) {
        chart_bar_interaksi_media.updateSeries(response.data);
        chart_bar_interaksi_media.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}


function bar_tmc_publikasi_giat() { 
    $.getJSON("../Grafik_api/bar_tmc_publikasi_giat", function(response) {
        chart_bar_publikasi_giat.updateSeries(response.data);
        chart_bar_publikasi_giat.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_publikasi_media() { 
    $.getJSON("../Grafik_api/bar_tmc_publikasi_media", function(response) {
        chart_bar_publikasi_media.updateSeries(response.data);
        chart_bar_publikasi_media.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}



function jml_data_tmc() {
    $.getJSON("../Grafik_api/jml_data_tmc", function(r) {
        $('#t_pnp').text(r[0]);
        $('#t_bus').text(r[1]);
        $('#t_brg').text(r[2]);
        $('#t_motor').text(r[3]);
        $('#t_khusus').text(r[4]);
        $('#t_total').text(r[5]);
    });
}

function dt_tabel_tmc() {
    $('#tabel_tmc').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "autoWidth": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": '../Grafik_api/dt_tmc_info_lalin',
            "type": "POST",
            "data" : {
                'a' : null,
                'tgl' : null,
                 'length' : 10,
            }
        },
        // "paging":   false,
        //Set column definition initialisation properties
        "columnDefs": [{
            // "targets": [8],
            "orderable": false
        }]
    });

    setTimeout(() => {
        jml_data_tmc();
    }, 1000);
}

function dt_tabel_tmc_interaksi() {
    $('#tabel_tmc_interaksi').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "autoWidth": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": '../Grafik_api/dt_tmc_interaksi',
            "type": "POST",
            "data" : {
                'a' : null,
                'tgl' : null,
                 'length' : 10,
            }
        },
        // "paging":   true,
        //Set column definition initialisation properties
        "columnDefs": [{
            // "targets": [8],
            "orderable": false
        }]
    });

    setTimeout(() => {
        jml_data_tmc();
    }, 2000);
}


function dt_tabel_tmc_publikasi() {
    $('#tabel_tmc_publikasi').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "autoWidth": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": '../Grafik_api/dt_tmc_publikasi',
            "type": "POST",
            "data" : {
                'a' : null,
                'tgl' : null,
                 'length' : 10,
            }
        },
        // "paging":   false,
        //Set column definition initialisation properties
        "columnDefs": [{
            // "targets": [8],
            "orderable": false
        }]
    });

    setTimeout(() => {
        jml_data_tmc();
    }, 3000);
}
