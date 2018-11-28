<?php 
	session_start();
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	/*Esto es para los acentos*/
	$con->set_charset("utf8");
	$filesize=$_FILES["subir"]["size"];
	$filetmp=$_FILES["subir"]["tmp_name"];
	$filetype=$_FILES["subir"]["type"];
	echo $filetype;
	echo '<form action="perfilNormal.php" id="formulario" method="POST"><input type="hidden" name="idUsuario" value="'.$_SESSION["IDU"].'"></form>';
	if($filetype!="image/jpeg" && $filetype!="image/jpg"){
		echo '<script>
				function funciones(){
					alert("Selecciona una imagen tipo .jpg");
					document.getElementById("formulario").submit();
				}
				window.onload=funciones;
		</script>';
	}else{
		if($filesize > 2597152){
			echo '<script>
					function funciones(){
						alert("La imagen seleccionada es muy grande, selecciona otra");
						document.getElementById("formulario").submit();
					}
					window.onload=funciones;
			</script>';
		}else{
			$sql="SELECT username from vista_usuario where id_usuario=".$_SESSION["IDU"];
			$result=mysqli_query($con,$sql);
			$nombre=mysqli_fetch_row($result);
			$filepath="usuarios/".$nombre[0].".jpg";
			move_uploaded_file($filetmp,$filepath);
			$sql="UPDATE usuario set foto_perfil='".$nombre[0].".jpg' where id_usuario=".$_SESSION["IDU"].";";
			if($con->query($sql)===TRUE){
				echo '<script>
							function funciones(){
								document.getElementById("formulario").submit();
							}
							window.onload=funciones;
					</script>';
			}
		}
	}
?>