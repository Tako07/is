/**
*@description manda el formulario para guardar la imagen
*/
function guardaImg(){
	document.getElementById("subirimg").submit();
}
/**
*@description crea un formulario invisible y lo manda a la pagina definida
*/
function usuario(url,IDU){
	document.body.innerHTML += '<form id="linkserv" action="'+url+'" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'"></form>';
	document.getElementById("linkserv").submit();
}
/**
*@description Crea un formulario invisible y lo manda a seguircalif para seguir al negocio
*/
function seguir(band,IDU,IDN){
	document.body.innerHTML += '<form id="linkserv" action="seguircalif.php" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'">'+
	'<input type="hidden" name="Negocio" value="'+IDN+'">'+
	'<input type="hidden" name="accion" value="'+band+'"></form>';
	document.getElementById("linkserv").submit();
}
/**
*@description Crea un formulario invisible y lo manda a seguircalif para calificar al negocio
*/
function favoritos(calif,IDU,IDN){
	document.body.innerHTML += '<form id="linkserv" action="seguircalif.php" method="post">'+
	'<input type="hidden" name="Usuario" value="'+IDU+'">'+
	'<input type="hidden" name="Negocio" value="'+IDN+'">'+
	'<input type="hidden" name="calificacion" value="'+calif+'"></form>';
	document.getElementById("linkserv").submit();
}