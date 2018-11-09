<?php
$nombCat=$_GET['seleccion'];
$idCat;
$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
if(mysqli_connect_errno()){
  printf("Falló la conexión: %s\n",mysqli_connect_errno());
}
$q='SELECT * FROM vista_negocio WHERE nombre_categoria="'.$nombCat.'";';
$result=mysqli_query ($con,$q);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php
    while($row = mysqli_fetch_assoc($result)){
      echo $row['nombre_negocio'];
      echo '<br>';
    }
   ?>
  </body>
</html>
