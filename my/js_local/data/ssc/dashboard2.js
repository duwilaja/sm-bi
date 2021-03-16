
let black_spot = [];
let ts = [];
let markers = [];
let all_cctv = [];
let id_titik = [];
var map;
var waypoint = [];
var waypoint_sub = [];
var titik = [];
var cctv = [];

function initMap() {
  // const directionsRenderer = new google.maps.DirectionsRenderer();
  // const directionsService = new google.maps.DirectionsService();
   map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    disableDefaultUI : false,
    center: { lat: -7.559669364640486, lng: 110.81963842699129 },
  });


// var ok = {"type":"FeatureCollection","features":[{"type":"Feature","properties":{"letter":"G","color":"blue","rank":"7","ascii":"71"},"geometry":{"type":"Polygon","coordinates":[[[123.61,-22.14],[122.38,-21.73],[121.06,-21.69],[119.66,-22.22],[119,-23.4],[118.65,-24.76],[118.43,-26.07],[118.78,-27.56],[119.22,-28.57],[120.23,-29.49],[121.77,-29.87],[123.57,-29.64],[124.45,-29.03],[124.71,-27.95],[124.8,-26.7],[124.8,-25.6],[123.61,-25.64],[122.56,-25.64],[121.72,-25.72],[121.81,-26.62],[121.86,-26.98],[122.6,-26.9],[123.57,-27.05],[123.57,-27.68],[123.35,-28.18],[122.51,-28.38],[121.77,-28.26],[121.02,-27.91],[120.49,-27.21],[120.14,-26.5],[120.1,-25.64],[120.27,-24.52],[120.67,-23.68],[121.72,-23.32],[122.43,-23.48],[123.04,-24.04],[124.54,-24.28],[124.58,-23.2],[123.61,-22.14]]]}},{"type":"Feature","properties":{"letter":"o","color":"red","rank":"15","ascii":"111"},"geometry":{"type":"Polygon","coordinates":[[[128.84,-25.76],[128.18,-25.6],[127.96,-25.52],[127.88,-25.52],[127.7,-25.6],[127.26,-25.79],[126.6,-26.11],[126.16,-26.78],[126.12,-27.68],[126.21,-28.42],[126.69,-29.49],[127.74,-29.8],[128.8,-29.72],[129.41,-29.03],[129.72,-27.95],[129.68,-27.21],[129.33,-26.23],[128.84,-25.76]],[[128.45,-27.44],[128.32,-26.94],[127.7,-26.82],[127.35,-27.05],[127.17,-27.8],[127.57,-28.22],[128.1,-28.42],[128.49,-27.8],[128.45,-27.44]]]}},{"type":"Feature","properties":{"letter":"o","color":"yellow","rank":"15","ascii":"111"},"geometry":{"type":"Polygon","coordinates":[[[131.87,-25.76],[131.35,-26.07],[130.95,-26.78],[130.82,-27.64],[130.86,-28.53],[131.26,-29.22],[131.92,-29.76],[132.45,-29.87],[133.06,-29.76],[133.72,-29.34],[134.07,-28.8],[134.2,-27.91],[134.07,-27.21],[133.81,-26.31],[133.37,-25.83],[132.71,-25.64],[131.87,-25.76]],[[133.15,-27.17],[132.71,-26.86],[132.09,-26.9],[131.74,-27.56],[131.79,-28.26],[132.36,-28.45],[132.93,-28.34],[133.15,-27.76],[133.15,-27.17]]]}},{"type":"Feature","properties":{"letter":"g","color":"blue","rank":"7","ascii":"103"},"geometry":{"type":"Polygon","coordinates":[[[138.12,-25.04],[136.84,-25.16],[135.96,-25.36],[135.26,-25.99],[135,-26.9],[135.04,-27.91],[135.26,-28.88],[136.05,-29.45],[137.02,-29.49],[137.81,-29.49],[137.94,-29.99],[137.9,-31.2],[137.85,-32.24],[136.88,-32.69],[136.45,-32.36],[136.27,-31.8],[134.95,-31.84],[135.17,-32.99],[135.52,-33.43],[136.14,-33.76],[137.06,-33.83],[138.12,-33.65],[138.86,-33.21],[139.3,-32.28],[139.3,-31.24],[139.3,-30.14],[139.21,-28.96],[139.17,-28.22],[139.08,-27.41],[139.08,-26.47],[138.99,-25.4],[138.73,-25],[138.12,-25.04]],[[137.5,-26.54],[136.97,-26.47],[136.49,-26.58],[136.31,-27.13],[136.31,-27.72],[136.58,-27.99],[137.5,-28.03],[137.68,-27.68],[137.59,-26.78],[137.5,-26.54]]]}},{"type":"Feature","properties":{"letter":"l","color":"green","rank":"12","ascii":"108"},"geometry":{"type":"Polygon","coordinates":[[[140.14,-21.04],[140.31,-29.42],[141.67,-29.49],[141.59,-20.92],[140.14,-21.04]]]}},{"type":"Feature","properties":{"letter":"e","color":"red","rank":"5","ascii":"101"},"geometry":{"type":"Polygon","coordinates":[[[144.14,-27.41],[145.67,-27.52],[146.86,-27.09],[146.82,-25.64],[146.25,-25.04],[145.45,-24.68],[144.66,-24.6],[144.09,-24.76],[143.43,-25.08],[142.99,-25.4],[142.64,-26.03],[142.64,-27.05],[142.64,-28.26],[143.3,-29.11],[144.18,-29.57],[145.41,-29.64],[146.46,-29.19],[146.64,-28.72],[146.82,-28.14],[144.84,-28.42],[144.31,-28.26],[144.14,-27.41]],[[144.18,-26.39],[144.53,-26.58],[145.19,-26.62],[145.72,-26.35],[145.81,-25.91],[145.41,-25.68],[144.97,-25.68],[144.49,-25.64],[144,-25.99],[144.18,-26.39]]]}}]}
// map.data.addGeoJson(ok);
// map.data.setStyle(function (feature) {
//         var color = feature.getProperty('fillColor');
//         return {
//             fillColor: color,
//             strokeWeight: 1
//         };
//     });

}

