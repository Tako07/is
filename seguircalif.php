<?php
 	session_start();
	$con=mysqli_connect("localhost" , "root" , "" , "data_service_in") or die("No se pudo conectar: ".mysql_error());
	if(mysqli_connect_errno()){
		printf("Falló la conexión: %s\n",mysqli_connect_errno());
	}
	/*!&lt; Esto es para los acentos*/
	$con->set_charset("utf8");
	/*!&lt; Obtiene el id del que va a calificar IDU y el id al que van a calificar IDN*/
	$IDU=$_POST['Usuario'];
	$IDN=$_POST['Negocio'];
	$q1='select nombre_negocio from vista_negocio where id_negocio='.$IDN.';';
	$result1=mysqli_query ($con,$q1);
	$fila1=mysqli_fetch_row($result1);
	/*!&lt; Segun la variable enviada seguira al negocio o lo calficara*/
	if (isset($_POST['accion'])) {
		/*!&lt; Sigue al negocio*/
		$BAN=$_POST['accion'];
		if($BAN==0){
			$sql='insert into favorito (id_usuario,id_negocio) values('.$IDU.','.$IDN.');';
		}else{
			$sql="delete from vista_favorito where id_usuario=".$IDU." AND id_negocio=".$IDN.";";
		}
	}else{
		/*!&lt; Califica al negocio*/
		if(isset($_POST['calificacion'])) {
			$CALIF=$_POST['calificacion'];
			$q1='select calificacion from vista_calificacion where id_usuario='.$IDU.' and id_negocio='.$IDN.';';
			$result1=mysqli_query ($con,$q1);
			if(mysqli_num_rows($result1)==0){
				$sql='insert into calificacion (id_usuario,id_negocio,calificacion) values('.$IDU.','.$IDN.','.$CALIF.');';
			}else{
				$sql='update calificacion set calificacion='.$CALIF.' where id_usuario='.$IDU.' AND id_negocio='.$IDN.';';
			}
		}
	}
	if($con->query($sql)===TRUE){
		$procedure='CALL avgneg('.$IDN.');';
		$con->query($procedure);
		echo '<form id="Formulario" action="servicio.php?Negocio='.$fila1[0].'" method="post">
				<input type="hidden" name="Usuario" value="'.$IDU.'">
			</form>';
		echo '<script>
				function funciones(){
					document.getElementById("Formulario").submit();
				}
				window.onload=funciones;
		</script>';
	}
?>
