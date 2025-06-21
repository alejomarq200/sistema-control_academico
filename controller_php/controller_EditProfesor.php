<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - EDIT PRFESOR</title>
</head>


<?php
session_start();
include("../Layout/mensajes.php");
include("../Configuration/functions_php/functionsCRUDProfesor.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $variablesModalEditP = 
    array(trim($_POST['cedulaEditP']),
            trim($_POST['nombreEditP']),
            trim($_POST['telefonoEditP']),
            trim($_POST['idguiaEditP']),
                   trim($_POST['nivelEditPr']),
    );

    /* Patrones para validar campos */
                  
    $patronDni = "/^[V|E|J|P][0-9]{7,9}$/";

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/";

    /* Formato de número telefónico */
    $patronPhone = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";

    /* Formato de id válida */
    $patronIdGuia = "/^[0-9]{1,9}$/";

    // Procesar los erroes del formulario
    $mensajes = [];

    /* Bandera para validar si hay errores  */
    $validar = true;

    if (empty($variablesModalEditP[0])) {
        $validar = false;
        $mensajes[] = 'Campo vacio cedula';
    } else if (!preg_match($patronDni,  $variablesModalEditP[0])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese V o E en mayúsc y luego de 7 a 8 númericos';
    }

    if (empty($variablesModalEditP[1])) {
        $validar = false;
        $mensajes[] = 'Campo vacio nombres';
    } elseif (!preg_match($patronName, $variablesModalEditP[1])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
    }

    if (empty($variablesModalEditP[2])) {
        $validar = false;
        $mensajes[] = 'Campo vacio telefono';
    } else if (!preg_match($patronPhone, $variablesModalEditP[2])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese 0416-0426-0414-0424 ó 0412 y 7 números';
    }

    if (empty($variablesModalEditP[3])) {
        $validar = false;
        $mensajes[] = 'Campo vacio idguia';
    } else if (!preg_match($patronIdGuia, $variablesModalEditP[3])) {
        $validar = false;
        $mensajes[] = 'Campo vacio idguia';
    }

    if ($variablesModalEditP[4] != "Primaria" && $variablesModalEditP[4] != "Secundaria") {
        $validar = false;
        $mensajes[] = 'Campo nivel del profesor incorrecto';
    }


    if ($validar) {
        editarProfesor($pdo, $variablesModalEditP);
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
