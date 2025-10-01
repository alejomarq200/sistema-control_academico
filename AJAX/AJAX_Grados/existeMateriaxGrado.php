<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["status", "error" => "El request es erróneo"]);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $idAsignatura = $data['idAsignatura'];
    $idGrado = $data['grado'];

    if (empty($data['idAsignatura']) || !is_numeric($data['idAsignatura']) || empty($data['grado']) || !is_numeric($data['grado'])) {
        echo json_encode(["status", "error" => "El id de la asignatura o el id del grado está vacío o posee un formato incorrecto"]);
        exit;
    }

    // Validar si existe la asignatura en el grado
    function existeProfesorGrado($pdo, $idMateria, $idGrado)
    {
        try {
            $stmtExiste = $pdo->prepare("SELECT COUNT(*) FROM grado_materia WHERE id_materia = ? AND id_grado = ?");
            $stmtExiste->execute([$idMateria, $idGrado]);
            $count = $stmtExiste->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    $existe = existeProfesorGrado($pdo, $idAsignatura, $idGrado);
    if ($existe) {
        echo json_encode([
            "status" => "success",
            "message" => "La asignatura ya está asignada a este grado."
        ]);
        exit;
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "La asignatura no está asignada a este grado."
        ]);
        exit;
    }


} catch (PDOException $e) {
    echo json_encode(["status", "error" => $e->getMessage()]);
}
