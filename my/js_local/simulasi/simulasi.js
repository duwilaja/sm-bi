var map;
var markers=[];
var i_polisi = 0;
var i_ambulan = 0;

$(document).ready(function() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

const createMarker = ({ map, position }) => {
   new google.maps.Marker({ map, position });
};

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -7.5592506525457, lng: 110.8228297937785 },
    zoom: 15,
    // mapTypeId: "satellite",
    // heading: 90,
    tilt: 45,
    disableDefaultUI: false,
    styles : [
      {
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ebe3cd"
          }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#523735"
          }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#f5f1e6"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#c9b2a6"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#dcd2be"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#ae9e90"
          }
        ]
      },
      {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#93817c"
          }
        ]
      },
      {
        "featureType": "poi.business",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#a5b076"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#447530"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f5f1e6"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#fdfcf8"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f8c967"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#e9bc62"
          }
        ]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#e98d58"
          }
        ]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#db8555"
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#806b63"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#8f7d77"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#ebe3cd"
          }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#b9d3c2"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#92998d"
          }
        ]
      }
    ]
  });

  const trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(map);

  setTimeout(() => {
    rumah_sakit();
    polisi();
    dishub();
  }, 500);
}

function rumah_sakit() { 
  
  let arr = [
    [-7.565642859569382, 110.80511693868215],
    // [-7.562747286803227, 110.80179861908191]
  ];
  
  for (let i = 0; i < arr.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(arr[i][0], arr[i][1]),
      map: map,
      icon:{
        url : "../my/simulasi/hospital.png"
      }
    });

    // setTimeout(() => {
    //   realtime_ambulan();
    // }, 300);

    markers.push(marker);
  }
}

function dishub() { 
  let arr = [
    [-7.554117393969511, 110.8094377859555],
    // [-7.561196262588956, 110.83477438524058]
  ];

  for (let i = 0; i < arr.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(arr[i][0], arr[i][1]),
      map: map,
      icon:{
        url : "../my/simulasi/dishub.png"
      }
    });

    console.log(arr[i]);

    markers.push(marker);
  }
 }

 function crash(open='') { 
  let arr = [
    [-7.5566230003386785, 110.80478905118466]
  ];

  for (let i = 0; i < arr.length; i++) {
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(arr[i][0], arr[i][1]),
      map: map,
      icon:{
        url : "../my/simulasi/crash.png"
      },
      animation: google.maps.Animation.DROP

    });

    if (open == 'yes') {
      $('#myModal').modal('show')
      map.panTo(marker.position); 
      map.setZoom(18);
    }

    google.maps.event.addListener(marker, 'click', function() {
      $('#myModal').modal('show')
      map.panTo(marker.position); 
      map.setZoom(18);
     });
   

    console.log('crash' + arr[i]);
   setTimeout(() => {
    toggleBounce(marker);
   }, 300);

    markers.push(marker);
  }
 }

 

function polisi() { 
  
  let arr = [
    [-7.57000327393688, 110.80984566501888],
    // [-7.570387716738028, 110.82942015859324]
  ];

  for (let i = 0; i < arr.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(arr[i][0], arr[i][1]),
      map: map,
      icon:{
        url : "../my/simulasi/polisi.png"
      }
    });

    markers.push(marker);
  }
}

function realtime_polisi() { 
  let arr = [
    [-7.57000327393688, 110.80984566501888]
  ];

  m_polisi = new google.maps.Marker({
    position: new google.maps.LatLng(arr[0][0], arr[0][1]),
    map: map,
    icon:{
      url : "../my/simulasi/car_rt.png"
    }
  });

  let arr_jalan = [
    [-7.569843754774201, 110.8105323481501],
    [-7.56875894643799, 110.81069327561657],
    [-7.567737549564123, 110.81090211489756],
    [-7.566829762110162, 110.81106299800506],
    [-7.566455112607616, 110.80967508607549],
    [-7.566113653781232, 110.8088947400619],
    [-7.565800330315063, 110.80780598659592],
    [-7.565347749488063, 110.80597969979023],
    [-7.565347749488063, 110.80597969979023],
    [-7.563606994517506, 110.80640113868401],
    [-7.5621099409165415, 110.80682257778913],
    [-7.56061288168898, 110.80724401638611],
    [-7.559533601764703, 110.80756009545436],
    [-7.558837292180255, 110.80759521262114],
    [-7.557618763764246, 110.80626063257333],
    [-7.556643935675371, 110.80471533724233],
    [-7.5566230003386785, 110.80478905118466],
  ];

  myLoop(arr_jalan,m_polisi,i_polisi,'#2d2d2d');
}  

function realtime_ambulan() { 
  let arr = [
    [-7.565176225824827, 110.80535675982146]
  ];

  m_ambulan = new google.maps.Marker({
    position: new google.maps.LatLng(arr[0][0], arr[0][1]),
    map: map,
    icon:{
      url : "../my/simulasi/ambulan_rt.png"
    }
  });

  let arr_jalan = [
    [-7.565323495073493, 110.80587673905954],
    [-7.565058404615492, 110.80609215780208],
    [-7.5645576794056035, 110.80620357970139],
    [-7.563239592987016, 110.8065155643903],
    [-7.562311774581239, 110.80679783727179],
    [-7.561243309522798, 110.80712073441916],
    [-7.559602378432047, 110.80757484035203],
    [-7.558992484784104, 110.80769202928408],
    [-7.558121213225833, 110.80690099323921],
    [-7.5571628074290365, 110.80548007413196],
    [-7.5566230003386785, 110.80478905118466]
  ];

  myLoop(arr_jalan,m_ambulan,i_ambulan,'#bc090c');
}  

