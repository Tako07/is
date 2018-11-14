 <?php session_start();		/*Inicia la conexion con la base de datos*/
	$categoria=$_GET['categoria'];	
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") 	/*Realiza la conexion a la base de datos correspondiente el campo vacio es para la contraseña que se le de a la base de datos*/
	or die("No se pudo conectar: ".mysql_error());	
	if(mysqli_connect_errno()){						/*Comprueba que la conexion se realiza correctamente de no ser así mostrara un mensaje en pantalla*/
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q='select n.nombre_negocio, i.url_imagen from categoria c inner join negocio n on c.id_categoria=n.id_categoria inner join imagenes i on n.id_negocio=i.id_negocio where c.nombre_categoria='.$categoria.' group by n.id_negocio;';
	$result=mysqli_query ($con,$q);				/*Se realiza la busqueda de la consulta anterior y se obtienen toda la informacion de los negocios que tengan coincidencias y se guardan  en la variable $result*/
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
	</head>
	<body>
	</body>
</html>	