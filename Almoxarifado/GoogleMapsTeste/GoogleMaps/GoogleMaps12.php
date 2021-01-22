<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polylines</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA72NcoZXPMcYPisPwtck2Mwr_ocPMB8ZY"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    function initialize() {
    var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(-7.275920,112.791871),
    mapTypeId: google.maps.MapTypeId.TERRAIN
    };


    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

    var flightPlanCoordinates = [
    <?php
    //If konesi.php outputs ANYTHING, the map will fail to load. However, you should
    //change the connection variable to $connection = mysqli_connect("HOST","USERNAME","PASSWORD","DATABASE");
   // include('koneksi.php');

    //switch to correct database
   $connection= mysql_connect("127.0.0.1","root","usbw","googlemaps");
    mysql_select_db($connection,"test");

    //Query the user for start and ending location. Store locations in variables
    $query = mysql_query($connection,"SELECT lat, long1, lat2, long2 FROM user_location LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    $lat = $row['lat'];
    $lon = $row['long1'];
    $lat2 = $row['lat2'];
    $lon2 = $row['long2'];

    //Echo out the users start location
    echo 'new google.maps.LatLng('.$lat.', '.$lon.'),';

    //Assuming route that lat and long coordinates are in multiple records and not in a array within a single record
    //Loop through all records and echo out the positions
    $query = mysqli_query($connection,"SELECT lat, lng FROM route");
    while($row = mysqli_fetch_assoc($query)){
        $lat = $row['lat'];
        $lon = $row['lng'];
        echo 'new google.maps.LatLng('.$lat.', '.$lon.'),';
    }

    //echo users ending position
    echo 'new google.maps.LatLng('.$lat2.', '.$lon2.')';

    ?>

    ];

    var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });
    flightPath.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    </head>
    <body>
		
        <div id="map-canvas" style="height: 500px; width: 700px"></div>
    </body>
</html>
