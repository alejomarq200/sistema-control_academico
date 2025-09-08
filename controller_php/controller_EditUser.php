<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - EDIT USERS</title>
</head>


<?php
session_start();
include("../Layout/mensajes.php");
include("../Configuration/functions_php/functionsCRUDUser.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $variablesModalEdit = array(
        trim($_POST['cedulaEdit']),
        trim($_POST['nombreEdit']),
        trim($_POST['emailEdit']),
        trim($_POST['telefonoEdit']),
        trim($_POST['contrasenaEdit']),
        trim($_POST['rolEdit']),
        trim($_POST['idguiaEdit']),
 
    );

    if ($variablesModalEdit[5] == "Administrador") {
        $variablesModalEdit[5] = 1;
    } else if ($variablesModalEdit[5] == "Usuario") {
        $variablesModalEdit[5] = 2;
    }

    /* Patrones para validar campos */
    $patronDni = "/^[V|E][0-9]{7,9}$/";
    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/";
    /* Regex formato correo de mínimo 2 dígitos e incluir arroba y punto */
    $patronEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
    /* Formato de número telefónico */
    $patronPhone = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";

    $patronIdGuia = "/^[0-9]{1,9}$/";

    // Procesar los erroes del formulario
    $mensajes = [];
    /* Bandera para validar si hay errores  */
    $validar = true;

    if (empty($variablesModalEdit[0])) {
        $validar = false;
        $mensajes[] = 'Campo vacio cedula';
    } else if (!preg_match($patronDni, $variablesModalEdit[0])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese V o E en mayúsc y luego de 7 a 8 númericos';
    }

    if (empty($variablesModalEdit[1])) {
        $validar = false;
        $mensajes[] = 'Campo vacio nombres';
    } elseif (!preg_match($patronName, $variablesModalEdit[1])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
    }

    if (empty($variablesModalEdit[2])) {
        $validar = false;
        $mensajes[] = 'Campo vacio email';
    } else if (!preg_match($patronEmail, $variablesModalEdit[2])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese solo letras seguido de @ ej: gmail, hotmail';
    }

    if (empty($variablesModalEdit[3])) {
        $validar = false;
        $mensajes[] = 'Campo vacio telefono';
    } else if (!preg_match($patronPhone, $variablesModalEdit[3])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese 0416-0426-0414-0424 ó 0412 y 7 números';
    }

    if (empty($variablesModalEdit[5])) {
        $validar = false;
        $mensajes[] = 'Campo vacio rol';
    }

    if (empty($variablesModalEdit[6])) {
        $validar = false;
        $mensajes[] = 'Campo vacio idguia';
    } else if (!preg_match($patronIdGuia, $variablesModalEdit[6])) {
        $validar = false;
        $mensajes[] = 'Campo vacio idguia';
    }

    if ($validar) {
        editarUsuario($pdo, $variablesModalEdit);
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
