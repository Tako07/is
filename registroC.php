<?php 
	if(isset($_POST['usuario'])){
		session_start();
		$usuario=$_POST['user'];
		$nombre=$POST['nombre'];
		$apellido=$POST['apellido'];
		$contraseña=$_POST['contraseña'];
		$fecha=$_POST['fecha'];
		$correo=$_POST['correo'];
		$pass1=$_POST['contraseña'];
		$pass2=$_POST['contraseña1'];
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		$q="SELECT id_usuario FROM usuario WHERE username='".$usuario."' AND password=MD5('".$contraseña."') OR correo='".$usuario."' AND password=MD5('".$contraseña."');";
		$result=mysqli_query ($con,$q);
		if(mysqli_num_rows($result)==0){
			echo '<script>alert("Usuario o contraseña incorrectos");
			history.back();</script>';
		}else{
			$fila=mysqli_fetch_row($result);
			$q="SELECT * FROM negocio WHERE id_usuario=".$fila[0].";";
			$result2=mysqli_query ($con,$q);
			if(mysqli_num_rows($result2)==0){
				echo '<form action="perfilNormal.php" id="formulario" method="POST"><input name="idUsuario" value="'.$fila[0].'"></form>';
				echo '<script>
						function funciones(){
							document.getElementById("formulario").submit();
						}
						window.onload=funciones;
				</script>';
			}else{
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
	  					<input id= "nombre" class="formato" type="text" name="nombre" placeholder="Nombre" required>
	  					<input id="apell" class="formato" type="text" name="apellido" placeholder="Apellido" required>
          			</div>
					<input id="fecha" class="formato" type="text" name="fecha" placeholder="Fecha de Nacimiento" required onclick="cambiaFecha();">
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
					<input type="checkbox" name="terminos" id="terminos" value="Acepto" required> Aceptas nuestros <a href="https://www.trivago.es/terminos-y-condiciones">terminos y condiciones.</a>
					<div class="botones1">
						<input type="submit" name="enviar" class="formButton1" value="Registrarse" onclick="validarUser();">
						<input type="reset"  name="Cancelar" class="formButton1" value="Quiero ser un negocio" onclick="regnegocio();">
					</div>
				</form>

			</section>
		</div>
	</body>
</html>	
<?php } ?>