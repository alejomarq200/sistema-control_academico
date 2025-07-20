<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$idEstudiante = $data['idEstudiante'] ?? null;
$idMateria = $data['idMateria'] ?? null;
$idGrado = $data['idGrado'] ?? null;
$idProfesor = $data['idProfesor'] ?? null;
$calificaciones = $data['calificaciones'] ?? [];
$promedio = $data['promedio'] ?? null;

// Validar datos
if (!$idEstudiante || !$idMateria || !$idGrado || !$idProfesor || $promedio === null) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    exit;
}

try {
    $pdo->beginTransaction();

    // 1. Actualizar materias_pendientes
    $estado = ($promedio >= 10) ? 'recuperada' : 'pendiente';

    $sqlMateriaPendiente = "UPDATE materias_pendientes 
                           SET estado = :estado, 
                               promedio_final = :promedio,
                               fecha_actualizacion = NOW()
                           WHERE id_estudiante = :idEstudiante 
                           AND id_materia = :idMateria 
                           AND id_grado = :idGrado";

    $stmtMateriaPendiente = $pdo->prepare($sqlMateriaPendiente);
    $stmtMateriaPendiente->execute([
        ':estado' => $estado,
        ':promedio' => $promedio,
        ':idEstudiante' => $idEstudiante,
        ':idMateria' => $idMateria,
        ':idGrado' => $idGrado
    ]);

    // 2. Obtener calificaciones existentes
    $sqlSelectCalificaciones = "SELECT id, calificacion, promedio 
                               FROM calificaciones 
                               WHERE id_profesor = :idProfesor 
                               AND id_materia = :idMateria 
                               AND id_grado = :idGrado 
                               AND id_estudiante = :idEstudiante";
    
    $stmtSelect = $pdo->prepare($sqlSelectCalificaciones);
    $stmtSelect->execute([
        ':idProfesor' => $idProfesor,
        ':idMateria' => $idMateria,
        ':idGrado' => $idGrado,
        ':idEstudiante' => $idEstudiante
    ]);
    
    $calificacionesExistentes = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

    // 3. Actualizar cada calificación existente
    $sqlUpdateCalificacion = "UPDATE calificaciones 
                             SET calificacion = :calificacion,
                                 promedio = :promedio
                             WHERE id = :id
                             AND id_profesor = :idProfesor
                             AND id_materia = :idMateria
                             AND id_grado = :idGrado
                             AND id_estudiante = :idEstudiante";

    $stmtUpdate = $pdo->prepare($sqlUpdateCalificacion);

    foreach ($calificacionesExistentes as $index => $calificacionExistente) {
        // Usar la nueva calificación 
        $nuevaCalificacion = $promedio;
        
        $stmtUpdate->execute([
            ':id' => $calificacionExistente['id'],
            ':calificacion' => $nuevaCalificacion,
            ':promedio' => $promedio,
            ':idProfesor' => $idProfesor,
            ':idMateria' => $idMateria,
            ':idGrado' => $idGrado,
            ':idEstudiante' => $idEstudiante
        ]);
    }

    $pdo->commit();
    echo json_encode(['success' => true, 'message' => 'Calificaciones actualizadas correctamente']);
    
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>