<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = ['', '']; // Inicializar array de errores

    // Validar cédula
    if (isset($_POST['cedulaCreateP'])) {
        $dniUsuario = trim($_POST['type_dniP']) . trim($_POST['cedulaCreateP']);
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

    if (isset($_POST['telefonoCreateP'])) {
        $telefono = trim($_POST['type_tlfnP']) .trim($_POST['telefonoCreateP']);
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
