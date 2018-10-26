<?php 
	if(isset($_POST['usuario'])){   /*Se verifica que sea la primera vez que se inicia esta pantalla comprobando si se a mandado informacion con un $_POST[] de ser así (que se a mandado la informacion) se verificara que el nombre de usuario o el correo sean correcto incluyendo la contraseña para posteriormente mandar al usuario a su pantalla respectiva. Si es el caso contrario se mostrara el formulario para iniciar sesion.*/
		session_start();						/*Se inicia una conexion*/
		$usuario=$_POST['usuario'];		/*Recibe la informacion del campo para el nombre de usuario o correo del formulario de Login*/
		$contraseña=$_POST['contraseña'];	/*Recibe la informacion del campo para la contraseña del formulario de Login*/
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error()); /*Se realiza la conexion con la base de datos respectiva, el campo vacio es para la contraseña que se le de a la base de datos*/
		if(mysqli_connect_errno()){				/*Si la conexion falla mostrara un mensaje de error*/
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		$q="SELECT id_usuario FROM usuario WHERE username='".$usuario."' AND password=MD5('".$contraseña."') OR correo='".$usuario."' AND password=MD5('".$contraseña."');";	/*Se crea la consulta para verificar si la informacion ingresada en el formulario coincide con alguna informacion en la base de datos*/
		$result=mysqli_query ($con,$q);				/*Se realiza la consulta en la base de datos y los resultados se guardan en la variable $result*/
		if(mysqli_num_rows($result)==0){			/*Si el numero de filas en la variable $result es 0 significa que no se encontraron coincidencías por ende se mostrara un mensaje de error*/
			echo '<script>alert("Usuario o contraseña incorrectos");
			history.back();</script>';			/*Regresara a la pagina anterior que sera el formulario del login*/
		}else{										/*Si las filas del $result es diferente de 0 se verificara si el usuario tiene un negocio o es un usuario normal*/
			$fila=mysqli_fetch_row($result);		/*La informacion del usuario encontrado se guardara en la variable fila*/
			$q="SELECT * FROM negocio WHERE id_usuario=".$fila[0].";";		/*Se crea la consulta para saber si el usuario cuenta con un negocio*/
			$result2=mysqli_query ($con,$q);		/*Se realiza la consulta en l abase de datos y los resultados se guardan en la variable $result2*/
			if(mysqli_num_rows($result2)==0){			/*Si el resultado de la consulta son 0 filas significa que el usuario que inicio sesion es un usuario normal y se le redirecciona a su pagina de perfil con ayuda de otro formulario que mandara solo el ID de usuario*/
				echo '<form action="perfilNormal.php" id="formulario" method="POST"><input name="idUsuario" value="'.$fila[0].'"></form>';	/*Se crea el formulario dandole el valor del ID al input que se mandara*/
				echo '<script>
						function funciones(){
							document.getElementById("formulario").submit();
						}
						window.onload=funciones;
				</script>';	/*Con ayuda de un script el formulario se mandara automaticamente*/
			}else{ 					/*De no tener 0 filas la variable $result2, el usuario que inicio sesion sera considerado como un negocio y con ayuda de otro formulario sera mandado a la pagina de su negocio, mandando el ID de usuario y el ID de su negocio*/
				$fila2=mysqli_fetch_row($result2);		/*la informacion del negocio es guardad en la variable $fila2*/
				echo '<form action="servicio.php" id="formulario" method="POST">
				<input name="idUsuario" value="'.$fila[0].'">
				<input name="idNegocio" value="'.$fila2[1].'"></form>'; /*Se crea el formulario asignando el ID de usuario a un input y el ID de negocio en otro para despues ser mandado*/
				echo '<script>
						function funciones(){
							document.getElementById("formulario").submit();
						}
						window.onload=funciones;
				</script>';  /*Con ayuda de un script el formulario se mandara automaticamente*/
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