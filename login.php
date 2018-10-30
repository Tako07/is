<?php 
	/*!&lt; El php validara que sea haya mandado el formulario antes para hacer el login, de no ser asi se mostrara el formulario*/
	if(isset($_POST['usuario'])){
		session_start();
		/**!&lt; Varaible donde se guarda el nombre de usuario ingresado o el correo*/
		$usuario=$_POST['usuario'];
		/*!&lt; Variable donde se guardara la contraseña ingresada*/
		$contraseña=$_POST['contraseña'];
		/*!&lt; Realiza la conexion a la base de datos. El espacio en blanco es para agregar la contraseña de necesitar una*/
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error()); 
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		/*!&lt; Crea la consulta para saber si el usuario existe y/o el correo y la contraseña es correca*/
		$q="SELECT id_usuario FROM usuario WHERE username='".$usuario."' AND password=MD5('".$contraseña."') OR correo='".$usuario."' AND password=MD5('".$contraseña."');";
		/*!&lt; Manda la consulta y se obtiene el resultado en la variable $result*/
		$result=mysqli_query ($con,$q);
		/*!&lt; Si el numero de filas obtenido es 0 Significa que el usuario ingresado o correo no existen o la contraseña es incorrecta*/
		if(mysqli_num_rows($result)==0){
			/*!&lt; Regresa al usuario al formulario*/
			echo '<script>alert("Usuario o contraseña incorrectos");
			history.back();</script>';
		}else{
			/*!&lt; Guarda todo el resultado de la consulta en $fila*/
			$fila=mysqli_fetch_row($result);
			/*!&lt; Crea una consulta para saber si es un negocio o no*/
			$q1="SELECT * FROM negocio WHERE id_usuario=".$fila[0].";";
			/*!&lt; Se manda la consulta*/
			$result2=mysqli_query ($con,$q1);
			/*!&lt; Si el numero de filas es 0 el usuario que inicio sesion es un cliente normal y se mandara a su pagina*/
			if(mysqli_num_rows($result2)==0){
				echo '<form action="perfilNormal.php" id="formulario" method="POST"><input name="idUsuario" value="'.$fila[0].'"></form>';
				echo '<script>
						function funciones(){
							document.getElementById("formulario").submit();
						}
						window.onload=funciones;
				</script>';
			}else{
				/*!&lt; De no ser 0 se mandara por el formulario el ID de usuario y el ID de negocio y se mandara a la pagina de su negocio*/
				$fila2=mysqli_fetch_row($result2);
				echo '<form action="servicio.php" id="formulario" method="POST">
				<input name="idUsuario" value="'.$fila[0].'">
				<input name="idNegocio" value="'.$fila2[1].'"></form>';
				echo '<script>
						function funciones(){
							document.getElementById("formulario").submit();
						}
						window.onload=funciones;
				</script>';
			}
		}
		/*!&lt; Si no se a mandado el formulario se crea el HTML*/
	}else{
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<link rel="stylesheet" href="estiloslogin.css">
		<script src="loginregistro.js"></script>
	</head>
	<body>
		<div id="app">
			<header id="cabecera">
					<figure class="home">
							<a href="index.php"><img id="home" src="iconos/ic_home_v3.png"></a>
					</figure>
					<h1 id="texto">Services In</h1>
			</header>
			<section id="seccion">
				<figure class="icono">
					<img id="icono" src="iconos/ic_profile_v3.png">
				</figure>
				<form action="" name="miformulario" id="miformulario" method="post" class="formulario">
					<input class="correo" type="text" name="usuario" placeholder="Correo electrónico o nombre de usuario" required>
					<div class="posicion">
						<input id="contraseña" class="pass" type="password" name="contraseña" value="" placeholder="Contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(0);">
						</figure>
					</div>
					<div class="botones">
						<input type="submit" name="enviar" class="formButton" value="Iniciar Sesión">
						<input type="reset"  name="Cancelar" class="formButton" value="Registrarse" onclick="regcliente();">
					</div>
				</form>
			</section>
		</div>
	</body>
</html>	

<?php 
/*!&lt; Fin del HTMLs*/
} ?>