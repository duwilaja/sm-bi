var map;
var markers=[];

const createMarker = ({ map, position }) => {
   new google.maps.Marker({ map, position });
};

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -7.5592506525457, lng: 110.8228297937785 },
    zoom: 15,
    mapTypeId: "satellite",
    heading: 90,
    tilt: 45,
  });
  setTimeout(() => {
    rumah_sakit();
    polisi();
    dishub();
    crash();
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

    console.log(arr[i]);

    // const flightPlanCoordinates = [
    //   { lat: -7.560421192910239, lng: 110.80274929355274 },
    //   { lat: -7.559382670505489, lng: 110.80764654957994 },
    //   { lat: -7.558546532356327, lng: 110.80740863824511 },
    //   { lat: -7.5566230003386785, lng: 110.80478905118466 },
    // ];
    // const flightPath = new google.maps.Polyline({
    //   path: flightPlanCoordinates,
    //   geodesic: true,
    //   strokeColor: "#FF0000",
    //   strokeOpacity: 1.0,
    //   strokeWeight: 2,
    // });
    // flightPath.setMap(map);

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

 function crash() { 
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

  setTimeout(() => {
    realtime_car();
  }, 300);
}

function realtime_car() { 
  let arr = [
    [-7.57000327393688, 110.80984566501888]
  ];

  marker = new google.maps.Marker({
    position: new google.maps.LatLng(arr[0][0], arr[0][1]),
    map: map,
    icon:{
      url : "../my/simulasi/car_rt.png"
    }
  });

  myLoop();
  

}

var i = 0;                  //  set your counter to 1
function myLoop() { 
  
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
          //  create a loop function
  setTimeout(function() {   //  call a 3s setTimeout when the loop is called
    console.log('hello');   //  your code here
    i++;                    //  increment the counter
    if (i < arr_jalan.length) {           //  if the counter < 10, call the loop function
      myLoop(); 
      marker.setPosition(new google.maps.LatLng(arr_jalan[i][0],arr_jalan[i][1]));            //  ..  again which will trigger another 
    }                       //  ..  setTimeout()
  }, 3000)
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

