/**
*@description Bandera para saber el estado del banner
*/
var cont=0;
/**
*@description Funcion para mostrar el banner
*/
function cambiarid (acc){
	if (cont==0) {				/*Si esta oculta*/
		var g = document.getElementsByTagName('figure')[3];
		var f = document.getElementById("banner");
		var e = document.getElementById("ocultar");
		g.id="ocultar"			/*OCULTA LA PUBLICIDAD*/
		f.id="banner1";			//ANIMACION PARA ABRIR
		e.id="mostrar";			//MUESTRA EL banner
		cont=1;
	}else{						/*Sino esta oculta*/
		var g = document.getElementsByTagName('figure')[3];
		var f = document.getElementById("banner1");
		var e = document.getElementById("mostrar");
		f.id="banner";				/*ANIMACION DE OCULTAR*/
		e.id="ocultar";				/*OCULTA EL BANNER*/
		g.id="publicidad1"			/*MUESTRA LA PUBLICIDAD*/
		cont=0;
	}
}

"use strict"
/**
*@description Funcion que llamara a la funcion
*/
function funciones(){
		document.getElementsByTagName('button')[0].onclick=cambiarid;
	}

/**
*@description Cuando se cargue la pagina, cargara la funcion "funciones()"
*/
window.onload=funciones;