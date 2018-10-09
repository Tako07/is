var divMapa;
function initMap(){
	divMapa = document.getElementById('mapa');
	navigator.geolocation.getCurrentPosition(fn_si,fn_no);
}
function fn_no(){
	var objConfig={
		zoom : 17,
		center: new google.maps.LatLng(0, 0 )
	}
	var gMapa = new google.maps.Map(divMapa,objConfig);

 }
function fn_si(ruta){
	var latitud =ruta.coords.latitude;
	var longitud = ruta.coords.longitude;
	var LatiLong={
		lat:latitud,
		lng:longitud
	}

	var objConfig={
		zoom : 17,
		center: new google.maps.LatLng(latitud, longitud )
	};
	var gMapa = new google.maps.Map(divMapa,objConfig);
	/*var posicion = new google.maps.Marker({
		position = LatiLong,
		map:gMapa,
		title :'Posicion'
	});*/

}

