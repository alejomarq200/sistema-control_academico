<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - VALIDAR GRADO</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grado = $_POST['gradoCalificacion'];
    if ($grado < 7) {
        header("Location: ../Desarrollo/calificacion_p.php?ref=$grado");
    } else if ($grado >= 7 && $grado <= 11) {
        header("Location: ../Desarrollo/search_calificacion_1.php?ref=$grado");
    }
}
