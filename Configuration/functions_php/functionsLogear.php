<?php
include("../Configuration/Configuration.php");

function validar_InicioSesion($pdo, $variablesFormLogin)
{
    // Primero validamos las credenciales
    $stmtHash = $pdo->prepare("SELECT id, contrasena, cedula, nombres, correo, id_estado, id_rol FROM users WHERE correo = :correo");
    $stmtHash->bindValue(':correo', $variablesFormLogin[0]);
    $stmtHash->execute();

    if ($stmtHash->rowCount() > 0) {
        $result = $stmtHash->fetch(PDO::FETCH_ASSOC);
    }

    //Comparamos hash con pwd ingresada
    $hash = password_verify($variablesFormLogin[1], $result['contrasena']);

    //Asignamos unretorno
    $isValid = ($hash) ? 1 : 0;

    //Operamos obre el retorno
    if ($isValid == 1) {

        // Verificar estado del usuario
        if ($result['id_estado'] != 2) {
            header("Location: ../Inicio/Logear.php?ref=inactive");
            exit();
        }

        // Verificar si ya tiene sesión activa
        $sesionActiva = validarEstadoSesion($pdo, $variablesFormLogin[0]);
        if ($sesionActiva === 'Si') {
            header("Location: ../Inicio/Logear.php?ref=active");
            exit();
        }

        // Si pasa todas las validaciones, permitir inicio de sesión
        if (cambiarEstado($pdo, $variablesFormLogin[0], 'Si')) {
            $_SESSION['id'] = $result['cedula'];
            $_SESSION['nombres'] = $result['nombres'];
            $_SESSION['correo'] = $result['correo'];
            $_SESSION['rol'] = $result['id_rol'];
            $_SESSION['estado'] = $result['id_estado'];
            $_SESSION['id_user'] = $result['id'];
            $_SESSION['mensaje'] = 'Bienvenido: ' . $_SESSION['nombres'];
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Éxito';

            // Redirigir según el rol
            header("Location: ../Desarrollo/validar_dispositivoActual.php");
            exit();
        }
    } else {
        header("Location: ../Inicio/Logear.php?ref=undefined");
        exit();
    }
}

function cambiarEstado($pdo, $usuario, $parametro)
{
    try {
        $stmt = $pdo->prepare('UPDATE users SET activo = :activo WHERE correo = :usuario');
        $stmt->bindValue(':activo', $parametro);
        $stmt->bindValue(':usuario', $usuario);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log('Error en cambiarEstado: ' . $e->getMessage());
        return false;
    }
}

function validarEstadoSesion($pdo, $usuario)
{
    try {
        $stmt = $pdo->prepare('SELECT activo FROM users WHERE correo = :usuario');
        $stmt->bindValue(':usuario', $usuario);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado['activo'] : 'No';
    } catch (PDOException $e) {
        error_log('Error en validarEstadoSesion: ' . $e->getMessage());
        return 'No';
    }
}

function cerrarSesion($pdo, $redireccion, $usuario)
{
    $estado = cambiarEstado($pdo, $usuario, 'No');
    if ($estado == true) {
        // Destruye la sesión
        session_destroy();

        // Redirige al usuario a la página de inicio de sesión
        header("Location: " . $redireccion . "");
        exit;
    }
}
