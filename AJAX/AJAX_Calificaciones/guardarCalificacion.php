<?php
include('../../Configuration/Configuration.php');
header('Content-Type: application/json');
// Respuesta inicial
$response = ['success' => false, 'message' => ''];

try {
    // Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // Obtener datos directamente de $_POST
    $estudianteId = $_POST['estudiante_id'] ?? null;
    $gradoId = $_POST['grado_id'] ?? null;
    $lapso = $_POST['lapso_academico'] ?? null;
    $profesorId = $_POST['profesor_id'] ?? null;
    $total = $_POST['total_calificacion'] ?? 0;

    // Validar datos básicos
    if (!$estudianteId || !$gradoId || !$lapso) {
        throw new Exception('Datos incompletos');
    }

    // Obtener calificaciones como array
    $calificaciones = $_POST['calificaciones'] ?? [];
    if (empty($calificaciones)) {
        throw new Exception('No hay calificaciones');
    }

    // Obtener año escolar (ej: 2023-2024)
    $anoEscolar = date('Y') . '-' . (date('Y') + 1);

    // Iniciar transacción
    $pdo->beginTransaction();

    // 2. Insertar nuevas calificaciones
    $insertSql = "INSERT INTO calificaciones (
                    año_escolar, id_grado, lapso_academico, 
                    id_profesor, id_estudiante, calificacion, 
                    total_califiacion
                 ) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $insertStmt = $pdo->prepare($insertSql);

    // Insertar cada calificación (simplificado sin materia_id)
    foreach ($calificaciones as $calificacion) {
        $insertStmt->execute([
            $anoEscolar,
            $gradoId,
            $lapso,
            $profesorId,
            $estudianteId,
            $calificacion,
            $total
        ]);
    }

    // Confirmar transacción
    $pdo->commit();

    // Respuesta exitosa
    $response = [
        'success' => true,
        'message' => 'Calificaciones guardadas correctamente'
    ];

} catch (PDOException $e) {
    $pdo->rollBack();
    $response['message'] = 'Error en la base de datos: ' . $e->getMessage();
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

// Enviar respuesta como JSON
echo json_encode($response);
exit;

?>