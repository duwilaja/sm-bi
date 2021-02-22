/*--details-chart open--*/
var no = 1;
let pnp = 1;
let bus = 1;
let brg = 1;
let motor = 1;
let khusus = 1;

$(document).ready(function () {
    bar_eri();    
    donat_eri();
    donat_eri_tabel();
    tabel_eri_bulan();
    dt_tabel_eri();
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



function bar_eri() { 

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
      colors:['#4a32d4','#f7592d','#f7be2d','#3abc1d','#f72d66'],
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
    var chart_bar = new ApexCharts(document.querySelector("#live-chart"), options);
    chart_bar.render();

    $.getJSON("../Grafik_api/bar_eri", function(response) {
        chart_bar.updateSeries(response.data);
        chart_bar.updateOptions({xaxis: {
            categories: response.date
          }});
    });
}

function donat_eri() { 

    var optionss = {
        redrawOnParentResize: true,
        chart: {
            width: 380,
            type: 'donut',
        },
      colors:['#4a32d4','#f7592d','#f7be2d','#3abc1d','#f72d66'],
      labels: [
        "Mobil PNP",
        "Bus",
        "Mobil Barang",
        "Sepeda Motor",
        "Kendaraan Khusus"
      ],
      dataLabels: {
        enabled: false
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            show: false
          }
        }
      }],
      legend: {
        position: 'right',
        offsetY: 0,
        height: 230,
      },
      series: [pnp,bus,brg,motor,khusus]
    };

    var chart_donat = new ApexCharts(document.querySelector("#chart-donat"),optionss);
    chart_donat.render();

    $.getJSON("../Grafik_api/donat_eri", function(response) {
        pnp = response.data[0];
        bus = response.data[0];
        brg = response.data[0];
        motor = response.data[0];
        khusus = response.data[0];
        chart_donat.updateSeries(response.data);
    });
}

function donat_eri_tabel() {
    $('#donat_eri_tabel').html('');
    $.getJSON("../Grafik_api/donat_eri_tabel", function(r) {
       r.data.forEach(v => {
        $('#donat_eri_tabel').append(`<tr class="border-bottom">
        <td class="p-2"><div class="w-3 h-3 ${v.warna} mr-2 mt-1 brround"></div></td>
        <td class="p-2">${v.nama}</td>
        <td class="p-2">${v.value}</td>
        <td class="p-2">${v.persen}%</td>
        </tr>`);
       });
       $('#total_donat').text(r.total);
       persen_nt(r.persen_nt)+' last month';
    });
}

function persen_nt(r,id='#persen_nt') { 
    var persen_nt = '<span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>'+r[0]+'%</span>';
    
    if (r[1] == 'turun') {
     persen_nt = '<span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>'+r[0]+'%</span>';
    }

    $(id).html(persen_nt);
 }

function tabel_eri_bulan() {
    $('#tabel_eri_bulan').html('');
    $.getJSON("../Grafik_api/tabel_eri_bulan", function(r) {
       r.data.forEach(v => {
        var n = no++;
        $('#tabel_eri_bulan').append(`<tr class="border-bottom">
        <td class="p-2"><div class="w-3 h-3 mr-2 mt-1 brround">${v.nama}</div></td>
        <td class="p-2">${v.bulan_ini}</td>
        <td class="p-2">${v.bulan_lalu}</td>
        <td class="p-2" id="persen_nt${n}"></td>
        </tr>`);

        setTimeout(() => {
            persen_nt(v.persen,"#persen_nt"+n);
            console.log("#persen_nt"+n);
        }, 200);
       });

       $('#tabel_eri_bulan').append(`<tr class="border-bottom" style="background:#fafafa";>
        <td class="p-2">Total</td>
        <td class="p-2">${r.total_bln_ini}</td>
        <td class="p-2">${r.total_bln_lalu}</td>
        <td class="p-2" id="persen_nt_total"></td>
        </tr>`);

        persen_nt(r.persen,"#persen_nt_total");
    });
    
}

function dt_tabel_eri() {
    $('#tabel_eri').DataTable({
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
            "url": '../Grafik_api/dt_eri_polda',
            "type": "POST",
            "data" : {
                'a' : null,
                'tgl' : null,
                 'length' : 50,
            }
        },
        // "paging":   false,
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [6],
            "orderable": false
        }]
    });

    setTimeout(() => {
        jml_data_eri();
    }, 1000);
}

function jml_data_eri() {
    $.getJSON("../Grafik_api/jml_data_eri", function(r) {
        $('#t_pnp').text(r[0]);
        $('#t_bus').text(r[1]);
        $('#t_brg').text(r[2]);
        $('#t_motor').text(r[3]);
        $('#t_khusus').text(r[4]);
        $('#t_total').text(r[5]);
    });
}
