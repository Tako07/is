<!DOCTYPE html>
<?php
	$negocio=$_POST['negocio'];
	$calle=$_POST['calle'];
	$colonia=$_POST['colonia'];
	$cp=$_POST['cp'];
	$desc=$_POST['descripcion'];
  $horarios=$_POST['horarios'];
  $idUsr=$_POST['idUsr'];
	$con=mysqli_connect("localhost" , "root" , "Privada" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
  else{
	   $sql="INSERT INTO negocio (nombre_negocio,id_usuario,calle,colonia,codigopostal,descripcion,horarios) VALUES ('".$negocio."', $idUsr ,'".$calle."','".$colonia."','".$cp."','".$desc."','".$horarios."');";
     mysqli_query($con,$sql);
  }


 ?>
<html lang=es dir="ltr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Services in</title>
  <link rel="stylesheet" href="estiloslogin.css">
  <script src="loginregistro.js"></script>
</head>

<body>
  <div id="app">
    <header id="cabecera">
        <figure class="home" onclick="home();">
          <img id="home" src="iconos/ic_home_v3.png">
        </figure>
        <h1 id="texto">Services In</h1>
        <button id="botonesN" onclick="login();">Iniciar Sesion</button>
    </header>
    <section id="seccionc2RN">
      <h1>¡Registro <br> Completado!</h1>
      <figure class="info" onclick="home();">
          <img id="info" src="iconos/ic_info_v3.png">
      </figure>
      <center id="mensaje">
        En Services In. nos preocupamos por la<br>seguridad de nustros usuarios,
        es por esto<br>que antes de que puedas usar la cuenta,<br>pasará por revisión
        antes de que pueda ser<br>utilizado y mostrado al público en general.<br><br>
        ¡Vuelve pronto a revisar el estado de tu<br>cuenta!
      </center>
    </section>
  </div>
  </body>
</html>
