<!DOCTYPE html>

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
				<form>
					<input class="formatoIn2R" type="text" name="Negocio" placeholder="Piñas coladas Martita" required>
					<p class="formatoL2R">Calle:</p>
					<input class="formatoIn2R" type="text" name="calle" placeholder="Aquiles Caigo #69" required>
					<div class="flex">
						<p id="lblColonia" class="formatoL2R">Colonia:</p>
						<p id="lblCP" class="formatoL2R">Codigo postal:</p>
					</div>
					<div class="flex">
						<input id="inputColonia" class="formatoIn2R" type="text" name="colonia" placeholder="Heroes de la nación" required>
						<input id="inputCP" class="formatoIn2R" type="text" name="cp" placeholder="59826" required>
					</div>
					<p class="formatoL2R">Descripción del negocio:</p>
					<textarea class="formatoIn2R" type="text" name="Descripcion" placeholder="Escriba una breve descripción de su negocio" required></textarea>
					<p class="formatoL2R">Horarios</p>
					<textarea class="formatoIn2R" type="text" name="Horarios" placeholder="Escriba los horarios" required></textarea>
					<p class="formatoL2R">Categoría del negocio:</p>
					<div class="lista">Categorias |
						<select id="desplegable" name="OS">
   						<option value="1">Categoria 1</option>
   						<option value="2">Categoria 2</option>
   						<option value="3">Categoria 3</option>
   						<option value="4">Categoria 4</option>
   						<option value="5">Categoria 5</option>
   						<option value="6">Categoria 6</option>
						</select>
					</div>
					<center>
						<button id="registroFin" onclick="finRegistro();">Registrarse</button>
					</center>
				</form>
<!--sujefa-->
			</section>
		</div>
	</body>
</html>
