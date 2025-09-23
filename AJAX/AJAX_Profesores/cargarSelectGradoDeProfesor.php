<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

try {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["status", "error" => 'El request es erróneo']);
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['idProfesor'])) {
        echo json_encode(["status", "error" => 'El id del profesor se encuentra vacío']);
    }

    $idProfesor = $data['idProfesor'];

    $stmt = $pdo->prepare("SELECT pg.id_profesor, pg.id_grado, g.id, g.id_grado as grado FROM profesor_grado pg
                                  INNER JOIN grados g ON pg.id_grado = g.id WHERE id_profesor = :id_profesor");
    $stmt->bindValue(":id_profesor", $idProfesor, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Obtener resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Retornamos solo el array sin clave de valor
        echo json_encode($resultados);
    }

} catch (PDOException $e) {
    echo json_encode(["status", "error" => $e->getMessage()]);
}




