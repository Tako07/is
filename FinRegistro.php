<!DOCTYPE html>
<?php
  //Obtención de variables del formulario
	/*!&lt; Contiene nombre de negocio*/
	$negocio=$_POST['negocio'];
	/*!&lt; Calle del negocio*/
	$calle=$_POST['calle'];
	/*!&lt; Colonia del negocio*/
	$colonia=$_POST['colonia'];
	/*!&lt; Código postal del negocio*/
	$cp=$_POST['cp'];
	/*!&lt; Descripción del negocio*/
	$desc=$_POST['descripcion'];
	/*!&lt; Horarios del negocio*/
  $horarios=$_POST['horarios'];
	/*!&lt; id del usuario que dió de alta el negocio*/
  $idUsr=$_POST['idUsr'];
  //Conección con la base de datos
	/*!&lt; Conexión a la base de datos*/
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	/*!&lt; su existe error en la conexión a la base de datos*/
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
  else{
    //inserción del negocio en la BD
		/*!&lt; Sentencia para incertar en la base de datos*/
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
    <div id="app"><!--caja principal del documento html-->
      <header id="cabecera"><!--Caja de barra superior de la página-->
          <figure class="home" onclick="home();">
            <img id="home" src="iconos/ic_home_v3.png">
          </figure>
          <h1 id="texto">Services In</h1>
          <button id="botonesN" onclick="login();">Iniciar Sesion</button>
      </header>
      <section id="seccionc2RN"><!--Sección principal de la tercera´página del registro del negocio-->
        <h1>¡Registro <br> Completado!</h1>
        <figure class="info" onclick="home();">
          <img id="info" src="iconos/ic_info_v3.png">
        </figure>
        <center id="mensaje"><!--Mensaje que se muestra al usuario-->
          En Services In. nos preocupamos por la<br>seguridad de nustros usuarios,
          es por esto<br>que antes de que puedas usar la cuenta,<br>pasará por revisión
          antes de que pueda ser<br>utilizado y mostrado al público en general.<br><br>
          ¡Vuelve pronto a revisar el estado de tu<br>cuenta!
        </center>
      </section>
    </div>
  </body>
</html>
