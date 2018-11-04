 <?php
	if(isset($_GET['idUsuario'])){
		session_start();
		$IDU=$_GET['idUsuario'];
		$NN=$_GET['Negocio'];
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		$q="SELECT * FROM usuario WHERE id_usuario=".$IDU.";";
		$result=mysqli_query ($con,$q);
		$q="SELECT * FROM vista_negocio WHERE nombre_negocio='".$NN."';";
		$result2=mysqli_query ($con,$q);
		$fila=mysqli_fetch_row($result);
		$fila2=mysqli_fetch_row($result2);
		$bandera=1;
	}else{
		if (isset($_GET['Negocio'])) {
		$NN=$_GET['Negocio'];
		$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n",mysqli_connect_errno());
		}
		$q="SELECT * FROM vista_negocio WHERE nombre_negocio='".$NN."';";
		$result2=mysqli_query ($con,$q);
		$fila2=mysqli_fetch_row($result2);
		$bandera=2;
		}else{
			$bandera=0;
		}
	}
	if($bandera>0){
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<link rel="stylesheet" href="estilos.css">
		<script src="botonHamb1.js"></script>
		<script src="reproductor.js"></script>
		<script src="mapa.js"></script>
		<script src="loginregistro.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx0lps41wdrYFh7wh6BscIvCc_nIRkgRw&callback=initMap" async defer>
		</script>
	</head>
	<body>
		<div id="app">
			<header id="cabecera">
					<button name="bbanner" id="hamburguesa"></button>
					<figure class="logo" onclick="home();">
						<img id="logo" src="iconos/logo.png">
					</figure>
					<section class="buscar">
						<form id="formulario" action="busqueda.php" method="post">
							<input id="buscar" type="search" name="busqueda" maxlength="200" placeholder="Ingresa tu busqueda"></input>
							<button type="submit" name="bsearch" id="lupa"></button>
						</form>
					</section>
						<?php
						if($bandera==2){
						echo '<button id="botonesN" onclick="regcliente();">Registrate</button>
							<button id="botonesN" onclick="login();">Iniciar Sesión</button>';
						}?>
						<figure class="notificacion">
							<img id="notificacion" src="iconos/ic_notificacion_v3.png">
						</figure>
						<figure class="icono">
							<img id="icono" src="iconos/ic_profile_v3.png">
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
						<a href="https://www.trivago.com"><img id="publicidad1" src="iconos/publicidad1.jpg"></a>
					</section>
					<figure>
						<a href="https://www.trivago.com"><img id="publicidad2" src="iconos/publicidad1.jpg"></a>
					</figure>
				</div>
				<section id="centro1">
          <section id="perfil">
            <div id='descNegocio'>
              <figure id='imagenN'>
                <img id='imgnegocio' src="mjolnir.jpg">
              </figure>
              <h1 id='nombServicio'>Nombre del servicio<h1>
              <div id='estrellas'>Estrellas que después pongo</div>
              <br>
              <div id='descHorario'>
                <h1>Descripción del servicio:</h1>
                <p>aquí va un php</p>
                  <br>
                <h1>Horarios</h1>
                <p>aquí va un php</p>
                <br>
                <h1>Certificados:</h1>
                <lo>
  								<li class='certificados'><a href="https://www.google.com/">Servicio 1</a></li>
  								<li class='certificados'><a href="https://www.google.com/">Servicio 2</a></li>
                </lo>
              </div>
            </div>
					</section>
					<section id="extras">
						<h2>Servicio recomendado</h2>
						<div id="player"></div>
						<div id="mapa"></div>
						<div id="info">
							<H2>Contacta a <?php echo '"'.$fila2[0].'"';?></H2><br>
							<section id="codi">
								<label id="etiqueta" for="correo">Correo:</label>
								<p name="correo"><?php echo ''.$fila2[5].'';?></p><br>
								<label id="etiqueta" for="direccion">Dirección:</label>
								<p name="direccion"><?php echo $fila2[1].' '.$fila2[2];?></p><br>
							</section>
						</div>
					</section>
				</section>

				</section>
			<footer id="pie">
				<button id="anunciate">Anuncia tu servicio</button>
			</footer>
		</div>
	</body>
</html>
<?php
}else{
		echo '<script>
		function funciones(){
			alert("Pagina no encontrada");
			window.open("index.php","_self");
		}
		window.onload=funciones;
		</script>';
	}
?>
