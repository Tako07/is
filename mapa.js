var divMapa;

/**
*@description Inicializa el mapa
*/
function initMap(){
	divMapa = document.getElementById('mapa');//div donde se va a colocar el mapa
	navigator.geolocation.watchPosition(fn_si,fn_no);//encontrar posición actual del usuario

}
/**
*@description funcion en caso de que el usuario no de permisos de localización
*/
function fn_no(){//función si el usuario no acepta permisos de ubicación
	var objConfig={
		zoom : 17,//zoom del mapa por defecto
		center: new google.maps.LatLng(0, 0 )
	}
	var gMapa = new google.maps.Map(divMapa,objConfig);

 }
 /**
 *@description funcion en caso de que el usuario otorgue permisos de localización
 */
function fn_si(ruta){//función si acepta permisos de ubicación
	var latitud =ruta.coords.latitude; //localización de la latitud del usuario
	var longitud = ruta.coords.longitude;//localización de la longitud del usuario
	var LatiLong={//creación del objeto con la latitud y longitud del usuario
		lat:latitud,
		lng:longitud
	}


	var objConfig={//generación del mapa
		zoom : 15,//zoom del mapa por defecto
		center: new google.maps.LatLng(latitud, longitud )//centrar el mapa en la ubicación del usuario
	};
	var gMapa = new google.maps.Map(divMapa,objConfig);
	/*var posicion = new google.maps.Marker({//marcador de la ubicación del usuario
		position = LatiLong,
		map:gMapa,
		title :'Posicion'
	});*/

	var marker = new google.maps.Marker({
		position: LatiLong,
		map: gMapa,
		title: 'Hello World!'
	});
}