function show_marker(item='cctv') { 
  setTimeout(() => {
    var varr;
  var icon = {
        url: "../my/images/cctv.png", // url
        scaledSize: new google.maps.Size(20, 20), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0,0) // anchor
    };
  if (item == 'cctv') {
    deleteMarkers()
    get_cctv('CCTV');
    setTimeout(() => {
      create_cctv('',icon);
      setMapOnAll('CCTV');
    }, 200);
  }
  
  if (item == 'black_spot') {
    varr = black_spot;
    deleteMarkers()
    icon.url = "../my/images/black_spot.png";
    get_titik('Black Spot');
    setTimeout(() => {
      create_marker(varr,icon);
      setMapOnAll('Black Spot');
    }, 200);
  }
  
  if(item == 'trouble_spot'){
    varr = ts;
    deleteMarkers()
    icon.url = "../my/images/trouble_spot.png";
    get_titik('Trouble Spot');
    setTimeout(() => {
      create_marker(varr,icon);
      setMapOnAll('Trouble Spot');
    }, 200);
  }

  if(item == 'ambang_gangguan'){
    varr = ts;
    deleteMarkers()
    icon.url = "../my/images/ambang_gangguan.png";
    get_titik('Ambang Gangguan');
    setTimeout(() => {
      create_marker(varr,icon);
    setMapOnAll('Ambang Gangguan');
    }, 200);
  }

  if(item == 'giat_masyarakat'){
    varr = ts;
    deleteMarkers()
    icon.url = "../my/images/giat_masyarakat.png";
    get_titik('Kegiatan Masyarakat');
    setTimeout(() => {
      create_marker(varr,icon);
    setMapOnAll('Kegiatan Masyarakat');
    }, 200);
  }
  
  if(item == 'vvip'){
    get_route();
    setTimeout(() => {
      vvip();
    }, 200);
  }
  }, 150);
  
  // To add the marker to the map, call setMap();
}

function create_marker(varr,img) { 
  markers = [];
  marker = [];
  for (i = 0; i < titik.length; i++) {  

    // var place = titik[i];
    var myLatLng = new google.maps.LatLng(titik[i].lat, titik[i].lng);
    marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon : img
    });
    markers.push(marker);
  }

}

function create_cctv(varr,img) { 
  markers = [];
  marker = [];
  
  for (i = 0; i < cctv.length; i++) {  

    // var place = cctv[i];
    var myLatLng = new google.maps.LatLng(cctv[i].kordinat[0], cctv[i].kordinat[1]);
    marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon : img,
      // label: {
      //   text: 'Under Construction',
      //   fontWeight: 'bold',
      //   fontSize: '9px',
      //   fontFamily: '"Courier New", Courier,Monospace',
      //   color: 'white',
      // }
    });
    
    markers.push(marker);
  }
}

