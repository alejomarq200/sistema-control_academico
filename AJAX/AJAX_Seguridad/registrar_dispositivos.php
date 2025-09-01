<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Obtener los datos JSON enviados desde el cliente
/* El fragmento de código PHP json_decode(file_get_contents('php://input'), true)
se usa comúnmente en aplicaciones PHP para recibir y procesar datos JSON enviados 
en el cuerpo de una solicitud HTTP, particularmente para puntos finales de API. */

$data = json_decode(file_get_contents('php://input'), true);

// Validar que se hayan recibido los datos necesarios
if (!empty($data['device_id']) && !empty($data['dpto'])) {

    try {

        // Registrar nuevo dispositivo con token único
        $token = bin2hex(random_bytes(16));

        $user_id = 5;
        $device_id = $data['device_id'];
        
        $stmt = $pdo->prepare("INSERT INTO dispositivos (user_id, device_id, token, descripcion) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $device_id, $token, "Dispositivo nuevo"]);

        // Guardar token en cookie
        setcookie("device_token", $token, time() + (86400 * 30), "/", "", true, true);

        echo json_encode(["status" => "ok", "msg" => "Dispositivo registrado"]);
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
} else {
    echo json_encode(array('error' => 'Los valores esperados no se registraron'));
}
