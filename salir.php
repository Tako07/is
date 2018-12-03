<?php
session_start();
$_SESSION = array();
SESSION_UNSET();
session_destroy();
header('Location: index.php');
?>
