var map;
var markers=[];
let black_spot = [];
let ts = [];
var i_polisi = 0;
var i_ambulan = 0;
var cctv_arr = [];
var cctv_link = [];
var infoWindow = null;
var label = '';
var titik_arr = [];
var titik_link = [];

var lokasi_arr = [];

var polisi_arr = [];
var polisi_link = [];

var damkar_arr = [];
var damkar_link = [];

var rumah_sakit_arr = [];
var rumah_sakit_link = [];

var dishub_arr = [];
var dishub_link = [];

var kend_indicar = {
  'mobil' : [],
  'route' : []
};

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
    zoom: 13,
    // mapTypeId: "satellite",
    // heading: 90,
    tilt: 45,
    disableDefaultUI: true,
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

function updateMarker(marker, latitude, longitude,color,angel) {
  var prevPosn = marker.getPosition();
  marker.setPosition(
    new google.maps.LatLng(latitude,longitude));
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
        // rotation: google.maps.geometry.spherical.computeHeading(prevPosn, marker.getPosition())
        rotation: parseFloat(angel)
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
    
    async function postData(url = '', data = {}) {
      // Default options are marked with *
      const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
          'Content-Type': 'application/json',
          'Accept' : 'application/json', 
          // 'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjE3MyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL25hbWUiOiJJT1QuS09STEFOVEFTQEdNQUlMLkNPTSIsIkFzcE5ldC5JZGVudGl0eS5TZWN1cml0eVN0YW1wIjoiYTZhNjI0YzMtZDhmYi00NzI4LTdlN2MtMzlmYjJlNjdkNjQyIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQWRtaW5HcnVwIiwic3ViIjoiMTczIiwianRpIjoiZjY5MTMwMzMtNmFlOC00ODQ3LWJmYjAtMDNkYzkzNDcyYmJhIiwiaWF0IjoxNjIwMjYzNzgyLCJ1c2VybmFtZSI6IklPVC5LT1JMQU5UQVNAR01BSUwuQ09NIiwiZnVsbG5hbWUiOiJJbmRpY2FyIERlbW8gIiwic3RhdHVzIjoiQWN0aXZlIiwicm9sZV9uYW1lIjoiQWRtaW5HcnVwLEFkbWluR3J1cCIsImV4cGlyZWQiOiIwNS8wNy8yMDIxIDAxOjE2OjIyIiwidHlwZV91c2VyIjoiQ3VzdG9tZXIiLCJ0ZW5hbnQiOiJEZWZhdWx0IiwiZ3JvdXAiOiJpb3Qua29ybGFudGFzQGdtYWlsLmNvbSxpb3Qua29ybGFudGFzQGdtYWlsLmNvbSIsImN1c3RvbWVyY29kZSI6IjhhYzhiYjY5MWI4OWFkNDk1Y2Q5NTkzZWZhMWZhMmRhIiwidGVuYW50Y29kZSI6IiIsInVzZXJjb2RlIjoiOTg5MDIzZDIwMTAxODU3ZjE4ZWU0OWU3NmYzNGRmZmUiLCJuYmYiOjE2MjAyNjM3ODIsImV4cCI6MTYyMDM1MDE4MiwiaXNzIjoiSW5kaUNhckJhY2tlbmQiLCJhdWQiOiJJbmRpQ2FyQmFja2VuZCJ9.ehb-k2VQ1MDZaDfwyeRKCmmuEEsc8cBT5xHkPzg0Ngk'
          // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
      });
      return response.json(); // parses JSON response into native JavaScript objects
    }

    function realtime_indicar() { 
      if(kend_indicar.mobil.length < 1){
        getMakeMarkerIndicar().then((x) => {
          x.mobil.forEach(m => {
            updateMarker(m,m.position.lat(),m.position.lng(),'#795548',m.rotation);
          });
        }).catch((err) => {
          
        });
      }else{
        var i = 0;
        postData('../Api_indicar/get_realtime_indicar',{})
        .then(data => {
          data.dataset.forEach(m => {
            updateMarker(kend_indicar.mobil[m.vehicleid],m.latitude,m.longitude,'#795548',m.angle);
          });
        });  
      }

    }

    function getMakeMarkerIndicar() { 
      return new Promise(function(resolve, reject) {
        var marker = {};
        postData('../Api_indicar/get_realtime_indicar',{})
        .then(data => {
          
          data.dataset.forEach(e => {
            // updateMarker(m_polisi,e.latitude,e.longitude,'#2d2d2d')   
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(e.latitude, e.longitude),
              map: map,
              rotation : e.angle,
              // icon: icons,
              Label: {
                className:'my-custom-class-for-label',
                text: e.vehiclename ,
                // fontWeight: 'bold',
                // fontSize: '9px',
                // fontFamily: '"Courier New", Courier,Monospace',
                // color: 'white',
              }
            });
            kend_indicar.mobil[e.vehicleid] = marker;
            kend_indicar.route[e.vehicleid] = e.angle;
          });
          resolve(kend_indicar);
        });    
      })
    }
    
    function get_kend(kend='polisi') { 
      var i = 0;
      const ok = new Promise(function(resolve, reject) {
      postData('https://www.indicar.id/platform/public/index.php/sysapi/vehicles/list',{})
      .then(data => {
        data.dataset.forEach(m => {
          $('.owl-carousel')
          .trigger('add.owl.carousel', [`<div class="item"><a href="#" onclick="tes(${m.vehicleid},'${m.vehiclename}','${m.vehiclegroup}')"><img class="avatar brround w-80" src="../aronox/assets/images/users/1.jpg" alt="image" style="height:3rem!important;"></a></div>`])
          .trigger('refresh.owl.carousel');
        });
      });
      });
    }

    // $('.owl-carousel').owlCarousel({
    //   // loop:true,
    //   margin:10,
    //   nav:false,
    //   dots:false,
    //   responsive:{
    //       0:{
    //           items:1
    //       },
    //       600:{
    //           items:3
    //       },
    //       1000:{
    //           items:5
    //       }
    //   }
    // })

    $(function(){
      
      realtime_indicar();
      
      setTimeout(() => {
        setInterval(() => {
          realtime_indicar();
        }, 10000);
      }, 1000);

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
        else 
            console.log('dassa');

            var notifikasi = new Notification('Laporan Kecelakaan', {
                icon: 'http://36.91.103.46/sm-bi/my/images/logo.png',
                body: msg,
            });
      
            notifikasi.onclick = function () {
              crash('yes');
              rumah_sakit();
              polisi();
              dishub();
              notifikasi.close();
            };
      
            setTimeout(function(){
                notifikasi.close();
            }, 5000);
      };
      
    });
    
    
    // CCTV 
    function cctv(param='') { 
      prom_get_cctv().then(function(data) {
        list_cctv();
      });
    }
    
    function create_cctv_map(arrx,item,icon) { 
      // cctv_arr = [];
      
      // arr = cctv_link;
      // if(arrx) arr = arrx; 
      
      // for (let i = 0; i < arr.length; i++) {
      //   marker = new google.maps.Marker({
      //     position: new google.maps.LatLng(arr[i].kordinat[0], arr[i].kordinat[1]),
      //     map: map,
      //     icon:{
      //       url: "../my/images/cctv.png", // url
      //       scaledSize: new google.maps.Size(20, 20), // scaled size
      //       origin: new google.maps.Point(0,0), // origin
      //       anchor: new google.maps.Point(0,0) // anchor
      //     }
      //   });
      //   cctv_arr.push(marker);
      // }
      
      // setTimeout(() => {
      //   setInfoWindowCCTV(item);
      // }, 500);
      
      prom_create_cctv_map(arrx,item,icon).then(function(data) {
        setInfoWindowCCTV(item);
      });
    }
    
    function prom_create_cctv_map(arrx,item,icon=null) {
      return new Promise(function(resolve, reject) {
        cctv_arr = [];
        arr = cctv_link;
        if(arrx) arr = arrx; 
        if(icon) icons = icon;

        for (let i = 0; i < arr.length; i++) {

          const total = arr[i].total;

          marker = new google.maps.Marker({
            position: new google.maps.LatLng(arr[i].kordinat[0], arr[i].kordinat[1]),
            map: map,
            icon: icons,
            Label: {
              className:'my-custom-class-for-label',
              text:  item == 'traffic_counting' ? `${total}` : ( item == 'average_speed' ? `0 km/h` : (item == 'length_ocupantion' ? `0 m` : ` `)) ,
              // fontWeight: 'bold',
              // fontSize: '9px',
              // fontFamily: '"Courier New", Courier,Monospace',
              // color: 'white',
            }
          });
          cctv_arr.push(marker);
        }
        
        resolve(cctv_arr);
      })
    }
    
    function setInfoWindowCCTV(item2='',n_titik='CCTV') {
      if (infoWindow) {
        infoWindow.close();
      }
      infoWindow = new google.maps.InfoWindow();
      for (let i = 0; i < cctv_arr.length; i++) {
        cctv_arr[i].setMap(map);
        google.maps.event.addListener(cctv_arr[i], 'click', function() {
          // window.location.href = this.url;
          map.setCenter(cctv_arr[i].getPosition());
          map.setZoom(15);
          if (n_titik=='CCTV' && item2=='traffic_counting') {
            const item2 = 'Traffic Counting'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            <tr>
            <td><b>Total Kendaraan</b></td>
            <td>:</td>
            <td>${cctv_link[i].total}</td>
            </tr>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=traffic_counting" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            infoWindow.open(map,cctv_arr[i]);
          }else if (n_titik=='CCTV' && item2=='traffic_category') {
            const item2 = 'Traffic Category'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            </table>
            <table class="table table-bordered mt-3">
            <thead>
            <tr>
            <th>Kendaraan</th>
            <th>Jumlah</th>
            </tr>
            </thead>
            <tbody id="t${cctv_link[i].id}">
            </tbody>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=traffic_category" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            
            infoWindow.open(map,cctv_arr[i]);
            setTimeout(() => {
              to_table_traffic_category('#t'+cctv_link[i].id,cctv_link[i].kategori);
            }, 1000);
          }else if (n_titik=='CCTV' && item2=='average_speed') {
            const item2 = 'Average Speed'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
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
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=average_speed" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            infoWindow.open(map,cctv_arr[i]);
          }else if (n_titik=='CCTV' && item2=='length_ocupantion') {
            const item2 = 'Length Ocupation'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
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
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=length_ocupantion" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            infoWindow.open(map,cctv_arr[i]);
          }else{
            infoWindow.setContent(`<div><p><b>${n_titik}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=length_ocupantion" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
          }
          map.panTo(cctv_arr[i].position);
        });
      }
      
    }
    
    function list_cctv() { 
      $('#list_cctv').html('');
      setTimeout(() => {
        var no = 0;
        cctv_link.forEach(e => {
          $('#list_cctv').append(`<div class="list-group-item list-group-item-action">
          <input type="checkbox" class="mr-2 check-cctv-korlantas" onchange="check_cctv()" name="cctv[]" value="${no++}">
          <span class="name_cctv">${e.nama} </span></div>`);
        });
      }, 300);
    }
    
    function check_cctv() { 
      
      // setTimeout(() => {
      //   $('input[name="cctv[]"]:checked').each(function() {
      //     check_cctv.push(cctv_link[this.value]);
      //   });
      //   setTimeout(() => {
      //     clearMarkerCctv()
      //     setTimeout(() => {
      //       cctv = check_cctv;
      //       create_cctv_map(cctv);
      //     }, 700);
      //   }, 500);
      // }, 500);
      
      prom_check_cctv().then(function(hasil) {
        prom_clearMarkerCctv().then(function(data) {
          cctv = hasil;
          create_cctv_map(cctv,label,{
            url: "../my/images/cctv.png", // url
            scaledSize: new google.maps.Size(20, 20), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0,0) // anchor
          });
        });
      });
    }
    
    function prom_clearMarkerCctv() {
      return new Promise(function(resolve, reject) {
        if (cctv_arr) {
          for (let i = 0; i < cctv_arr.length; i++) {
            cctv_arr[i].setMap(null);
          }
          resolve(cctv_arr);
        }
      })
    }
    
    function prom_check_cctv() {
      return new Promise(function(resolve, reject) {
        var check_cctv = [];
        setTimeout(() => {
          $('input[name="cctv[]"]:checked').each(function() {
            check_cctv.push(cctv_link[this.value]);
          });
          resolve(check_cctv);
        }, 300);
      })
    }
    
    
    function get_cctv(s='',item='') { 
      $.ajax({
        type: "POST",
        url: "get_cctv",
        dataType: "json",
        data : {
          a : item
        },
        success: function (r) {
          cctv_link = r;
        }
      });
    }

    function prom_get_cctv(s='',item='') { 
      return new Promise(function(resolve, reject) {
        $.ajax({
          type: "POST",
          url: "get_cctv",
          dataType: "json",
          data : {
            a : item
          },
          success: function (r) {
            cctv_link = r;
            resolve(cctv_arr);
          }
        });
      })
    }
    
    function clearMarkerCctv(arr) {
      if (cctv_arr) {
        for (let i = 0; i < cctv_arr.length; i++) {
          cctv_arr[i].setMap(null);
        }
      }
    }

    function to_table_traffic_category(table='',data='') { 
      $(table).html('');
      data.forEach(e => {
        $(table).append('<tr><td>'+e.type_kend+'</td><td>'+e.jml+'</td></tr>');
      });
    }
    
    // Titik
    
    function show_titik(item='',item2='') { 
      
      setTimeout(() => {
        var varr;
        var icon = {
          scaledSize: new google.maps.Size(20, 20), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(0,0) // anchor
        };
        if (item == 'cctv' && (item2 == 'traffic_counting' || item2 == 'traffic_category' || item2 == 'average_speed' || item2 == 'length_ocupantion')) {
    
          prom_get_cctv('CCTV',item2).then(function(data) {
            // list_cctv();
          });
          
          label = item2;
          
          if (item2 == "traffic_counting") icon.url = "../my/simulasi/trafficcounting.png";
          if (item2 == "traffic_category") icon.url = "../my/simulasi/trafficcategory.png";
          if (item2 == "average_speed") icon.url = "../my/simulasi/avgspeed.png";
          if (item2 == "length_ocupantion") icon.url = "../my/simulasi/lengthocc.png";

          prom_check_cctv().then(function(hasil) {
            prom_clearMarkerCctv().then(function(data) {
              let cctv = cctv_link;
              if (hasil) {
                cctv = hasil;
              }
              create_cctv_map(cctv,item2,icon);
            });
          });
        }
        
        if (item == 'black_spot') {
          varr = black_spot;
          clearMarkerTitik();
          icon.url = "../my/simulasi/blackspot.png";
          get_titik('Black Spot');
          setTimeout(() => {
            create_titik_map(varr,icon);
            setTimeout(() => {
              setInfoWindows('Black Spot');
            }, 300);
          }, 200);
        }
        
        if(item == 'trouble_spot'){
          varr = ts;
          clearMarkerTitik();
          icon.url = "../my/simulasi/troublespot.png";
          get_titik('Trouble Spot');
          setTimeout(() => {
            create_titik_map(varr,icon);
            setTimeout(() => {
              setInfoWindows('Trouble Spot');
            }, 300);
          }, 200);
        }
        
        if(item == 'ambang_gangguan'){
          varr = ts;
          clearMarkerTitik();
          icon.url = "../my/simulasi/ambanggangguan.png";
          get_titik('Ambang Gangguan');
          setTimeout(() => {
            create_titik_map(varr,icon);
            setTimeout(() => {
              setInfoWindows('Ambang Gangguan');
            }, 300);
          }, 200);
        }
        
        if(item == 'giat_masyarakat'){
          varr = ts;
          clearMarkerTitik();
          icon.url = "../my/simulasi/giatmasyarakat.png";
          get_titik('Kegiatan Masyarakat');
          setTimeout(() => {
            create_titik_map(varr,icon);
            setTimeout(() => {
              setInfoWindows('Kegiatan Masyarakat');
            }, 300);
          }, 200);
        }
        
        if(item == 'vvip'){
          get_route();
          setTimeout(() => {
            vvip();
          }, 200);
        }
      }, 150);
    }
    
    function create_titik_map(arr,img) { 
      titik_arr = [];
      var m_titik = [];
      
      for (i = 0; i < titik_link.length; i++) {  
        
        var myLatLng = new google.maps.LatLng(titik_link[i].lat, titik_link[i].lng);
        const total = titik_link[i].total;
        m_titik = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon : img,
        });
        
        titik_arr.push(m_titik);
      }
    }
    
    function setInfoWindows(n_titik='',item2='') {
      if (infoWindow) {
        infoWindow.close();
      }
      
      infoWindow = new google.maps.InfoWindow();
      for (let i = 0; i < titik_arr.length; i++) {
        titik_arr[i].setMap(map);
        google.maps.event.addListener(titik_arr[i], 'click', function() {
          // window.location.href = this.url;
          map.setCenter(titik_arr[i].getPosition());
          map.setZoom(15);
          if (n_titik=='CCTV' && item2=='traffic_counting') {
            const item2 = 'Traffic Counting'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            <tr>
            <td><b>Total Kendaraan</b></td>
            <td>:</td>
            <td>${cctv_link[i].total}</td>
            </tr>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=traffic_counting" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            infoWindow.open(map,titik_arr[i]);
          }else if (n_titik=='CCTV' && item2=='traffic_category') {
            const item2 = 'Traffic Category'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
            </tr>
            </table>
            <table class="table table-bordered mt-3">
            <thead>
            <tr>
            <th>Kendaraan</th>
            <th>Jumlah</th>
            </tr>
            </thead>
            <tbody id="t${cctv_link[i].id}">
            </tbody>
            </table>
            </div>
            <div class="row" style="margin-right:0 !important;">
            <div class="ml-auto">
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=traffic_category" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            
            infoWindow.open(map,titik_arr[i]);
            setTimeout(() => {
              to_table_traffic_category('#t'+cctv_link[i].id,cctv_link[i].kategori);
            }, 1000);
          }else if (n_titik=='CCTV' && item2=='average_speed') {
            const item2 = 'Average Speed'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
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
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=average_speed" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            infoWindow.open(map,titik_arr[i]);
          }else if (n_titik=='CCTV' && item2=='length_ocupantion') {
            const item2 = 'Length Ocupation'; 
            infoWindow.setContent(`<div><p><b>${n_titik} - ${item2}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <div class="embed-responsive embed-responsive-16by9" style="width:500px;">
            <iframe class="embed-responsive-item" src="${"http://"+window.location.hostname+":5000/?u="+cctv_link[i].rtsp}" allowfullscreen></iframe>
            </div>
            <div class="mt-3">
            <table class="w-100">
            <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>${cctv_link[i].nama}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${cctv_link[i].kordinat}</td>
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
            <a href="../data_analytic/detail_analytic_cctv?id=${cctv_link[i].id}&q=length_ocupantion" class="btn btn-primary">Detail <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            `,
            );
            infoWindow.open(map,titik_arr[i]);
          }else{
            infoWindow.setContent(`<div><p><b>${n_titik}</b></p>
            <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
            <table class="w-100">
            <tr>
            <td><b>Nama Jalan</b></td>
            <td>:</td>
            <td>${titik_link[i].namajalan}</td>
            </tr>
            <tr>
            <td><b>Kordinat</b></td>
            <td>:</td>
            <td>${titik_link[i].lat+','+titik_link[i].lng}</td>
            </tr>
            <tr>
            <td><b>Status</b></td>
            <td>:</td>
            <td>${titik_link[i].dtm}</td>
            </tr>
            <tr>
            <td><b>Tanggal</b></td>
            <td>:</td>
            <td>${titik_link[i].status}</td>
            </tr>
            <tr>
            <td><b>Jam Mulai</b></td>
            <td>:</td>
            <td>${titik_link[i].jammulai}</td>
            </tr>
            <tr>
            <td><b>Sampai</b></td>
            <td>:</td>
            <td>${titik_link[i].jamsampai}</td>
            </tr>
            <tr>
            <td><b>Penyebab</b></td>
            <td>:</td>
            <td>${titik_link[i].penyebab}</td>
            </tr>
            <tr>
            <td><b>Detail</b></td>
            <td>:</td>
            <td>${titik_link[i].penyebabd}</td>
            </tr>
            <tr>
            <td><b>Sumber Info</b></td>
            <td>:</td>
            <td>${titik_link[i].sumber}</td>
            </tr>
            <tr>
            <td><b>Petugas Lapangan</b></td>
            <td>:</td>
            <td>${titik_link[i].petugas}</td>
            </tr>
            </table>
            </div>
            `,
            );
            infoWindow.open(map,titik_arr[i]);
          }
          
        });
        map.panTo(titik_arr[i].position);
      }
      
      // new MarkerClusterer(map, markers, {
      //   imagePath:
      //     "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
      // });
    }
    
    function get_titik(s='') { 
      $.ajax({
        type: "GET",
        url: "get_titik?s="+s,
        dataType: "json",
        success: function (r) {
          titik_link = r;
          $('#n_titik').text(s);
        }
      });
    }
    
    function clearMarkerTitik(arr) {
      if (titik_arr) {
        for (let i = 0; i < titik_arr.length; i++) {
          titik_arr[i].setMap(null);
        }
      }
    }
    
    // VVIP
    
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
          url: "get_jalur?id=1",
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

    // Lokasi

    function lokasi(name='') { 
      prom_get_lokasi(name).then(function(hasil) {
        list_lokasi(hasil,name);
        // prom_check_lokasi().then(function(hasil2) {
        //   prom_clearMarkerCctv().then(function(data) {
        //     create_lokasi_map(hasil2,label,{
        //       url: "../my/images/cctv.png", // url
        //       scaledSize: new google.maps.Size(20, 20), // scaled size
        //       origin: new google.maps.Point(0,0), // origin
        //       anchor: new google.maps.Point(0,0) // anchor
        //     });
        //   });
        // });
      });
    }

    function list_lokasi(arr=[],name='') { 
      var lokasi_arr = [];
      $('#list_lokasi_'+name).html('');
      setTimeout(() => {
        var no = 0;
        arr.forEach(e => {
          $('#list_lokasi_'+name).append(`<div class="list-group-item list-group-item-action">
          <input type="checkbox" class="mr-2 check-lokasi-${name}" onchange="check_lokasi('${name}')" name="lokasi_${name}[]" value="${no++}">
          <span class="name_cctv">${e.nama} </span></div>`);
        });
      }, 300);
    }

    function prom_get_lokasi(name='') { 
      return new Promise(function(resolve, reject) {
        $.ajax({
          type: "POST",
          url: "get_lokasi",
          dataType: "json",
          data : {
            for : name
          },
          success: function (r) {
            if (name == 'polisi') polisi_link = r.data;
            if (name == 'dishub') dishub_link = r.data;
            if (name == 'rumah_sakit') rumah_sakit_link = r.data;
            if (name == 'damkar') damkar_link = r.data;
            resolve(r.data);
          }
        });
      })
    }

    function create_lokasi_map(arrx,name) {
      return new Promise(function(resolve, reject) {
        lokasi_arr = [];
        var icon;
        var marker;
        // arr = lokasi_link;
        if(arrx) arr = arrx; 
        // if(icon) icons = icon;

        if (name == 'polisi') {
          icon = {
            url : "../my/simulasi/polisi.png"
          }
        }else if (name == 'dishub') {
          icon = {
            url : "../my/simulasi/dishub.png"
          }
        }else if (name == 'damkar') {
          icon = {
            url : "../my/simulasi/icon_damkar.png"
          }
        }else if (name == 'rumah_sakit') {
          icon = {
            url : "../my/simulasi/hospital.png"
          }
        }

        for (let i = 0; i < arr.length; i++) {

          const total = arr[i].total;

          marker = new google.maps.Marker({
            position: new google.maps.LatLng(arr[i].lat, arr[i].lng),
            map: map,
            icon : icon
          });

          lokasi_arr.push(marker);

        }
        
        resolve(lokasi_arr);
      })
    }

    function create_lokasi_info_window(arr,data_link,name) { 
      return new Promise(function(resolve, reject) {
        // var arr_link = [];
        // if (name == 'polisi') arr_link = polisi_link;
        // if (name == 'dishub') arr_link = dishub_link;
        // if (name == 'rumah_sakit') arr_link = rumah_sakit_link;
        // if (name == 'damkar') arr_link = damkar_link;

        // console.log(arr_link);

        if (infoWindow) {
          infoWindow.close();
        }

        for (let i = 0; i < arr.length; i++) {
          const e = arr[i];
          const contentString = `<div><p><b>${data_link[i].nama}</b></p>
          <hr style="margin-top:0 !important;margin-bottom:1rem !important;">
          <div class="mt-3">
          <table class="w-100">
          <tr>
          <td><b>Alamat</b></td>
          <td>:</td>
          <td>${data_link[i].alamat}</td>
          </tr>
          <tr>
          <td><b>Kordinat</b></td>
          <td>:</td>
          <td>${data_link[i].lat} , ${data_link[i].lng}</td>
          </tr>
          </table>
          </div>
          </div>`;
  
           infowindow = new google.maps.InfoWindow({
            content: contentString,
          });

          arr[i].addListener("click", () => {
            map.panTo(arr[i].position); 
            infowindow.open(map, arr[i]);
          });
        }


        resolve(true);
      })
    }
    
    function check_lokasi(name='') { 
      prom_check_lokasi(name).then(function(hasil) {
        prom_clearMarkerLokasi(lokasi_arr).then(function(data) {
        //   cctv = hasil;
          // create_lokasi_map(hasil);
          console.log(hasil,name);
          create_lokasi_map(hasil,name).then(function(data1) { 
            create_lokasi_info_window(data1,hasil,name);
          });
        });
      });
    }
    
    function prom_clearMarkerLokasi(arr) {
      return new Promise(function(resolve, reject) {
        if (arr) {
          for (let i = 0; i < arr.length; i++) {
            arr[i].setMap(null);
          }
          resolve(arr);
        }
      })
    }
    
    function prom_check_lokasi(name='') {
      return new Promise(function(resolve, reject) {
        var arr = [];
        var lokasi_arr = [];

          if (name == 'polisi') lokasi_arr = polisi_link;
          if (name == 'dishub') lokasi_arr = dishub_link;
          if (name == 'rumah_sakit') lokasi_arr = rumah_sakit_link;
          if (name == 'damkar') lokasi_arr = damkar_link;

        setTimeout(() => {
          $('input[name="lokasi_'+name+'[]"]:checked').each(function() {
            arr.push(lokasi_arr[this.value]);
          });
          resolve(arr);
        }, 300);
      })
    }
    