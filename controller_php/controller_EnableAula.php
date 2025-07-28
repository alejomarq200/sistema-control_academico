<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - ENABLE AULAS</title>
</head>
<?php
session_start();
include("../Configuration/Configuration.php");
include("../Layout/mensajes.php");
include("../Configuration/functions_php/functionesCRUDAulas.php");
include("../Configuration/Configuration.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idGuia = trim($_POST['idEnableAula']);

    // Procesar los erroes del formulario
    $mensajes = [];

    /* Bandera para validar si hay errores  */
    $validar = true;

    /* PATRONES BACKEND */
    $regextIdGuia = "/^[0-9]{1,}$/";

    if (empty($idGuia)) {
        $validar = false;
        $mensajes[] = 'Campo vacio idGuia';
    } elseif (!preg_match($regextIdGuia,  $idGuia)) {
        $validar = false;
        $mensajes[] = 'Formato de idGuia inválido';
    }

    if ($validar) {
        HabilitarAulas($pdo, $idGuia);
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
