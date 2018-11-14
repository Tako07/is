<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<link rel="stylesheet" href="estilos.css">
		<!-- Compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
		<script src="botonHamb1.js"></script>
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
							<h1><b>Categorías</b></h1>
							<lo>
								<li><a href="servicio_menu.php?categoria='Plomería'">Plomería</a></li>
								<li><a href="servicio_menu.php?categoria='Electricista'">Electricista</a></li>
								<li><a href="servicio_menu.php?categoria='Mecánico'">Mecánico</a></li>
								<li><a href="servicio_menu.php?categoria='Carpinteria'">Carpintería</a></li>
								<li><a href="servicio_menu.php?categoria='Cerrajería'">Cerrajería</a></li>
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
                <img src="iconos/publicidad1.jpg" width="250" alt="">
              </div>
              <div class="item">
                <img src="negocios/carpinteria_jose.jpg" width="250" alt="">
              </div>
            </div>
					</figure>
				</div>
				<section id="centroCat">
					<p>Categorias:</p>
					<div id='contCat'>
						<form id='catForm' action="servicios_de_categoria.php" method="GET">
						<table id='categTab'>

						<?php
						$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
						if(mysqli_connect_errno()){
							printf("Falló la conexión: %s\n",mysqli_connect_errno());
						}
						$con->set_charset("utf8");
						$q="SELECT * FROM categoria;";
						$result=mysqli_query ($con,$q);
						$i=0;
						echo '<tr>';
						while($row = mysqli_fetch_assoc($result)){
							$i++;
							echo '
							<td class="nombCategoria"><input class="ListCat" type="submit" name="seleccion" value="'.$row["nombre_categoria"].'" readonly ></input></td>
							';
							if($i==2){
								$i=0;
								echo '</tr>';
								echo '<tr>';
							}
						}
						echo '</tr>';
						 ?>
				</table>
			</form>
				</div>

				</section>
			</section>
		</div>
	</body>
</html>
