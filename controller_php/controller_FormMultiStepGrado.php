<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER MATERIAS POR GRADO</title>
    <link rel="stylesheet" href="../css/alerts.css">
</head>

<?php
session_start();
include("../Configuration/Configuration.php");
require_once("../Layout/mensajes.php");
require_once("../Configuration/functions_php/functionsCRUDMaterias.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $modalMultiStepGrado = array(
        $_POST['categoriaGrado'],
        $_POST['materiasxGrado'],
        $_POST['nombreGrado']
    );

    $validar = true;
    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/";

    if (empty($modalMultiStepGrado[0])) {
        $mensajes[] = "Campo nivel vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $modalMultiStepGrado[0])) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
        $validar = false;
    }

    if (empty($modalMultiStepGrado[1])) {
        $mensajes[] = "Campo materia vacio";
        $validar = false;
    } elseif ($modalMultiStepGrado[2] == "Seleccionar" || $modalMultiStepGrado[2] == "No asignado") {
        $mensajes[] = "Seleccione una materia correcta";
        $validar = false;
    }

    if (empty($modalMultiStepGrado[2])) {
        $mensajes[] = "Campo grado vacio";
        $validar = false;
    }

    if ($validar) {

         $modalMultiStepGrado[1] = retornarIdMateria($pdo, $modalMultiStepGrado);

         if (!empty($modalMultiStepGrado[1])) {

            if (gestionarMaterias($pdo, $modalMultiStepGrado)) {
                $_SESSION['mensaje'] = 'Asignatura asignada exitosamente.';
                $_SESSION['icono'] = 'success';
                $_SESSION['titulo'] = 'Success';
                header("Location: ../Desarrollo/search_grado.php");
            }
        }

    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }

}
