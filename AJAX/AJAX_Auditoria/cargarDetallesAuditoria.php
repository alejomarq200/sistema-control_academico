<?php
include("../../Configuration/Configuration.php");
// Configuración de cabeceras para JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

try {

    // 2. Obtener parámetros (versión para POST estándar o JSON)
    if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
        $data = json_decode(file_get_contents('php://input'), true);
        $operacion = $data['operacion'] ?? null;
        $usuario = $data['usuario'] ?? null;
        $tabla = $data['tabla'] ?? null;
        $fechaInicio = $data['fechaInicio'] ?? null;
        $fechaFin = $data['fechaFin'] ?? null;
    } else {
        $operacion = $_POST['operacion'] ?? null;
        $usuario = $_POST['usuario'] ?? null;
        $tabla = $_POST['tabla'] ?? null;
    }

    // 3. Validar parámetro
    if (empty($operacion)) {
        throw new Exception('El parámetro "operacion" es requerido', 400);
    }

    $sql = 'SELECT * FROM auditoria WHERE usuario = :usuario AND tabla_afectada = :tabla_afectada AND operacion = :operacion';

    if ($fechaInicio && $fechaFin) {
        $sql .= ' AND fecha_hora BETWEEN :fechaInicio AND :fechaFin';
    }

    $sql .= ' ORDER BY fecha_hora ASC';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindValue(':tabla_afectada', $tabla, PDO::PARAM_STR);
    $stmt->bindValue(':operacion', $operacion, PDO::PARAM_STR);

    if ($fechaInicio && $fechaFin) {
        // Convertir fechas a formato completo
        $fechaInicio .= ' 00:00:00';
        $fechaFin .= ' 23:59:59';

        $stmt->bindValue(':fechaInicio', $fechaInicio);
        $stmt->bindValue(':fechaFin', $fechaFin);
    }

    $stmt->execute();


    // 5. Obtener resultados
    $resultados = $stmt->fetchAll();

    // 6. Procesar valores JSON
    foreach ($resultados as &$row) {
        if (isset($row['valores_anteriores'])) {
            $row['valores_anteriores'] = json_decode($row['valores_anteriores'], true) ?? $row['valores_anteriores'];
        }
        if (isset($row['valores_nuevos'])) {
            $row['valores_nuevos'] = json_decode($row['valores_nuevos'], true) ?? $row['valores_nuevos'];
        }
    }

    // 7. Enviar respuesta
    echo json_encode([
        'success' => true,
        'data' => $resultados,
        'count' => count($resultados),
        'query' => $sql // Opcional para depuración
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'database_error',
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
    error_log("PDO Error: " . $e->getMessage());
} catch (Exception $e) {
    http_response_code($e->getCode() ?: 400);
    echo json_encode([
        'success' => false,
        'error' => 'application_error',
        'message' => $e->getMessage()
    ]);
    error_log("App Error: " . $e->getMessage());
}
