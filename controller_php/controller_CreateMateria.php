<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER MATERIA</title>
    <link rel="stylesheet" href="../css/alerts.css">
</head>

<?php
session_start();
error_reporting(0);

include("../Configuration/functions_php/functionsCRUDMaterias.php");
include("../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreMateria = trim($_POST['nombreCreateM']);
    $nivelMateria = trim($_POST['nivelCreateM']);

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";

    if (empty($nombreMateria)) {
        $mensajes[] = "Campo nombre de la materia vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $nombreMateria)) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
        $validar = false;
    }

    if(empty($nivelMateria)) {
        $mensajes[] = "Campo nivel de la materia vacio";
        $validar = false;
    } elseif($nivelMateria != "Primaria" && $nivelMateria != "Secundaria") {
        $mensajes[] = "Seleccione un campo nivel del curso correcto";
        $validar = false;
    }

    if ($validar) {
        insertarMateria($pdo, $nombreMateria, $nivelMateria);
      //  gestionarProfesor($pdo, $modalCreateMateria);
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
