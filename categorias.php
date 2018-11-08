<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<link rel="stylesheet" href="estilos.css">
		<script src="botonHamb.js"></script>
		<script src="loginregistro.js"></script>
	</head>

	<body>
		<div id="appCat">
			<header id="cabecera">
				<button name="bbanner" id="hamburguesa" onclick="cambiarid();"></button>
				<figure class="logo" onclick="home();">
					<img id="logo" src="iconos/logo.png">
				</figure>
				<section class="buscar">
					<form id="formulario" action="busqueda.php" method="post">
						<input id="buscar" type="search" name="busqueda" maxlength="200" placeholder="Ingresa tu busqueda"></input>
						<button type="submit" name="bsearch" id="lupa"></button>
					</form>
				</section>
				<section class="botones">
					<button id="botonesN" onclick="regcliente();">Registrate</button>
					<button id="botonesN" onclick="login();">Iniciar Sesión</button>
				</section>
				<section class="iconos">
					<figure class="notificacion">
						<img id="notificacion" src="iconos/ic_notificacion_v3.png">
					</figure>
					<figure class="icono">
						<img id="icono" src="iconos/ic_profile_v3.png">
					</figure>
				</section>
			</header>
			<section id="centro">
				<div id="seccion-banner">
					<section id="banner">
						<nav id="ocultar">
							<h1><b>Servicios más buscados</b></h1>
							<lo>
								<li><a href="https://www.google.com/">Servicio 1</a></li>
								<li><a href="https://www.google.com/">Servicio 2</a></li>
								<li><a href="https://www.google.com/">Servicio 3</a></li>
								<li><a href="https://www.google.com/">Servicio 4</a></li>
								<li><a href="https://www.google.com/">Servicio 5</a></li>
							</lo>
							<h1><b>Categorías más buscadas</b></h1>
								<lo>
								<li><a href="https://www.google.com/">Carpinteria</a></li>
								<li><a href="https://www.google.com/">Plomeria</a></li>
								<li><a href="https://www.google.com/">Electricista</a></li>
								<li><a href="https://www.google.com/">Mecanico</a></li>
								<br><br>
								<a href="categorias.php/">Ver mas...</a>
							</lo>
						</nav>
						<a href="https://www.trivago.com"><img id="publicidad1" src="iconos/publicidad1.jpg"></a>
					</section>
					<figure>
						<a href="https://www.trivago.com"><img id="publicidad2" src="iconos/publicidad1.jpg" hidden></a>
					</figure>
				</div>
				<section id="centroCat">
					<p>Categorias:</p>
					<div id='contCat'>
					<div id='CategoriasIzq'>
						<lo>
							<li class ='ListCat'><a href="https://www.google.com/">Plomería</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Electricista</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Carpintería</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Carrajería</a></li>
						</lo>
					</div>
					<div id='CategoriasDer'>
						<lo>
							<li class ='ListCat'><a href="https://www.google.com/">Abarrotes</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Clínicas</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Cafés</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Ropa</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Restaurantes</a></li>
						</lo>
					</div>
				</div>
				</section>
			</section>
		</div>
	</body>
</html>
