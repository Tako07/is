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
			</header>
			<section id="seccion">
				<figure class="icono">
					<img id="icono" src="iconos/ic_profile_v3.png">
				</figure>
				<form action="perfilNormal.php" name="miformulario" id="miformulario" method="post" class="formulario">
					<input class="correo" type="text" name="correo" placeholder="Correo electronico/Username" required>
					<div class="posicion">
						<input id="contraseña" class="pass" type="password" name="contraseña" value="contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(0);">
						</figure>
					</div>
					<div class="botones">
						<input type="submit" name="enviar" class="formButton" value="Iniciar Sesión">
						<input type="reset"  name="Cancelar" class="formButton" value="Registrate" onclick="regcliente();">
					</div>
				</form>
			</section>
		</div>
	</body>
</html>	