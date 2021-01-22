
<?php
$i=0;
$f=0;
$d=0;
require("phpsqlajax_dbinfo.php");
// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysqli_select_db($connection,$database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE name='Carlos Henrique'";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


while ($row = @mysqli_fetch_assoc($result)){
 
 
  if($i%2==0){
		
	  $lat_inicial= $row['lat'] ;
      $long_inicial= $row['lng'];
   
            
		
		}
		if($i%2!=0){
		
		$lat_final= $row['lat'] ;
        $long_final=$row['lng'];

       
		}
   if(isset($lat_final)&&isset($long_final)){
	   //if($i==0){
		   //$Latitude_Gasotec="";
		   //$longtude_Gasotec="";  //Para ser implementado depois.
		   //$d=calcDistancia( $Latitude_Gasotec, $longtude_Gasotec="";, $lat_inicial,$long_inicial);
		   
		   //}
	   
	  
	 $d=calcDistancia($lat_inicial, $long_inicial, $lat_final, $long_final);
	  
	  $f+=$d;
	// echo $f."<br/><br/>";
	  $g=number_format($f, 3, '.', '');
	  }
 //echo $i.":";
  $i++;
}
 //echo "Valor Total da Rota:".$f."<br/><br/>";
 //echo "Total de posicoes:".$i;
function calcDistancia($lat_inicial, $long_inicial, $lat_final, $long_final)
 {
    $d2r = 0.017453292519943295769236;

    $dlong = ($long_final - $long_inicial) * $d2r;
    $dlat = ($lat_final - $lat_inicial) * $d2r;

    $temp_sin = sin($dlat/2.0);
    $temp_cos = cos($lat_inicial * $d2r);
    $temp_sin2 = sin($dlong/2.0);

    $a = ($temp_sin * $temp_sin) + ($temp_cos * $temp_cos) * ($temp_sin2 * $temp_sin2);
    $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

    return 6368.1 * $c;
 }

?>


<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
     <link href="css/default.css" rel="stylesheet">
 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script>
  function dragStart(ev) {
   ev.dataTransfer.effectAllowed='move';
   ev.dataTransfer.setData("Text", ev.target.getAttribute('id'));
   ev.dataTransfer.setDragImage(ev.target,100,100);
   return true;
}
function dragEnter(ev) {
   event.preventDefault();
   return true;
}
function dragOver(ev) {
     event.preventDefault();
}
function dragDrop(ev) {
   var data = ev.dataTransfer.getData("Text");
   ev.target.appendChild(document.getElementById(data));
   ev.stopPropagation();
   return false;
}


function ExibirTexto(texto) {
            document.getElementById('divStatus').innerHTML += texto;
        //Alert("teste");
        }



</script>
  </head>

  <body>
    
    <script>
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
          downloadUrl('http://localhost/GoogleMapsTeste/GoogleMaps/SqlToXml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
                 
                  
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
          
          });
           
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
      
  
    google.maps.event.addDomListener(window, 'load', initMap);

      function doNothing() {}
      
    $(document).ready(function(){
    //$("#hide").click(function(){
        //$("p").hide();
    //});
    $("#boxB").click(function(){
        $("footer").show();
    });
});
     
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA72NcoZXPMcYPisPwtck2Mwr_ocPMB8ZY&callback=initMap">
    </script>
<!--
    <DIV id="header"> <div id="tableNeighbours" > <?php echo  $g; ?>Km</div><br> </DIV>
-->
   <DIV id="main">    <div id="map" ></div></DIV>
    <DIV id="sidebar"> <h1>Rotas</h1>


     <?php
     
    $query = "SELECT * FROM rotas ";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

$nomeRota="";
echo"<ul>";
while ($linha = @mysqli_fetch_assoc($result)){
 $nomeRota=$linha['nome_rota'];
 
 echo"<li class=\"Rotas\" onclick=\"ExibirTexto('".$linha['nome_rota']."')\">".$linha['nome_rota']."</li>"; 
 
  
}
 echo"</ul>";
    ?>
    
     </DIV>
   
    <DIV id="rightbar"> <h1>Não Atribuido</h1>
    
      <section id="section"  ondragenter="return dragEnter(event)" 
     ondrop="return dragDrop(event)" 
     ondragover="return dragOver(event)">
    <ul>
     <li class="drag" id="boxB" draggable="true" ondragstart="return dragStart(event)" >OS</li>
     <li class="drag" id="boxA" draggable="true" ondragstart="return dragStart(event)" >OS</li>
      </ul>
   
     </DIV>
     <DIV id="footer"> <h1 id="divStatus" >Rota</h1>
   

       <div id="big" ondragenter="return dragEnter(event)"
     ondrop="return dragDrop(event)" 
     ondragover="return dragOver(event)"></div>


     </DIV>
<!--
     <div id="info-panel" style="float:right;text-align:left;">
       <div style="margin:10px;border-width:2px;float:center;text-align:center;">
          <h3>Eu e meu pacote Mapa de rota interativo</h3>
          <b>Rota Total: </b>
          <div id="tableNeighbours" > Km</div><br>
          </div>
       </div>
-->
        
  </body>
</html>

	
	
