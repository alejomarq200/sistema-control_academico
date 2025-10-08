<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

// Recibir datos JSON
$input = json_decode(file_get_contents('php://input'), true);
$idProfesor = $input['idProfesor'] ?? '';
$idGrado = $input['idGrado'] ?? '';

// 1. Validar parámetros
if (empty($idProfesor) || empty($idGrado)) {
    echo json_encode(["status" => "error", "message" => 'No llegaron todos los datos necesarios']);
    exit;
}

try {

    // 2. Verificar si el profesor tiene calificaciones asignadas
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM calificaciones WHERE id_profesor = ? AND id_grado = ?");
    $stmt->execute([$idProfesor, $idGrado]);
    $asignada = $stmt->fetchColumn();

    if ($asignada > 0) {
        echo json_encode(["status" => "error", "message" => "No se puede eliminar un profesor que posea un historial de calificaciones"]);
        exit;
    }

    // 3. Verificar si el profesor tiene asignado un grado
    $stmtAsignatura = $pdo->prepare("SELECT COUNT(*) FROM profesor_materia_grado WHERE id_profesor = ? AND id_grado = ?");
    $stmtAsignatura->execute([$idProfesor, $idGrado]);
    $existeAsign = $stmtAsignatura->fetchColumn();

    if ($existeAsign > 0) {
        echo json_encode(["status" => "error", "message" => "No se puede eliminar un profesor registrada con un grado"]);
        exit;
    }

    // 4. Eliminar la relación profesor-grado
    $sql = 'DELETE FROM profesor_grado WHERE id_profesor = :id_profesor AND id_grado = :id_grado';
    $stmtDelete = $pdo->prepare($sql);
    $stmtDelete->bindValue(':id_profesor', $idProfesor, PDO::PARAM_INT);
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