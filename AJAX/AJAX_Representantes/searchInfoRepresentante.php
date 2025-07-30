<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;
    $errores = ['', '', '']; // Inicializar array de errores

    // Verificar cédula si existe y no está vacía
    if (!empty($_POST['cedula'])) {
        $validar = true;
        $dniRepresentante = $_POST['cedula'];
    }

    // Verificar correo si existe y no está vacío
    if (!empty($_POST['correo'])) {
        $validar = true;
        $correoRepresentante = $_POST['correo'];
    }

    if (!empty($_POST['nro_telefono'])) {
        $validar = true;
        $telefonoRepresentante = $_POST['nro_telefono'];
    }

    if ($validar) {
        try {
            // Validar cédula
            if (isset($dniRepresentante)) {
                $stmt = $pdo->prepare("SELECT * FROM representantes WHERE cedula = :cedula");
                $stmt->bindValue(':cedula', $dniRepresentante);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $errores[0] = "Existe un representante con la misma cédula. Verifique";
                } else {
                    $errores[0] = "";
                }
            }

            // Validar correo
            if (isset($correoRepresentante)) {
                $stmt = $pdo->prepare("SELECT * FROM representantes WHERE correo = :correo");
                $stmt->bindValue(':correo', $correoRepresentante);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $errores[1] = "El email ya está registrado. Verifique";
                } else {
                    $errores[1] = "";
                }
            }

            if (isset($telefonoRepresentante)) {
                $stmt = $pdo->prepare("SELECT * FROM representantes WHERE nro_telefono = :nro_telefono");
                $stmt->bindValue(':nro_telefono', $telefonoRepresentante);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $errores[2] = "El teléfono ya está registrado. Verifique";
                } else {
                    $errores[2] = "";
                }
            }

        } catch (PDOException $e) {
            $errores[0] = "Error al verificar cédula";
            $errores[1] = "Error al verificar email";
            $errores[2] = "Error al verificar telefono";
        }
    }

    // Devolver errores separados por |||
    echo implode('|||', $errores);
    exit;
}