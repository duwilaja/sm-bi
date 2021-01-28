/*--details-chart open--*/
var no = 1;


$(document).ready(function(){
    jml_data_tmc
    bar_tmc_kondisi();
    bar_tmc_penyebab(); 
    
    bar_tmc_interaksi_giat();
    bar_tmc_interaksi_media(); 


    bar_tmc_publikasi_giat();
    bar_tmc_publikasi_media(); 


    bar_tmc_kordinasi_giat();
    bar_tmc_kordinasi_media(); 

    bar_tmc_prasarana_giat();
    bar_tmc_prasarana_media(); 
    // donat_eri_tabel();
    // tabel_eri_bulan();
    dt_tabel_tmc();
    dt_tabel_tmc_interaksi();
    dt_tabel_tmc_publikasi();
    dt_tabel_tmc_kordinasi();
    dt_tabel_tmc_prasarana();
    slide();

    $('#f_polda').change(function(){ 
        var id=$(this).val();
        $.ajax({
            url : "../Grafik_api/get_polres",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success: function(data){
                 
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].res_id+'>'+data[i].res_nam+'</option>';
                }
                $('#f_polres').html(html);

            }
        });
        // return false;
    });

    $("#cari").click(function(){
        var start = $("#f_date_start").val();
        var end =   $("#f_date_end").val();
        if (start == '' || end == '') {
            alert('isi start date & end date');
        }else{
            if (end < start) {
                alert('start date tidak boleh lebih besar dari end date');
            }else{
                
                bar_tmc_kondisi();
                bar_tmc_penyebab(); 
                
                bar_tmc_interaksi_giat();
                bar_tmc_interaksi_media(); 
        
        
                bar_tmc_publikasi_giat();
                bar_tmc_publikasi_media(); 
        
        
                bar_tmc_kordinasi_giat();
                bar_tmc_kordinasi_media(); 

                bar_tmc_prasarana_giat();
                bar_tmc_prasarana_media(); 
                // donat_eri_tabel();
                // tabel_eri_bulan();
                dt_tabel_tmc();
                dt_tabel_tmc_interaksi();
                dt_tabel_tmc_publikasi();
                dt_tabel_tmc_kordinasi();
                dt_tabel_tmc_prasarana();
                slide();
                }
        
        }
    });
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
  grid: {
    yaxis: {
      lines: {
        show: false,
        offsetX: 0,
        offsetY: 0
      }
    }
  },
  colors:['#4a32d4','#f7be2d','#f7592d','#3abc1d'],
