
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

const point = [];

const initialPosition = { lat: -7.559669364640486, lng: 110.81963842699129 };

const createMap = ({ lat, lng }) => {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    disableDefaultUI : false,
    center: { lat: lat, lng: lng },
  });

  return map;
};

const createMarker = ({ map, position }) => {
  return new google.maps.Marker({ map, position });
};

const getCurrentPosition = ({ onSuccess, onError = () => { } }) => {
  if ('geolocation' in navigator === false) {
    return onError(new Error('Geolocation is not supported by your browser.'));
  }

  return navigator.geolocation.getCurrentPosition(onSuccess, onError);
};

const getPositionErrorMessage = code => {
  switch (code) {
    case 1:
      return 'Permission denied.';
    case 2:
      return 'Position unavailable.';
    case 3:
      return 'Timeout reached.';
  }
}

// New function to track user's location.
const trackLocation = ({ onSuccess, onError = () => { } }) => {
  if ('geolocation' in navigator === false) {
    return onError(new Error('Geolocation is not supported by your browser.'));
  }

  // Use watchPosition instead.
  return navigator.geolocation.watchPosition(onSuccess, onError, {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  });
};

function initMap() {
  const map = createMap(initialPosition);
  // const marker = createMarker({ map, position: initialPosition });
  // const $info = document.getElementById('info');

  // all_share_lokasi(map);

  // trackLocation({
  //   onSuccess: ({ coords: { latitude: lat, longitude: lng } }) => {
  //     marker.setPosition({ lat, lng });
  //     map.panTo({ lat, lng });
  //     all_share_lokasi(map);
  //     share_lokasi(lat,lng);
  //     // Print out the user's location.
  //     $info.textContent = `Lat: ${lat} Lng: ${lng}`;
  //     // Don't forget to remove any error class name.
  //     $info.classList.remove('error');
  //   },
  //   onError: err => {
  //     // Print out the error message.
  //     $info.textContent = `Error: ${getPositionErrorMessage(err.code) || err.message}`;
  //     // Add error class name.
  //     $info.classList.add('error');
  //   }
  // });


}

function show_marker(item='cctv',item2='') { 
  setTimeout(() => {
    var varr;
   var icon = {
        url: "../my/images/cctv.png", // url
        scaledSize: new google.maps.Size(20, 20), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0,0) // anchor
    };
  if (item == 'cctv' && item2 == 'traffic_counting') {
    deleteMarkers()
    get_cctv('CCTV',item2);
    setTimeout(() => {
      create_cctv(item2,icon);
      setMapOnAll('CCTV',item2);
    }, 200);
  }

  if (item == 'cctv' && item2 == 'traffic_category') {
    deleteMarkers()
    get_cctv('CCTV',item2);
    setTimeout(() => {
      create_cctv(item2,icon);
      setMapOnAll('CCTV',item2);
    }, 200);
  }

  if (item == 'cctv' && item2 == 'average_speed') {
    deleteMarkers()
    get_cctv('CCTV',item2);
    setTimeout(() => {
      create_cctv(item2,icon);
      setMapOnAll('CCTV',item2);
    }, 200);
  }

  if (item == 'cctv' && item2 == 'length_ocupantion') {
    deleteMarkers()
    get_cctv('CCTV',item2);
    setTimeout(() => {
      create_cctv(item2,icon);
      setMapOnAll('CCTV',item2);
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
    const total = cctv[i].total;
    marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon : img,
      Label: {
        className:'my-custom-class-for-label',
        text:  varr == 'traffic_counting' ? `${total}` : ( varr == 'average_speed' ? `100 km/h` : (varr == 'length_ocupantion' ? `2 m` : ` `)) ,
        // fontWeight: 'bold',
        // fontSize: '9px',
        // fontFamily: '"Courier New", Courier,Monospace',
        // color: 'white',
      }
    });
    
    markers.push(marker);
  }
}

// Sets the map on all markers in the array.
function setMapOnAll(n_titik='',item2='') {
  const infoWindow = new google.maps.InfoWindow();
  for (let i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
    google.maps.event.addListener(markers[i], 'click', function() {
      // window.location.href = this.url;
      map.setCenter(markers[i].getPosition());
      map.setZoom(15);
      if (n_titik=='CCTV' && item2=='traffic_counting') {
        const item2 = 'Traffic Counting'; 
        infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
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
              <tr>
                <td><b>Total Kendaraan</b></td>
                <td>:</td>
                <td>${cctv[i].total}</td>
              </tr>
            </table>
          </div>
          <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
              <a href="../data_analytic/detail_analytic_cctv?id=${cctv[i].id}&q=traffic_counting" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
          `,
        );
        infoWindow.open(map,markers[i]);
      }else if (n_titik=='CCTV' && item2=='traffic_category') {
        const item2 = 'Traffic Category'; 
        infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
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
            <table class="table table-bordered mt-3">
              <thead>
                <tr>
                  <th>Kendaraan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Mobil</td>
                  <td>100</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
              <a href="../data_analytic/detail_analytic_cctv/${cctv[i].id}?q=traffic_category" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
          `,
        );
        infoWindow.open(map,markers[i]);
      }else if (n_titik=='CCTV' && item2=='average_speed') {
        const item2 = 'Average Speed'; 
        infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
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
              <tr>
                <td><b>Kecepatan Rata Rata</b></td>
                <td>:</td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
              <a href="../data_analytic/detail_analytic_cctv/${cctv[i].id}?q=average_speed" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
          `,
        );
        infoWindow.open(map,markers[i]);
      }else if (n_titik=='CCTV' && item2=='length_ocupantion') {
        const item2 = 'Length Ocupation'; 
        infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
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
              <tr>
                <td><b>Panjang Kemacetan</b></td>
                <td>:</td>
                <td></td>
              </tr>
            </table>
          </div>
          <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
              <a href="../data_analytic/detail_analytic_cctv/${cctv[i].id}?q=length_ocupantion" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
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

  function get_cctv(s='',item='') { 
    cctv = [];
    $.ajax({
      type: "POST",
      url: "../welcome/get_cctv",
      dataType: "json",
      data : {
        a : item
      },
      success: function (r) {
        cctv = r;
        $('#n_titik').text(s);
      }
    });
  }

  function share_lokasi(lat,lng) { 
    $.ajax({
      type: "POST",
      url: "../welcome/share_lokasi",
      dataType: "json",
      data : {
        x : $('#ids').val(),
        lat : lat,
        lng : lng
      },
      success: function (r) {
       console.log('sukses');
      }
    });
  }

  function all_share_lokasi(map) { 
    $.ajax({
      type: "POST",
      url: "../welcome/share_all_lokasi_online",
      dataType: "json",
      success: function (r) {
        r.forEach(x => {
          let lat = x.lat;
          let lng = x.lng;
          let initialPosition = { lat: lat, lng: lng};
          var infowindow = new google.maps.InfoWindow({
            content: x.kode_online
          });
          if (point[x.kode_online]) {
            point[x.kode_online].setPosition({ lat, lng });
            console.log('udah ada marker, tinggal positioning aja ya bro');
          }else{
            point[x.kode_online] = createMarker({ map, position: initialPosition });
            console.log('buat marker dulu ya');
          }

          google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
            infowindow.open(map, point[x.kode_online]);
          });

          console.log(point);
        });
      }
    });
  }

  $(".wokrek li a").on('click', function(e){
    $(".wokrek .active").removeClass('active');
    $(this).addClass('active'); 
    e.preventDefault();
  });