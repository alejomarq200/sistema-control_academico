<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

// Recibir datos JSON
$input = json_decode(file_get_contents('php://input'), true);
$idAsignatura = $input['idAsignatura'] ?? '';
$idGrado = $input['idGrado'] ?? '';

// 1. Validar parámetros
if (empty($idAsignatura) || empty($idGrado)) {
    echo json_encode(["status" => "error", "message" => 'No llegaron todos los datos necesarios']);
    exit;
}

try {

    // 2. Verificar si la asignatura tiene calificaciones asignadas
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM calificaciones WHERE id_materia = ? AND id_grado = ?");
    $stmt->execute([$idAsignatura, $idGrado]);
    $asignada = $stmt->fetchColumn();

    if ($asignada > 0) {
        echo json_encode(["status" => "error", "message" => "No se puede eliminar una asignatura que posea un historial de calificaciones"]);
        exit;
    }

    // 3. Verificar si la asignatura tiene asignado una materia un profesor y un grado
    $stmtAsignatura = $pdo->prepare("SELECT COUNT(*) FROM profesor_materia_grado WHERE id_materia = ? AND id_grado = ?");
    $stmtAsignatura->execute([$idAsignatura, $idGrado]);
    $existeAsign = $stmtAsignatura->fetchColumn();

    if ($existeAsign > 0) {
        echo json_encode(["status" => "error", "message" => "No se puede eliminar una asignatura registrada con un grado y profesor existentes"]);
        exit;
    }

    // 4. Eliminar la relación profesor-grado
    $sql = 'DELETE FROM `grado_materia` WHERE id_materia = :id_materia AND id_grado = :id_grado';
    $stmtDelete = $pdo->prepare($sql);
    $stmtDelete->bindValue(':id_materia', $idAsignatura, PDO::PARAM_INT);
    $stmtDelete->bindValue(':id_grado', $idGrado, PDO::PARAM_INT);
    $stmtDelete->execute();

    if ($stmtDelete->rowCount() > 0) {
        echo json_encode(["status" => "success", "message" => 'Se eliminó con éxito el registro']);
    } else {
        echo json_encode(["status" => "error", "message" => 'No se encontró el registro para eliminar']);
    }

} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Error en la base de datos: " . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Error general: " . $e->getMessage()]);
}
exit;
?>