function updateMarker(marker, latitude, longitude,color) {
  var prevPosn = marker.getPosition();
  marker.setPosition(
    new google.maps.LatLng(
      latitude,
      longitude
    )
  );
  
  var car = "M17.402,0H5.643C2.526,0,0,3.467,0,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759c3.116,0,5.644-2.527,5.644-5.644 V6.584C23.044,3.467,20.518,0,17.402,0z M22.057,14.188v11.665l-2.729,0.351v-4.806L22.057,14.188z M20.625,10.773 c-1.016,3.9-2.219,8.51-2.219,8.51H4.638l-2.222-8.51C2.417,10.773,11.3,7.755,20.625,10.773z M3.748,21.713v4.492l-2.73-0.349 V14.502L3.748,21.713z M1.018,37.938V27.579l2.73,0.343v8.196L1.018,37.938z M2.575,40.882l2.218-3.336h13.771l2.219,3.336H2.575z M19.328,35.805v-7.872l2.729-0.355v10.048L19.328,35.805z";
// var icon = {
//     path: car,
//     scale: .7,
//     strokeColor: 'white',
//     strokeWeight: .10,
//     fillOpacity: 1,
//     fillColor: '#404040',
//     offset: '5%',
//     // rotation: parseInt(heading[i]),
//     anchor: new google.maps.Point(10, 25) // orig 10,50 back of car, 10,0 front of car, 10,25 center of car
// };
  marker.setIcon({
    // path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
    // strokeColor: 'red',
    // strokeWeight: 3,
    // scale: 6,
    // rotation: google.maps.geometry.spherical.computeHeading(prevPosn, marker.getPosition())
    
    path: car,
    scale: .7,
    strokeColor: 'white',
    strokeWeight: .10,
    fillOpacity: 1,
    fillColor: color,
    offset: '5%',
    // rotation: parseInt(heading[i]),
    anchor: new google.maps.Point(10, 25),
    rotation: google.maps.geometry.spherical.computeHeading(prevPosn, marker.getPosition())
  })
}
      
          //  set your counter to 1
function myLoop(arr_jalan,m,i1,color) { 
  setTimeout(function() {   //  call a 3s setTimeout when the loop is called
    i1++;                    //  increment the counter
    if (i1 < arr_jalan.length) {           //  if the counter < 10, call the loop function
      myLoop(arr_jalan,m,i1,color); 
      // m.setPosition(new google.maps.LatLng(arr_jalan[i1][0],arr_jalan[i1][1]));     
      updateMarker(m,arr_jalan[i1][0],arr_jalan[i1][1],color)       //  ..  again which will trigger another 
    }                       //  ..  setTimeout()
  }, 1000)
}

// function mobil_gerak() { 
//   const directionsRenderer = new google.maps.DirectionsRenderer({
//     polylineOptions: {
//       strokeColor: "red"
//     }
//   });
//   const directionsService = new google.maps.DirectionsService();
//   directionsRenderer.setMap(map);
//   kalkulasi_jalan(directionsService, directionsRenderer);
// }

// function kalkulasi_jalan(directionsService,directionsRenderer) { 
//   directionsService.route(
//     {
//       origin: { lat:-7.57000327393688, lng: 110.80984566501888 },
//       destination: { lat: -7.5566230003386785, lng: 110.80478905118466 },
//       // waypoints: waypoint_sub,
//       optimizeWaypoints: true,
//       // Note that Javascript allows us to access the constant
//       // using square brackets and a string value as its
//       // "property."
//       travelMode: google.maps.TravelMode['DRIVING'],
//     },
//     (response, status) => {
//       if (status == "OK") {
//         directionsRenderer.setDirections(response);
//       } else {
//         window.alert("Directions request failed due to " + status);
//       }
//     }
//   );

// }

function toggleBounce(marker) {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
  console.log('dsa');
}

function jalankan(x) { 
  if (x == 'polisi') {
    realtime_polisi();
    $('#modal_progress').modal('show');
    setTimeout(() => {
      $('#modal_progress').modal('hide');
    }, 1000);
  }else if(x == 'ambulan'){
     $('#modal_progress').modal('show');
    setTimeout(() => {
      $('#modal_progress').modal('hide');
    }, 1000);
    realtime_ambulan();
  }
}


$(function(){
  //make connection
  // var socket = io.connect('http://localhost:3000')

  var socket = io.connect('http://36.91.103.46:3000')

  var myCloseInfo = function(){
  alert('this is a callback function that runs after close the notification.');
  };


  //Listen on new_message
  socket.on("new_message", (data) => {
    notifikasi(data.message);
  })

  function notifikasi(msg) {
    if (!Notification) {
        alert('Browsermu tidak mendukung Web Notification.'); 
        return;
    }
    if (Notification.permission !== "granted")
        Notification.requestPermission();
    else {
        var notifikasi = new Notification('Laporan Kecelakaan', {
            icon: 'http://36.91.103.46/sm-bi/my/images/logo.png',
            body: msg,
        });
        notifikasi.onclick = function () {
          crash('yes');
          notifikasi.close();
        };
        setTimeout(function(){
            notifikasi.close();
        }, 5000);
    }
};

});
