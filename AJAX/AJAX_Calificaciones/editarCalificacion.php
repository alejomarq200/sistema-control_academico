<?php
header('Content-Type: application/json');

// Incluir configuración de la base de datos
include("../../Configuration/Configuration.php");

// Verificar que los datos requeridos existen
if (
    !isset($_POST['id_calif']) || !isset($_POST['valor_calif']) || !isset($_POST['total_calificacion']) ||
    !isset($_POST['id_estudiante']) || !isset($_POST['id_materia'])
) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Datos incompletos'
    ]);
    exit;
}

$ids = $_POST['id_calif'];
$valores = $_POST['valor_calif'];
$total = $_POST['total_calificacion'];
$idEstudiante = $_POST['id_estudiante'];
$idMateria = $_POST['id_materia'];

try {
    // Verificar que los arrays tengan la misma longitud
    if (count($ids) !== count($valores)) {
        throw new Exception('La cantidad de IDs no coincide con la cantidad de valores');
    }

    // Iniciar transacción
    $pdo->beginTransaction();

    // Actualizar cada calificación
    $sql = "UPDATE calificaciones SET 
            calificacion = :valor, 
            total_calificacion = :total
            WHERE id = :id 
            AND id_estudiante = :id_estudiante
            AND id_materia = :id_materia";

    $stmt = $pdo->prepare($sql);

    for ($i = 0; $i < count($ids); $i++) {
        // Validar que el valor esté entre 0 y 20
        $valor = floatval($valores[$i]);
        if ($valor < 0 || $valor > 20) {
            throw new Exception("La calificación {$valor} no está en el rango permitido (0-20)");
        }

        $stmt->execute([
            ':valor' => $valor,
            ':total' => floatval($total),
            ':id' => intval($ids[$i]),
            ':id_estudiante' => intval($idEstudiante),
            ':id_materia' => intval($idMateria)
        ]);

        // Verificar si se actualizó alguna fila
        if ($stmt->rowCount() === 0) {
            throw new Exception("No se notron cambios en las calificaciones del estudiante");
        }
    }

    // Confirmar transacción
    $pdo->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Calificaciones actualizadas correctamente',
        'promedio' => $total
    ]);
} catch (PDOException $e) {
    // Revertir transacción si hay error
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    // Revertir transacción si hay error
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>