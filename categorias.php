<?php
 	session_start();
 	/**
 	*@Brief Realiza la conexion
 	*Se conecta con la base de datos
 	**/
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	/**
 	*@Brief Realiza la conexion
 	* Si no se puede conectar con la base de datos mostrara un mensaje de error
 	**/
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	/**
 	*@Brief Coloca la funcion para que pueda leer acentos
 	*
 	**/
	$con->set_charset("utf8");
	$bandera=2;
?>
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
		<script src="botonHamb.js"></script>
		<script src="loginregistro.js"></script>
	</head>

	<body>
		<div id="appCat">
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
					<?php
					/**
				 	*@Brief Notificaciones
				 	*Si entra como un usuario normal el icono de notificaciones se activara
				 	**/
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
					<section id="banner1">
						<nav>
							<h1><b>Servicios más buscados</b></h1>
							<lo>
								<?php
								/**
							 	*@Brief Negocios con mejor calificacion
							 	*Obtendra los 5 negocios con mayor calificacion y los mostrara
							 	**/
								$serv='select nombre_negocio from vista_negocio order by calificacion limit 5;';
								$servi=mysqli_query ($con,$serv);
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
							<h1><b>Categorías</b></h1>
							<lo>
								<li><a href="servicios_de_categoria.php?categoria=Plomería">Plomería</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Electricista">Electricista</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Mecánico">Mecánico</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Carpintería">Carpintería</a></li>
								<li><a href="servicios_de_categoria.php?categoria=Cerrajería">Cerrajería</a></li>
								<br><br>
								<a id="vermas" href="categorias.php">Ver mas...</a>
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
			                	<img src="negocios/Carpinteria_Don_Jose1.jpg"  alt="">
			              	</div>
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
              /*!&lt; Consulta para obtener todas las categorías registradas*/
							$q="SELECT * FROM categoria;";
              /*!&lt; ejecución de la consulta para obtener categorias registradas*/
							$result=mysqli_query ($con,$q);
              /*!&lt; Contador para colocar categorias en lado izquierdo y derecho*/
							$i=0;
							echo '<tr>';
              /*!&lt; obtención de una fila de la consulta con la base de datps*/
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
			<footer id="pie">
				<button id="anunciate">Anuncia tu servicio</button>
			</footer>
		</div>
	</body>
</html>
