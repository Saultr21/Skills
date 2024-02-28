
<?php 
session_start();
// Destruimos las sesiones
session_destroy();
header('Location: inicio.php');
die();