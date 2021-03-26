let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -7.5592506525457, lng: 110.8228297937785 },
    zoom: 15,
    mapTypeId: "satellite",
    heading: 90,
    tilt: 45,
  });
}

function rotate90() {
  const heading = map.getHeading() || 0;
  map.setHeading(heading + 90);
}

function autoRotate() {
  // Determine if we're showing aerial imagery.
  if (map.getTilt() !== 0) {
    window.setInterval(rotate90, 3000);
  }
}