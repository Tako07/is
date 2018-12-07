<?php session_start();
/*!&lt; Obtiene el id de usuario o negocio sino se obtiene ninguna la bandera sera igual a 2 (sin iniciar sesion)*/
if(isset($_SESSION['idUsuario'])){
	$ID=$_SESSION['idUsuario'];
	$bandera=$_SESSION['bandera'];
	$_SESSION['bandera']=$bandera;
}else{
	if(isset($_SESSION['idNegocio'])){
		$ID=$_SESSION['idNegocio'];
		$bandera=$_SESSION['bandera'];
		$_SESSION['bandera']=$bandera;
	}else{
		$bandera=2;
		$_SESSION['bandera']=2;
	}
}
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
$qryImg='select url_imagen as imagen, nombre_negocio
from vista_negocio as n inner join vista_imagenes as i on i.id_negocio=n.id_negocio
group by n.id_negocio order by rand()';
$resultCarr=mysqli_query ($conexion,$qryImg);
$y=mysqli_num_rows($resultCarr);
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
		<script src="reproductor.js"></script>
		<?php
		include "mapa.php";
		 ?>
		<script src="loginregistro.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1bW_pjIz7e3gCFGnwUs3tn5PR-5I0Khw&callback=initMap" async defer>
		<!-- Api de google maps con la llave de acceso-->
		</script>
		<link rel="stylesheet" href="misestilos.css">
		<script src="botonHamb.js"></script>
		<script src="loginregistro.js"></script>
	</head>
	<body>
		<div id="app">
			<header id="cabecera">
				<button name="bbanner" id="hamburguesa" onclick="cambiarid(<?php echo $y; ?>);"></button>
				<figure class="logo" onclick="home();">
					<img id="logo" src="iconos/logo.png">
				</figure>
				<section class="buscar">
					<form id="formulario" action="busqueda.php" method="post">
						<input id="buscar" type="search" name="busqueda" maxlength="200" placeholder="Ingresa tu búsqueda"></input>
						<button type="submit" name="bsearch" id="lupa"></button>
					</form>
				</section>
				<section class="botones">
					<?php
					/**
				 	*@Brief Botones
				 	*Si se entra a la pagina como invitado apareceran los botones de iniciar sesión
				 	**/
					if($bandera==2){
					echo '
							<button id="botonesN" onclick="regcliente();">Registrate</button>
							<button id="botonesN" onclick="login();">Iniciar Sesión</button>
						';
					}?>
				</section>
				<section class="iconos">
						<figure class="notificacion">
						<?php
					 	/**
					 	*@Brief Notificaciones
					 	*Si entra como un usuario normal el icono de notificaciones se activara
					 	**/
						if ($bandera==3) {
							echo '<img id="notificacion" src="iconos/ic_notificacion_v3.png">';
						}
						?>
						</figure>
					<figure class="icono" onclick="salir();">
						<img id="icono" src="iconos/ic_profile_v3.png">
					</figure>
				</section>
			</header>
			<section id="centro">
				<div id="seccion-banner">
					<section id="banner1">
						<nav>
							<h1><b>Servicios más buscados</b></h1>
							<lo>
								<?php
								/**
							 	*@Brief Negocios con mejor calificacion
							 	*Obtendra los 5 negocios con mayor calificacion y los mostrara
							 	**/
								$serv='select nombre_negocio, calificacion from vista_negocio order by calificacion  desc limit 5;';
								$servi=mysqli_query ($conexion,$serv);
								$j=0;
								while ($row=mysqli_fetch_assoc($servi)) {
									$servicios[$j]['nombre']=$row['nombre_negocio'];
									$j++;
								}
								for($j=0; $j<mysqli_num_rows($servi);$j++){
									echo '<li><a href="servicio.php?Negocio='.$servicios[$j]['nombre'].'">'.$servicios[$j]['nombre'].'</a></li>';
								}
								?>
							</lo>
							<h1><b>Categorías más buscadas</b></h1>
							<lo>
								<li><a href="servicios_de_categoria.php?categoria=Plomería">Plomería</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Eléctricista">Electricista</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Mecánico">Mecánico</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Carpintería">Carpintería</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Cerrajería">Cerrajería</a></li>
								<br><br>
								<a id="vermas" href="servicios_de_categoria.php?categoria=0">Ver mas...</a>
							</lo>
						</nav>
						<?php
						 ?>
						<figure id="publicidad1">
							<div id="publicidadbann" class="carousel slide" data-ride="carousel">
								<script type="text/javascript">
								$('#publicidadbann').carousel({
									interval: 5000,
									pause:true,
									wrap:true
								 });
								</script>
									<div class="carousel-inner">
									<?php
									$contCarr=0;
									while ($rowCarr=mysqli_fetch_assoc($resultCarr)) {
										$contCarr++;
										if($contCarr==1){
											echo '
											<div class="item active">
												<img src="iconos/publicidad1.jpg"  alt="">
											</div>
											';
										}else{
											echo '
											<div hidden id="hola'.$contCarr.'" class="item">
												<img  src="negocios/'.$rowCarr["imagen"].'"  alt="">
											</div>
											';
										}
									}
									?>
								</div>
							</div>
						</figure>
					</section>
					<?php
					$qryImg='select url_imagen as imagen, nombre_negocio
					from vista_negocio as n inner join vista_imagenes as i on i.id_negocio=n.id_negocio
					group by n.id_negocio order by rand()';
					$resultCarr=mysqli_query ($conexion,$qryImg);
					 ?>
					<figure id="publicidad2">
						<div id="publicidadbann" class="carousel slide" data-ride="carousel">
							<script type="text/javascript">
								$('#publicidadbann').carousel({
									interval: 5000,
									pause:true,
									wrap:true
							 });
							</script>
							<div class="carousel-inner">
								<?php
								$contCarr=0;
								while ($rowCarr=mysqli_fetch_assoc($resultCarr)) {
									$contCarr++;
									if($contCarr==1){
										echo '
										<div class="item active">
											<img src="iconos/publicidad1.jpg"  alt="">
										</div>
										';
									}else{
									echo '
									<div class="item">
										<img src="negocios/'.$rowCarr["imagen"].'"  alt="">
									</div>
									';
									}
								}
								?>
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
									$qry='select n.id_negocio as id, nombre_negocio as nombre, calificacion, id_paquete as paquete,url_imagen as imagen
									from vista_negocio as n inner join vista_imagenes as i on n.id_negocio=i.id_negocio where calificacion>4 and id_paquete=4
									group by n.id_negocio order by calificacion desc limit 6';
									/*!&lt; ejecución de la consulta "qry"*/
									$aux=mysqli_query($conexion, $qry);
									/*!&lt; Mientras exixstan valores de la consulta imprime tarjetas*/
									$cont=0;
									while ($row=mysqli_fetch_assoc($aux)) {

											$cont++;
											if($cont<4){
												echo '
												<div class="card">
				  								<img class="card-img-top" src="./negocios/'.$row["imagen"].'" width="100" height="150">
				  								<div class="card-body">
				    								<p class="card-text">'.$row["nombre"].'.</p>
														<div class="linkCard">
				    									<a href="servicio.php?Negocio='.$row["nombre"].'" >Ver servicio</a>
														</div>
				  								</div>
												</div>';

											}else{
												if($cont==4){
												echo'</div>
												<div id="inferior">';
											}echo '
											<div class="card">
												<img class="card-img-top" src="./negocios/'.$row["imagen"].'" width="150" height="150">
												<div class="card-body">
													<p class="card-text">'.$row["nombre"].'.</p>
													<div class="linkCard">
														<a href="servicio.php?Negocio='.$row["nombre"].'" >Ver servicio</a>
													</div>
												</div>
											</div>';

											}


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
				<button id="anunciate" onclick="anuncia();">Anuncia tu servicio</button>
			</footer>
		</div>
	</body>
</html>
