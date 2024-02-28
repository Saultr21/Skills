<?php
# Nota: no estamos haciendo validaciones
$correo = $_POST["correo"];

$palabra_secreta = $_POST["palabra_secreta"];

# Luego de haber obtenido los valores, ya podemos comprobar
# Incluimos a las funciones, mira funciones.php
include_once "funciones.php";
$logueadoConExito = login($correo, $palabra_secreta);
if ($logueadoConExito) {
    # Redirigir 
    header("Location: inicio.php");
    # Y salir
    exit;
} else {
    # Si no, entonces indicarlo
    echo "Usuario o contraseña incorrecta";
}