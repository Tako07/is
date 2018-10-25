<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.rawgit.com/jgthms/
		minireset.css/master/minireset.css">		<!--no borrar esta linea por lo que más quieran-->
		<title>Services In</title>
		<link rel="stylesheet" href="misestilos.css">
		<script src="botonHamb.js"></script>
		<script src="reproductor.js"></script>
		<script src="mapa.js"></script>
		<script src="loginregistro.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx0lps41wdrYFh7wh6BscIvCc_nIRkgRw&callback=initMap" async defer>
		<!-- Api de google maps con la llave de acceso-->
		</script>
	</head>

	<body>
		<div id="app">
			<header id="cabecera">
					<button name="bbanner" id="hamburguesa"></button>
					<figure class="logo" onclick="home();">
						<img src="iconos/logo.png">
						<!--Link a imageen-->
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
							<a href="https://www.trivago.com"><img src="iconos/publicidad1.jpg"></a>
					</figure>
				</div>
				<section id="centro1">
					<div id="mapa">

					</div>
					<div id="centro">
						<section id="recomendados">
							<table id="tablaRecom">
							<?php
							$host = "localhost";
							$database = "data_service_in";
							$user = "root";
							$password = "Privada";
							$conexion= mysqli_connect($host,$user,$password,$database);
								for ($i=1; $i <7 ; $i=$i+3) {
									echo '<tr>';
										echo '<td><img class="recomImg" src="mjolnir.jpg"></td>';
										echo '<td><img class="recomImg" src="mjolnir.jpg"></td>';
										echo '<td><img class="recomImg" src="mjolnir.jpg"></td></tr>';
										echo '<tr>';
										for ($k=$i; $k <4 ; $k++) {
											echo '<td><div class="recomDesc">';
											echo '<p class="textDesc">';

											$aux=mysqli_query($conexion, 'select nombre_negocio from negocio where id_negocio='.$k);
											if (mysqli_num_rows($aux) >= 0) {
												$j=0;
												while ($row=mysqli_fetch_assoc($aux)) {
													$response[$j]['dato1']=utf8_encode($row['nombre_negocio']);
													echo $response[$j]['dato1'];
													$j++;
												}
											}else {
												echo "0 results";
											}

											echo '</p>';
										echo '</div></td>';
									}echo '</tr>';
										echo '<tr><td><div class="btVerServ">';
											echo '<button type="button" class="bt">Ver servicio</button>';
										echo '</div></td>';
										echo '<td><div class="btVerServ">';
											echo '<button type="button" class="bt">Ver servicio</button>';
										echo '</div></td>';
										echo '<td><div class="btVerServ">';
											echo '<button type="button" class="bt">Ver servicio</button>';
										echo '</div></td><tr>';
									}
									mysqli_close($conexion);
							?>
						</table>
						</section>
						<section id="video">
							<div id="player"></div>
						</section>
					</div>
				</section>
			</section>
			<footer id="pie">
				<button id="anunciate">Anuncia tu servicio</button>
			</footer>
		</div>
	</body>
</html>
