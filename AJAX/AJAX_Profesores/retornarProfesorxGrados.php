<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

try {
    // Obtener parámetros
    if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
        $data = json_decode(file_get_contents('php://input'), true);
        $idProfesor = $data['idProfesor'] ?? null;
    } else {
        $idProfesor = $_POST['idProfesor'] ?? null;
    }

    // Validar parámetro
    if (empty($idProfesor)) {
        throw new Exception('El parámetro "idGrado" es requerido', 400);
    }

    // En el PHP, cambiaría a:
    $idProfesor = $data['idProfesor'] ?? null;

    $sql = 'SELECT g.id, g.id_grado as nombre_grado
        FROM profesor_grado pg 
        INNER JOIN grados g ON pg.id_grado = g.id 
        WHERE pg.id_profesor = :id_profesor ORDER BY g.id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id_profesor', $idProfesor, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "records" => $resultados
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
    error_log("PDO Error: " . $e->getMessage());
} catch (Exception $e) {
    http_response_code($e->getCode() ?: 400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    error_log("App Error: " . $e->getMessage());
}