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
        $id = $data['idProfesor'] ?? null;

    } else {
        $id = $_POST['idProfesor'] ?? null;
    }

    // 3. Validar parámetro
    if (empty($id)) {
        throw new Exception('El parámetro "id" es requerido', 400);
    }

    $sql = 'SELECT grados.id_grado, grados.id
            FROM profesor_grado 
            INNER JOIN grados ON profesor_grado.id_grado = grados.id 
            WHERE profesor_grado.id_profesor = :id_profesor';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id_profesor', $id, PDO::PARAM_STR);
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
