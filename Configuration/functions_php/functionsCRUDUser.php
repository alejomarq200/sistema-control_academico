<?php
include("../Configuration/Configuration.php");

function consultarUsuariosCRUD($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();

        // Obtener todos los registros
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro
        if (count($usuarios) > 0) {
            return $usuarios; // Devuelve todos los usuarios
        } else {
            return []; // Devuelve un array vacío si no hay registros
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

/* FUNCIÓN DE INSERTAR USUARIOS */
function insertar_user($pdo, $variablesModalCreate)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO users (cedula, nombres, correo, telefono, contrasena , id_rol, id_estado) VALUES (:cedula, :nombres, :correo, :telefono, :contrasena, :id_rol, :id_estado)");
        $stmt->bindValue('cedula', $variablesModalCreate[0] . $variablesModalCreate[1]);
        $stmt->bindValue('nombres', $variablesModalCreate[2]);
        $stmt->bindValue('correo', $variablesModalCreate[3]);
        $stmt->bindValue('telefono', $variablesModalCreate[5] . $variablesModalCreate[6]);
        $stmt->bindValue('contrasena', $variablesModalCreate[4]);
        $stmt->bindValue('id_rol', $variablesModalCreate[7]);
        $stmt->bindValue('id_estado', 2);


        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            /* INSERCIÓN DE MANERA CORRECTA */
            $_SESSION['mensaje'] = 'Usuario registrado exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_user.php");
            exit();
        } else {
            /* INSERCIÓN DE MANERA INCORRECTA */
            $_SESSION['mensaje'] = 'El registro no se completó. Verifique la información suministrada.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/search_user.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function editarUsuario($pdo, $variablesModalEdit)
{
    try {

        $stmt = $pdo->prepare("UPDATE users SET cedula=:cedula, nombres=:nombres, correo=:correo, telefono=:telefono, contrasena=:contrasena, id_rol=:id_rol WHERE id=:id");

        $stmt->bindValue(':cedula', $variablesModalEdit[0]);
        $stmt->bindValue(':nombres', $variablesModalEdit[1]);
        $stmt->bindValue(':correo', $variablesModalEdit[2]);
        $stmt->bindValue(':telefono', $variablesModalEdit[3]);
        $stmt->bindValue(':contrasena', $variablesModalEdit[4]);
        $stmt->bindValue(':id_rol', $variablesModalEdit[5]);
        $stmt->bindValue(':id', $variablesModalEdit[6]);
        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = 'La información del usuario se modificó correctamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_user.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'La acción no se procesó porque no se notaron cambios en los campos. Verifique.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/search_user.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function inhabilitarUsuario($pdo, $idGuia)
{
    $stmt = $pdo->prepare("UPDATE users SET id_estado=:id_estado WHERE id=:id");
    $stmt->bindValue(':id_estado', 1);
    $stmt->bindValue(':id', $idGuia);
    $stmt->execute();

    // Verificar si se encontró algún registro
    if ($stmt->rowCount() > 0) {
        $_SESSION['mensaje'] = 'El usuario se inhabilitó correctamente.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';
        header("Location: ../Desarrollo/search_user.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La acción no se proceso porque el usuario ya estaba inhhabilitado.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_user.php");
        exit();
    }
}

function habilitarUsuario($pdo, $idGuia)
{
    $stmt = $pdo->prepare("UPDATE users SET id_estado=:id_estado WHERE id=:id");
    $stmt->bindValue(':id_estado', 2);
    $stmt->bindValue(':id', $idGuia);
    $stmt->execute();

    // Verificar si se encontró algún registro
    if ($stmt->rowCount() > 0) {
        $_SESSION['mensaje'] = 'El usuario se habulitó correctamente.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';
        header("Location: ../Desarrollo/search_user.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La acción no se proceso porque el usuario ya estaba habilitado.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_user.php");
        exit();
    }
}

/* FUNCIONES DE REPORTES */
function reporteUsuarios($pdo, $estado, $rol)
{
    try {
        $stmt = $pdo->prepare("SELECT cedula, nombres, correo, telefono, contrasena, id_rol, id_estado 
        FROM users WHERE id_estado = :estado AND id_rol = :rol");
        
        $stmt->bindValue(':estado', $estado, PDO::PARAM_INT);
        $stmt->bindValue(':rol', $rol, PDO::PARAM_INT);
        $stmt->execute();

        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios ?: []; // Devuelve usuarios o array vacío
        
    } catch (PDOException $e) {
        // Mejor práctica: Loguear el error y/o lanzar excepción
        error_log("Error en reporteUsuarios: " . $e->getMessage());
        return [];
    }
}