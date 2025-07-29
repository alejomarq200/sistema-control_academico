<?php
session_start();
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

try {
    $pdo->beginTransaction();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id_materia'])) {
        throw new Exception("Solicitud inválida");
    }

    $idMateria = $_POST['id_materia'];

    // 1. Verificar si la materia está asignada a profesores
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM profesor_materia_grado WHERE id_materia = ?");
    $stmt->execute([$idMateria]);
    $asignada = $stmt->fetchColumn();

    if ($asignada > 0) {
        // Opción 1: No permitir eliminación
         throw new Exception("No se puede eliminar una materia asignada a grados/profesores");      
    }

    // 2. Eliminar la materia
    $stmt = $pdo->prepare("DELETE FROM materias WHERE id_materia = ?");
    $stmt->execute([$idMateria]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("La materia no existe o ya fue eliminada");
    }

    $pdo->commit();

    echo json_encode([
        'success' => true,
        'title' => 'Eliminación exitosa',
        'message' => 'La materia fue eliminada correctamente',
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