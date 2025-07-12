<?php
include("../../Configuration/Configuration.php"); // Archivo con tu conexión PDO
header('Content-Type: application/json');

try {
    // Validar solo campos esenciales
    $requiredFields = ['estudiante_id', 'grado_id', 'materia_id', 'profesor_id'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Campo requerido faltante: $field");
        }
    }

    // Verificar si hay calificaciones para actualizar
    if (empty($_POST['calificaciones']) || !is_array($_POST['calificaciones'])) {
        throw new Exception("No se recibieron datos de calificaciones para actualizar");
    }

    $pdo->beginTransaction();
    $updatesCount = 0;

    // Procesar solo las calificaciones recibidas
    foreach ($_POST['calificaciones'] as $calificacionData) {
        // Validar que tenga los datos mínimos
        if (empty($calificacionData['id']) || !isset($calificacionData['valor'])) {
            continue; // Saltar esta calificación si no tiene datos válidos
        }

        $valor = (float)$calificacionData['valor'];
        if ($valor < 0 || $valor > 20) {
            throw new Exception("El valor de la calificación debe estar entre 0 y 20");
        }

        // Actualizar solo si el valor es diferente
        $stmt = $pdo->prepare("UPDATE calificaciones 
                              SET calificacion = :valor 
                              WHERE id = :id 
                              AND id_estudiante = :estudiante_id
                              AND id_grado = :grado_id
                              AND id_materia = :materia_id
                              AND id_profesor = :id_profesor
                              AND (:lapso IS NULL OR lapso_academico = :lapso)
                              AND calificacion != :valor"); // Solo actualiza si cambió

        $params = [
            ':valor' => $valor,
            ':id' => $calificacionData['id'],
            ':estudiante_id' => $_POST['estudiante_id'],
            ':grado_id' => $_POST['grado_id'],
            ':materia_id' => $_POST['materia_id'],
            ':id_profesor' => $_POST['profesor_id'],
            ':lapso' => $calificacionData['lapso'] ?? null
        ];

        $stmt->execute($params);
        $updatesCount += $stmt->rowCount();
    }

    $pdo->commit();
    
    echo json_encode([
        'success' => true,
        'message' => $updatesCount > 0 ? 'Calificaciones actualizadas correctamente' : 'No se realizaron cambios',
        'updatesCount' => $updatesCount
    ]);

} catch (Exception $e) {
    $pdo->rollBack();
    
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}