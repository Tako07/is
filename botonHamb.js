/**
*@description Bandera para saber el estado del banner
*/
var cont=0;
/**
*@description Funcion para mostrar el banner
*/
function cambiarid (){
	if (cont==0) {				/*Si esta oculta*/
		var zona=document.getElementById('seccion-banner');
		var banner=document.getElementById('banner1');
		var dentro=document.getElementById('publicidad1');
		var fuera=document.getElementById('publicidad2');
		banner.style.visibility = 'visible';
		banner.style.position = 'static';
		dentro.style.visibility = 'visible';
		fuera.style.visibility = 'hidden';
		fuera.style.position='absolute';
		zona.style.backgroundColor= '#A4A4A4';
		cont=1;
	}else{						/*Sino esta oculta*/
		var zona=document.getElementById('seccion-banner');
		var banner=document.getElementById('banner1');
		var dentro=document.getElementById('publicidad1');
		var fuera=document.getElementById('publicidad2');
		banner.style.visibility = 'hidden';
		banner.style.position = 'absolute';
		dentro.style.visibility = 'hidden';
		fuera.style.visibility = 'visible';
		fuera.style.position= 'static';
		zona.style.backgroundColor= 'transparent';
		cont=0;
	}
}

function salir(){
	window.open("salir.php","_self");
}

function anuncia(){
	window.open("promociones.php","_self");
}