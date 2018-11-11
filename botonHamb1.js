/**
*@description Bandera para saber el estado del banner
*/
var cont=0;
/**
*@description Funcion para mostrar el banner
*/
function cambiarid (ban){
	if (ban==1) { /*Sesion iniciada como Negocio*/
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
	}else{	
		if(ban==2) {/*Sesion de invitado*/
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
		}else{
			if(ban==3) {/*Sesion iniciada como usuario normal*/
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
}
"use strict"

function usuario(url,IDU){
	document.body.innerHTML += '<form id="linkserv" action="'+url+'" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'"></form>';
	document.getElementById("linkserv").submit();
}
function seguir(band,IDU,IDN){
	document.body.innerHTML += '<form id="linkserv" action="seguircalif.php" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'">'+
	'<input type="hidden" name="Negocio" value="'+IDN+'">'+
	'<input type="hidden" name="accion" value="'+band+'"></form>';
	document.getElementById("linkserv").submit();
}
function favoritos(calif,IDU,IDN){
	document.body.innerHTML += '<form id="linkserv" action="seguircalif.php" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'">'+
	'<input type="hidden" name="Negocio" value="'+IDN+'">'+
	'<input type="hidden" name="calificacion" value="'+calif+'"></form>';
	document.getElementById("linkserv").submit();
}