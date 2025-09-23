<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["status" => "error", "message" => "El request es erróneo"]);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['idGrado']) || !is_numeric($data['idGrado'])) {
        echo json_encode(["status" => "error", "message" => "El id del grado está vacío o posee un formato incorrecto"]);
        exit;
    }

    $idGrado = $data['idGrado'];

    // JOIN para traer también el nombre de la materia
    $stmt = $pdo->prepare("
        SELECT gm.id_materia, gm.id_grado, m.nombre AS nombre_materia
        FROM grado_materia gm
        INNER JOIN materias m ON gm.id_materia = m.id_materia
        WHERE gm.id_grado = :id_grado
    ");
    $stmt->bindValue(":id_grado", $idGrado, PDO::PARAM_INT);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultados);

} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
