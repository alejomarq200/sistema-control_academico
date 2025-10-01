<?php
include("../../Configuration/Configuration.php");
// Configuración de cabeceras para JSON
header('Content-Type: application/json');

try {

    // 2. Obtener parámetros (versión para POST estándar o JSON)
    if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['idAsignatura'] ?? null;

    } else {
        $id = $_POST['idAsignatura'] ?? null;
    }

    // 3. Validar parámetro
    if (empty($id)) {
        throw new Exception('El parámetro "id" es requerido', 400);
    }

    $sql = 'SELECT grados.id_grado, grados.id
            FROM grado_materia 
            INNER JOIN grados ON grado_materia.id_grado = grados.id 
            WHERE grado_materia.id_materia = :id_materia';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id_materia', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si id_grado realmente es JSON, descomenta esto:
    foreach ($resultados as &$row) {
        if (isset($row['id_grado'])) {
            $row['id_grado'] = json_decode($row['id_grado'], true) ?? $row['id_grado'];
        }

        if (isset($row['id'])) {
            $row['id'] = json_decode($row['id'], true) ?? $row['id'];
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
