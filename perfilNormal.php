 <?php session_start();
	$ID=$_POST['idUsuario'];
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q="SELECT * FROM usuario WHERE id_usuario=".$ID.";";
	$result=mysqli_query ($con,$q);
	if(mysqli_num_rows($result)==0){
		echo '<script>
		function funciones(){
			history.back();
		} 
		window.onload=funciones;
		</script>';
	}else{
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
		while($fila=mysqli_fetch_row($result)){
			echo '<h1>'.$fila[0].'<br>'.$fila[1].'<br>'.$fila[5].'<br>'.$fila[6].'<br></h1>';
		}
		?>	
	</body>
</html>
<?php } ?>