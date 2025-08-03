<?php
session_start();
include("../Configuration/Configuration.php");

function validar_InicioSesion($pdo, $variablesFormLogin)
{
    $stmt = $pdo->prepare("SELECT * FROM users WHERE correo = :correo AND contrasena = :contrasena");
    $stmt->bindValue(':correo', $variablesFormLogin[0]);
    $stmt->bindValue(':contrasena', $variablesFormLogin[1]);
    $stmt->execute();

    // Verificar si se encontró algún registro
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['id_rol'] == 1 && $result['id_estado'] == 2) {
            $_SESSION['id'] = $result['cedula'];
            $_SESSION['nombres'] = $result['nombres'];
            $_SESSION['correo'] = $result['correo'];
            header("Location: ../Desarrollo/menu.php");
            exit();
        } elseif ($result['id_rol'] == 2 && $result['id_estado'] == 2) {
            echo "BIENVENIDO USUARIO";
            $_SESSION['id'] = $result['cedula'];
            $_SESSION['nombres'] = $result['nombres'];
            $_SESSION['correo'] = $result['correo'];
            header("Location: ../Desarrollo/menu.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'El usuario se encuentra inactivo.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Inicio/Logear.php");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = 'Las credenciales no existen. Verifique.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/Logear.php");
        exit();
    }
}