//   colors:['#ff5454','#fcff52','#ceff52','#92ff4f','#4a32d4','#f7be2d','#f7592d','#3abc1d','#42fcbe'],
  xaxis: {
      // type: 'datetime',
      categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
    //   categories: [],
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

var chart_bar_kordinasi_giat = new ApexCharts(document.querySelector("#kordinasi-dasar-giat"), options);
var chart_bar_kordinasi_media = new ApexCharts(document.querySelector("#kordinasi-sosisal-media"), options);


var chart_bar_prasarana_giat = new ApexCharts(document.querySelector("#prasarana-dasar-giat"), options);
var chart_bar_prasarana_media = new ApexCharts(document.querySelector("#prasarana-sosisal-media"), options);

chart_bar_status_lalin.render();
chart_bar_penyebab_lalin.render();

chart_bar_interaksi_giat.render();
chart_bar_interaksi_media.render();


chart_bar_publikasi_giat.render();
chart_bar_publikasi_media.render();

chart_bar_kordinasi_giat.render();
chart_bar_kordinasi_media.render();

chart_bar_prasarana_giat.render();
chart_bar_prasarana_media.render();



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
    var map4 = new google.maps.Map(document.getElementById('map4'), {
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
    var map5 = new google.maps.Map(document.getElementById('map5'), {
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
    var markers4 = locations4.map(function(location, i) {
        return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
        });
    });

    var markers5 = locations5.map(function(location, i) {
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
    
    var markerCluster4 = new MarkerClusterer(map4, markers4,
    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    
    var markerCluster5 = new MarkerClusterer(map5, markers5,
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

var locations4 = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];

var locations5 = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];



function bar_tmc_kondisi(start='',end='',polda='',polres='') { 
    // $.getJSON("../Grafik_api/bar_tmc_kondisi_lalin", function(response) {
    //     chart_bar_status_lalin.updateSeries(response.data);
    //     chart_bar_status_lalin.updateOptions({xaxis: {
    //         categories: response.date
    //       }});  
    // });
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
    $.ajax({
        url : "../Grafik_api/bar_tmc_kondisi_lalin",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        async : true,
        dataType : 'json',
        success: function(response){  
            chart_bar_status_lalin.updateSeries(response.data);
            chart_bar_status_lalin.updateOptions({xaxis: {
                categories: response.date
            }}); 
        }
    });
}

function bar_tmc_penyebab(start='',end='',polda='',polres='') { 
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();

    $.ajax({
        url : "../Grafik_api/bar_tmc_penyebab_lalin",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        async : true,
        dataType : 'json',
        success: function(response){  
            chart_bar_penyebab_lalin.updateSeries(response.data);
            chart_bar_penyebab_lalin.updateOptions({xaxis: {
            categories: response.date
          }});  
        }
    });

}

function bar_tmc_interaksi_giat(start='',end='',polda='',polres='') { 
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();

    $.ajax({
        url : "../Grafik_api/bar_tmc_interaksi_giat",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        async : true,
        dataType : 'json',
        success: function(response){  
            chart_bar_interaksi_giat.updateSeries(response.data);
            chart_bar_interaksi_giat.updateOptions({xaxis: {
                categories: response.date
            }});  
        }
    });
}

function bar_tmc_interaksi_media(start='',end='',polda='',polres='') { 
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();

    $.ajax({
        url : "../Grafik_api/bar_tmc_interaksi_media",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        async : true,
        dataType : 'json',
        success: function(response){  
            chart_bar_interaksi_media.updateSeries(response.data);
            chart_bar_interaksi_media.updateOptions({xaxis: {
                categories: response.date
            }}); 
        }
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

function bar_tmc_kordinasi_giat() { 
    $.getJSON("../Grafik_api/bar_tmc_kordinasi_giat", function(response) {
        chart_bar_kordinasi_giat.updateSeries(response.data);
        chart_bar_kordinasi_giat.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_kordinasi_media() { 
    $.getJSON("../Grafik_api/bar_tmc_kordinasi_media", function(response) {
        chart_bar_kordinasi_media.updateSeries(response.data);
        chart_bar_kordinasi_media.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_prasarana_giat() { 
    $.getJSON("../Grafik_api/bar_tmc_prasarana_giat", function(response) {
        chart_bar_prasarana_giat.updateSeries(response.data);
        chart_bar_prasarana_giat.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function bar_tmc_prasarana_media() { 
    $.getJSON("../Grafik_api/bar_tmc_prasarana_media", function(response) {
        chart_bar_prasarana_media.updateSeries(response.data);
        chart_bar_prasarana_media.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}



function jml_data_tmc(start='',end='',polda='',polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
    $.ajax({
        url : "../Grafik_api/jml_data_tmc",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        async : true,
        dataType : 'json',
        success: function(r){

            $('#t_pnp').text(r[0]);
            $('#t_bus').text(r[1]);
            $('#t_brg').text(r[2]);
            $('#t_motor').text(r[3]);
            $('#t_khusus').text(r[4]);
            $('#t_total').text(r[5]);
        }
    });
}

function dt_tabel_tmc(start='',end='',$polda='',$polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
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
                'awal' : start,
                'selesai' : end,
                'polda' : polda,
                'polres' : polres,
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

function dt_tabel_tmc_interaksi(start='',end='',$polda='',$polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
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
                'awal' : start,
                'selesai' : end,
                'polda' : polda,
                'polres' : polres,
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


function dt_tabel_tmc_publikasi(start='',end='',$polda='',$polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
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
                'awal' : start,
                'selesai' : end,
                'polda' : polda,
                'polres' : polres,
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

function dt_tabel_tmc_kordinasi(start='',end='',$polda='',$polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
    $('#tabel_tmc_kordinasi').DataTable({
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
            "url": '../Grafik_api/dt_tmc_kordinasi',
            "type": "POST",
            "data" : {
                'awal' : start,
                'selesai' : end,
                'polda' : polda,
                'polres' : polres,
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
function dt_tabel_tmc_prasarana(start='',end='',$polda='',$polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
    $('#tabel_tmc_prasarana').DataTable({
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
            "url": '../Grafik_api/dt_tmc_prasarana',
            "type": "POST",
            "data" : {
                'awal' : start,
                'selesai' : end,
                'polda' : polda,
                'polres' : polres,
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