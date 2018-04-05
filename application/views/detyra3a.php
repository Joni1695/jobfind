<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {

        //Initialize the map with custom values
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 41.3273, lng: 19.8187},
          zoom: 8,
          zoomControl: true,
          mapTypeControl: true,
          scaleControl: true,
          streetViewControl: true,
          rotateControl: true,
          fullscreenControl: true,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            mapTypeIds: [
             google.maps.MapTypeId.ROADMAP,
             google.maps.MapTypeId.TERRAIN
           ]
          }
        });

        var starting = new google.maps.Marker({
          position: {lat: 41.3273, lng: 19.8187},
          map: map,
        });
        var infowindow1 = new google.maps.InfoWindow({
          content: 'Starting Point'
        });
        var destination = new google.maps.Marker({
          position: {lat: 42.3977, lng: 20.1627},
          map: map,
        });
        var infowindow2 = new google.maps.InfoWindow({
          content: 'Destination'
        });
        infowindow1.open(map,starting);
        infowindow2.open(map,destination);

        var lineSymbol = {
          path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
        };
        var line = new google.maps.Polyline({
          path: [starting.getPosition()],
          editable:true,
          icons: [{
            icon: lineSymbol,
            offset: '100%'
          }],
          map: map
        });

        google.maps.event.addListener(map,'click',function(event){
          line.getPath().push(event.latLng);
        });
        google.maps.event.addListener(destination,'click',function(event){
          line.getPath().push(destination.getPosition());
          google.maps.event.clearListeners(map,'click');
        });


      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWwWSdP0nixYjhFYG5HynF0a0xpzAMmo&callback=initMap"
    async defer></script>
  </body>
</html>
