 <?php session_start();		/*Inicia la conexion con la base de datos*/
	if(isset($_SESSION['bandera'])){
		$bandera=$_SESSION['bandera'];
	}
	$buscar=$_POST['busqueda'];	/*Obtine la cadena de busqueda la previa pantalla (index.php) para su uso en esta*/
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") 	/*Realiza la conexion a la base de datos correspondiente el campo vacio es para la contraseña que se le de a la base de datos*/
	or die("No se pudo conectar: ".mysql_error());
	$con->set_charset("utf8");	
	if(mysqli_connect_errno()){						/*Comprueba que la conexion se realiza correctamente de no ser así mostrara un mensaje en pantalla*/
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q="SELECT n.nombre_negocio, i.url_imagen FROM vista_negocio n INNER JOIN vista_imagenes i ON n.id_negocio=i.id_negocio INNER JOIN vista_categorias c ON n.id_categoria=c.id_categoria WHERE n.nombre_negocio LIKE '%".$buscar."%' OR n.etiquetas LIKE '%".$buscar."%' OR c.nombre_categoria LIKE '%".$buscar."%' group by n.nombre_negocio;";	/*Realiza la consulta para coincidencías con la base de datos en la tabla de vista de negocio. Las comparaciones se realizan con las columnas de "nombre_negocio" y la de "etiquetas"*/
	$result2=mysqli_query ($con,$q);				/*Se realiza la busqueda de la consulta anterior y se obtienen toda la informacion de los negocios que tengan coincidencias y se guardan  en la variable $result*/
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
                  echo '
                  <figure class="notificacion">
                    <img id="notificacion" src="iconos/ic_notificacion_v3.png">
                  </figure>';
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
    												<div class="item active">
    													<img src="iconos/publicidad1.jpg"  alt="">
    												</div>
    												<div class="item">
    													<img src="negocios/Carpinteria_Don_Jose1.jpg"  alt="">
    												</div>
    										</div>
    										</div>
    						</figure>
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
	            <h1>Mostrando resultados de "<?php echo $buscar;?>"</h1>

	            <?php
		        		if(mysqli_num_rows($result2)>0){
		        			$j=0;
			        		while ($row=mysqli_fetch_assoc($result2)) {
								$resultado[$j]['nombre']=$row['nombre_negocio'];
								$resultado[$j]['url']=$row['url_imagen'];
								$j++;
							}
							/**
						 	*@Brief Numero de filas negocio
						 	*Obtiene el numero de filas que se necesitaran para mostrar todos los negocios que sigue el usuario
						 	**/
							$nfilas=mysqli_num_rows($result2);
							if(($nfilas/4)<1){
								$nfilas=1;
							}else{
								if($nfilas%4!=0){
									$nfilas/=4;
									$nfilas=intval($nfilas);
									$nfilas+=1;
								}else{
									$nfilas/=4;
									$nfilas=intval($nfilas);
								}
							}
							$i=0;
							/**
						 	*@Brief Segun el numero de filas se repetira el ciclo
						 	**/
							for($j=1; $j-1<$nfilas; $j+=1){
								$count=0;
								if($j>1){
									echo '<br>';
								}?>
								<div class="cartitas">
									<?php
									/**
								 	*@Brief Numero de tarjetas por fila
								 	*Coloca hasta 4 tarjetas de informacion por fila si no se completan los 4 se llenara de tarjetas vacias
								 	**/
									for($count=0; $i <mysqli_num_rows($result2)&&$count<4; $i=$i+1,$count++) {?>
										<div class="card">
											<?php echo '<img class="center-block" src="negocios/'.$resultado[$i]['url'].'" height="120">'; ?>
											<div class="card-body">
												<p class="card-text"><?php echo $resultado[$i]['nombre']; ?></p>
												<div class="linkCard">
													<a href="servicio.php?Negocio='<?php echo $resultado[$i]["nombre"]; ?>'">Ver servicio</a>
												</div>
											</div>
										</div>
									<?php }
									if($count<4){
										while ($count<4) {
											echo '
											<section id="notarjeta">
												<figure class="negocios">
													</figure>
													<div id="nada">
														<p></p>
													</div>
												<button id="bnada"></button>
											</section>';
											$count++;
											$i++;
										}
									}?>
								</section>
							<?php }?>
						<?php }?>
				</div>
      		</section>
    	</section>
    	<footer id="pie">
        	<button id="anunciate">Anuncia tu servicio</button>
    	</footer>
    	</div>
  	</body>
</html>