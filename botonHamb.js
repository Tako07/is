/**
*@description Bandera para saber el estado del banner
*/
var cont=0;
/**
*@description Funcion para mostrar el banner
*/
function cambiarid (){
	if (cont==0) {				/*Si esta oculta*/
		var banner=document.getElementById('banner1');
		var dentro=document.getElementById('publicidad1');
		var fuera=document.getElementById('publicidad2');
		banner.style.visibility = 'visible';
		banner.style.position = 'static';
		dentro.style.visibility = 'visible';
		fuera.style.visibility = 'hidden';
		cont=1;
	}else{						/*Sino esta oculta*/
		var banner=document.getElementById('banner1');
		var dentro=document.getElementById('publicidad1');
		var fuera=document.getElementById('publicidad2');
		banner.style.visibility = 'hidden';
		banner.style.position = 'absolute';
		dentro.style.visibility = 'hidden';
		fuera.style.visibility = 'visible';
		cont=0;
	}
}
