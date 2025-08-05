<?php
include("../Configuration/Configuration.php");

function validar_InicioSesion($pdo, $variablesFormLogin)
{
    // Primero validamos las credenciales
    $stmt = $pdo->prepare("SELECT * FROM users WHERE correo = :correo AND contrasena = :contrasena");
    $stmt->bindValue(':correo', $variablesFormLogin[0]);
    $stmt->bindValue(':contrasena', $variablesFormLogin[1]);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        $_SESSION['mensaje'] = 'Las credenciales no existen. Verifique.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/Logear.php");
        exit();
    }

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar estado del usuario
    if ($result['id_estado'] != 2) {
        $_SESSION['mensaje'] = 'El usuario se encuentra inactivo.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/Logear.php");
        exit();
    }

    // Verificar si ya tiene sesión activa
    $sesionActiva = validarEstadoSesion($pdo, $variablesFormLogin[0]);
    if ($sesionActiva === 'Si') {
        $_SESSION['mensaje'] = 'El usuario tiene una sesión activa en otro dispositivo. Verifique.';
        $_SESSION['icono'] = 'warning';
        $_SESSION['titulo'] = 'Atención';
        header("Location: ../Inicio/Logear.php");
        exit();
    }

    // Si pasa todas las validaciones, permitir inicio de sesión
    if (cambiarEstado($pdo, $variablesFormLogin[0], 'Si')) {
        $_SESSION['id'] = $result['cedula'];
        $_SESSION['nombres'] = $result['nombres'];
        $_SESSION['correo'] = $result['correo'];
        $_SESSION['rol'] = $result['id_rol'];
        $_SESSION['estado'] = $result['id_estado'];
        $_SESSION['mensaje'] = 'Bienvenido: ' . $_SESSION['nombres'];
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Éxito';

        // Redirigir según el rol
        header("Location: ../Desarrollo/dashboard.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'Error al iniciar sesión. Intente nuevamente.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/Logear.php");
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
