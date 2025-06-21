<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - GESTIONAR PROFESORES</title>
    <link rel="stylesheet" href="../css/alerts.css">
</head>

<?php
session_start();
include("../Configuration/Configuration.php");
require_once("../Layout/mensajes.php");
require_once("../Configuration/functions_php/functionsCRUDProfesor.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $modalMultiStepGestionPr = array(
        $_POST['cedulaProfesorG'],
        $_POST['nombreProfesorG'],
        $_POST['nivelProfesorG'],
        $_POST['gradosG'],
        $_POST['materiasG'],
    );

    $validar = true;
    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/";

    $patronDni = "/^[V|E][0-9]{7,9}$/";
    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/";

    $patronPhone = "/^[0-9]{7,8}$/";

    if (empty($modalMultiStepGestionPr[0])) {
        $mensajes[] = "Campo cedula del profesor vacio";
        $validar = false;
    } elseif (!preg_match($patronDni, $modalMultiStepGestionPr[0])) {
        $mensajes[] = "Formato inválido: Admite V o E y un mínimo de 7 dígitos numéricos";
        $validar = false;
    }

    if (empty($modalMultiStepGestionPr[1])) {
        $mensajes[] = "Campo nombre del profesor vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $modalMultiStepGestionPr[1])) {
        $mensajes[] = "Formato inválido: Admite solo letras y espacios";
        $validar = false;
    }

    if (empty($modalMultiStepGestionPr[2])) {
        $mensajes[] = "Campo nivel del grado profesor vacio";
        $validar = false;
    } elseif($modalMultiStepGestionPr[2] != "Primaria" && $modalMultiStepGestionPr[2] != "Secundaria") {
         $mensajes[] = "Formato inválido: Seleccione un nivel del profesor correcto";
        $validar = false;
    }

    if (empty($modalMultiStepGestionPr[3])) {
        $mensajes[] = "Campo grado del profesor vacio";
        $validar = false;
    } 

    if (empty($modalMultiStepGestionPr[4])) {
        $mensajes[] = "Campo materia del profesor vacio";
        $validar = false;
    }

    if ($validar) {
        $modalMultiStepGestionPr[0] = retornarIdProfesor($pdo, $modalMultiStepGestionPr);
        gestionarProfesor($pdo, $modalMultiStepGestionPr);

    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }

}
