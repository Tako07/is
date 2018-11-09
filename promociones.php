<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<!-- Compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
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
								<a href="https://www.google.com/">Ver mas...</a>
							</lo>
						</nav>
						<figure id="publicidad1">
							
						</figure>
					</section>
					<figure id="publicidad1">
						<div id="publicidad2" class="carousel slide" data-ride="carousel">
              <script type="text/javascript">
              $('#publicidad2').carousel({
                interval: 8000,
                pause:true,
                wrap:true
              });
            </script>


            <div class="carousel-inner">
              <div class="item active">
                <img src="iconos/publicidad1.jpg"  alt="">
              </div>
              <div class="item">
                <img src="negocios/carpinteria_jose.jpg"  alt="">
              </div>
            </div>
					</figure>
				</div>
				<section id="centroCat">
					<center><h1>!Anuncia tu servicio¡ Mira los paquetes disponibles que tenemos <br> para ti</h1></center>
					<div id='parrPaquete'><br>Ahora mismo tu paquete es este:</div>
					<div id='paqActual'>
						<div id='actualIzq'>
							Básico
						</div>
						<div id='actualDer'>
							Tu paquete contiene:
							<lo>
								<li class="ListCat"><a href="https://www.google.com/">3 fotos subidas por ti mismo</a></li>
								<li class="ListCat"><a href="https://www.google.com/">3 Promociones</a></li>
							</lo>
						</div>
					</div>
					<table id='paquetes'>
						<tr>
							<td id='paq1'><p>Paquete 1</p></td>
							<td id='paq2'><p>Paquete 2</p></td>
							<td id='paq3'><p>Paquete 3</p></td>
						</tr>
						<tr>
							<td ><div class='descPaquetes'>Con este paquete llevate:
								<lo>
									<li class="ListCat">5 Fotografías de tu negocio tomadas por Services In</li>
								</lo>
							</div>
							</td>
							<td><div class='descPaquetes'>Con este paquete llevate:
								<lo>
									<li class="ListCat">2 Videos promocionales grabadas y editadas por Services In</li>
								</lo>
							</div>
							</td>
							<td><div class='descPaquetes'>Con este paquete llevate:
								<lo>
									<li class="ListCat">1 Spot de radio</li>
								</lo>
							</div>
							</td>
						</tr>
						<tr>
							<td><div class="btVerServ">
									<button type="button" class="bt">Comprar por <br>$300.00MXN</button>
								</div>
							</td>
							<td><div class="btVerServ">
									<button type="button" class="bt">Comprar por <br>$500.00MXN</button>
								</div>
							</td>
							<td><div class="btVerServ">
									<button type="button" class="bt">Comprar por <br>$700.00MXN</button>
								</div>
							</td>
					</table>

				</section>
			</section>
		</div>
	</body>
</html>
