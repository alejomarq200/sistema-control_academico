<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

try {
    // Validar campos esenciales
    $requiredFields = ['estudiante_id', 'grado_id', 'materia_id', 'profesor_id'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Campo requerido faltante: $field");
        }
    }

    // Verificar calificaciones
    if (empty($_POST['calificaciones']) || !is_array($_POST['calificaciones'])) {
        throw new Exception("No se recibieron datos de calificaciones para actualizar");
    }

    $pdo->beginTransaction();
    $updatesCount = 0;
    $estudianteId = $_POST['estudiante_id'];
    $materiaId = $_POST['materia_id'];
    $profesorId = $_POST['profesor_id'];
    $gradoId = $_POST['grado_id'];
    $mensajeAdicional = "";
    $promedioGeneral = 0;
    $tieneMateriaPendiente = false;
    $accionMateriaPendiente = null;

    // 1. Procesar actualización de calificaciones
    foreach ($_POST['calificaciones'] as $calificacionData) {
        if (empty($calificacionData['id']) || !isset($calificacionData['valor'])) {
            continue;
        }

        $valor = (float)$calificacionData['valor'];
        if ($valor < 0 || $valor > 20) {
            throw new Exception("El valor de la calificación debe estar entre 0 y 20");
        }

        $stmt = $pdo->prepare("UPDATE calificaciones 
                              SET calificacion = :valor 
                              WHERE id = :id 
                              AND id_estudiante = :estudiante_id
                              AND id_grado = :grado_id
                              AND id_materia = :materia_id
                              AND id_profesor = :id_profesor
                              AND (:lapso IS NULL OR lapso_academico = :lapso)
                              AND calificacion != :valor");

        $params = [
            ':valor' => $valor,
            ':id' => $calificacionData['id'],
            ':estudiante_id' => $estudianteId,
            ':grado_id' => $gradoId,
            ':materia_id' => $materiaId,
            ':id_profesor' => $profesorId,
            ':lapso' => $calificacionData['lapso'] ?? null
        ];

        $stmt->execute($params);
        $updatesCount += $stmt->rowCount();
    }

    // 2. Actualizar promedios en la tabla calificaciones
    $stmtUpdatePromedio = $pdo->prepare("UPDATE calificaciones c
        JOIN (
            SELECT id_estudiante, id_materia, id_profesor, id_grado, lapso_academico, 
                   AVG(calificacion) as nuevo_promedio
            FROM calificaciones
            WHERE id_estudiante = ? AND id_materia = ? AND id_profesor = ? AND id_grado = ?
            GROUP BY lapso_academico
        ) AS p
        ON c.id_estudiante = p.id_estudiante 
        AND c.id_materia = p.id_materia
        AND c.id_profesor = p.id_profesor
        AND c.id_grado = p.id_grado
        AND c.lapso_academico = p.lapso_academico
        SET c.promedio = p.nuevo_promedio");
    $stmtUpdatePromedio->execute([$estudianteId, $materiaId, $profesorId, $gradoId]);

    // 3. Verificar si existe materia pendiente para este estudiante
    $stmtMateriaPendiente = $pdo->prepare("SELECT id, promedio_final  FROM materias_pendientes 
                                          WHERE id_estudiante = ? 
                                          AND id_materia = ?");
    $stmtMateriaPendiente->execute([$estudianteId, $materiaId]);
    $tieneMateriaPendiente = $stmtMateriaPendiente->rowCount() > 0;
    $materiaPendienteData = $tieneMateriaPendiente ? $stmtMateriaPendiente->fetch(PDO::FETCH_ASSOC) : null;

    // 4. Calcular nuevo promedio general (suma de los 3 lapsos / 3)
    $stmtPromedio = $pdo->prepare("SELECT AVG(calificacion) as promedio_general
                                   FROM calificaciones
                                   WHERE id_estudiante = ?
                                   AND id_materia = ?
                                   AND id_profesor = ?
                                   AND id_grado = ?
                                   AND lapso_academico IN ('1er Lapso', '2do Lapso', '3er Lapso')");
    
    $stmtPromedio->execute([$estudianteId, $materiaId, $profesorId, $gradoId]);
    $promedioGeneral = (float)$stmtPromedio->fetchColumn();

    // 5. Manejo de materias pendientes
    if ($tieneMateriaPendiente) {
        if ($promedioGeneral >= 10) {
            // Eliminar de materias pendientes si el promedio es >= 10
            $stmtEliminarPendiente = $pdo->prepare("DELETE FROM materias_pendientes 
                                                   WHERE id_estudiante = ? 
                                                   AND id_materia = ?");
            $stmtEliminarPendiente->execute([$estudianteId, $materiaId]);
            
            $accionMateriaPendiente = "eliminada";
            $mensajeAdicional = " y materia pendiente eliminada (promedio: $promedioGeneral)";
        } else {
            // Actualizar promedio en materias pendientes si es < 10
            $stmtActualizarPendiente = $pdo->prepare("UPDATE materias_pendientes 
                                                     SET promedio_final = ? 
                                                     WHERE id_estudiante = ? 
                                                     AND id_materia = ?");
            $stmtActualizarPendiente->execute([$promedioGeneral, $estudianteId, $materiaId]);
            
            $accionMateriaPendiente = "actualizada";
            $mensajeAdicional = " y materia pendiente actualizada (nuevo promedio: $promedioGeneral)";
        }
    } else if ($promedioGeneral < 10) {
        // Insertar en materias pendientes si no existe y el promedio es < 10
        $stmtInsertarPendiente = $pdo->prepare("INSERT INTO materias_pendientes 
                                               (id_estudiante, id_materia, id_grado, promedio_final) 
                                               VALUES (?, ?, ?, ?)");
        $stmtInsertarPendiente->execute([$estudianteId, $materiaId, $gradoId, $promedioGeneral]);
        
        $accionMateriaPendiente = "agregada";
        $mensajeAdicional = " y materia agregada como pendiente (promedio: $promedioGeneral)";
    }

    $pdo->commit();
    
    echo json_encode([
        'success' => true,
        'message' => ($updatesCount > 0 ? 'Calificaciones actualizadas correctamente' : 'No se realizaron cambios') . $mensajeAdicional,
        'updatesCount' => $updatesCount,
        'promedioCalculado' => $promedioGeneral,
        'materiaPendiente' => [
            'teniaMateriaPendiente' => $tieneMateriaPendiente,
            'accionRealizada' => $accionMateriaPendiente,
            'promedioAnterior' => $materiaPendienteData['promedio_final'] ?? null,
            'promedioNuevo' => $promedioGeneral
        ]
    ]);

} catch (Exception $e) {
    $pdo->rollBack();
    
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'errorDetails' => $e->getTraceAsString()
    ]);
}