<?php

include("../Configuration/Configuration.php");
include("../Configuration/functions_php/functionsNewPassword.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Procesar los errores del formulario
    $mensajes = [];
    $validar = true;
    $patronEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";

    /* Validación de campos vacios o formato erróneo */

    $variablesFormEmail = array(trim($_POST['email_recovery']), trim($_POST['email_recovery']));

    if (empty($variablesFormEmail[0])) {
        $validar = false;
        $mensajes[] = 'Campo vacio email';
    } else if (!preg_match($patronEmail, $variablesFormEmail[0])) {
        $validar = false;
        $mensajes[] = 'Formato de email incorrecto';
    }

    if (empty($variablesFormEmail[1])) {
        $validar = false;
        $mensajes[] = 'Campo vacio confirm email';
    } else if (!preg_match($patronEmail, $variablesFormEmail[1])) {
        $validar = false;
        $mensajes[] = 'Formato de email incorrecto';
    }

    /* Si validar es verdadero se procesa el envío del código al correo */
    if ($validar) {
        if ($variablesFormEmail[0] == $variablesFormEmail[1]) {
            if(enviarEmailConfirm($pdo, $variablesFormEmail)){
                // Redirección a partir de un mensaje satisfactorio
                $_SESSION['mensaje'] = 'El correo se envío correctamente. Verifique su bandeja de mensajes.';
                $_SESSION['icono'] = 'success';
                $_SESSION['titulo'] = 'Success';
                header("Location: ../Inicio/Logear.php");
            } else {
                // Redirección a partir de un mensaje erróneo
                $_SESSION['mensaje'] = 'El correo registrado  no existe y/o está inactivo';
                $_SESSION['icono'] = 'error';
                $_SESSION['titulo'] = 'Error';
                header("Location: ../Inicio/recovery_pass.php");
            }
            
        } 
    } else {
        //Correo de recuperación NO EXISTE
        $_SESSION['mensaje'] = 'Los campos no pueden estar vacios.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/recovery_pass.php");
        exit();
    }
}
