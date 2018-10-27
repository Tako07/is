<!DOCTYPE html>
<?php
	$negocio=$_POST['negocio'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$pass=$_POST['contrasena'];
	$idUsr;
	$con=mysqli_connect("localhost" , "root" , "Privada" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q="SELECT * FROM usuario WHERE correo='".$correo."';";
	$result=mysqli_query ($con,$q);
	if(mysqli_num_rows($result)>0){
		echo '<script>alert("Correo ya registrado, pruebe con otro");
		history.back();</script>';
	}else {echo 'acá';
		$sql="INSERT INTO usuario (nombre,apellido,correo,password) VALUES ('".$nombre."','".$apellido."','".$correo."',MD5('".$pass."'));";
		if(mysqli_query($con,$sql)){
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
		<div id="app">
			<header id="cabecera">
					<figure class="home" onclick="home();">
						<img id="home" src="iconos/ic_home_v3.png">
					</figure>
					<h1 id="texto">Services In</h1>
					<button id="botonesN" onclick="login();">Iniciar Sesion</button>
			</header>
			<section id="seccionc2RN">
				<h1>Llena el formulario <br> para continuar</h1>
				<form action="FinRegistro.php" name="form" id="formulario" method="POST">
					<input class="formatoIn2R" type="text" name='negocio' placeholder="Piñas coladas Martita" value='<?php echo $negocio; ?>' readonly>
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
<!--sujefa-->
			</section>
		</div>
	</body>
</html>
