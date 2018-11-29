<?php
session_start();
SESSION_UNSET();
session_destroy();
$_SESSION['bandera']=2;
header('Location: index.php');
?>
