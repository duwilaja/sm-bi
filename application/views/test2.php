<!DOCTYPE html>
<html>
  <head>
    <!-- Sokablah bro -->
    <title>Lokasi</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
     
      #map {
        height: 100%;
      }
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      let map;

      function initMap() {
        const localContextMapView = new google.maps.localContext.LocalContextMapView(
          {
            element: document.getElementById("map"),
            placeTypePreferences: [
            //   { type: "hospital"},
              { type: "gas_station"},
            //   { type: "university" },
            //   { type: "pharmacy"},
            //   { type: "secondary_school"},
            ],
            maxPlaceCount: 16,
            placeChooserViewSetup: ({defaultLayoutMode}) => {
                if (defaultLayoutMode === 'SHEET') {
                return {position: 'INLINE_END'};
                }
            },
            placeDetailsViewSetup: ({defaultLayoutMode}) => {
                if (defaultLayoutMode === 'SHEET') {
                return {position: 'INLINE_END'};
                }
            },
          }
        );
        map = localContextMapView.map;
        map.setOptions({
          center: { lat: -7.559669364640486, lng: 110.81963842699129 },
          zoom: 14,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
          },
        //   disableDefaultUI: true,
        });
      }
    </script>
  </head>
  <body>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPKqeGiSJSUulJQHrLP8u1s33YMEgxlAs&callback=initMap&libraries=localContext&v=beta" async></script>
  </body>
</html>