<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
<!--[if lte IE 8]>
 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.ie.css" />
<![endif]-->
<script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>

<div id="map" style="width: 600px; height: 600px;"></div>

<script>

var mymap = L.map('mapid').setView([10.775375, 106.705737], 14);
    var marker = L.marker([10.775375, 106.705737]).addTo(mymap);
    marker.bindPopup("<b>HCMCT</b>").openPopup();
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 18,
          attributionControl: false,
          prefix: '',
        }).addTo(mymap);
function onMapClick(e) {
  marker = new L.marker(e.latlng, {draggable:'true'});
  marker.on('dragend', function(event){
    var marker = event.target;
    var position = marker.getLatLng();
    marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
    map.panTo(new L.LatLng(position.lat, position.lng))
  });
  map.addLayer(marker);
};

map.on('click', onMapClick);

</script><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
<!--[if lte IE 8]>
 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.ie.css" />
<![endif]-->
<script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>

</head>
<body>

<div id="map" style="width: 600px; height: 600px;"></div>

<script>

var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  
  maxZoom: 18
}).addTo(map);

function onMapClick(e) {
  marker = new L.marker(e.latlng, {draggable:'true'});
  marker.on('dragend', function(event){
    var marker = event.target;
    var position = marker.getLatLng();
    marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
    map.panTo(new L.LatLng(position.lat, position.lng))
  });
  map.addLayer(marker);
};

map.on('click', onMapClick);

</script>
</body>
</html>
