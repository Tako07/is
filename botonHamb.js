var cont=0;
function cambiarid (acc){
	if (cont==0) {
		var g = document.getElementsByTagName('figure')[3];
		var f = document.getElementById("banner");
		var e = document.getElementById("ocultar");
		g.id="ocultar"			/*OCULTA LA PUBLICIDAD*/
		f.id="banner1";			//ANIMACION PARA ABRIR
		e.id="mostrar";			//MUESTRA EL banner
		cont=1;
	}else{
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
function funciones(){
		document.getElementsByTagName('button')[0].onclick=cambiarid;
	}
	window.onload=funciones;