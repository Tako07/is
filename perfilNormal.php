<?php session_start();
	$ID=$_POST['idUsuario'];
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
	/**
 	*@Brief Informacion de usuario
 	*Obtiene toda la informacion basica del usuario
 	**/
	$q="SELECT * FROM usuario WHERE id_usuario=".$ID.";";
	$result=mysqli_query ($con,$q);
	$fila=mysqli_fetch_row($result);
	/**
 	*@Brief Si no existe 
 	*Se regresara al usuario a la pagina anterior si no existe en la base de datos
 	**/
	if(mysqli_num_rows($result)==0){
		echo '<script>
		function funciones(){
			history.back();
		} 
		window.onload=funciones;
		</script>';
	}else{
	/**
 	*@Brief Nombre e imagen
 	*Obtiene el nombre de negocio y la imagen del mismo de los negocios que sigue el usuario
 	**/
 	$_SESSION['IDU']=$ID;
	$q2='select n.nombre_negocio, i.url_imagen from favorito f inner join negocio n ON f.id_negocio=n.id_negocio inner join imagenes i on n.id_negocio=i.id_negocio where f.id_usuario='.$ID.' group by f.id_negocio;';
	$result2=mysqli_query($con,$q2);
	/**
 	*@Brief Descripcion y nombre
 	*Obtiene la descripcion y el nombre de negocio de todas las promociones de los negocios que sigue el usuario
 	**/
	$q3='select n.nombre_negocio, p.descripcion from favorito f inner join negocio n ON f.id_negocio=n.id_negocio inner join vista_promocion p on n.id_negocio=p.id_negocio where f.id_usuario='.$ID.';';
	$result3=mysqli_query($con,$q3);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<link rel="stylesheet" href="estilos.css">
		<script src="botonHamb1.js"></script>
		<script src="loginregistro.js"></script>
	</head>
	<body>
		<div id="app">
			<header id="cabecera">
				<button name="bbanner" id="hamburguesa" onclick="cambiarid(3);"></button>
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
								<?php
								/**
							 	*@Brief Negocios con mejor calificacion
							 	*Obtendra los 5 negocios con mayor calificacion y los mostrara
							 	**/
								$q='select nombre_negocio from negocio order by calificacion limit 5;';
								$result4=mysqli_query ($conexion,$q);
								$j=0;
								while ($row=mysqli_fetch_assoc($result4)) {
									$resultado4[$j]['nombre']=$row['nombre_negocio'];
									$j++;
								}
								for($j=0; $j<mysqli_num_rows($result4);$j++){
									echo '<li><a href="servicio.php?Negocio='.$resultado4[$j]['nombre'].'">'.$resultado4[$j]['nombre'].'</a></li>';
								}
								?>
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
						<a href="https://www.trivago.com"><img id="publicidad2" src="iconos/publicidad1.jpg"></a>
					</figure>
				</div>
				<section id="centro2">
		       		<H2>Perfil</H2>
		        	<div class="perfil">
		        		<figure class="iPerfil">
							<img id="iPerfil" src="iconos/ic_profile_v3.png">
						</figure>
						<form class="subirImg" id="subirimg" action="subirImg.php" method="post" enctype="multipart/form-data">
							<label id="label">
								<div id="bsubir">Subir imagen</div>
								<input style="position: absolute; display:none;" role="button" type="file" name="subir" title="Subir imagen" onchange="guardaImg();">
								<figure class="camara">
									<img id="camara" src="iconos/ic_camara.png">
								</figure>
							</label>
						</form>
						<h2 id="datosNegrita">Datos del usuario</h2>
						<div id="datosUser">
							<p id="datos">Nombre: <?php echo $fila[2].' '.$fila[3]?></p>
							<p id="datos">Username: <?php echo $fila[1]?></p>
							<p id="datos">Correo: <?php echo $fila[5]?></p>
						</div>
		        	</div>
		        	<H2>Mís favoritos</H2>
		        	<div class="favoritos">
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
								<section class="fav">
									<?php 
									/**
								 	*@Brief Numero de tarjetas por fila
								 	*Coloca hasta 4 tarjetas de informacion por fila si no se completan los 4 se llenara de tarjetas vacias
								 	**/
									for($count=0; $i <mysqli_num_rows($result2)&&$count<4; $i=$i+1,$count++) {?>
										<section id="tarjeta">
											<figure class="negocios">
												<?php echo '<img id="negocios" src="negocios/'.$resultado[$i]['url'].'">';?>
											</figure>
											<div id="nombre">
												<?php echo '<p>'.$resultado[$i]['nombre'].'</p>'; ?>
											</div>
											<button id="botones" onclick="usuario(<?php echo'\'servicio.php?Negocio='.$resultado[$i]["nombre"].'\','.$fila[0]?>);">Ver servicio</button>
										</section>
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
		        	<br>
		        	<H2>Promociones de mis favoritos</H2>
		        	<div class="mispromociones">
		        		<?php if(mysqli_num_rows($result3)>0){ 
		        			$j=0;
			        		while ($row=mysqli_fetch_assoc($result3)) {
								$resultado[$j]['nombre']=utf8_encode($row['nombre_negocio']);
								$resultado[$j]['desc']=utf8_encode($row['descripcion']);
								$j++;
							}
							/**
						 	*@Brief Numero de filas de promociones
						 	*Obtiene el numero de filas que se necesitara para mostrar todas las promociones disponibles para el
						 	**/
							$nfilas=mysqli_num_rows($result3);
							if(($nfilas/5)<1){
								$nfilas=1;
							}else{
								if($nfilas%5!=0){
									$nfilas/=5;
									$nfilas=intval($nfilas);
									$nfilas+=1;	
								}else{
									$nfilas/=5;
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
			        		<section id="promo">
				        		<?php 
				        			/**
								 	*@Brief Numero de tarjetas por fila
								 	*Coloca hasta 5 tarjetas de informacion por fila si no se completan los 5 se llenara de tarjetas vacias
								 	**/
								 	for ($count=0; $i<mysqli_num_rows($result3)&&$count<5; $i=$i+1, $count++) {?>	
					        			<section id="tarjetas" onclick="usuario(<?php echo'\'servicio.php?Negocio='.$resultado[$i]["nombre"].'\','.$fila[0]?>);">
					        				<div id="rojo">¡Promoción!</div>
					        				<div id="desc"><?php echo $resultado[$i]['desc'];?></div>
					        			</section>
				        		<?php }
									if($count<5){
										while ($count<5) {
											echo '<section id="notarjetas">
					        				<div id="norojo"></div>
					        				<div id="nodesc"></div>
					        			</section>';
											$count++;
											$j++;
										}
									}
								}?>
		        			</section>
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
<?php } ?>