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
        'nombre_e' => trim($_POST['nequipo'] ?? ''),
        'dpto_e' => trim($_POST['dptoequipo'] ?? ''),
        'marca_e' => trim($_POST['marcaequipo'] ?? ''),
        'mac_e' => trim($_POST['macequipo'] ?? '')
    ];

    // Validaciones específicas para cada campo
    if (empty($campos['nombre_e'])) {
        $errores[] = "El nombre del equipo es obligatorio";
    } elseif (strlen($campos['nombre_e']) > 100) {
        $errores[] = "El nombre del equipo no puede exceder los 100 caracteres";
    }

    if (empty($campos['dpto_e'])) {
        $errores[] = "El departamento es obligatorio";
    } elseif (strlen($campos['dpto_e']) > 50) {
        $errores[] = "El departamento no puede exceder los 50 caracteres";
    }

    if (empty($campos['marca_e'])) {
        $errores[] = "La marca es obligatoria";
    } elseif (strlen($campos['marca_e']) > 50) {
        $errores[] = "La marca no puede exceder los 50 caracteres";
    }

    if (empty($campos['mac_e'])) {
        $errores[] = "La dirección MAC es obligatoria";
    }

    // Si no hay errores, proceder con la inserción
    if (empty($errores)) {
        // Sanitización final de los datos
        $camposSanitizados = sanitizarDatos($campos);

        try {
            // Inserción en la base de datos
            $stmt = $pdo->prepare('INSERT INTO `dispositivos`(`device_id`, `descripcion`, `fecha_registro`) VALUES ()');

            $stmt->bindValue('nombre_equipo', $camposSanitizados['nombre_e'], PDO::PARAM_STR);
            $stmt->bindValue('dpto_equipo', $camposSanitizados['dpto_e'], PDO::PARAM_STR);
            $stmt->bindValue('marca_equipo', $camposSanitizados['marca_e'], PDO::PARAM_STR);
            $stmt->bindValue('mac_equipo', $camposSanitizados['mac_e'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Éxito en la inserción
                $_SESSION['mensaje'] = "Se registró el dispositivo correctamente";
                $_SESSION['icono'] = "success";
                $_SESSION['titulo'] = "Dispositivo registrado";
                header("Location: ../Desarrollo/dispositivos.php");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al ejecutar la consulta";
                $_SESSION['icono'] = "error";
                $_SESSION['titulo'] = "Error";
                header("Location: ../Desarrollo/dispositivos.php");
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['mensaje'] = "Error en la base de datos: '" . $e->getMessage();
            $_SESSION['icono'] = "error";
            $_SESSION['titulo'] = "Error";
            header("Location: ../Desarrollo/dispositivos.php");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Error en la validación";
        $_SESSION['icono'] = "error";
        $_SESSION['titulo'] = "Error";
        header("Location: ../Desarrollo/dispositivos.php");
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