// Sets the map on all markers in the array.
function setMapOnAll(n_titik='') {
  const infoWindow = new google.maps.InfoWindow();
  for (let i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
    google.maps.event.addListener(markers[i], 'click', function() {
      // window.location.href = this.url;
      map.setCenter(markers[i].getPosition());
      map.setZoom(15);

      if (n_titik=='CCTV') {
        // $('#cctv').modal('show');
        // $('#cctv').attr('data-id', titik[i].id);
        // $('#cctv_nama').html(n_titik);
        console.log(cctv[i]);
        infoWindow.setContent(`<div><p><b>${n_titik}</b></p>
          <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
          <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://127.0.0.1:5000/?u="+cctv[i].rtsp}" allowfullscreen></iframe>
          </div>
          <div class="mt-3">
            <table class="w-100">
              <tr>
                <td><b>Nama</b></td>
                <td>:</td>
                <td>${cctv[i].nama}</td>
              </tr>
              <tr>
                <td><b>Kordinat</b></td>
                <td>:</td>
                <td>${cctv[i].kordinat}</td>
              </tr>
            </table>
          </div>
          <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
              <a href="#" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
          `,
        );
        infoWindow.open(map,markers[i]);
      }else{
        infoWindow.setContent(`<div><p><b>${n_titik}</b></p>
          <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
          <table class="w-100">
          <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik[i].namajalan}</td>
          </tr>
          <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik[i].lat+','+titik[i].lng}</td>
          </tr>
          <tr>
            <td><b>Status</b></td>
            <td>:</td>
            <td>${titik[i].dtm}</td>
          </tr>
          <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik[i].status}</td>
          </tr>
          <tr>
            <td><b>Jam Mulai</b></td>
            <td>:</td>
            <td>${titik[i].jammulai}</td>
          </tr>
          <tr>
            <td><b>Sampai</b></td>
            <td>:</td>
            <td>${titik[i].jamsampai}</td>
          </tr>
          <tr>
            <td><b>Penyebab</b></td>
            <td>:</td>
            <td>${titik[i].penyebab}</td>
          </tr>
          <tr>
            <td><b>Detail</b></td>
            <td>:</td>
            <td>${titik[i].penyebabd}</td>
          </tr>
          <tr>
            <td><b>Sumber Info</b></td>
            <td>:</td>
            <td>${titik[i].sumber}</td>
          </tr>
          <tr>
            <td><b>Petugas Lapangan</b></td>
            <td>:</td>
            <td>${titik[i].petugas}</td>
          </tr>
        </table>
        </div>
          `,
        );
        infoWindow.open(map,markers[i]);
        // $('#tmc').modal('show');
        // $('#tmc22').html(titik[i].id);
        // $('#tmc_nama').html(n_titik);
        // $('#tmc_nama_jalan').html(titik[i].namajalan);
        // $('#tmc_kordinat').html(titik[i].lat+','+titik[i].lng);
        // $('#tmc_tanggal').html(titik[i].dtm);
        // $('#tmc_status').html(titik[i].status);
        // $('#tmc_jam_mulai').html(titik[i].jammulai);
        // $('#tmc_sampai').html(titik[i].jamsampai);
        // $('#tmc_penyebab').html(titik[i].penyebab);
        // $('#tmc_detail').html(titik[i].penyebabd);
        // $('#tmc_sumber_info').html(titik[i].sumber);
        // $('#tmc_petugas_lapangan').html(titik[i].petugas);

      }
      

    });
    map.panTo(markers[i].position);
  }

  // new MarkerClusterer(map, markers, {
  //   imagePath:
  //     "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  // });
}


// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  for (let i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
  setMapOnAll();
}

function vvip() { 
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const directionsService = new google.maps.DirectionsService();
    directionsRenderer.setMap(map);
    kalkulasi_jalan(directionsService, directionsRenderer);
 }

 function kalkulasi_jalan(directionsService,directionsRenderer) { 
    directionsService.route(
      {
        origin: { lat:waypoint.jalur.start[0], lng: waypoint.jalur.start[1] },
        destination: { lat: waypoint.jalur.destination[0], lng: waypoint.jalur.destination[1] },
        waypoints: waypoint_sub,
        optimizeWaypoints: true,
        // Note that Javascript allows us to access the constant
        // using square brackets and a string value as its
        // "property."
        travelMode: google.maps.TravelMode['DRIVING'],
      },
      (response, status) => {
        if (status == "OK") {
          directionsRenderer.setDirections(response);
        } else {
          window.alert("Directions request failed due to " + status);
        }
      }
    );
  }
  
  function get_route() { 
    waypoint = [];
    waypoint_sub = [];
    
    $.ajax({
      type: "GET",
      url: "../welcome/get_jalur?id=1",
      dataType: "json",
      success: function (r) {
        waypoint.jalur =  r.jalur;

        r.sub_jalur.forEach(e => {
          waypoint_sub.push({
            location : new google.maps.LatLng(e[0], e[1]),
            stopover : false
          });
        });
        
      }
    });
  }

  function get_titik(s='') { 
    $.ajax({
      type: "GET",
      url: "../welcome/get_titik?s="+s,
      dataType: "json",
      success: function (r) {
        titik = r;
        $('#n_titik').text(s);
      }
    });
  }

  function get_cctv(s='') { 
    cctv = [];
    $.ajax({
      type: "GET",
      url: "../welcome/get_cctv",
      dataType: "json",
      success: function (r) {
        cctv = r;
        $('#n_titik').text(s);
      }
    });
  }