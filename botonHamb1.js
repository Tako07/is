/**
*@description Bandera para saber el estado del banner
*/
var cont=0;
/**
*@description Funcion para mostrar el banner
*/
function cambiarid (ban){
	alert('si entra');
	if (ban==1) {
		if (cont==0) {				/*Si esta oculta*/
			document.getElementsByTagName('figure')[3].id="ocultar";
			document.getElementsByTagName('img')[4].id="ocultar";
			var h = document.getElementById('banner');
			var i = document.getElementById('ocultar');
			h.id="banner1";
			i.id="mostrar";
			cont=1;
		}else{						/*Sino esta oculta*/
			document.getElementsByTagName('figure')[3].id="";
			var g = document.getElementsByTagName('img')[4];
			var h = document.getElementById('banner1');
			var i = document.getElementById('mostrar');
			g.id="publicidad2";
			h.id="banner";
			i.id="ocultar"
			cont=0;
		}
	}else{
		if (ban==2) {
			if (cont==0) {				/*Si esta oculta*/
				document.getElementsByTagName('figure')[2].id="ocultar";
				document.getElementsByTagName('img')[3].id="ocultar";
				var h = document.getElementById('banner');
				var i = document.getElementById('ocultar');
				h.id="banner1";
				i.id="mostrar";
				cont=1;
			}else{						/*Sino esta oculta*/
				document.getElementsByTagName('figure')[2].id="";
				var g = document.getElementsByTagName('img')[3];
				var h = document.getElementById('banner1');
				var i = document.getElementById('mostrar');
				g.id="publicidad2";
				h.id="banner";
				i.id="ocultar"
				cont=0;
			}
		}
	}
}
"use strict"
/**
*@description Funcion que llamara a la funcion
*/


/**
*@description Cuando se cargue la pagina, cargara la funcion "funciones()"
*/
function servicio(url){
	window.open("servicio.php?Negocio="+url,"_self");
}

window.onload=funciones;
