<?php
include("../../Configuration/Configuration.php");

if (isset($_POST['contenidos'])) {
    $contenido = $_POST['contenidos'];
    $response = ['success' => false, 'message' => ''];

    try {
        //Retornar tipo_contendido para su manipulacion en FRONT
        $stmt = $pdo->prepare("SELECT tipo_contenido FROM actividades WHERE id_actividad = :id_actividad");
        $stmt->bindValue(':id_actividad', $contenido);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $response = [
                'success' => true,
                'tipo_contenido' => htmlspecialchars($fila['tipo_contenido'])
            ];
        } else {
            $response['message'] = "No hay descripción de contenido para el seleccionado.";
        }
    } catch (PDOException $e) {
        $response['message'] = "Error: " . htmlspecialchars($e->getMessage());
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}