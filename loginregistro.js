function cambiaFecha(){
	fecha=document.getElementById('fecha').type="date";
}

var pass1=0;
var pass2=0;
function mostrarpass(i){
	if(i==0){
		if (pass1==0) {
			document.getElementById('contraseña').type="text";
			pass1=1;
		}else{
			document.getElementById('contraseña').type="password";
			pass1=0;
		}
	}else{
		if (pass2==0) {
			document.getElementById('contraseña1').type="text";
			pass2=1;
		}else{
			document.getElementById('contraseña1').type="password";
			pass2=0;
		}
	}
}	

function home(){
	window.open("index.php","_self");
}
function login(){
	window.open("login.php","_self");
}
function regnegocio(){
	window.open("registroN.php","_self");
}
function regcliente(){
	window.open("registroC.php","_self");
}
function finRegistro(){
	window.open("FinRegistro.php","_self");
}
function validarUser(){
	var correo=document.getElementById('correo').value;
	var arroba= correo.search("@");
	if(correo==""||arroba==-1){
		alert("Ingrese un correo electrónico válido");
	}else{
		var nombre=document.getElementById('nombre').value;
		if(nombre==""){
			alert("Complete el campo con su nombre");
		}else{
			var apellido=document.getElementById('apell').value;
			if (apellido==""){
				alert("Complete el campo con su apellido");
			}else{
				var fecha=document.getElementById('fecha').value;
				var hoy= new Date();
				var dd= hoy.getDate();
				var mm= hoy.getMonth()+1;
				var yy= hoy.getFullYear();
				if(dd<10){
					dd='0'+dd;
				}
				if(mm<10){
					mm='0'+mm;
				}
				hoy=yy+'-'+mm+'-'+dd;
				if (fecha==hoy || fecha=="") {
					alert("Ingrese una fecha válida");
				}else{
					var contra=document.getElementById('contraseña').value;
					var contra1=document.getElementById('contraseña1').value;
					if (contra!=contra1) {
						alert("Las contraseñas no coinciden");
					}else{
						var check=document.getElementById('terminos').checked;
						if(check){
							document.getElementById("Formulario").submit();
						}else{
							alert("Acepta nuestros terminos");
					}	}
				}
			}
		}
	}
}