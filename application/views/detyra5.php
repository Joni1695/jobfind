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
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        height: 100%;
        float: right;
        width: 390px;
        overflow: auto;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      @media print {
        #map {
          height: 500px;
          margin: 0;
        }
        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
  </head>
  <body>
    <div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>
    <script type="text/javascript">
      var map;

      function initMap() {
        var directionService=new google.maps.DirectionsService;
        var directionDisplay=new google.maps.DirectionsRenderer;
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
        directionDisplay.setMap(map);
        directionDisplay.setPanel(document.getElementById('right-panel'));

        var count=0;
        var marker=[]
        google.maps.event.addListener(map,'click',function(event){
          marker[count]=new google.maps.Marker({
            position: event.latLng,
            map: map,
            title: ''+count
          });
          count++;
          if(count==2){
            directionService.route({
              origin: marker[0].getPosition(),
              destination: marker[1].getPosition(),
              travelMode: google.maps.TravelMode.DRIVING
            },function(response,status){
              if (status === google.maps.DirectionsStatus.OK) {
                directionDisplay.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
            google.maps.event.clearListeners(map,'click');
          }
        });
        $('#mode').change(function(){
          if(count>=2){
            var value=$(this).val();
            var string;
            if(value=='DRIVING') string=google.maps.TravelMode.DRIVING;
            else if(value=='WALKING') string=google.maps.TravelMode.WALKING;
            else if(value=='TRANSIT') string=google.maps.TravelMode.TRANSIT;
            else if(value=='BICYCLING') string=google.maps.TravelMode.BICYCLING;
            directionService.route({
              origin: marker[0].getPosition(),
              destination: marker[1].getPosition(),
              travelMode: string
            },function(response,status){
              if (status === google.maps.DirectionsStatus.OK) {
                directionDisplay.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWwWSdP0nixYjhFYG5HynF0a0xpzAMmo&callback=initMap"
    async defer></script>
  </body>
</html>
