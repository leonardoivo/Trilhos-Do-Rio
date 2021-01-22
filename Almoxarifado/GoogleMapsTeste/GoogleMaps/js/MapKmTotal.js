 var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
		var	stuDistances,homeLatlng, latLng;
			  var path = [];
			  var kilometro ="";
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng( -22.9027800, -43.2075000),
          zoom: 11
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost:8080/GoogleMapsTeste/GoogleMaps/SqlToXml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
                  //homeLatlng=parseFloat(markerElem.getAttribute('lat')); 
                  //latLng=parseFloat(markerElem.getAttribute('llng'));
                  
             path.push(new google.maps.LatLng( parseFloat(markerElem.getAttribute('lat')),parseFloat(markerElem.getAttribute('lng'))));
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
              
             
            });
            var polyline = new google.maps.Polyline({
            map: map,
            path: path,
            strokeColor: '#0000FF',
            strokeOpacity: 0.7,
            strokeWeight: 1
          });
          
          
          // document.getElementById("distanceTravelled").innerHTML = Math.round(polyline.inKm())+' km';  // Fazendo o calculo de distância percorrida
        ////kilometro =  Math.round(polyline.inKm())+' km';
          });
             //stuDistances = calculateDistances(homeLatlng, latLng);
            //$('#tableNeighbours').append(
                 //// '<tr>' 
               //// + '<td>' + arrDestinations[i].title + '</td>'
              ////  + '<td>' + stuDistances.km + ' km</td>'
                   //stuDistances.km 
              ////  + '<td>' + stuDistances.miles + ' miles</td>'
              ////  + '</tr>'
            //);
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
      
      
   //function calculateDistances(start,end) {
        //var stuDistances = {};
        
        //stuDistances.metres = google.maps.geometry.spherical.computeDistanceBetween(start, end);    // distance in metres
        //stuDistances.km = Math.round(stuDistances.metres / 1000 *10)/10;                            // distance in km rounded to 1dp
        //stuDistances.miles = Math.round(stuDistances.metres / 1000 * 0.6214 *10)/10;                // distance in miles rounded to 1dp
        
        //return stuDistances;
    //}
    google.maps.event.addDomListener(window, 'load', initMap);

      function doNothing() {}
