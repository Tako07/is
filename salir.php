<?php
/*!&lt; Inicia la sesion*/
session_start();
/*!&lt; Borra todas las variables*/
$_SESSION = array();
/*!&lt; Para versiones antiguas borra las variables*/
SESSION_UNSET();
/*!&lt; Destruye completamente la sesion*/
session_destroy();
/*!&lt; Regresa a la pagina index*/
header('Location: index.php');
?>
