function geopUrl (key, layer, format)
{  return "http://wxs.ign.fr/"+ key + "/wmts?LAYER=" + layer
      +"&EXCEPTIONS=text/xml&FORMAT="+(format?format:"image/jpeg")
      +"&SERVICE=WMTS&VERSION=1.0.0&REQUEST=GetTile&STYLE=normal"
      +"&TILEMATRIXSET=PM&TILEMATRIX={z}&TILECOL={x}&TILEROW={y}" ;
}
var APIkey= "6h7gnc76fmw25k5kug8cz9gg";
var map = L.map('map').setView([48.85,2.35], 10);

navigator.geolocation.getCurrentPosition(function (position) {
	latitude=position.coords.latitude; longitude=position.coords.longitude;
	map.setView([latitude, longitude]);
});

L.tileLayer ( geopUrl(APIkey,"GEOGRAPHICALGRIDSYSTEMS.MAPS.SCAN-EXPRESS.CLASSIQUE"), 
  {   attribution:'&copy; <a href="http://www.ign.fr/">IGN-France</a>', 
      maxZoom:14,
	  opacity:0.35
  } ).addTo(map);
	
var r = new XMLHttpRequest();
r.open("POST", "server.php", true);
r.onreadystatechange = function () {
  if (r.readyState != 4 || r.status != 200) return;
  var data = JSON.parse(r.responseText);
  console.log(data.donnees);
  addMarkers(data.donnees);
  addBatiments(data.donnees_projet);
};
r.send(null);

function addMarkers (markers) {
	
	var myIcon = L.icon({
    iconUrl: 'image/badge_pers_plein.png',
    iconRetinaUrl: 'image/badge_pers_plein.png',
    iconSize: [40,47],
    iconAnchor: [20,47],
    popupAnchor: [0, -50]
	});
	for (var nom in markers) {
		L.marker([markers[nom].lat[0], markers[nom].lon[0]],{icon: myIcon}).addTo(map).bindPopup(nom);
	}
}
function addBatiments (markers) {
	var myIcon = L.icon({
    iconUrl: 'image/badge_projet_plein.png',
    iconRetinaUrl: 'image/badge_projet_plein.png',
    iconSize: [40,47],
    iconAnchor: [20,47],
    popupAnchor: [0, -50]
});

	for (var nom in markers) {
		L.marker([markers[nom].lat[0], markers[nom].lon[0]], {icon: myIcon}).addTo(map).bindPopup(nom);
	}
}