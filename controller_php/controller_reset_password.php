<?php
session_start();
include("../Configuration/Configuration.php");
include("../Configuration/functions_php/functionsCRUDUser.php");
//valid_sesion($_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $variablesFormRecovery = array(trim($_POST['password']), trim($_POST['password_confirm']), $_SESSION['id']);

    // Procesar los errores del formulario
    $mensajes = [];
    $validar = true;
    $patronContraseña = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/";

    /* Validación de campos vacios o formato erróneo */
    if (empty($variablesFormRecovery[0])) {
        $validar = false;
        $mensajes[] = 'Campo vacio contraseña';
    } else if (!preg_match($patronContraseña, $variablesFormRecovery[0])) {
        $validar = false;
        $mensajes[] = 'Formato de contraseña incorrecto';
    }

    if (empty($variablesFormRecovery[1])) {
        $validar = false;
        $mensajes[] = 'Campo vacio confirmar contraseña';
    } else if (!preg_match($patronContraseña, $variablesFormRecovery[1])) {
        $validar = false;
        $mensajes[] = 'Formato de contraseña incorrecto';
    }

    /* Si validar es verdadero se procesa el envío del código al correo */
    if ($validar) {
        if ($variablesFormRecovery[0] === $variablesFormRecovery[1]) {
            recoveryPass($pdo, $variablesFormRecovery);
        }
    } else {
        for ($i = 0; $i < count($mensajes); $i++) {
            echo "<br>" . $mensajes . "<br>";
        }
    }
}
