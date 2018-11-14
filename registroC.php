<?php 
	/**
 	*@Brief Despues del registro
 	*La misma pantalla recibe la informacion para realizar el registro y la gestiona 
 	sino la recibe muestra el formulario para registrarse
 	**/
	if(isset($_POST['user'])){
		session_start();
		/**
	 	*@Brief Guarda todos los campos
	 	*Guarda los campos del formulario cada uno en su propia variable
	 	**/
		$usuario=$_POST['user'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$contraseña=$_POST['contraseña'];
		$fecha=$_POST['fecha'];
		$correo=$_POST['correo'];
		/**
	 	*@Brief Realiza la conexion
	 	*Se conecta con la base de datos
	 	**/
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
		/**
	 	*@Brief Realiza la conexion
	 	* Si no se puede conectar con la base de datos mostrara un mensaje de error
	 	**/
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		/**
	 	*@Brief Coloca la funcion para que pueda leer acentos
	 	*
	 	**/
		$con->set_charset("utf8");
		/**
	 	*@Brief Info usuario
	 	*Verifica que el nombre del usuario o el correo hayan sido utilizados para otro registro de ser asi mostrara un mensaje y regresara al formulario
	 	**/
		$q="SELECT * FROM usuario WHERE username='".$usuario."';";
		$result=mysqli_query ($con,$q);
		$q="SELECT * FROM usuario WHERE correo='".$correo."';";
		$result1=mysqli_query ($con,$q);
		if(mysqli_num_rows($result)>0){
			echo '<script>alert("Nombre de usuario existente, pruebe con otro");
			history.back();</script>';
		}else{
			if(mysqli_num_rows($result1)>0){
				echo '<script>alert("Correo ya registrado, pruebe con otro");
				history.back();</script>';
			}else{
					$sql="INSERT INTO usuario (username,nombre,apellido,fecha_nacimiento,correo,password) VALUES ('".$usuario."','".$nombre."','".$apellido."','".$fecha."','".$correo."',MD5('".$contraseña."'));";
					if($con->query($sql)===TRUE){
						echo '<script>alert("SE Registro");</script>';
						$q="SELECT id_usuario FROM usuario WHERE username='".$usuario."'";
						$result3=mysqli_query ($con,$q);
						$fila=mysqli_fetch_row($result3);
						echo '<form action="perfilNormal.php" id="formulario" method="POST"><input name="idUsuario" value="'.$fila[0].'"></form>';
						echo '<script>
								function funciones(){
									document.getElementById("formulario").submit();
								}
								window.onload=funciones;
						</script>';
					}else{
						echo '<script>alert("No se registro")</script>';
					}
				}
			}
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
					<figure class="home" onclick="home();">
						<img id="home" src="iconos/ic_home_v3.png">
					</figure>
					<h1 id="texto">Services In</h1>
					<button id="botonesN" onclick="login();">Iniciar Sesión</button>
			</header>
			<section id="seccionc">
				<h1>Registro de cliente</h1>
				<figure class="icono">
					<img id="icono" src="iconos/ic_profile_v3.png">
				</figure>
				<form action="" method="POST" id="Formulario">
					<input class="formato" type="text" name="user" placeholder="Nombre de usuario" required>	
					<div id="nomApe">
	  					<input id= "nombre" pattern="([a-z]|[A-Z]|\s)*" class="formato" type="text" name="nombre" placeholder="Nombre" required>
	  					<input id="apell" pattern="([a-z]|[A-Z]|\s)*"  class="formato" type="text" name="apellido" placeholder="Apellido" required>
          			</div>
					<input id="fecha" class="formato" type="text" name="fecha" placeholder="Fecha de Nacimiento" required onfocus="cambiaFecha();">
					<input class="formato" id="correo" type="email" name="correo" placeholder="Correo electrónico" required>
					<div class="posicion">
						<input id="contraseña" minlength="6" class="formatopass" type="password" name="contraseña" value="" placeholder="Contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(0);">
						</figure>
					</div>
					<div class="posicion">
						<input id="contraseña1" minlength="6" class="formatopass" type="password" name="contraseña1" value="" placeholder="Confime su contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(1);">
						</figure>
					</div>
					<div id="cajaT">
						<input type="checkbox" name="terminos" id="terminos" value="Acepto" required> Aceptas nuestros <a href="https://www.trivago.es/terminos-y-condiciones">terminos y condiciones.</a>
					</div>
					<div class="botones1">
						<input type="button" name="enviar" class="formButton1" value="Registrarse" onclick="validarUser();">
						<input type="reset"  name="Cancelar" class="formButton1" value="Quiero ser un negocio" onclick="regnegocio();">
					</div>
				</form>

			</section>
		</div>
	</body>
</html>	
<?php } ?>