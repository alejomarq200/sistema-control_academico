<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json; charset=utf-8');

// Leer JSON enviado por fetch
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'mensaje' => 'JSON inválido en request',
        'json_error' => json_last_error_msg()
    ]);
    exit;
}

$idProfesor = isset($data['idProfesor']) ? (int) $data['idProfesor'] : null;
$idGrado = isset($data['idGrado']) ? (int) $data['idGrado'] : null;

if (!$idProfesor || !$idGrado) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'mensaje' => 'Falta idProfesor o idGrado']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM `profesor_grado` WHERE id_profesor = :id_profesor AND id_grado = :id_grado');
    $stmt->bindValue(':id_profesor', $idProfesor, PDO::PARAM_INT);
    $stmt->bindValue(':id_grado', $idGrado, PDO::PARAM_INT);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo json_encode([
            'status' => 'error',
            'mensaje' => 'El profesor ya posee registro en este grado'
        ]);
        exit;
    }

    echo json_encode([
        'status' => 'success',
        'mensaje' => 'No hay coincidencias'
    ]);
    exit;

} catch (Throwable $e) {
    // Log completo en servidor
    error_log('Error en profesorPoseeGrados.php: ' . $e->getMessage());
    http_response_code(500);
    // En desarrollo puedes devolver $e->getMessage() para depurar,
    // en producción mejor enviar mensaje genérico.
    echo json_encode([
        'status' => 'error',
        'mensaje' => 'Error interno en el servidor',
        'detalle' => $e->getMessage()
    ]);
    exit;
}
