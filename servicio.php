<?php
 	session_start();
 	/**
 	*@Brief Realiza la conexion
 	*Se conecta con la base de datos
 	**/
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
  $conexion=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	/**
 	*@Brief Realiza la conexion
 	* Si no se puede conectar con la base de datos mostrara un mensaje de error
 	**/
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$con->set_charset("utf8");
	/**
 	*@Brief URL
 	*Si en el URL recibe informacion como nombre de negocio mostrara la pagina como es, de no ser así mostrara un mensaje y mandara al index.php
 	**/
	if (isset($_GET['Negocio'])) {
		/**
	 	*@Brief Guarda el nombre del negocio en la variable
	 	*
	 	**/
		$NN=$_GET['Negocio'];
		/**
	 	*@Brief Realiza la consulta
	 	*Realiza la consulta para obtener la informacion del negocio que se ingreso
	 	**/
		$q='SELECT * FROM vista_negocio n inner join vista_usuario u on n.id_usuario=u.id_usuario WHERE nombre_negocio=\''.$NN.'\';';
		$result2=mysqli_query ($con,$q);
		/**
	 	*@Brief Si la consulta no regresa valores
	 	*Si no regresa valores el negocio no existe y redirecciona al index.php
	 	**/
		if(mysqli_num_rows($result2)==0){
			$bandera=0;
		}else{
			$fila2=mysqli_fetch_row($result2);
			/**
		 	*@Brief consulta descripcion
		 	*Realiza la consulta para obtener la descripcion del negocio
		 	**/
			$q1="SELECT descripcion FROM vista_promocion WHERE id_negocio='".$fila2[0]."';";
			$result3=mysqli_query ($con,$q1);
			$fila3=mysqli_fetch_row($result3);
			/**
		 	*@Brief Pagina como dueño del negocio
		 	*Si recibe el ID de negocio mostrara la pagina como si fuera el dueño del negocio
		 	**/
			if(isset($_POST['idNegocio']) or isset($_SESSION['idNegocio'])){
				if(isset($_POST['idNegocio'])){
					$IDN=$_POST['idNegocio'];
					$_SESSION['idNegocio']=$IDN;
					$_SESSION['bandera']=1;
				}else{
					$IDN=$_SESSION['idNegocio'];
					$_SESSION['bandera']=1;
				}
				/**
			 	*@Brief Consulta de ID de usuario
			 	*Realiza la consulta para obtener la informacion de usuario del dueño del negocio
			 	**/
				$q="SELECT * FROM vista_usuario WHERE id_usuario=".$IDN.";";
				$result=mysqli_query ($con,$q);
				$fila=mysqli_fetch_row($result);
				/**
			 	*@Brief Calificacion
			 	*Obtiene la calificacion promedio del negocio
			 	**/
				$q3='select calificacion from vista_negocio where id_negocio='.$fila2[0].';';
				$result5=mysqli_query ($con,$q3);
				if(mysqli_num_rows($result5)==0){
					$calificacion[0]=0;
				}else{
					 $calificacion=mysqli_fetch_row($result5);
				}
				$bandera=1;
			}else{
				/**
			 	*@Brief ID Usuario
			 	*Si recibe el ID de usuario mostrara la pagina como si fuera
			 	**/
				if(isset($_POST['Usuario']) or isset($_SESSION['idUsuario'])){
					if(isset($_POST['Usuario'])){
						$IDU=$_POST['Usuario'];
						$_SESSION['idUsuario']=$IDU;
						$_SESSION['bandera']=3;
					}else{
						$IDU=$_SESSION['idUsuario'];
						$_SESSION['bandera']=3;
					}
					/**
				 	*@Brief Consulta de favorito
				 	*realiza la consulta para saber si sigue al negocio o no
				 	**/
					$q2='select id_favorito from vista_favorito where id_usuario='.$IDU.' AND id_negocio='.$fila2[0].';';
					$result4=mysqli_query ($con,$q2);
					if(mysqli_num_rows($result4)==0){
						//no sigue al negocio
						$siguiendo=0;
					}else{
						//esta siguiendo al negocio
						$siguiendo=1;
					}
					/**
				 	*@Brief Obtiene la calificacion
				 	*Obtiene la calificacion que el usuario le dio al negocio
				 	**/
					$q3='select calificacion from vista_calificacion where id_usuario='.$IDU.' and id_negocio='.$fila2[0].';';
					$result5=mysqli_query ($con,$q3);
					/**
				 	*@Brief No lo a calificado
				 	*Si no recibe informacion de la consulta no a calificado al negocio
				 	**/
					if(mysqli_num_rows($result5)==0){
						$calificacion[0]=0;
					}else{
						 $calificacion=mysqli_fetch_row($result5);
					}
					$bandera=3;
				/**
			 	*@Brief Invitado
			 	*Si no recibe ninguno de los 2 ID se mostrara la pagina como si fuera
			 	**/
				}else{
					/**
				 	*@Brief Calificacion
				 	*Obtiene la calificacion promedio del negocio
				 	**/
					$q3='select calificacion from vista_negocio where id_negocio='.$fila2[0].';';
					$result5=mysqli_query ($con,$q3);
					if(mysqli_num_rows($result5)==0){
						$calificacion[0]=0;
					}else{
						 $calificacion=mysqli_fetch_row($result5);
					}
					$bandera=2;
				}
			}
		}
	}else{
		//no manda link para negocio redirecciona a inicio
		if(isset($_SESSION['idUsuario'])){
			$_SESSION['idUsuario']=$_SESSION=['idUsuario'];
			$_SESSION['bandera']=$_SESSION=['bandera'];
		}else{
			if(isset($_SESSION['idNegocio'])){
				$_SESSION['idNegocio']=$_SESSION['idNegocio'];
				$_SESSION['bandera']=$_SESSION=['bandera'];
			}
		}
		$bandera=0;
	}
	/**
 	*@Brief Mostrara la pantalla
 	*Si la bandera es mayor a 0 se mando el nombre del negocio en el url
 	**/
	if($bandera>0){
?>
<!DOCTYPE html>
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
		<script src="botonHamb1.js"></script>
		<script src="botonHamb.js"></script>
		<script src="reproductor.js"></script>
		<?php include "mapa.php"; ?>
		<script src="loginregistro.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx0lps41wdrYFh7wh6BscIvCc_nIRkgRw&callback=initMap" async defer>
		</script>
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
			                	<img src="negocios/carpinteria_jose.jpg"  alt="">
			              	</div>
			            </div>
					</figure>
				</div>
				<section id="centro1">
		        	  <section id="perfil">
			            <div id='descNegocio'>
			              	<div id="img-info">
		                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
		                          	<script type="text/javascript">
				                        $('#myCarousel').carousel({
				                            interval: 8000,
				                            pause:true,
				                            wrap:true
				                        });
		                        	</script>
                              <div class="carousel-inner">
                              <?php
                              /*!&lt; Query para obtener las imágenes del negocio*/
                              $qry='select url_imagen from (vista_imagenes i inner join vista_negocio n on i.id_negocio=n.id_negocio) where nombre_negocio="'.$NN.'"';
                              /*!&lt; Ejecución de la consulta "qry"*/
                              $resultImg=mysqli_query ($con,$qry);
                              /*!&lt; Contador para señalar el item que muestr el carrusel*/
                              $cont=0;
                              /*!&lt; Ciclo para colcar colocar las imágenes en el carrusel*/
                              while ($rowImg=mysqli_fetch_assoc($resultImg)) {
                                if($cont==0){
                                  echo '<div class="item active">';
                                }else{
                                  echo '<div class="item">';
                                }$cont++;
                                echo '
                                  <img src="negocios/'.$rowImg["url_imagen"].'" width="300" alt="">
                                  </div>';
                              }echo '</div>';
			                        echo '
                              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			                          <span class="glyphicon glyphicon-chevron-left"></span>
			                          <span class="sr-only">Previous</span>
			                        </a>
			                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
			                          <span class="glyphicon glyphicon-chevron-right"></span>
			                          <span class="sr-only">Next</span>
			                        </a>';





		    //<!-- Controls -->


                            ?>
                            </div>
				             	<div id="info">
									     <H2>Contacta a <?php echo '"'.$fila2[1].'"';?></H2><br>
									     <section id="codi">
										<label id="etiqueta" for="correo">Correo:</label>
										<p name="correo"><?php echo ''.$fila2[20].'';?></p><br>
										<label id="etiqueta" for="direccion">Dirección:</label>
										<p name="direccion"><?php echo $fila2[3].', '.$fila2[4];?></p><br>
									</section>
								</div>
							</div>
							<section id="nom-fav">
	                			<?php
	                			/**
							 	*@Brief Seguir
							 	*Si se entro como un usuario normal se mostrara el icono para seguir el negocio
							 	**/
		                			if($bandera==3){
		                				echo '<figure class="favo" onclick="seguir('.$siguiendo.','.$IDU.','.$fila2[0].');">';
		                				/**
									 	*@Brief Icono seguir
									 	*Dependiendo de lo que se haya obtenido de la base de datos se mostrara uno de los 2 iconos
									 	**/
		                				if($siguiendo==0){
		                					echo '<img id="favo" src="iconos/ic_fav_1.png">';
		                				}else{
		                					echo '<img id="favo" src="iconos/ic_fav_2.png">';
		                				}
		                				echo '</figure>';
		                			}
	                			?>
			            		<h1 id='nombServicio'><?php echo $fila2[1]?><h1>
	            			</section>
	            			<section id="calif">
	            				<?php
		            				/**
								 	*@Brief Calificacion
								 	*Si se entro como dueño del negocio o invitado mostrara la calificacion promedio
								 	**/
		                			if($bandera==2||$bandera==1){
		                				for($count=1;$count<=5;$count++,$calificacion[0]--){
			                				echo '<figure class="estrella">';
			                				if($calificacion[0]>0){
			                					echo '<img id="estrella" src="iconos/ic_full_star_v3.png">';
			                				}else{
			                					echo '<img id="estrella" src="iconos/ic_empty_star_v3.png">';
			                				}
			                				echo '</figure>';
		                				}
		                			}
		                			/**
								 	*@Brief Calificacion
								 	*Si se entro como usuario normal mostrara la calificacion que el le dio al negocio
								 	**/
		                			if($bandera==3){
		                				for($count=1;$count<=5;$count++,$calificacion[0]--){
			                				echo '<figure class="estrella" onclick="favoritos('.$count.','.$IDU.','.$fila2[0].');">';
			                				if($calificacion[0]>0){
			                					echo '<img id="estrella" src="iconos/ic_full_star_v3.png">';
			                				}else{
			                					echo '<img id="estrella" src="iconos/ic_empty_star_v3.png">';
			                				}
			                				echo '</figure>';
		                				}
		                			}
	                			?>
	            			</section>
				            <div id='descHorario'>
		              			<h1>Descripción del servicio:</h1>
		                        <p><?php echo $fila2[6]?></p>
				                <h1>Horarios</h1>
				                <p><?php echo $fila2[7]?></p>
				                <section id="nom-fav">
									<figure class="favo">
										<img id="favo" src="iconos/ic_certificado_v3.png">
		                			</figure>
				            		<h1 id='nombServicio'>Certificados:<h1>
	            				</section>
				                <lo>
	  								<li class='certificados'><a href="https://www.google.com/">Servicio 1</a></li>
	  								<li class='certificados'><a href="https://www.google.com/">Servicio 2</a></li>
				                </lo>
			             	 </div>
			              	<div class="mispromociones">
								<?php
								/**
							 	*@Brief Colocara las promociones que el negocio tenga en el momento
							 	*Si se entro como dueño del negocio o invitado mostrara la calificacion promedio
							 	**/
								$i=0;?>
				        		<section id="promo">
					        		<?php for($count=0; $i<mysqli_num_rows($result3)&&$count<3; $i=$i+1, $count++) {?>
						        			<section id="tarjetasServ">
						        				<div id="rojo">¡Promoción!</div>
						        				<div id="desc"><?php echo $fila3[0];?></div>
						        			</section>
					        		<?php }
					        		/**
								 	*@Brief Promociones
								 	*Si tiene menos 3 se llenara de campos blancos para llenar el campo
								 	**/
									if($count<3){
										while ($count<3) {
											echo '<section id="notarjetas">
					        				<div id="norojo"></div>
					        				<div id="nodesc"></div>
					        			</section>';
											$count++;
										}
									}?>
	        					</section>
	        				</div>
			            </div>
					</section>
					<section id="extras">
						<h2>Servicio recomendado</h2>
						<div id="player"></div>
						<div id="mapa"></div>
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
