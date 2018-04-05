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
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
  </head>
  <body>
    <div id="map"></div>
    <script type="text/javascript">
      var map;
      var marker=[];
      var circle=[];
      var info=[];
      var markerName=[];
      var markerVal=[];
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



        function createMarker(id,positionlat,positionlng,name,val){
          marker[id]=new google.maps.Marker({
            position: {lat:positionlat,lng:positionlng},
            map: map,
            id:id
          });
          markerName[id]=name;
          markerVal[id]=val;
          var random;
          random=Math.round(Math.random()*1000000);

          circle[id] = new google.maps.Circle({
            strokeColor: '#'+random,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#'+random,
            fillOpacity: 0.35,
            map: map,
            center: marker[id].getPosition(),
            radius: markerVal[id]
          });

          google.maps.event.addListener(marker[id],'click',function(){
              info[id]=new google.maps.InfoWindow({
              position:{lat:positionlat,lng:positionlng},
              content: 'Name: '+name+' Value:'+val+' <br><button onclick="deletenode('+id+')">DELETE</delete>'
            });
            info[id].open(map);
          });
        }
        //generate marker

        <?php foreach($cord as $c): ?>
          createMarker(<?php echo $c->id;?>,<?php echo $c->lat;?>,<?php echo $c->lng;?>,'<?php echo $c->name;?>',<?php echo $c->val;?>);
        <?php endforeach; ?>

      }
      function deletenode(id){
        $.post('deleteNode',{node_id: id},function(){
          info[id].close();
          marker[id].setMap(null);
          circle[id].setMap(null);
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWwWSdP0nixYjhFYG5HynF0a0xpzAMmo&callback=initMap"
    async defer></script>
  </body>
</html>
