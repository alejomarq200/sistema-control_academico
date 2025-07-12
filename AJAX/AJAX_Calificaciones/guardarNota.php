<?php
header('Content-Type: application/json');

include("../../Configuration/Configuration.php");

$response = [
    'success' => false,
    'message' => '',
    'type' => 'error' // 'success', 'warning', o 'error'
];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['accion'])) {
        throw new Exception('Método no permitido');
    }

    // Obtener datos del POST
    $estudianteId = $_POST['estudiante_id'] ?? null;
    $gradoId = $_POST['grado_id'] ?? null;
    $materiaId = $_POST['materia_id'] ?? null;
    $profesorId = $_POST['profesor_id'] ?? null;
    $lapso = $_POST['lapso'] ?? null;
    $anioEscolar = $_POST['anio_escolar'] ?? null;
    $calificacion = $_POST['calificacion'] ?? null;
    $actividad = $_POST['actividad'] ?? null;

    // Validar datos requeridos
    $camposRequeridos = [
        'estudiante_id' => $estudianteId,
        'grado_id' => $gradoId,
        'materia_id' => $materiaId,
        'lapso' => $lapso,
        'anio_escolar' => $anioEscolar,
        'calificacion' => $calificacion,
        'actividad' => $actividad
    ];

    foreach ($camposRequeridos as $nombre => $valor) {
        if (empty($valor)) {
            throw new Exception("El campo $nombre es requerido");
        }
    }

    // Verificar si ya existe un registro (con más condiciones)
    $sqlCheck = "SELECT id FROM calificaciones 
                WHERE id_estudiante = ? 
                AND id_materia = ? 
                AND id_grado = ?
                AND lapso_academico = ?
                AND actividad = ?";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute([$estudianteId, $materiaId, $gradoId, $lapso, $actividad]);
    $existente = $stmtCheck->fetch();

    if ($existente) {
        // NO actualizar, solo informar que ya existe
        $response = [
            'success' => false,
            'message' => 'Ya existe una calificación para este estudiante en esta actividad',
            'type' => 'warning'
        ];
    } else {
        // Insertar nuevo registro
        $pdo->beginTransaction();
        
        $sql = "INSERT INTO calificaciones (
                año_escolar, id_grado, lapso_academico, 
                id_profesor, id_materia, id_estudiante, 
                calificacion, actividad
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([
            $anioEscolar, $gradoId, $lapso,
            $profesorId, $materiaId, $estudianteId,
            $calificacion, $actividad
        ]);

        if ($success) {
            $pdo->commit();
            $response = [
                'success' => true,
                'message' => 'Calificación registrada exitosamente',
                'type' => 'success'
            ];
        } else {
            throw new Exception('Error al guardar el nuevo registro');
        }
    }

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $response = [
        'success' => false,
        'message' => $e->getMessage(),
        'type' => 'error'
    ];
}

echo json_encode($response);
?>