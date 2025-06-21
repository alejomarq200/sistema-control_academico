<?php
include("../Configuration/Configuration.php");

function consultarMateriasCRUD($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM materias");
        $stmt->execute();

        // Obtener todos los registros
        $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro
        if (count($materias) > 0) {
            return $materias; // Devuelve todos los usuarios
        } else {
            return []; // Devuelve un array vacío si no hay registros
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function insertarMateria($pdo, $nombreMateria, $nivelMateria)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO materias (nombre,nivel_materia,id_estado) VALUES (:nombre, :nivel_materia,:id_estado)");
        $stmt->bindValue('nombre',  $nombreMateria);
        $stmt->bindValue('nivel_materia',  $nivelMateria);
        $stmt->bindValue('id_estado', 2);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            //Cédula EXISTE
            $_SESSION['mensaje'] = 'Asignatura registrada exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_materia.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function editarMaterias($pdo, $modalMateriaEdit) {
    try {
        $stmt = $pdo->prepare("UPDATE materias SET nombre = :nombre, nivel_materia = :nivel_materia WHERE id_materia = :id_materia");
        $stmt->bindValue(':nombre', $modalMateriaEdit[1]);
        $stmt->bindValue(':id_materia', $modalMateriaEdit[0]);
        $stmt->bindValue(':nivel_materia', $modalMateriaEdit[2]);

        
        $stmt->execute();
        
        if ($stmt) {
            $_SESSION['mensaje'] = 'La información de la asignatura se editó correctamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_materia.php");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Error en editarMaterias: " . $e->getMessage());
        $_SESSION['mensaje'] = 'Error al editar la materia.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_materia.php");
        exit();
    }
}

function retornarIdMateria($pdo, array $arreglo) {
    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id_materia FROM materias WHERE nombre = :nombre");
        $stmt->bindValue(':nombre', $arreglo[1]);
        $stmt->execute();

        // Obtenemos el resultado (solo la columna id_materia)
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si hay resultados, devolvemos el id_materia, sino null
        return $resultado ? $resultado['id_materia'] : null;
        
    } catch (PDOException $e) {
        // Manejo de errores (puedes personalizarlo)
        error_log("Error en retornarIdMateria: " . $e->getMessage());
        return null;
    }
}

function retornarIdGrado($pdo, $modalMultiStepGrado){
  
    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id FROM grados WHERE id_grado = :id_grado");
        $stmt->bindValue(':id_grado', $modalMultiStepGrado[1]);
        $stmt->execute();
    
        // Obtenemos el resultado (solo la columna id_materia)
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Si hay resultados, devolvemos el id_materia, sino null
        return $resultado ? $resultado['id'] : null;
        
    } catch (PDOException $e) {
        // Manejo de errores (puedes personalizarlo)
        error_log("Error en retornarIdMateria: " . $e->getMessage());
        return null;
    }
}

function gestionarMaterias($pdo, array $arreglo)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO grado_materia (id_grado, id_materia) VALUES (:id_grado, :id_materia)");
        $stmt->bindValue('id_grado', $arreglo[2]);
        $stmt->bindValue('id_materia',  $arreglo[1]);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = 'Asignatura asignada exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_grado.php");
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function inhabilitarMateria($pdo, $idGuia)
{
    $stmt = $pdo->prepare("UPDATE materias SET id_estado=:id_estado WHERE id_materia=:id_materia");
    $stmt->bindValue(':id_estado', 1);
    $stmt->bindValue(':id_materia', $idGuia);
    $stmt->execute();

    // Verificar si se encontró algún registro
    if ($stmt->rowCount() > 0) {
        $_SESSION['mensaje'] = 'La asignatura se inhabilitó correctamente.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';
        header("Location: ../Desarrollo/search_materia.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La acción no se proceso porque la asignatura ya estaba inhhabilitado.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_materia.php");
        exit();
    }
}

function HabilitarMateria($pdo, $idGuia)
{
    $stmt = $pdo->prepare("UPDATE materias SET id_estado=:id_estado WHERE id_materia=:id_materia");
    $stmt->bindValue(':id_estado', 2);
    $stmt->bindValue(':id_materia', $idGuia);
    $stmt->execute();

    // Verificar si se encontró algún registro
    if ($stmt->rowCount() > 0) {
        $_SESSION['mensaje'] = 'La asignatura se habilitó correctamente.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';
        header("Location: ../Desarrollo/search_materia.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La acción no se proceso porque la asignatura ya estaba habilitada.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_materia.php");
        exit();
    }
}
