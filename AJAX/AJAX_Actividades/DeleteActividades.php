<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

try {
    $pdo->beginTransaction();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id_actividad'])) {
        throw new Exception("Solicitud inválida");
    }

    $idActividad = $_POST['id_actividad'];

    // Verificar si la actividad está asignada a una calificación
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM calificaciones WHERE actividad = ?");
    $stmt->execute([$idActividad]);
    $asignada = $stmt->fetchColumn();

    if ($asignada > 0) {
        // Opción 1: No permitir eliminación
         throw new Exception("No se puede eliminar un contenido que está relacionado a una calificación");      
    }

    // Eliminar la actividad
    $stmt = $pdo->prepare("DELETE FROM actividades WHERE id_actividad = ?");
    $stmt->execute([$idActividad]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("La actividad no existe o ya fue eliminada");
    }

    $pdo->commit();

    echo json_encode([
        'success' => true,
        'title' => 'Eliminación exitosa',
        'message' => 'La actividad fue eliminada correctamente',
        'icon' => 'success'
    ]);

} catch (Exception $e) {
    $pdo->rollBack();
    
    echo json_encode([
        'success' => false,
        'title' => 'Error',
        'message' => $e->getMessage(),
        'icon' => 'error'
    ]);
}