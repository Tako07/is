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
