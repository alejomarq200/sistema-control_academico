<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - EDIT ACTIVIDAD</title>
</head>

<?php
session_start();
error_reporting(0);

include("../Layout/mensajes.php");
include("../Configuration/functions_php/functioncsCRUDActividades.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modalActividadEdit = array(
        trim($_POST['idEditA']),
        trim($_POST['nombreGradoEdit']),
        trim($_POST['nombreAsigEdit']),
        trim($_POST['nombreProfesorEdit']),
        trim($_POST['contenidoEdit'])
    );

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
    $patronIdGuia = "/^[0-9]{1,9}$/";

    if (empty($modalActividadEdit[0])) {
        $mensajes[] = "Campo idguia vacio";
        $validar = false;
    } elseif (!preg_match($patronIdGuia, $modalActividadEdit[0])) {
        $mensajes[] = 'Formato inválido: Ingrese solo digitos numéricos';
        $validar = false;
    }

    if (empty($modalActividadEdit[1])) {
        $mensajes[] = "Campo nombre del grado vacio";
        $validar = false;
    }

    if (empty($modalActividadEdit[2])) {
        $mensajes[] = "Campo nombre de la asignatura vacio";
        $validar = false;
    }

    if (empty($modalActividadEdit[3])) {
        $mensajes[] = "Campo nivel del profesor vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $modalActividadEdit[3])) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
        $validar = false;
    }

    if (empty($modalActividadEdit[4])) {
        $mensajes[] = "Campo contenido de la activdad vacio";
        $validar = false;
    }

    if ($validar) {
        if (EditarActividad($pdo, $modalActividadEdit)) {
            $_SESSION['mensaje'] = 'La información de la actividad se editó correctamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_actividad.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'La información no se editó con éxito.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/search_actividad.php");
            exit();
        }
    } else {
        foreach ($mensajes as $key) {
            echo "<br>". $key . "</br>";
        }
    }
}
