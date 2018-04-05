<!DOCTYPE html>
<html>
  <head>
    <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
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
    <!--
      Ky projekt kerkon dy gjera, perdorimin e sherbimit geocode dhe geocode reverse.
      Geocode API nenkupton marrjen e nje adrese ne format stringu dhe perkthimin e tij ne pozicion gjeografik.
      Reverse Geocode eshte e kunderta, pra kthimi nga nje pozicion gjeografik ne format stringu.

      Pika e pare eshte realizuar duke marre te dhena nga databaza te tipit{'id'-int,'address'-varchar,'radius'-int}.
      Per secilen nga keto te dhena eshte krijuar nje objekt circle me ngjyre random dhe radius vleren e marre nga databaza.

      Pika e dyte eshte realizuar me ane te klikimeve ne harte. Ne cdo klikim shtohet nje marker ne harte qe ne hover tregon
      adresen postare te vendit.
    -->
    <script>
      //Funksioni init
      function initMap() {

        //Initializohet harta
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 41.3273, lng: 19.8187},
          zoom: 8,
        });

        //Deklarohet objekti geocode
        var geocoder = new google.maps.Geocoder();

        //Krijojme nje array qe do ruaje objektet qe do mbajne vlerat nga databaza.
        var addressArray=[];
        <?php foreach($address as $a) :?>
          //Mbushet array me te dhenat nga databaza te cilat ne php jane $a
          addressArray.push({id:<?php echo $a->id; ?>,address:'<?php echo $a->adress; ?>',radius:<?php echo $a->radius; ?>});
        <?php endforeach; ?>
        //Per secilen vlere te marre nga databaza kalohet permes funksionit geocodeAddress
        for(var i=0;i<addressArray.length;i++) geocodeAddress(geocoder,map,addressArray[i]);

        //Vendoset eventi i geocodeReverse ne klikim
        google.maps.event.addListener(map,'click',function(event){
          geocodeReverse(geocoder,map,event);
        });
      }


      //Funksioni qe do thirret per objektet e databazes
      function geocodeAddress(geocoder,map,object){
        //Therritet metoda geocode e cila kalon si 'address' adresen e marre nga databaza
        geocoder.geocode({'address': object.address},function(results,status){
          //Nese statusi kthehet OK domethene qe eshte bere perkthimi nga string ne pozicion gjeografik ne menyre te
          //sukseshme.
          var random;
          random=Math.round(Math.random()*1000000);
          if(status===google.maps.GeocoderStatus.OK){
            //Per cdo resultat te mundshem te kthyer nga databaza krijohet rradhi me qender pozicionin gjeografik
            //dhe me rreze vleren e marre nga databaza
            for(var i=0;i<results.length;i++){

              circle = new google.maps.Circle({
                strokeColor: '#'+random,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#'+random,
                fillOpacity: 0.35,
                map: map,
                center: results[i].geometry.location,
                radius: object.radius
              });

            }
            //Nese ka ndodhur ndonje error ne perkthimin e te dhenave atehere behet alert errori
          } else{
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      //Funksioni qe do thirret ne klikim te hartes
      function geocodeReverse(geocoder,map,object){
        geocoder.geocode({'location': object.latLng}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            //Nese eshte gjendur nje resultat
            if (results[1]) {
              //Nderto markerin me qender klikimin
              var marker=new google.maps.Marker({
                position:object.latLng,
                map:map,
                title:results[1].formatted_address
              });
              //Nese nuk ka asnje resultat te mundshem
            } else {
              window.alert('No results found');
            }
            //Ne rast deshtim perkthimi
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJWwWSdP0nixYjhFYG5HynF0a0xpzAMmo&callback=initMap"
    async defer></script>
  </body>
</html>
