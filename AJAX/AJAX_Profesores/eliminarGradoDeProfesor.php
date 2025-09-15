<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

// Recibir datos JSON
$input = json_decode(file_get_contents('php://input'), true);
$id = $input['idProfesor'] ?? '';
$idGrado = $input['idGrado'] ?? '';

// 1. Validar parámetros
if (empty($id) || empty($idGrado)) {
    echo json_encode(["status" => "error", "message" => 'No llegaron todos los datos necesarios']);
    exit;
}

try {
    // 2. Verificar si el profesor tiene calificaciones asignadas
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM calificaciones WHERE id_profesor = ? AND id_grado = ?");
    $stmt->execute([$id, $idGrado]);
    $asignada = $stmt->fetchColumn();

    if ($asignada > 0) {
        echo json_encode(["status" => "error", "message" => "No se puede eliminar un profesor con calificaciones asignadas"]);
        exit;
    }

    // 3. Eliminar la relación profesor-grado
    $sql = 'DELETE FROM profesor_grado WHERE id_profesor = :id_profesor AND id_grado = :id_grado';
    $stmtDelete = $pdo->prepare($sql);
    $stmtDelete->bindValue(':id_profesor', $id, PDO::PARAM_STR);
    $stmtDelete->bindValue(':id_grado', $idGrado, PDO::PARAM_STR);
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