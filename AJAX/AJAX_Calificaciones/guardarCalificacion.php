<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

$response = [
    'success' => false,
    'error' => false,
    'message' => ''
];

// Función para validar las calificaciones previas
function validarCalificacionesPrevias($pdo, $estudianteId, $materiaId, $gradoId, $anioEscolar, $profesorId)
{
    // Verificar que exista al menos una calificación en cada lapso
    $stmt = $pdo->prepare("SELECT lapso_academico 
                          FROM calificaciones 
                          WHERE id_estudiante = ? 
                          AND id_materia = ?
                          AND id_profesor = ?
                          AND lapso_academico IN ('1er Lapso', '2do Lapso', '3er Lapso')
                          GROUP BY lapso_academico");
    $stmt->execute([$estudianteId, $materiaId, $profesorId]);
    $lapsosConCalificacion = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Verificar que estén los 3 lapsos
    $lapsosRequeridos = ['1er Lapso', '2do Lapso', '3er Lapso'];
    $lapsosFaltantes = array_diff($lapsosRequeridos, $lapsosConCalificacion);

    if (!empty($lapsosFaltantes)) {
        return [
            'success' => false,
            'message' => 'Faltan calificaciones en los siguientes lapsos: ' . implode(', ', $lapsosFaltantes)
        ];
    }

    // Calcular el promedio total
    $stmt = $pdo->prepare("SELECT SUM(calificacion) as suma, COUNT(*) as cantidad
                          FROM calificaciones 
                          WHERE id_estudiante = ? 
                          AND id_materia = ?
                          AND id_profesor = ?");
    $stmt->execute([$estudianteId, $materiaId, $profesorId]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $promedio = ($data['cantidad'] > 0) ? ($data['suma'] / $data['cantidad']) : 0;

    // Verificar si el promedio es menor a 10
    if ($promedio < 10) {
        // Verificar si ya existe en materias_pendientes
        $stmt = $pdo->prepare("SELECT 1 FROM materias_pendientes 
                             WHERE id_estudiante = ? AND id_materia = ? AND id_profesor = ? AND anio_escolar = ?");
        $stmt->execute([$estudianteId, $materiaId, $profesorId, $anioEscolar]);

        if ($stmt->rowCount() === 0) {
            // Insertar en materias_pendientes si no existe
            $fechaActual = date('d-m-Y');
            $stmt = $pdo->prepare("INSERT INTO materias_pendientes 
                                  (id_estudiante, id_materia, id_grado, id_profesor, anio_escolar, promedio_final, estado, fecha_registro) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $estudianteId,
                $materiaId,
                $gradoId,
                $profesorId,
                $anioEscolar,
                $promedio,
                'pendiente',
                $fechaActual
            ]);
        }

        return [
            'success' => false,
            'message' => 'Su materia se registró como pendiente. Con Promedio de: ' . round($promedio, 2)
        ];
    }

    return [
        'success' => true,
        'message' => 'Materia aprobada. Promedio: ' . round($promedio, 2)
    ];
}


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
            $total
        ]);
    }

    // En tu bloque try, modifica la llamada a la función:
    if ($lapso === '3er Lapso') {
        $validacion = validarCalificacionesPrevias($pdo, $estudianteId, $materiaId, $gradoId, $anioEscolar, $profesorId);

        if (!$validacion['success']) {
            $pdo->commit(); // Confirmamos las calificaciones primero
            echo json_encode([
                'success' => false,
                'error' => true,
                'message' => $validacion['message']
            ]);
            exit;
        }
    }

    $response = [
        'success' => true,
        'message' => 'Calificaciones guardadas correctamente'
    ];

    $pdo->commit();

} catch (PDOException $e) {
    if ($pdo->inTransaction())
        $pdo->rollBack();
    $response = [
        'error' => true,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction())
        $pdo->rollBack();
    $response = [
        'error' => true,
        'message' => $e->getMessage()
    ];
}

echo json_encode($response);
exit;
?>