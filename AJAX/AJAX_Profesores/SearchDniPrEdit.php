<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = ['', '']; // Inicializar array de errores

    // Validar cédula
    if (isset($_POST['cedulaEditP'])) {
        $dniUsuario = trim($_POST['cedulaEditP']);
        try {
            $stmt = $pdo->prepare("SELECT 1 FROM profesores WHERE cedula = ? LIMIT 1");
            $stmt->execute([$dniUsuario]);
            if ($stmt->fetch()) {
                $errores[0] = "La cédula ya está registrada";
            }
        } catch (PDOException $e) {
            $errores[0] = "Error al verificar cédula";
        }
    }

    //Validar telefono
    if (isset($_POST['telefonoEditP'])) {
        $telefono = trim($_POST['telefonoEditP']);
        try {
            $stmt = $pdo->prepare("SELECT 1 FROM profesores WHERE telefono = ? LIMIT 1");
            $stmt->execute([$telefono]);
            if ($stmt->fetch()) {
                $errores[1] = "El teléfono ya está registrado";
            }
        } catch (PDOException $e) {
            $errores[1] = "Error al verificar teléfono";
        }
    }

    echo implode('|||', $errores);
    exit;
}
