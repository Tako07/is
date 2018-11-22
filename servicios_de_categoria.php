<?php
$nombCat=$_GET["seleccion"];
$idCat;
$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
if(mysqli_connect_errno()){
  printf("Falló la conexión: %s\n",mysqli_connect_errno());
}
$q='select n.nombre_negocio, i.url_imagen from categoria c inner join negocio n on c.id_categoria=n.id_categoria inner join imagenes i on n.id_negocio=i.id_negocio where c.nombre_categoria=\''.$nombCat.'\' group by n.id_negocio;';
$result=mysqli_query ($con,$q);

$bandera=1;
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" href="misestilos.css">
    	<script src="botonHamb.js"></script>
    	<script src="loginregistro.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<!-- Minified JS library -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Compiled and minified Bootstrap JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	</head>
  	<body>
    	<div id="app">
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
                			$serv='select nombre_negocio from negocio order by calificacion limit 5;';
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
                				<li><a href="servicio_menu.php?categoria=Plomería">Plomería</a></li>
                				<li><a href="servicio_menu.php?categoria=Electricista">Electricista</a></li>
                				<li><a href="servicio_menu.php?categoria=Mecánico">Mecánico</a></li>
                				<li><a href="servicio_menu.php?categoria=Carpintería">Carpintería</a></li>
                				<li><a href="servicio_menu.php?categoria=Cerrajería">Cerrajería</a></li>
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
							<img src="negocios/carpinteria_jose.jpg"  alt="">
                      	</div>
                  		</div>
          			</figure>
        		</div>
        	</div>
        	<div>
        		<div class="card">
					<img class="card-img-top" src="./negocios/carpinteria_jose.jpg" height="150">
					<div class="card-body">
						<p class="card-text">Holi</p>
						<div class="linkCard">
							<a href="servicio.php?Negocio='.$row2["nombre_negocio"].'" >Ver servicio</a>
						</div>
					</div>
				</div>
				<div class="card">
					<img class="card-img-top" src="./negocios/carpinteria_jose.jpg" height="150">
					<div class="card-body">
						<p class="card-text">Holi</p>
						<div class="linkCard">
							<a href="servicio.php?Negocio='.$row2["nombre_negocio"].'" >Ver servicio</a>
						</div>
					</div>
				</div>
				<div class="card">
					<img class="card-img-top" src="./negocios/carpinteria_jose.jpg" height="150">
					<div class="card-body">
						<p class="card-text">Holi</p>
						<div class="linkCard">
							<a href="servicio.php?Negocio='.$row2["nombre_negocio"].'" >Ver servicio</a>
						</div>
					</div>
				</div>
			</div>
    	</section>

    	<footer id="pie">
        	<button id="anunciate">Anuncia tu servicio</button>
    	</footer>
    	</div>
  	</body>
</html>