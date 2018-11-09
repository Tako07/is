/**
*@description Bandera para saber el estado del banner
*/
var cont=0;
/**
*@description Funcion para mostrar el banner
*/
function cambiarid (ban){
	if (ban==1) {
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
		if(ban==2) {
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
			if(ban==3) {
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

function servicio(url,IDU){
	document.body.innerHTML += '<form id="linkserv" action="servicio.php?Negocio='+url+'" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'"></form>';
	document.getElementById("linkserv").submit();
}
function seguir(band,IDU,IDN){
	if(band==1){
		document.getElementById("favo").src="iconos/ic_fav_1.png";
		document.body.innerHTML += '<?php echo $siguiendo=0;?>';
	}else{
		document.getElementById("favo").src="iconos/ic_fav_2.png";
		document.body.innerHTML += '<?php echo $siguiendo=1;?>';
	}
	/*var mysql =require('mysql');
	var con=mysql.createConnection({
		host:"localhost",
		user:"root",
		password:""
	});
	if(band==1){
		con.connect(function(err){
			if(err) throw err;
			console.log("Connected!");
			con.query('insert into favorito (id_usuario,id_negocio) values('+IDU+','+IDN+');',function(err,result){
				if (err) throw err;
				console.log("result:"+result);
			});
		});
	}else{
		con.connect(function(err){
			if(err) throw err;
			console.log("Connected!");
			con.query(' delete from favorito where id_usuario='+IDU+' AND id_negocio='+IDN+';',function(err,result){
				if (err) throw err;
				console.log("result:"+result);
			});
		});
	}*/
}