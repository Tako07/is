 <?php session_start();		/*Inicia la conexion con la base de datos*/
	$buscar=$_POST['busqueda'];	/*Obtine la cadena de busqueda la previa pantalla (index.php) para su uso en esta*/
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") 	/*Realiza la conexion a la base de datos correspondiente el campo vacio es para la contraseña que se le de a la base de datos*/
	or die("No se pudo conectar: ".mysql_error());	
	if(mysqli_connect_errno()){						/*Comprueba que la conexion se realiza correctamente de no ser así mostrara un mensaje en pantalla*/
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$q="SELECT * FROM vista_negocio WHERE nombre_negocio LIKE'%".$buscar."%' AND etiquetas LIKE'%".$buscar."%';";	/*Realiza la consulta para coincidencías con la base de datos en la tabla de vista de negocio. Las comparaciones se realizan con las columnas de "nombre_negocio" y la de "etiquetas"*/
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
		<?php 
		if(mysqli_num_rows($result)==0){				/*Si el numero de filas en la variable $result es 0 significa que no se encontraron coincidencías por ende se mostrara un mensaje*/
			echo '<h1>No se encontraron resultados</h1>';
		}else{							/*De no ser así todas las filas se mostraran con un ciclo mostrando informacion importante*/
			while($fila=mysqli_fetch_row($result)){
				echo '<h1>'.$fila[0].'<br>'.$fila[1].'<br>'.$fila[2].'<br>'.$fila[4].'<br>'.$fila[5].'<br>'.$fila[8].'<br></h1>';
			}
		}
		?>	
	</body>
</html>	