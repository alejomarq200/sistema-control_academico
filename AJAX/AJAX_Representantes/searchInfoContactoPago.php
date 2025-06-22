<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;
    $errores = ['', '']; // Inicializar array de errores (0: cédula, 1: correo)

    // Verificar cédula si existe y no está vacía
    if (!empty($_POST['cedulaContacto'])) {
        $validar = true;
        $cedulaContacto = $_POST['cedulaContacto'];
    }

    if (!empty($_POST['nro_telefonoContacto'])) {
        $validar = true;
        $telefonoContacto = $_POST['nro_telefonoContacto'];
    }

    if ($validar) {
        try {
            // Validar cédula
            if (isset($cedulaContacto)) {
                $stmt = $pdo->prepare("SELECT * FROM contacto_pago WHERE cedula = :cedula");
                $stmt->bindValue(':cedula', $cedulaContacto);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $errores[0] = "Existe un contacto de págo con la misma cédula. Verifique";
                } else {
                    $errores[0] = "";
                }
            }

            if (isset($telefonoContacto)) {
                $stmt = $pdo->prepare("SELECT * FROM contacto_pago WHERE telefono = :telefono");
                $stmt->bindValue(':telefono', $telefonoContacto);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $errores[1] = "El teléfono ya está registrado. Verifique";
                } else {
                    $errores[1] = "";
                }
            }

        } catch (PDOException $e) {
            $errores[0] = "Error al verificar cédula";
            $errores[1] = "Error al verificar telefono";
        }
    }

    // Devolver errores separados por |||
    echo implode('|||', $errores);
    exit;
}