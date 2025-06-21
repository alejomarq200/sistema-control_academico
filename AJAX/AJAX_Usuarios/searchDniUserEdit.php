<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = ['', '', '']; // Inicializar array de errores
    $resultado = "";
    // Validar cédula
    if (isset($_POST['cedulaEdit'])) {
        $dniUsuario = trim($_POST['cedulaEdit']);
        try {
            $stmt = $pdo->prepare("SELECT 1 FROM users WHERE cedula = ? LIMIT 1");
            $stmt->execute([$dniUsuario]);
            if ($stmt->fetch()) {
                $errores[0] = "La cédula ya está registrada";
            }
        } catch (PDOException $e) {
            $errores[0] = "Error al verificar cédula";
        }
    }


    // Validar email
     
     if(isset($_POST['emailEdit'])) {
        $email = trim($_POST['emailEdit']);
        try {
            $stmt = $pdo->prepare("SELECT 1 FROM users WHERE correo = ? LIMIT 1");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errores[1] = "El email ya está registrado";
            }
        } catch (PDOException $e) {
            $errores[1] = "Error al verificar email";
        }
     }

     if(isset($_POST['telefonoEdit'])) {
        $telefono = trim($_POST['telefonoEdit']);
        try {
            $stmt = $pdo->prepare("SELECT 1 FROM users WHERE telefono = ? LIMIT 1");
            $stmt->execute([$telefono]);
            if ($stmt->fetch()) {
                $errores[2] = "El teléfono ya está registrado";
            }
        } catch (PDOException $e) {
            $errores[2] = "Error al verificar teléfono";
        }
     }

    echo implode('|||', $errores);
    exit;
}
