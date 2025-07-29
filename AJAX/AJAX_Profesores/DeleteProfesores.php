<?php
session_start();
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

try {
    $pdo->beginTransaction();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id_profesor'])) {
        throw new Exception("Solicitud inválida");
    }

    $idProfesor = $_POST['id_profesor'];

    // 1. Verificar si la el profesor está asignada a materia o grado
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM profesor_materia_grado WHERE id_profesor = ?");
    $stmt->execute([$idProfesor]);
    $asignada = $stmt->fetchColumn();

    // 2. Verificar si la el profesor está asignada a grado
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM profesor_grado WHERE id_profesor = ?");
    $stmt->execute([$idProfesor]);
    $profGrado = $stmt->fetchColumn();

    if ($asignada > 0 || $profGrado > 0) {
        // Opción 1: No permitir eliminación
         throw new Exception("No se puede eliminar un profesor asignada a grados/materia");      
    }

    // 3. Eliminar la materia
    $stmt = $pdo->prepare("DELETE FROM profesores WHERE id_profesor = ?");
    $stmt->execute([$idProfesor]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("El profesor no existe o ya fue eliminado");
    }

    $pdo->commit();

    echo json_encode([
        'success' => true,
        'title' => 'Eliminación exitosa',
        'message' => 'El registro del profesor fue eliminado correctamente',
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