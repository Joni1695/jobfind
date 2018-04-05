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
          center: {lat: -34.397, lng: 150.644},
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
        var markerNum=0;
        //Kushti i dyte dhe i pare
        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng,markerNum+1);
        });

        google.maps.event.addListener(map,'dblclick',function(event){
          map.setCenter(event.latLng);
          event.stopPropagation();
        });

        function placeMarker(location,number) {
          var marker = new google.maps.Marker({
            position: location,
            map: map,
          });
          var infowindow = new google.maps.InfoWindow({
            content: '<b>Marker Number: </b>' + number +
            '<br>Latitude: <i>' + location.lat() +
            '</i><br>Longitude: <i>' + location.lng() + '</i>'
          });
          markerNum+=1;
          setTimeout(function(){infowindow.open(map,marker)},3000);

        }

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWwWSdP0nixYjhFYG5HynF0a0xpzAMmo&callback=initMap"
    async defer></script>
  </body>
</html>
