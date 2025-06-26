<?php
include("../../Configuration/Configuration.php");
header('Content-Type: application/json');


$ids = $_POST['id_calif'];
$valores = $_POST['valor_calif'];

$sql = "UPDATE calificaciones SET calificacion = :valor WHERE id = :id";
$stmt = $pdo->prepare($sql);

for ($i = 0; $i < count($ids); $i++) {
    $stmt->execute([
        ':valor' => $valores[$i],
        ':id' => $ids[$i]
    ]);
}

try {
    // Tu lógica de actualización aquí
    
    echo json_encode([
        'success' => true,
        'message' => 'Calificaciones actualizadas correctamente'
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
