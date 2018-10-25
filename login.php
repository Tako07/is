<?php 
	if(isset($_POST['usuario'])){
		session_start();
		$usuario=$_POST['usuario'];
		$contraseña=$_POST['contraseña'];
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		$q="SELECT id_usuario FROM usuario WHERE username='".$usuario."' AND password=SHA1('".$contraseña."') OR correo='".$usuario."' AND password=SHA1('".$contraseña."');";
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
<?php } ?>