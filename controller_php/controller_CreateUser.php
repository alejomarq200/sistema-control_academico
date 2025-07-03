<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER</title>
</head>

<?php

session_start();
error_reporting(0);

include("../Configuration/functions_php/functionsCRUDUser.php");
include("../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Procesar los datos del formulario
    $mensajes = [];

    /* Patrones para validar campos */
    $patronDni = "/^[0-9]{7,9}$/";

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";

    $patronEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
    /* 1 dígito, 1 letra minúscula, 1 letra mayúscula, 1 caracter especial entre 6 y 20 */
    $patronPw = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/";

    $patronPhone = "/^[0-9]{7}$/";

    $validar = true;

    $variablesModalCreate = array(
        trim($_POST['type_dni']),
        trim($_POST['cedulaCreate']),
        trim($_POST['nombreCreate']),
        trim($_POST['emailCreate']),
        trim($_POST['contrasenaCreate']),
        trim($_POST['type_tlfn']),
        trim($_POST['telefonoCreate']),
        trim($_POST['rolCreate'])
    );

    if (empty($variablesModalCreate[0])) {
        $validar = false;
        $mensajes[] = 'Tipo de dni es obligatorio';
    }

    if (empty($variablesModalCreate[1])) {
        $validar = false;
        $mensajes[] = 'Cédula es obligatorio';
    } else if (!preg_match($patronDni, $variablesModalCreate[1])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese de 7 a 8 númericos';
    }

    if (empty($variablesModalCreate[2])) {
        $validar = false;
        $mensajes[] = 'Nombre es obligatorio';
    } else if (!preg_match($patronName, $variablesModalCreate[2])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
    }

    if (empty($variablesModalCreate[3])) {
        $validar = false;
        $mensajes[] = 'Email es obligatorio';
    } else if (!preg_match($patronEmail, $variablesModalCreate[3])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese solo letras seguido de @ ej: gmail, hotmail';
    }

    if (empty($variablesModalCreate[4])) {
        $validar = false;
        $mensajes[] = 'Contraseña es obligatoria';
    } else if (!preg_match($patronPw, $variablesModalCreate[4])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese de 8 a 16 digitos con minúsculas, mayúsculas, caracter especiales y números';
    }

    if (empty($variablesModalCreate[5])) {
        $validar = false;
        $mensajes[] = 'Tipo de teléfono es obligatorio';
    }

    if (empty($variablesModalCreate[6])) {
        $validar = false;
        $mensajes[] = 'Teléfono es obligatorio';
    } else if (!preg_match($patronPhone, $variablesModalCreate[6])) {
        $validar = false;
        $mensajes[] = 'Formato inválido: Ingrese 7 números';
    }

    if (empty($variablesModalCreate[7])) {
        $validar = false;
        $mensajes[] = 'Seleccione un tipo de rol';
    } else if ($variablesModalCreate[7] == "Seleccionar") {
        $validar = false;
        $mensajes[] = 'Seleccione un tipo de rol';
    }

    if ($variablesModalCreate[7] == "Administrador") {
        $variablesModalCreate[7] = 1;
    } else if ($variablesModalCreate[7] == "Usuario") {
        $variablesModalCreate[7] = 2;
    }
    if ($validar) {
        insertar_user($pdo, $variablesModalCreate);
    } else {
        /* PENDIENTE: SI VULNERAN JS IMPLEMENTAR MENSAJES CON CSS Y HTML O REDIRECCIONAR */
        foreach ($mensajes as $valores) {
            echo "<br>";
            echo $valores . "<br>";
        }
    }
}
?>