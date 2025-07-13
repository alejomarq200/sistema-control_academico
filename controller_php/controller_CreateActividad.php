<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER ACTIVDAD</title>
</head>

<?php
session_start();
//error_reporting(0);
include("../Configuration/functions_php/functioncsCRUDActividades.php");
include("../Layout/mensajes.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $variablesActividades = array(
        trim($_POST['actividad']), //0
        trim($_POST['asignatura']), //1
        trim($_POST['gradoActividad']), //2
        trim($_POST['tipoContenido']), //3
        trim($_POST['añoEscolar']), //4
        trim($_POST['profesorActividad']), //5
        trim($_POST['tipoContenido']) //6
    );

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/

    if (empty($variablesActividades[0])) {
        $mensajes[] = "Campo actividad vacio";
        $validar = false;
    }

    if (empty($variablesActividades[1]) || $variablesActividades[1] == "Seleccionar") {
        $mensajes[] = "Campo asignatura de la activdad vacio";

        $validar = false;
    }

    if (empty($variablesActividades[2]) || $variablesActividades[2] == "Seleccionar") {
        $mensajes[] = "Campo grado de la activdad vacio";
        $validar = false;
    }

    if (empty($variablesActividades[3])) {
        $mensajes[] = "Campo tipo de contenido de la actividad vacio";
        $validar = false;
    }

    if (empty($variablesActividades[4])) {
        $mensajes[] = "Campo año escolar de la actividad vacio";
        $validar = false;
    }

    if (empty($variablesActividades[5]) || $variablesActividades[5] == "Seleccionar") {
        $mensajes[] = "Campo profesor de de la actividad vacio";
        $validar = false;
    }

    if (empty($variablesActividades[6])) {
        $mensajes[] = "Campo tipo de la actividad vacio";
        $validar = false;
    }

    if ($validar) {
        if (existeActividad($pdo, $variablesActividades)) {
            $_SESSION['mensaje'] = 'La actividad a registrar ya existe en el grado y asignatura seleccionada.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/new_actividad.php");
            exit();
        } else {
            insertarActividad($pdo, $variablesActividades);
        }
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
