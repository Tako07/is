<?php
$qryMark='select nombre_negocio,latitud,longitud from vista_negocio';
$resultMark=mysqli_query($conexion,$qryMark);
echo'
<script>
var divMapa;
/**
*@description Inicializa el mapa
*/
function initMap(){
	divMapa = document.getElementById("mapa");//div donde se va a colocar el mapa
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
 var latitud;
 var longitud;
 var centro;

 var lugares;


function fn_si(ruta){
	 latitud =ruta.coords.latitude;
	 longitud = ruta.coords.longitude;
	 centro ={lat: latitud,lng:longitud};
	 lugares=[{lat:latitud,lng:longitud,nomb:"Este eres tú"}';
	 while ($rowMark=mysqli_fetch_assoc($resultMark)) {
			 echo '
			 ,{lat:'.$rowMark["latitud"].' ,lng: '.$rowMark["longitud"].',nomb:"'.$rowMark["nombre_negocio"].'"}';
	 }

	 echo '];




	var objConfig={
		zoom : 15,
		center: centro
	};
	var gMapa = new google.maps.Map(divMapa,objConfig);

	for(i=0;i<lugares.length;i++){
		if(Math.abs(lugares[i].lat)-Math.abs(latitud)<0.5&&Math.abs(lugares[i].lng)-Math.abs(longitud)<0.5){
		var marker=new google.maps.Marker({
			position:new google.maps.LatLng(lugares[i].lat, lugares[i].lng ),
			map: gMapa,
			title:lugares[i].nomb

		});
		var cont="<div>"+lugares[i].nomb+"</div>";
		var win = new google.maps.InfoWindow({
			content:cont
		});

			win.open(gMapa,marker)

	}
	}

}

</script>';
?>
