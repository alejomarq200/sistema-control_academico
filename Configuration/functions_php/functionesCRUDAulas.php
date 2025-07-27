<?php

function consultarAulas($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM aulas INNER JOIN grados ON aulas.id_grado = grados.id_grado INNER JOIN estado ON aulas.estado = estado.id_estado ORDER BY aulas.id_aula ASC");
        $stmt->execute();

        // Obtener todos los registros
        $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro
        if (count($aulas) > 0) {
            return $aulas; // Devuelve todos los usuarios
        } else {
            return []; // Devuelve un array vacío si no hay registros
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function insertarAula($pdo, array $variablesAula) {
    try {
        $stmt = $pdo->prepare("INSERT INTO aulas (nombre, capacidad, id_grado, anio_escolar, estado) 
                             VALUES (:nombre, :capacidad, :id_grado, :anio, :estado)");
        $stmt->bindValue(':nombre', $variablesAula['nombreAula'], PDO::PARAM_STR);
        $stmt->bindValue(':capacidad', $variablesAula['capacidadAula'], PDO::PARAM_STR);
        $stmt->bindValue(':id_grado', $variablesAula['gradoAula'], PDO::PARAM_INT);
        $stmt->bindValue(':anio', $variablesAula['anioAula'], PDO::PARAM_STR);
        $stmt->bindValue(':estado', 2, PDO::PARAM_INT); // Asumiendo que 1 es el estado activo
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            return true; // Registro exitoso
        } else {
            echo "No se pudo registrar el aula.";
        }

    } catch (PDOException $e) {
        echo "Error al registrar la materia: " . $e->getMessage();
    }
}

function ediltarAulas($pdo, array $modalAulaEdit) {
    try {
        $stmt = $pdo->prepare("UPDATE aulas SET nombre = :nombre, capacidad = :capacidad, id_grado = :id_grado, anio_escolar = :anio_escolar WHERE id_aula = :id_aula");
        $stmt->bindValue(':nombre', $modalAulaEdit[1], PDO::PARAM_STR);
        $stmt->bindValue(':capacidad', $modalAulaEdit[2], PDO::PARAM_INT);
        $stmt->bindValue(':id_grado', $modalAulaEdit[3], PDO::PARAM_INT);
        $stmt->bindValue(':anio_escolar', '2025-2026', PDO::PARAM_STR);
        $stmt->bindValue(':id_aula', $modalAulaEdit[0], PDO::PARAM_INT);
        
        $stmt->execute();
        
        if ($stmt) {
            $_SESSION['mensaje'] = 'La información del aula se editó correctamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_aula.php");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Error en editarAulas: " . $e->getMessage());
       /* $_SESSION['mensaje'] = 'Error al editar el aula.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_aula.php");
        exit();*/
    }
}