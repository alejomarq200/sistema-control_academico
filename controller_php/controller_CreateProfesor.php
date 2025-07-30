<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER PROFESOR</title>
    <link rel="stylesheet" href="../css/alerts.css">
</head>
<?php

session_start();
error_reporting(0);

include("../Configuration/functions_php/functionsCRUDProfesor.php");
include("../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar los datos del formulario
    $mensajes = [];
    /* Patrones para validar campos */
    $patronDni = "/^[V|E][0-9]{7,9}$/";
    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";

    $patronPhone = "/^[0-9]{7,8}$/";

    $validar = true;

    $variablesModalCreateP = array(
        trim($_POST['type_dniP']),
        trim($_POST['cedulaCreateP']),
        trim($_POST['nombreCreateP']),
        trim($_POST['type_tlfnP']),
        trim($_POST['telefonoCreateP']),
        trim($_POST['nivelProfesor'])
    );

    if (empty($variablesModalCreateP[0])) {
        $validar = false;
        $mensajes[] = 'Tipo de dni es obligatorio';
    } else if ($variablesModalCreateP[0] != "V" && $variablesModalCreateP[0] != "E") {
        $validar = false;
        $mensajes[] = 'Formato inválido: Tipd de dni admite solo V o E';
    }
    
    if (empty($variablesModalCreateP[1])) {
        $validar = false;
        $mensajes[] = 'Tipo de dni es obligatorio';
    } else if (!preg_match($patronDni, $variablesModalCreateP[0].$variablesModalCreateP[1])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese de 7 a 8 númericos';
    }

    if (empty($variablesModalCreateP[2])) {
        $validar = false;
        $mensajes[] = 'Cédula es obligatorio';
    } else if (!preg_match($patronName, $variablesModalCreateP[2])) {
        $validar = false;   
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
    }

    if (empty($variablesModalCreateP[3])) {
        $validar = false;
        $mensajes[] = 'Tipo de teléfono es obligatorio';
    }

    if (empty($variablesModalCreateP[4])) {
        $validar = false;
        $mensajes[] = 'Teléfono es obligatorio';
    } else if (!preg_match($patronPhone, $variablesModalCreateP[4])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese 7 números';
    }

    if (empty($variablesModalCreateP[5])) {
        $validar = false;
        $mensajes[] = 'Nivel del profesor es obligatorio';
    } else if ($variablesModalCreateP[5] != "Primaria" && $variablesModalCreateP[5] != "Secundaria") {
        $validar = false;
        $mensajes[] = 'Formato inválido: Seleccione un nivel de profesor correcto';
    }


    if ($validar) {
        insertarProfesor($pdo, $variablesModalCreateP);

    } else {
        /* PENDIENTE: SI VULNERAN JS IMPLEMENTAR MENSAJES CON CSS Y HTML O REDIRECCIONAR */
        foreach ($mensajes as $valores) {
            echo "<br>";
            echo $valores . "<br>";
        }
    }
}
?>