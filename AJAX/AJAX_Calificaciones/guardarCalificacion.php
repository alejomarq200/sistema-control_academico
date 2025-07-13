<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "Proyecto";

// Variable de conexión
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
// Instanciamos PDO
$pdo = new PDO($dsn, $user, $pass);

header('Content-Type: application/json');

$response = [
    'success' => false,
    'error' => false,
    'message' => ''
];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    $requiredFields = ['estudiante_id', 'grado_id', 'lapso_academico', 'materia_id', 'anioEscolar'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("El campo $field es requerido");
        }
    }

    $estudianteId = $_POST['estudiante_id'];
    $gradoId = $_POST['grado_id'];
    $lapso = $_POST['lapso_academico'];
    $profesorId = $_POST['profesor_id'] ?? null;
    $materiaId = $_POST['materia_id'];
    $anioEscolar = $_POST['anioEscolar'];
    $total = $_POST['total'];

    $calificaciones = $_POST['calificaciones'] ?? [];
    if (empty($calificaciones)) {
        throw new Exception('No hay calificaciones para guardar');
    }

    // Verificar si ya existe registro para evitar duplicados
    $stmt = $pdo->prepare("SELECT 1 FROM calificaciones 
                          WHERE anio_escolar = ? 
                          AND id_grado = ? 
                          AND lapso_academico = ? 
                          AND id_estudiante = ?
                          AND id_materia = ?
                          LIMIT 1");
    $stmt->execute([$anioEscolar, $gradoId, $lapso, $estudianteId, $materiaId]);

    if ($stmt->rowCount() > 0) {
        // Respuesta específica para registro existente
        echo json_encode([
            'success' => false,
            'error' => true,
            'message' => 'Ya existe un registro de calificaciones para este estudiante en esta materia y período.'
        ]);
        exit;
    }

    $pdo->beginTransaction();

    $insertSql = "INSERT INTO calificaciones (
                    anio_escolar, id_grado, lapso_academico, 
                    id_profesor, id_materia, id_estudiante, calificacion, promedio
                 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $insertStmt = $pdo->prepare($insertSql);

    foreach ($calificaciones as $calificacion) {
        $insertStmt->execute([
            $anioEscolar,
            $gradoId,
            $lapso,
            $profesorId,
            $materiaId,
            $estudianteId,
            $calificacion,
            $total]);
    }

    $pdo->commit();

    $response = [
        'success' => true,
        'message' => 'Calificaciones guardadas correctamente'
    ];

} catch (PDOException $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    $response = [
        'error' => true,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction()) $pdo->rollBack();
    $response = [
        'error' => true,
        'message' => $e->getMessage()
    ];
}

echo json_encode($response);
exit;
?>
