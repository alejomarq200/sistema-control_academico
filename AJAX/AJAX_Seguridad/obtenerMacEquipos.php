<?php
//require_once 'conexion.php';
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
if (empty($data['mac'])) {
    $mac = 'UNKNOWN';
    foreach (explode("\n", str_replace(' ', '', trim(`getmac`, "\n"))) as $i)
        if (strpos($i, 'Tcpip') > -1) {
            $mac = substr($i, 0, 17);
            break;
        }
    echo json_encode(array('succes' => $mac));
} else {
    echo json_encode(array('error' => 'Presione el botón para obtener la mac de su equipo'));
}
