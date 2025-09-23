<?php
declare(strict_types=1);

// Forzar JSON
header('Content-Type: application/json; charset=utf-8');

include("../../Configuration/Configuration.php");
// No mostrar errores en HTML al cliente; loguearlos en el servidor
ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

// Limpiar cualquier salida previa (evita que contenido HTML previo rompa el JSON)
while (ob_get_level()) {
    ob_end_clean();
}

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
$idMateria = isset($data['idMateria']) && is_array($data['idMateria']) ? $data['idMateria'] : [];

if (!$idProfesor || !$idGrado || !$idMateria) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'mensaje' => 'Falta idProfesor, idGrado o idMateria']);
    exit;
}

// Normalizar tipos de id a string para comparar sin problemas
$idMateria = array_map('strval', $idMateria);

try {
    //Obtenemos las asignaturas por id_profesor
    $stmt = $pdo->prepare('SELECT id_materia FROM profesor_materia_grado WHERE id_profesor = :id_profesor AND id_grado = :id_grado');
    $stmt->bindValue(':id_profesor', $idProfesor, PDO::PARAM_INT);
    $stmt->bindValue(':id_grado', $idGrado, PDO::PARAM_INT);
    $stmt->execute();

    $materiasProfesor = $stmt->fetchAll(PDO::FETCH_COLUMN) ?: [];
    //Convertimos nuestro array a un tipo de dato que necesitemos
    $materiasProfesor = array_map('strval', $materiasProfesor);

    //Identificar coincidencias
    $coincidencias = array_values(array_intersect($idMateria, $materiasProfesor));

    if (!empty($coincidencias)) {
        // Devuelve las materias que ya posee el profesor
        $resultados = [];

        //Iteramos sobre coincidencias para retornar el nombre de las mismas
        for ($i = 0; $i < count($coincidencias); $i++) {
            $stmtAsign = $pdo->prepare('SELECT nombre FROM materias WHERE id_materia = :id_materia');
            $stmtAsign->bindValue(':id_materia', $coincidencias[$i], PDO::PARAM_INT);
            $stmtAsign->execute();

            if ($stmtAsign->rowCount() > 0) {
                $materia = $stmtAsign->fetch(PDO::FETCH_ASSOC);
                $resultados[] = $materia['nombre'];
            }
        }

        echo json_encode([
            'status' => 'error',
            'mensaje' => 'El profesor ya posee estas asignaturas:',
            'nombre' => $resultados
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
    error_log('Error en profesorPoseeAsignaturas.php: ' . $e->getMessage());
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
