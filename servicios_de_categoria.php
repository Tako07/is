<?php
/**
    *@Brief Realiza la conexion
    *Se conecta con la base de datos
    **/
$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
$categoria=$_GET['categoria'];

/**
    *@Brief Realiza la conexion
    * Si no se puede conectar con la base de datos mostrara un mensaje de error
    **/
if(mysqli_connect_errno()){
  printf("Falló la conexión: %s\n",mysqli_connect_errno());
}
/**
    *@Brief Realiza la conexion
    * Guarda la configuracion para leer acentos
    **/
$con->set_charset("utf8");
if($categoria=="0"){
  $q='select n.id_negocio as id,nombre_negocio as nombre,url_imagen as imagen from vista_negocio as n inner join vista_imagenes as i on n.id_negocio=i.id_negocio group by i.id_negocio ';
}else{
  $q='select n.id_negocio as id,nombre_negocio as nombre,url_imagen as imagen, c.nombre_categoria as categoria from
  ((vista_negocio as n inner join vista_imagenes as i on n.id_negocio=i.id_negocio)
  inner join vista_categorias as c on n.id_categoria=c.id_categoria) where c.nombre_categoria="'.$categoria.'" group by i.id_negocio ';
}
$result=mysqli_query ($con,$q);

if(isset($_SESSION['bandera'])){
    $bandera=$_SESSION['bandera'];
}else{
    $bandera=2;
    $_SESSION['bandera']=2;
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services In</title>
    <link rel="stylesheet" href="estilos.css">
      <script src="botonHamb1.js"></script>
    	<script src="loginregistro.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<!-- Minified JS library -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Compiled and minified Bootstrap JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                  echo '
                  <figure class="notificacion">
                    <img id="notificacion" src="iconos/ic_notificacion_v3.png">
                  </figure>';
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
    							<h1><b>Categorías más buscadas</b></h1>
                  <lo>
    								<li><a href="servicios_de_categoria.php?categoria=Plomeria">Plomería</a></li>
    								<li><a href="servicios_de_categoria.php?categoria=Electricista">Electricista</a></li>
    								<li><a href="servicios_de_categoria.php?categoria=Mecanico">Mecánico</a></li>
    								<li><a href="servicios_de_categoria.php?categoria=Carpinteria">Carpintería</a></li>
    								<li><a href="servicios_de_categoria.php?categoria=Cerrajeria">Cerrajería</a></li>
    								<br><br>
    								<a id="vermas" href="servicios_de_categoria.php?categoria=0">Ver mas...</a>
    							</lo>
    						</nav>
                <?php
                $qryImg='select url_imagen as imagen, nombre_negocio
      					from vista_negocio as n inner join vista_imagenes as i on i.id_negocio=n.id_negocio
      					group by n.id_negocio order by rand()';
    						$resultCarr=mysqli_query ($con,$qryImg);
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
    												<div class="item">
    													<img src="negocios/'.$rowCarr["imagen"].'"  alt="">
    												</div>
    												';
    											}
    										}
    												 ?>
    						</figure>
    					</section>
              <?php
              $qryImg='select url_imagen as imagen, nombre_negocio
    					from vista_negocio as n inner join vista_imagenes as i on i.id_negocio=n.id_negocio
    					group by n.id_negocio order by rand()';
  						$resultCarr=mysqli_query ($con,$qryImg);
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
    					</figure>
    				</div>
            <section id="centroCat">
              <?php

                  $contador=0;
                  while ($row=mysqli_fetch_assoc($result)) {
                    if ($contador==0){
                    echo '<div class="cartitas">';
                  }
                  $contador++;
                    echo '
                    <div class="card">
                        <img class="center-block" src="./negocios/'.$row["imagen"].'" height="150" width="180">
                        <div class="card-body">
                            <p class="card-text">'.$row['nombre'].'</p>
                            <div class="linkCard">
                                <a href="servicio.php?Negocio='.$row["nombre"].'" >Ver servicio</a>
                            </div>
                        </div>
                    </div>';
                    if ($contador==4){
                    echo '</div>';
                    $contador=0;
                  }
                  }




               ?>

      </section>
    	</section>

    	<footer id="pie">
        <button id="anunciate" onclick="anuncia();">Anuncia tu servicio</button>
      </footer>
    	</div>
  	</body>
</html>
