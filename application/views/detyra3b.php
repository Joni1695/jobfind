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

        var polygon=new google.maps.Polygon({
          path:[{lat: 41.3273, lng: 19.8187}],
          strokeColor: '#000000',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#000218',
          fillOpacity: 0.2
        });
        polygon.setMap(map);
        var count=1;

        google.maps.event.addListener(map,'click',function(event){
          if(count<5){
            polygon.getPath().push(event.latLng);
            count++;
          } else {
            polygon.getPath().push(event.latLng);
            polygon.getPath().removeAt(0);

          }

        });


      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWwWSdP0nixYjhFYG5HynF0a0xpzAMmo&callback=initMap"
    async defer></script>
  </body>
</html>
