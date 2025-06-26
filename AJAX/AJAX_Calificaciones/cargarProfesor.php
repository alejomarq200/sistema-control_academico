<?php
include("../../Configuration/Configuration.php");


// Obtener el ID del grado desde la URL
$grado_id = isset($_GET['grado_id']) ? $_GET['grado_id'] : null;

if (!$grado_id) {
    echo json_encode(['error' => 'ID de grado no proporcionado']);
    exit;
}

// Función para obtener profesores y materias
function enlistar($pdo, $grado_id) {
    try {
        $stmt = $pdo->prepare("SELECT ... "); // Tu consulta SQL aquí
        $stmt->execute([$grado_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}

// Obtener los datos
$profesoresMaterias = enlistar($pdo, $grado_id);

// Configurar cabeceras para respuesta JSON
header('Content-Type: application/json');

// Devolver los datos en formato JSON
echo json_encode($profesoresMaterias);
?>