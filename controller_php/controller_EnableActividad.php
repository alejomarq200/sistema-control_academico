<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - ENABLE ACTIVIDAD</title>
</head>
<?php
session_start();
include("../Layout/mensajes.php");
include("../Configuration/functions_php/functioncsCRUDActividades.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idGuia = trim($_POST['idEnableA']);

    // Procesar los erroes del formulario
    $mensajes = [];

    /* Bandera para validar si hay errores  */
    $validar = true;

    /* PATRONES BACKEND */
    $regextIdGuia = "/^[0-9]{1,}$/";

    if (empty($idGuia)) {
        $validar = false;
        $mensajes[] = 'Campo vacio idGuia';
    } elseif (!preg_match($regextIdGuia, $idGuia)) {
        $validar = false;
        $mensajes[] = 'Formato de idGuia inválido';
    }

    if ($validar) {
        if (habilitarActividad($pdo, $idGuia)) {
            $_SESSION['mensaje'] = 'La activdad se habilitó correctamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_actividad.php");

        } else {
            $_SESSION['mensaje'] = 'La acción no se proceso porque la actividad ya está habilitada.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/search_actividad.php");
        }
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
