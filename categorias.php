<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.rawgit.com/jgthms/
		minireset.css/master/minireset.css">		<!--no borrar esta linea por lo que más quieran-->
		<title>Services In</title>
		<link rel="stylesheet" href="misestilos.css">
		<script src="botonHamb.js"></script>
	</head>

	<body>
		<div id="app">
			<header id="cabecera">
					<button name="bbanner" id="hamburguesa"></button>
					<figure class="logo" onclick="home();">
						<img src="iconos/logo.png">
					</figure>
					<form action="busqueda.php" method="post">
						<input id="buscar" type="search" name="busqueda" maxlength="200" placeholder="Ingresa tu busqueda"></input>
						<button type="submit" name="bsearch" id="lupa"></button>
					</form>
						<button id="botonesN" onclick="regcliente();">Registrate</button>
						<button id="botonesN" onclick="login();">Iniciar Sesión</button>
						<figure class="icono">
							<img src="iconos/ic_profile_v3.png">
						</figure>
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
								<a href="https://www.google.com/">Ver mas...</a>
							</lo>
						</nav>
						<figure id="publicidad1">
							<a href="https://www.trivago.com"><img src="iconos/publicidad1.jpg"></a>
						</figure>
					</section>
					<figure id="publicidad1">
					</figure>
				</div>
				<section id="centroCat">
					Categorias:
					<div id='contCat'>
					<div id='CategoriasIzq'>
						<lo>
							<li class ='ListCat'><a href="https://www.google.com/">Plomería</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Electricista</a></li>
							<li class ='ListCat'><a href="https://www.google.com/">Carpíntería</a></li>
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

