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
		<div id="app"><!--caja principal del documento-->
			<header id="cabecera"><!--Caja de barra superior de la página-->
					<figure class="home" onclick="home();">
						<img id="home" src="iconos/ic_home_v3.png">
					</figure>
					<h1 id="texto">Services In</h1>
					<button id="botonesN" onclick="login();">Iniciar Sesión</button>
			</header>
			<section id="seccionc"><!--Sección principal del registro del negocio-->
				<h1>Registro de negocio</h1>
				<figure class="icono">
					<img id="icono" src="iconos/ic_profile_v3.png">
				</figure>
				<!--Formulario de datos -->
				<form action="registroNegocio.php" name="formulario" id="formulario" method="POST" onsubmit='return validaFormulario();'>
					<input id='Usr' class="formato" type="text" name='usuario' placeholder="Nombre usuario negocio" required>
          			<div id="nomApe">
  						<input id='nombre' class="formato" type="text" name="" e='nombre' placeholder="Nombre" required>
  						<input id='apell' class="formato" type="text" name='apellido' placeholder="Apellido" required>
          			</div>
          			<input id='correo' class="formato" type="email" name='correo' placeholder="Correo electrónico" required>
					<div class="posicion">
						<input id='contrasena' class="formatopass" type="password" name='contrasena' value="" placeholder="Contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(0);">
						</figure>
					</div>
					<div class="posicion">
						<input id='contrasena1' class="formatopass" type="password" name='contrasena1' value="" placeholder="Contraseña" required>
						<figure class="ojo">
							<img id="ojo" src="iconos/ojo.png" onclick="mostrarpass(1);" required>
						</figure>
					</div>
					<div id="cajaT">
						<input type="checkbox" name="terminos" id="terminos" value="Acepto" required> Aceptas nuestros <a href="https://www.trivago.es/terminos-y-condiciones">terminos y condiciones.</a>
					</div>
					<div class="botones1">
						<input type="submit"  class="formButton1" value="Registrarse" >
						<input type="reset"  name="Cancelar" class="formButton1" value="Quiero ser un cliente" onclick="regcliente();">
					</div>
				</form>
			</section>
		</div>
	</body>
</html>
