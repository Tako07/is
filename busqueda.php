 <?php session_start();
	$buscar=$_POST['busqueda'];
	$con=mysqli_connect("localhost" , "root" , "" , "data_services_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q="SELECT * FROM vista_negocio WHERE nombre_negocio LIKE'%".$buscar."%' AND etiquetas LIKE'%".$buscar."%';";
	$result=mysqli_query ($con,$q);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
		<link rel="stylesheet" href="estiloslogin.css">
		<script src="loginregistro.js"></script>
	</head>
	<body>
		<?php 
		if(mysqli_num_rows($result)==0){
			echo '<h1>No se encontraron resultados</h1>';
		}else{
			while($fila=mysqli_fetch_row($result)){
				echo '<h1>'.$fila[0].'<br>'.$fila[1].'<br>'.$fila[2].'<br>'.$fila[4].'<br>'.$fila[5].'<br>'.$fila[8].'<br></h1>';
			}
		}
		?>	
	</body>
</html>	