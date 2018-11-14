<?php $bandera=2;
	/*!&lt; Servidor al que se va a conectar*/
	$host = "localhost";
	/*!&lt; Nombre de la base de datos a la que se va a conectar*/
	$database = "data_service_in";
	/*!&lt; Usuario con el que se va a ingresar*/
	$user = "root";
	/*!&lt; Contraseña del usuario*/
	$password = "";
	/*!&lt; Conexión a la base de datos*/
$conexion= mysqli_connect($host,$user,$password,$database);
$conexion->set_charset("utf8");
?>
<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<!-- Compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" href="misestilos.css">
		<script src="botonHamb1.js"></script>
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
				<button name="bbanner" id="hamburguesa" onclick="cambiarid(<?php echo $bandera;?>);"></button>
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
					<?php
					if($bandera==2){
					echo '
							<button id="botonesN" onclick="regcliente();">Registrate</button>
							<button id="botonesN" onclick="login();">Iniciar Sesión</button>
						';
					}?>
				</section>
				<section class="iconos">
					<?php
					if ($bandera==3) {
						echo '
						<figure class="notificacion">
							<img id="notificacion" src="iconos/ic_notificacion_v3.png">
						</figure>';
					}
					?>
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
								<?php
								$q='select nombre_negocio from negocio order by calificacion limit 5;';
								$result=mysqli_query ($conexion,$q);
								$j=0;
								while ($row=mysqli_fetch_assoc($result)) {
									$resultado[$j]['nombre']=$row['nombre_negocio'];
									$j++;
								}
								for($j=0; $j<mysqli_num_rows($result);$j++){
									echo '<li><a href="servicio.php?Negocio='.$resultado[$j]['nombre'].'">'.$resultado[$j]['nombre'].'</a></li>';
								}
								?>
							</lo>
							<h1><b>Categorías</b></h1>
							<lo>
								<li><a href="servicio_menu.php?categoria=Plomería">Plomería</a></li>
								<li><a href="servicio_menu.php?categoria=Electricista">Electricista</a></li>
								<li><a href="servicio_menu.php?categoria=Mecánico">Mecánico</a></li>
								<li><a href="servicio_menu.php?categoria=Carpintería">Carpintería</a></li>
								<li><a href="servicio_menu.php?categoria=Cerrajería">Cerrajería</a></li>
								<br><br>
								<a href="categorias.php">Ver mas...</a>
							</lo>
						</nav>
						<a href="https://www.trivago.com"><img id="publicidad1" src="iconos/publicidad1.jpg"></a>
					</section>
					<figure>
			            <div id="publicidad2" class="carousel slide" data-ride="carousel">
			              <script type="text/javascript">
			              $('#publicidad2').carousel({
			                interval: 5000,
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
				<section id="centro1">
					<div id="mapa">

					</div>
					<div id="centro">
						<section id="recomendados">
							<div id="tablaRecom">
								<div id='superior'>
									<?php
									/*!&lt; Qry a ejecutar para obtener el nombre de 3 negocios*/
									$qry='select nombre_negocio from vista_negocio limit 3';
									/*!&lt; ejecución de la consulta "qry"*/
									$aux=mysqli_query($conexion, $qry);
									/*!&lt; Mientras exixstan valores de la consulta imprime tarjetas*/
									while ($row=mysqli_fetch_assoc($aux)) {
										$query='select url_imagen from vista_imagenes where nombre_negocio="'.$row["nombre_negocio"].'" limit 1';
										$auxi=mysqli_query($conexion, $query);
										$imagen="./mjolnir.jpg";
										if($rowe=mysqli_fetch_assoc($auxi)){
											$imagen=$rowe["url_imagen"];
										}
										echo '
										<div class="card">
		  								<img class="card-img-top" src="./negocios/'.$imagen.'" width="150" height="150">
		  								<div class="card-body">
		    								<p class="card-text">'.$row["nombre_negocio"].'.</p>
												<div class="linkCard">
		    									<a href="servicio.php?Negocio='.$row["nombre_negocio"].'" >Ver servicio</a>
												</div>
		  								</div>
										</div>';
									}
									 ?>
								</div>
								<div id='inferior'>
								<?php
								/*!&lt; Consulta para obtener nombre de los negocios*/
								$qry='select nombre_negocio from vista_negocio limit 3';
								/*!&lt; ejecución de query "qry"*/
								$aux2=mysqli_query($conexion, $qry);
								/*!&lt; Ciclo para colocar tarjetas*/
								while ($row2=mysqli_fetch_assoc($aux2)) {
									/*!&lt; Query para obtener las imagenes de los negocios*/
									$query2='select url_imagen from vista_imagenes where nombre_negocio="'.$row2["nombre_negocio"].'" limit 1';
									/*!&lt; ejecución del query*/
									$auxi2=mysqli_query($conexion, $query2);
									/*!&lt; imagen por defecto*/
									$imagen2="./mjolnir.jpg";
									/*!&lt si el negocio tiene una imagen, colocarla*/
									if($rowe2=mysqli_fetch_assoc($auxi2)){
										$imagen2=$rowe2["url_imagen"];
									}
									echo '
									<div class="card">
										<img class="card-img-top" src="./negocios/'.$imagen2.'" height="150">
										<div class="card-body">
											<p class="card-text">'.$row2["nombre_negocio"].'.</p>
											<div class="linkCard">
												<a href="servicio.php?Negocio='.$row2["nombre_negocio"].'" >Ver servicio</a>
											</div>
										</div>
									</div>';
								}
								 ?>

								</div>
							</div>
							<div id='cajaVideo'>
						<section id="video">
							<div id="player"></div>
						</section>
						</div>
						</div>

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
