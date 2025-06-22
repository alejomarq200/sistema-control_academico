<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "Proyecto";

//Variable de conexión
$dsn = 'mysql:host=' . $host . '; dbname=' . $db;
//Instanciamos PDO
$pdo = new PDO($dsn, $user, $pass);

header('Content-Type: application/json');
// Respuesta inicial
$response = [
    'success' => false,
    'error' => false,
    'message' => ''
];

try {
    // Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // Obtener y validar datos
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
    $total = $_POST['total_calificacion'] ?? 0;
    $materiaId = $_POST['materia_id'];
    $anoEscolar = $_POST['anioEscolar'];

    // Obtener calificaciones
    $calificaciones = $_POST['calificaciones'] ?? [];
    if (empty($calificaciones)) {
        throw new Exception('No hay calificaciones para guardar');
    }

    // Iniciar transacción
    $pdo->beginTransaction();

    // Verificar si existe registro
    $stmt = $pdo->prepare("SELECT 1 FROM calificaciones 
                          WHERE año_escolar = ? 
                          AND id_grado = ? 
                          AND lapso_academico = ? 
                          AND id_estudiante = ?
                          AND id_materia = ?
                          LIMIT 1");
    $stmt->execute([$anoEscolar, $gradoId, $lapso, $estudianteId, $materiaId]);

    if ($stmt->rowCount() > 0) {
        throw new Exception('Ya existe un registro de calificaciones para este estudiante en esta materia y período');
    }

    // Insertar calificaciones (una sola vez)
    $insertSql = "INSERT INTO calificaciones (
                año_escolar, id_grado, lapso_academico, 
                id_profesor, id_materia, id_estudiante, calificacion, 
                total_calificacion
             ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $insertStmt = $pdo->prepare($insertSql);
    
    // Insertar cada calificación como registro separado
    foreach ($calificaciones as $calificacion) {
        $insertStmt->execute([
            $anoEscolar,
            $gradoId,
            $lapso,
            $profesorId,
            $materiaId,
            $estudianteId,
            $calificacion,
            $total
        ]);
    }

    // Confirmar transacción
    $pdo->commit();

    $response = [
        'success' => true,
        'message' => 'Calificaciones guardadas correctamente'
    ];

} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $response = [
        'error' => true,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $response = [
        'error' => true,
        'message' => $e->getMessage()
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
exit;

?>