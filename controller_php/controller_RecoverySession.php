<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../Configuration/Configuration.php");
include("../Layout/mensajes.php");

// Validar método
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Array para almacenar errores
    $errores = [];

    // Obtención y sanitización básica de datos
    $campos = [
        'email' => trim($_POST['email_recovery_session'] ?? ''),
        'pwd' => trim($_POST['pwd_recovery_session'] ?? ''),
    ];

    // Validaciones específicas para cada campo
    if (empty($campos['email'])) {
        $errores[] = "El email es obligatorio";
    } elseif (strlen($campos['email']) > 100) {
        $errores[] = "El nombre del equipo no puede exceder los 100 caracteres";
    }

    if (empty($campos['pwd'])) {
        $errores[] = "La contraseña es obligatoria";
    } elseif (strlen($campos['pwd']) > 50) {
        $errores[] = "El departamento no puede exceder los 50 caracteres";
    }

    // Si no hay errores, proceder con la inserción
    if (empty($errores)) {
        // Sanitización final de los datos
        $camposSanitizados = sanitizarDatos($campos);

        try {
            // Inserción en la base de datos
            $stmt = $pdo->prepare('UPDATE users SET activo = :activo WHERE correo = :correo');
            $stmt->bindValue(':activo', 'No', pdo::PARAM_STR);
            $stmt->bindValue(':correo', $campos['email'], pdo::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Éxito en la inserción
                header("Location: ../Inicio/Logear.php?ref=session_success");
                exit();
            } else {
                header("Location: ../Inicio/Logear.php?ref=session_error");
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['mensaje'] = "Error en la base de datos: '" . $e->getMessage();
            $_SESSION['icono'] = "error";
            $_SESSION['titulo'] = "Error";
            header("Location: ../Inicio/Logear.php");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Error en la validación";
        $_SESSION['icono'] = "error";
        $_SESSION['titulo'] = "Error";
        header("Location: ../Inicio/Logear.php");
        exit();
    }
}

/**
 * Función para sanitizar datos
 */
function sanitizarDatos($datos)
{
    $sanitizados = [];

    foreach ($datos as $clave => $valor) {
        // Eliminar etiquetas HTML y PHP
        $valor = strip_tags($valor);

        // Eliminar espacios en blanco al inicio y final
        $valor = trim($valor);

        // Escapar caracteres especiales para HTML (para prevenir XSS si se muestran después)
        $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');

        $sanitizados[$clave] = $valor;
    }

    return $sanitizados;
}
