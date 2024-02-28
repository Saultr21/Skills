<?php

include_once "config.php";

function usuarioExiste($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuarioPorCorreo($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo, palabra_secreta FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}

function registrarUsuario($correo, $usuario, $palabraSecreta)
{
    // Guardar contraseña en formato seguro
    $palabraSecreta = hashearPalabraSecreta($palabraSecreta);
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("INSERT INTO usuarios(correo, usuario, palabra_secreta) values(?, ? ,?)");
    return $sentencia->execute([$correo, $usuario, $palabraSecreta]);
}

function login($correo, $palabraSecreta)
{
    // Obtener usuario
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($correo);
    if ($posibleUsuarioRegistrado === false) {
        // Si no existe, salimos y regresamos false
        return false;
    }
    # Esto se ejecuta en caso de que exista
    # Comprobar contraseñas
    # Sacar el hash que tenemos en la BD
    $palabraSecretaDeBaseDeDatos = $posibleUsuarioRegistrado->palabra_secreta;
    $coinciden = coincidenPalabrasSecretas($palabraSecreta, $palabraSecretaDeBaseDeDatos);
    # Si no coinciden, salimos de una vez
    if (!$coinciden) {
        return false;
    }

    # En caso de que sí hayan coincidido iniciamos sesión pasando el objeto
    iniciarSesion($posibleUsuarioRegistrado);
    return true;
}

function iniciarSesion($usuario)
{
    // Se encarga de poner los datos dentro de la sesión
    session_start();
    $_SESSION["correo"] = $usuario->correo;
    
}



function coincidenPalabrasSecretas($palabraSecreta, $palabraSecretaDeBaseDeDatos)
{
    return password_verify($palabraSecreta, $palabraSecretaDeBaseDeDatos);
}

function hashearPalabraSecreta($palabraSecreta)
{
    return password_hash($palabraSecreta, PASSWORD_BCRYPT);
}