<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - EDIT MATERIA</title>
</head>

<?php
session_start();
error_reporting(0);

include("../Layout/mensajes.php");
include("../Configuration/functions_php/functionsCRUDMaterias.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modalMateriaEdit = 
    array(trim($_POST['idEditM']),
    trim($_POST['nombreEditM']),
    trim($_POST['nivelEditM']));

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zÑñÁÉÍÓÚÜáéíóúü\s\.,'-]+$/";
    $patronIdGuia = "/^[0-9]{1,9}$/";
    
    if (empty($modalMateriaEdit[0])) {
        $mensajes[] = "Campo idguia vacio";
        $validar = false;
    } elseif (!preg_match($patronIdGuia, $modalMateriaEdit[0])) {
        $mensajes[] = 'Formato inválido: Ingrese solo digitos numéricos';
        $validar = false;
    }

    if (empty($modalMateriaEdit[1])) {
        $mensajes[] = "Campo nombre de la materia vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $modalMateriaEdit[1])) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
        $validar = false;
    }

    
    if (empty($modalMateriaEdit[2])) {
        $mensajes[] = "Campo nivel  de la materia vacio";
        $validar = false;
    } 
    
    if ($validar) {
        editarMaterias($pdo, $modalMateriaEdit); // La función ya maneja redirección
    } else {
        
    }
}
