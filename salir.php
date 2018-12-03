<?php
SESSION_UNSET();
session_destroy();
session_start();
$_SESSION['bandera']=2;
header('Location: index.php');
?>
