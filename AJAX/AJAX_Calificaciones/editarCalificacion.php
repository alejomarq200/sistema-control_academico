<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

// Verificar que los datos requeridos existen
if (!isset($_POST['id_calif']) || !isset($_POST['valor_calif']) || !isset($_POST['total_calificacion'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Datos incompletos'
    ]);
    exit;
}

$ids = $_POST['id_calif'];
$valores = $_POST['valor_calif'];
$total = $_POST['total_calificacion']; // Cambié de 'promedioCalculado' a 'total_calificacion'

try {
    // Verificar que los arrays tengan la misma longitud
    if (count($ids) !== count($valores)) {
        throw new Exception('La cantidad de IDs no coincide con la cantidad de valores');
    }

    // Iniciar transacción
    $pdo->beginTransaction();

    $sql = "UPDATE calificaciones SET calificacion = :valor, total_calificacion = :total WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    for ($i = 0; $i < count($ids); $i++) {
        // Validar que el valor esté entre 0 y 20
        $valor = floatval($valores[$i]);
        if ($valor < 0 || $valor > 20) {
            throw new Exception("La calificación {$valor} no está en el rango permitido (0-20)");
        }

        $stmt->execute([
            ':valor' => $valor,
            ':total' => floatval($total), // Usamos el mismo promedio para todos
            ':id' => intval($ids[$i])
        ]);
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