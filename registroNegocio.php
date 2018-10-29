<!DOCTYPE html>
<?php
	//Obtención de variables del formulario
	/*!&lt; Contiene el nobre del usuario del nuevo negocio*/
	$usuario=$_POST['usuario'];
	/*!&lt; Nombre del dueño del negocio*/
	$nombre=$_POST['nombre'];
	/*!&lt; Apellido del duelo del negocio*/
	$apellido=$_POST['apellido'];
	/*!&lt; Correo del dueño del negocio*/
	$correo=$_POST['correo'];
	/*!&lt; Contraseña de la cuenta de usuario generada*/
	$pass=$_POST['contrasena'];
	/*!&lt; Id del uaurio en la base de datos*/
	$idUsr;
	//Conexión con la base de datos
	/*!&lt; Conexión con la base de datos*/
	$con=mysqli_connect("localhost" , "root" , "Privada" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	/*!&lt; Posible fallo en la conexión*/
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	//Consulta para verificar si el correo existe en BD
	/*!&lt; Consulta para verificar si el correo existe en BD*/
	$q="SELECT * FROM usuario WHERE correo='".$correo."';";
	//ejecución de la consulta
	/*!&lt; Ejecución de conculta y almacentamiento en variable*/
	$result=mysqli_query ($con,$q);
	//Si existe el correo en la BD
	if(mysqli_num_rows($result)>0){
		echo '<script>alert("Correo ya registrado, pruebe con otro");
		history.back();</script>';
	//si no existe el correo en la BD insertar el usuario
	}else {
		//Inserción del usuario en la bd
		/*!&lt;Consulta para ingresar un nuevo usuario a la base de datos*/
		$sql="INSERT INTO usuario (nombre,username,apellido,correo,password) VALUES ('".$nombre."','".$usuario."','".$apellido."','".$correo."',MD5('".$pass."'));";
		if(mysqli_query($con,$sql)){
			//Obtención del id del usuario recien insertado
			/*!&lt; Obtención del id del usuario recien incertado*/
			$idUsr=mysqli_insert_id($con);
		}
	}

 ?>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services in</title>
		<link rel="stylesheet" href="estiloslogin.css">
		<script src="loginregistro.js"></script>

	</head>

	<body>
		<div id="app"><!--caja principal del documento html-->
			<header id="cabecera"><!--Caja de barra superior de la página-->
				<figure class="home" onclick="home();">
					<img id="home" src="iconos/ic_home_v3.png">
				</figure>
				<h1 id="texto">Services In</h1>
				<button id="botonesN" onclick="login();">Iniciar Sesion</button>
			</header>
			<section id="seccionc2RN"><!--Sección principal de la segunda´página del registro del negocio-->
				<h1>Llena el formulario <br> para continuar</h1>
				<!--Formulario de datos -->
				<form action="FinRegistro.php" name="form" id="formulario" method="POST">
					<input class="formatoIn2R" type="text" name='negocio' placeholder="Piñas coladas Martita" value='Nombre del negocio'>
					<p class="formatoL2R">Calle:</p>
					<input class="formatoIn2R" type="text" name='calle' placeholder="ej. Aquiles Caigo #69" required>
					<div class="flex">
						<p id="lblColonia" class="formatoL2R">Colonia:</p>
						<p id="lblCP" class="formatoL2R">Codigo postal:</p>
					</div>
					<div class="flex">
						<input id="inputColonia" class="formatoIn2R" type="text" name='colonia' placeholder="ej. Heroes de la nación" >
						<input id="inputCP" class="formatoIn2R" type="text" name='cp' placeholder="ej. 59826" >
					</div>
					<p class="formatoL2R">Descripción del negocio:</p>
					<textarea class="formatoIn2R" type="text" name='descripcion' placeholder="Escriba una breve descripción de su negocio" required></textarea>
					<p class="formatoL2R">Horarios</p>
					<textarea class="formatoIn2R" type="text" name='horarios' placeholder="Escriba los horarios" required></textarea>
					<p class="formatoL2R">Categoría del negocio:</p>
					<div class="lista">Categorias |
						<select id="desplegable" name='categoria'>
   							<option value='1'>Categoria 1</option>
   							<option value='2'>Categoria 2</option>
   							<option value='3'>Categoria 3</option>
   							<option value='4'>Categoria 4</option>
   							<option value='5'>Categoria 5</option>
   							<option value='6'>Categoria 6</option>
						</select>
						<input id='idUsuario' type='text' name='idUsr' value='<?php echo $idUsr; ?>' style='display:none'>
					</div>
					<center>
						<input id="registroFin" type="submit"  class="formButton1" value="Registrarse" >
					</center>
				</form>
			</section>
		</div>
	</body>
</html>
