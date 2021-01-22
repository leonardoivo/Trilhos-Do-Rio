var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];
var path=[];
function initialize() {
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	
    var options = {
        zoom: 5,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);  //map é o objeto do mapa que será exibido no html
}
 
initialize();

function abrirInfoBox(id, marker) {
    if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
        infoBox[idInfoBoxAberto].close();
    }
 
    infoBox[id].open(map, marker);
    idInfoBoxAberto = id;
}

function carregarPontos() {
 
    $.getJSON('js/pontos.json', function(pontos) { //Aqui é passado o arquivo json com as coordenadas.
 
         var latlngbounds = new google.maps.LatLngBounds();
        $.each(pontos, function(index, ponto) {
 
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude), //Aqui ele lê do arquivo Json
                title: "Meu ponto personalizado! :-D",
                map: map, //aqui é feito a associação do objeto map com as coordenadas criadas.
                icon: 'img/marcador.png'
            });
              path.push(new google.maps.LatLng(ponto.Latitude, ponto.Longitude));
                 var myOptions = {
                 content: "<p>" + ponto.Descricao +"</p>",
                 pixelOffset: new google.maps.Size(-150, 0)
                 };
 
                 infoBox[ponto.Id] = new InfoBox(myOptions);
                 infoBox[ponto.Id].marker = marker;
 
                 infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
                 abrirInfoBox(ponto.Id, marker);
                 });
                   markers.push(marker);
                   latlngbounds.extend(marker.position);

        });
         var polyline = new google.maps.Polyline({
            map: map,
            path: path,
            strokeColor: '#0000FF',
            strokeOpacity: 0.7,
            strokeWeight: 1
          });
       
        
                var markerCluster = new MarkerClusterer(map, markers);
                map.fitBounds(latlngbounds);

    });
 
}
 
carregarPontos();
