<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - LOGIN</title>
</head>
<?php
//error_reporting(0);
session_start();
include("../Layout/mensajes.php");
include("../Configuration/Configuration.php");
include("../Configuration/functions_php/functionsLogear.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $variablesFormLogin = array(trim($_POST['email']), trim($_POST['password']));
    // Procesar los erroes del formulario
    $mensajes = [];
    /* Bandera para validar si hay errores  */
    $validar = true;

    if (empty($variablesFormLogin[0])) {
        $validar = false;
        $mensajes[] = 'Campo vacio email';
    }

    if (empty($variablesFormLogin[1])) {
        $validar = false;
        $mensajes[] = 'Campo vacio contraseña';
    }

    if ($validar) {
        validar_InicioSesion($pdo, $variablesFormLogin);
    } else {
        $_SESSION['mensaje'] = 'Los campos no pueden estar vacios. Verifique.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/Logear.php?ref=error");
        exit();
    }
}
