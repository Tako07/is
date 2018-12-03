function terminos(){
	window.open("terminos_condiciones_Chicos_que_Lloran.pdf","_blank");		
}
/**
*@description Funcion para cambiar el tipo de input para la fecha de nacimiento
*/
function cambiaFecha(){
	fecha=document.getElementById('fecha').type="date";
}
/**
*@description Bandera para el primer cuadro de contraseña
*/
var pass1=0;
/**
*@description Bandera para el segundo cuando de contraseña
*/
var pass2=0;
/**
*@description Funcion que cambiara el tipo de input de pass a text y viceversa dependiendo del valor mandado
*/
function mostrarpass(i){
	if(i==0){
		if (pass1==0) {
			/*Si esta en tipo pass se cambia a text y la bandera cambia*/
			document.getElementById('contraseña').type="text";
			pass1=1;
		}else{
			/*Si esta en tipo text se cambia a pass y la bandera cambia*/
			document.getElementById('contraseña').type="password";
			pass1=0;
		}
	}else{
		if (pass2==0) {
			/*Si esta en tipo pass se cambia a text y la bandera cambia*/
			document.getElementById('contraseña1').type="text";
			pass2=1;
		}else{
			/*Si esta en tipo text se cambia a pass y la bandera cambia*/
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
function abreNegocio(){
	window.open("index.php","_self");
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
/**
* @description Funcion para validar el registro de usuario
*/
function validarUser(){
	/**
	* @description Guarda la informacion ingresada en el input de correo
	*/
	var correo=document.getElementById('correo').value;
	/**
	* @description Verifica que exista el @ dentro de la cadena de correo
	*/
	var arroba= correo.search("@");
	if(correo==""||arroba==-1){
		/*Muesta un mensaje con el error*/
		alert("Ingrese un correo electrónico válido");
	}else{
		/**
		* @description Guarda la informacion del input de nombre
		*/
		var nombre=document.getElementById('nombre').value;
		/*Verifica que el campo no este vacio */
		if(nombre==""){
			/*Muesta un mensaje con el error*/
			alert("Complete el campo con su nombre");
		}else{
			/**
			* @description Guarda la informacion del input de apellido
			*/
			var apellido=document.getElementById('apell').value;
			/*Verifica que el campo no este vacio*/
			if (apellido==""){
				/*Muesta un mensaje con el error*/
				alert("Complete el campo con su apellido");
			}else{
				/**
				* @description Obtiene la fecha ingresada en el formulario
				*/
				var fecha=document.getElementById('fecha').value;
				/**
				* @description Se crea una variable con la fecha actual
				*/
				var hoy= new Date();
				/**
				* @description De la fecha actual se obtiene el día
				*/
				var dd= hoy.getDate();
				/**
				* @description De la fecha actual se obtiene el mes ya que inicia desde 0 se le suma uno
				*/
				var mm= hoy.getMonth()+1;
				/**
				* @description De la fecha actual se obtiene el años
				*/
				var yy= hoy.getFullYear();
				/*Si el día es menor a 2 digitos se le concatena un 0 al inicio*/
				if(dd<10){
					dd='0'+dd;
				}
				/*Si el emes es menor a 2 digitos se le concatena un 0 al inicio*/
				if(mm<10){
					mm='0'+mm;
				}
				/*Se concatena todo el formato de la fecha en una variable*/
				hoy=yy+'-'+mm+'-'+dd;
				/*Se comparan les fechas para que no coincidan y verifica que el campo no este vacio*/
				if (fecha==hoy || fecha=="") {
					/*Muesta un mensaje con el error*/
					alert("Ingrese una fecha válida");
				}else{
					/**
					* @description Obtiene la contraseña ingresada en el primer campo de contraseña
					*/
					var contra=document.getElementById('contraseña').value;
					/**
					* @description Obtiene la contraseña ingresada en el segundo campo de contraseña
					*/
					var contra1=document.getElementById('contraseña1').value;
					/*Compara que las contraseñas sean iguales*/
					if (contra!=contra1) {
						/*Muesta un mensaje con el error*/
						alert("Las contraseñas no coinciden");
					}else{
						/**
						* @description Obtiene el estado que se encuentra el checkbox de terminos y condiciones
						*/
						var check=document.getElementById('terminos').checked;
						/*Verifica que haya sido marcado el checkbox*/
						if(check){
							/*Se manda el formulario al siguiente paso*/
							document.getElementById("Formulario").submit();
						}else{
							/*Muesta un mensaje con el error*/
							alert("Acepta nuestros terminos");
							document.getElementById("cajaT").id="terminosno";
						}
					}
				}
			}
		}
	}
}
