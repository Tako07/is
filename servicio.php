 <?php
 	session_start();
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	/*Esto es para los acentos*/
	$con->set_charset("utf8");
	if(isset($_POST['idNegocio'])){
		$IDN=$_POST['idNegocio'];
		$NN=$_GET['Negocio'];
		$q="SELECT * FROM usuario WHERE id_usuario=".$IDN.";";
		$result=mysqli_query ($con,$q);
		$fila=mysqli_fetch_row($result);
		$q='SELECT * FROM negocio n inner join usuario u on n.id_usuario=u.id_usuario WHERE nombre_negocio=\''.$NN.'\';';
		$result2=mysqli_query ($con,$q);
		$fila2=mysqli_fetch_row($result2);
		$q1="SELECT descripcion FROM vista_promocion WHERE id_negocio='".$fila2[0]."';";
		$result3=mysqli_query ($con,$q1);
		$fila3=mysqli_fetch_row($result3);
		$bandera=1;
	}else{
		if(isset($_POST['Usuario'])){
			$IDU=$_POST['Usuario'];
			$NN=$_GET['Negocio'];
			$q='SELECT * FROM negocio n inner join usuario u on n.id_usuario=u.id_usuario WHERE nombre_negocio=\''.$NN.'\';';
			$result2=mysqli_query ($con,$q);
			$fila2=mysqli_fetch_row($result2);
			$q1="SELECT descripcion FROM vista_promocion WHERE id_negocio='".$fila2[0]."';";
			$result3=mysqli_query ($con,$q1);
			$fila3=mysqli_fetch_row($result3);
			$q2='select id_favorito from favorito where id_usuario='.$IDU.' AND id_negocio='.$fila2[0].';';
			$result4=mysqli_query ($con,$q2);
			if(mysqli_num_rows($result4)==0){
				$siguiendo=0;
			}else{
				$siguiendo=1;
			}
			$bandera=3;
		}else{
			if (isset($_GET['Negocio'])) {
			$NN=$_GET['Negocio'];
			$q='SELECT * FROM negocio n inner join usuario u on n.id_usuario=u.id_usuario WHERE nombre_negocio=\''.$NN.'\';';
			$result2=mysqli_query ($con,$q);
			$fila2=mysqli_fetch_row($result2);
			$q1="SELECT descripcion FROM vista_promocion WHERE id_negocio='".$fila2[0]."';";
			$result3=mysqli_query ($con,$q1);
			$fila3=mysqli_fetch_row($result3);
			$bandera=2;
			}else{
				$bandera=0;
			}
		}
	}
	if($bandera>0){
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
		<script src="reproductor.js"></script>
		<script src="mapa.js"></script>
		<script src="loginregistro.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx0lps41wdrYFh7wh6BscIvCc_nIRkgRw&callback=initMap" async defer>
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
								<a href="categorias.php/">Ver mas...</a>
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
			              	<div id="img-info">
				              	<figure id='imagenN'>
				                	<img id='imgnegocio' src="negocios/carpinteria_jose.jpg">
				             	</figure>
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
		                			if($bandera==3){
		                				echo '<figure class="favo" onclick="seguir('.$siguiendo.','.$IDU.','.$fila2[0].');">';
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
				            <br>
				            <div id='descHorario'>
		              			<h1>Descripción del servicio:</h1>
		                        <p><?php echo $fila2[6]?></p>
			                	<br>
				                <h1>Horarios</h1>
				                <p><?php echo $fila2[7]?></p>
				                <br>
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
								$i=0;?>
				        		<section id="promo">
					        		<?php for($count=0; $i<mysqli_num_rows($result3)&&$count<3; $i=$i+1, $count++) {?>	
						        			<section id="tarjetasServ">
						        				<div id="rojo">¡Promoción!</div>
						        				<div id="desc"><?php echo $fila3[0];?></div>
						        			</section>
					        		<?php }
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
