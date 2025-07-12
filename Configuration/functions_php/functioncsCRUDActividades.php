<?php
function consultarActividadesCRUD($pdo)
{
    try {
        $sql = "SELECT 
                    a.id_actividad,
                    a.anio_escolar,
                    a.contenido,
                    g.id_grado AS nombre_grado,
                    p.nombre AS nombre_profesor,
                    m.nombre AS nombre_materia,
                    e.estado
                FROM actividades a
                JOIN grados g ON a.id_grado = g.id
                JOIN profesores p ON a.id_profesor = p.id_profesor
                JOIN materias m ON a.id_materia = m.id_materia
                JOIN estado e ON a.id_estado = e.id_estado
                ORDER BY a.id_actividad";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        error_log("Error en consultarActividadesCRUD: " . $e->getMessage());
        return [];
    }
}

function insertarActividad($pdo, array $arreglo)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO actividades (contenido, id_materia, id_grado, id_profesor) VALUES (:contenido, :id_materia, :id_grado, :id_profesor)");
        $stmt->bindValue(':contenido', $arreglo[0]);
        $stmt->bindValue(':id_materia', $arreglo[1]);
        $stmt->bindValue(':id_grado', $arreglo[2]);
        $stmt->bindValue(':id_profesor', $arreglo[3]);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = 'Actividad registrada exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/new_actividad.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function EditarActividad($pdo, array $modalActividadEdit)
{
    try {
        $stmt = $pdo->prepare("UPDATE actividades SET contenido = :contenido WHERE id_actividad = :id_actividad");
        $stmt->bindValue(':contenido', $modalActividadEdit[4]);
        $stmt->bindValue(':id_actividad', $modalActividadEdit[0]);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log("Error en editarMaterias: " . $e->getMessage());
        return false;
    }
}

function existeActividad($pdo, array $arreglo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM actividades WHERE contenido = :contenido  AND id_materia = :id_materia AND id_grado = :id_grado");
        $stmt->bindValue(':contenido', $arreglo[0]);
        $stmt->bindValue(':id_materia', $arreglo[1]);
        $stmt->bindValue(':id_grado', $arreglo[2]);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
        return false;
    }
}


function habilitarActividad($pdo, $idGuia)
{
    try {
        $stmt = $pdo->prepare("UPDATE actividades SET id_estado = :id_estado  WHERE id_actividad = :id_actividad");
        $stmt->bindValue(':id_estado', 2);
        $stmt->bindValue(':id_actividad', $idGuia);
        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $e) {
        $e->getMessage();
        return false;
    }
}

function inhabilitarActividad($pdo, $idGuia)
{
    try {
        $stmt = $pdo->prepare("UPDATE actividades SET id_estado = :id_estado  WHERE id_actividad = :id_actividad");
        $stmt->bindValue(':id_estado', 1);
        $stmt->bindValue(':id_actividad', $idGuia);
        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $e) {
        $e->getMessage();
        return false;
    }
}