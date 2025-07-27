<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER AULA</title>
    <link rel="stylesheet" href="../css/alerts.css">
</head>

<?php
session_start();
//error_reporting(0);
include("../Configuration/functions_php/functionesCRUDAulas.php");
include("../Layout/mensajes.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $variabblesAula = [
        'anioAula' => trim($_POST['anioAula']),
        'nombreAula' => trim($_POST['nombreAula']),
        'capacidadAula' => trim($_POST['capacidadAula']),
        'gradoAula' => trim($_POST['gradoAula'])
    ];

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^.{6,}$/";

    if (empty($variabblesAula['anioAula'])) {
        $mensajes[] = "Campo año del aula vacio";
        $validar = false;
    } 

   if(empty($variabblesAula['nombreAula'])) {
        $mensajes[] = "Campo nombre del aula vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $variabblesAula['nombreAula'])) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
        $validar = false;
    }   

    if(empty($variabblesAula['capacidadAula'])) {
        $mensajes[] = "Campo capacidad del aula vacio";
        $validar = false;
    } elseif (!is_numeric($variabblesAula['capacidadAula'])) {
        $mensajes[] = 'Formato inválido: Ingrese solo números';
        $validar = false;
    }   

    if(empty($variabblesAula['gradoAula'])) {
        $mensajes[] = "Campo grado del aula vacio";
        $validar = false;
    } elseif ($variabblesAula['gradoAula'] == "Seleccionar") {
        $mensajes[] = "Seleccione un campo grado del aula correcto";
        $validar = false;
    }

    if ($validar) {
        if(insertarAula($pdo, $variabblesAula)) {
            $_SESSION['mensaje'] = "Aula registrada correctamente";
            $_SESSION['icono'] = "success";
            $_SESSION['titulo'] = "Aula registrada";
            header("Location: ../Desarrollo/new_aula.php");
            exit();
        }
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
