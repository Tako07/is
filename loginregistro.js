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
/**
* @description funcion para redireccionar a página home
*/
function home(){
	window.open("index.php","_self");
}
/**
* @description funcion para redireccionar al login
*/
function login(){
	window.open("login.php","_self");
}
/**
* @description funcion para redireccionar a segunda página del registro de negocio
*/
function regnegocio(){
	window.open("registroN.php","_self");
}
/**
* @description funcion para redireccionar a registro del cliente
*/
function regcliente(){
	window.open("registroC.php","_self");
}
/**
* @description funcion para redireccionar a finRegistro
*/
function finRegistro(){
	window.open("FinRegistro.php","_self");
}

/**
* @description funcion para validar el formulario de la segunda pantalla del registro de negocio
* @returns {boolean} Verdadero o falso para proceder o no con el registro en la base de datos
*/
function validaFormulario() {
	//declaración de variables
	/**
	*@description variable que contiene la primera contraseña
	*@type {String}
	*/
	var pass1=document.getElementById('contrasena').value;
	/**
	*@description variable que contiene la segunda contraseña
	*@type {String}
	*/
	var pass2=document.getElementById('contrasena1').value;
	/**
	*@description variable con el nombre del usuario del negocio
	*@type {String}
	*/
	var nombNegocio = document.getElementById('NombNegocio').value;
	/**
	*@description variable con el nombre real del usuario
	*@type {String}
	*/
	var nombre=document.getElementById('nombre').value;
	/**
	*@description variable con el apellido del usuario
	*@type {String}
	*/
	var apellido=document.getElementById('apell').value;
	/**
	*@description variable con el correo del usuario
	*@type {String}
	*/
	var correo =document.getElementById('correo').value;
	/**
	*@description variable que tiene el estado del checkbox
	*@type {String}
	*/
	var terminos= document.getElementById('terminos').checked;

	/**
	*@description verificar si el nombre del negocio no está vacío
	*/
	if (nombNegocio =="" ||nombNegocio.length==0|| /^\s+$/.test(nombNegocio)) {
		alert('Nombre de usuario negocio vacío');
		return false;
	}
	/**
	*@description verifica si el nombre del cliente está vacío
	*/
	if (nombre == null ||nombre.length==0|| /^\s+$/.test(nombre)) {
		alert('Nombre vacío');
		return false;
	}
	/**
	*@description verifica que el nombre del cliente no tenga caractres especiales
	*/
	if(!/[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/.test(nombre)){
		alert('Nombre no valido, no se pueden utilizar caracteres especiales');
		return false;
	}
	/**
	*@description verifica que el apellido del cliente no esté vacío
	*/
	if (apellido ==null ||apellido.length==0|| /^\s+$/.test(apellido)) {
		alert('Apellido vacío');
		return false;
	}
	/**
	*@description verifica que el apellido del cliente no tenga caracteres especiales
	*/
	if(!/[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]+/.test(apellido)){
		alert('El apellido no puede tener caracteres especiales');
		return false;
	}
	/**
	*@description verifica que se haya ingresado un correo electrónico
	*/
	if(!(/\S+@\S+\.\S+/.test(correo))){
			alert('Debe escribir un correo válido');
			return false;
	}
	/**
	*@description verifica que ambas contraseñas sean iguales
	*/
	if(pass1.localeCompare(pass2)!=0){
		alert("Las contraseñas no coinciden");
		return false;
	}
	/**
	*@description verifica que el checkbox esté marcado
	*/
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
