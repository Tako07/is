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
				<form>
					<input class="formato" type="text" name="user" placeholder="Username" required>	
					<div id="nomApe">
	  					<input class="formato" type="text" name="nombre" placeholder="Nombre" required>
	  					<input id="apell"class="formato" type="text" name="apellido" placeholder="Apellido" required>
          			</div>
					<input id="fecha" class="formato" type="text" name="fecha" placeholder="Fecha de Nacimiento" required onclick="cambiaFecha();">
					<input class="formato" type="email" name="correo" placeholder="Correo electrónico" required>
					<div class="posicion">
						<input id="contraseña" class="formatopass" type="password" name="contraseña" value="" placeholder="Contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(0);">
						</figure>
					</div>
					<div class="posicion">
						<input id="contraseña1" class="formatopass" type="password" name="contraseña1" value="" placeholder="Contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(1);">
						</figure>
					</div>
					<input type="checkbox" name="terminos" id="terminos" value="Acepto" required> Aceptas nuestros <a href="https://www.trivago.es/terminos-y-condiciones">terminos y condiciones.</a>
					<div class="botones1">
						<input type="submit" name="enviar" class="formButton1" value="Registrarse">
						<input type="reset"  name="Cancelar" class="formButton1" value="Quiero ser un negocio" onclick="regnegocio();">
					</div>
				</form>

			</section>
		</div>
	</body>
</html>	