 <?php session_start();
	$IDU=$_POST['idUsuario'];
	$IDN=$_POST['idNegocio'];
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q="SELECT * FROM usuario WHERE id_usuario=".$IDU.";";
	$result=mysqli_query ($con,$q);
	$q="SELECT * FROM vista_negocio WHERE nombre_negocio='".$IDN."';";
	$result2=mysqli_query ($con,$q);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
	</head>

	<body>
		<?php 
		$fila=mysqli_fetch_row($result);
		echo '<h1>'.$fila[0].'<br>'.$fila[1].'<br>'.$fila[5].'<br>'.$fila[6].'<br></h1>';
		$fila2=mysqli_fetch_row($result2);
		echo '<h1>'.$fila2[0].'<br>'.$fila2[1].'<br>'.$fila2[2].'<br>'.$fila2[5].'<br></h1>';
		?>	
	</body>
</html>