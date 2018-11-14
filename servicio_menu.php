 <?php session_start();
	$categoria=$_GET['categoria'];	
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in");
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	$con->set_charset("utf8");
	$q='select n.nombre_negocio, i.url_imagen from categoria c inner join negocio n on c.id_categoria=n.id_categoria inner join imagenes i on n.id_negocio=i.id_negocio where c.nombre_categoria=\''.$categoria.'\' group by n.id_negocio;';
	$result=mysqli_query($con,$q);				/*Se realiza la busqueda de la consulta anterior y se obtienen toda la informacion de los negocios que tengan coincidencias y se guardan  en la variable $result*/
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Services In</title>
	</head>
	<body>
		<?php 
		if(mysqli_num_rows($result)==0){				/*Si el numero de filas en la variable $result es 0 significa que no se encontraron coincidencías por ende se mostrara un mensaje*/
			echo '<h1>No se encontraron resultados</h1>';
		}else{
			$j=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$resultado[$j]['nombre']=utf8_encode($row['nombre_negocio']);
				$resultado[$j]['url']=utf8_encode($row['url_imagen']);
				$j++;
			}
		}
		for($j=0; $j <mysqli_num_rows($result);$j++) {
			echo $resultado[$j]['nombre'];
			echo '<br>';
			echo $resultado[$j]['url'];
		}
		?>
	</body>
</html>	