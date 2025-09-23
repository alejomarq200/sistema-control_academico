<?php
include("../../Configuration/Configuration.php");
// Configuración de cabeceras para JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

try {

   $sql = 'SELECT 
    p.nombre AS nombre_profesor,
    g.id_grado AS nombre_grado,
    GROUP_CONCAT(m.nombre SEPARATOR ", ") AS nombre_materia
    FROM profesor_materia_grado pmg
    INNER JOIN profesores p ON pmg.id_profesor = p.id_profesor
    INNER JOIN grados g ON pmg.id_grado = g.id
    INNER JOIN materias m ON pmg.id_materia = m.id_materia
    GROUP BY p.nombre, g.id_grado
    ORDER BY p.nombre, g.id_grado;';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si id_grado realmente es JSON, descomenta esto:
    foreach ($resultados as &$row) {
        if (isset($row['nombre_profesor'])) {
            $row['nombre_profesor'] = json_decode($row['nombre_profesor'], true) ?? $row['nombre_profesor'];
        }

        if (isset($row['nombre_materia'])) {
            $row['nombre_materia'] = json_decode($row['nombre_materia'], true) ?? $row['nombre_materia'];
        }

        if (isset($row['nombre_grado'])) {
            $row['nombre_grado'] = json_decode($row['nombre_grado'], true) ?? $row['nombre_grado'];
        }
    }

    echo json_encode(["status" => "success", "records" => $resultados]);

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
