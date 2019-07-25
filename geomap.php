 <script  type="text/javascript">
     var locations = [['$postaddress ;','33;', ' 23;', '1'],];
 </script>

 <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

  <div id="map" class="googlemapimage">nn</div>

  <script type="text/javascript">

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom:15,  
      center: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $long; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }

      })(marker, i));
      google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
        return function() {

          infowindow.close();
        }

      })(marker, i));
       google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        infowindow.setContent(locations[i][0]);
           infowindow.open(map, marker);
        }

      })(marker, i));
    }
  </script>