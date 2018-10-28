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
function validaFormulario() {
	//declaración de variables
	var pass1=document.getElementById('contrasena').value;
	var pass2=document.getElementById('contrasena1').value;
	var nombNegocio = document.getElementById('NombNegocio').value;
	var nombre=document.getElementById('nombre').value;
	var apellido=document.getElementById('apell').value;
	var correo =document.getElementById('correo').value;
	var terminos= document.getElementById('terminos').checked;

	//verificar si el nombre del negocio no está vacío
	if (nombNegocio =="" ||nombNegocio.length==0|| /^\s+$/.test(nombNegocio)) {
		alert('Nombre de negocio vacío');
		return false;
	}
	//verifica si el nombre del cliente está vacío
	if (nombre == null ||nombre.length==0|| /^\s+$/.test(nombre)) {
		alert('Nombre vacío');
		return false;
	}
	//verifica que el nombre del cliente no tenga caractres especiales
	if(!/[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/.test(nombre)){
		alert('Nombre no valido, no se pueden utilizar caracteres especiales');

	//}
	//verifica que el apellido del cliente no esté vacío
	if (apellido ==null ||apellido.length==0|| /^\s+$/.test(apellido)) {
		alert('Apellido vacío');
		return false;
	}
	if(!/[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/.test(apellido)){
		alert('El apellido no puede tener caracteres especiales');
		return false;
	}
	//verifica que se haya ingresado un correo electrónico
	if(!(/\S+@\S+\.\S+/.test(correo))){
			alert('Debe escribir un correo válido');
			return false;
	}
//verifica que ambas contraseñas sean iguales
	if(pass1.localeCompare(pass2)!=0){
		alert("Las contraseñas no coinciden");
		return false;
	}
	//verifica que el checkbox esté marcado
	if(!terminos){
		alert("Debes aceptar los terminos y condiciones");
		return false;
	}
	return true;
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
							document.getElementById("cajaT").id="terminosno";
						}	
					}
				}
			}
		}
	}
}
}