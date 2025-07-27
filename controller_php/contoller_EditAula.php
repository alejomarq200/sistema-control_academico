<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - EDIT AULA</title>
</head>

<?php
session_start();
//error_reporting(0);
include("../Configuration/Configuration.php");
include("../Layout/mensajes.php");
include("../Configuration/functions_php/functionesCRUDAulas.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modalAulaEdit =
        array(
            trim($_POST['idEditAula']),
            trim($_POST['nombreAula']),
            trim($_POST['capacidadAula']),
            trim($_POST['gradoAula']),
        );

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zÁ-Úá-úñÑ\s]+\s\d+$/u";
    $patronIdGuia = "/^[0-9]{1,9}$/";

    if (empty($modalAulaEdit[0] || !is_numeric($modalAulaEdit[0]))) {
        $mensajes[] = "Campo idguia vacio";
        $validar = false;
    } elseif (!preg_match($patronIdGuia, $modalAulaEdit[0])) {
        $mensajes[] = 'Formato inválido: Ingrese solo digitos numéricos';
        $validar = false;
    }

    if (empty($modalAulaEdit[1])) {
        $mensajes[] = "Campo nombre de la materia vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $modalAulaEdit[1])) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios y un número al final';
        $validar = false;
    }

    if (empty($modalAulaEdit[2] || !is_numeric($modalAulaEdit[2]))) {
        $mensajes[] = "Campo nivel capacidad del aula vacio";
        $validar = false;
    } else if (!preg_match($patronIdGuia, $modalAulaEdit[2])) {
        $mensajes[] = 'Formato inválido: Ingrese solo números';
        $validar = false;
    }

    if (empty($modalAulaEdit[3])) {
        $mensajes[] = "Campo grado del aula vacio";
        $validar = false;
    }

    if ($validar) {
        //retornarIdGrado($pdo, $modalAulaEdit[3]);
        ediltarAulas($pdo, $modalAulaEdit); // La función ya maneja redirección
    }
}
