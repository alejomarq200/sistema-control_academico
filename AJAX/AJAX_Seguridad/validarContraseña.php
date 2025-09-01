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

$contrasena = $data['contrasena'];
$contrasenaNueva = $data['contrasenaNueva'];

if (!$contrasena && !$contrasenaNueva) {
    echo json_encode(["error" =>  'Se requiere el campo contraseña y actualizar contraseña']);
    exit;
}

$cedula = $_SESSION['id'];
$stmtPwd = $pdo->prepare('SELECT contrasena FROM users WHERE cedula = :cedula');
$stmtPwd->bindValue(':cedula', $cedula, PDO::PARAM_STR);
$stmtPwd->execute();

if ($stmtPwd->rowCount() > 0) {
    $resultado = $stmtPwd->fetch(PDO::PARAM_STR);
    $comparar = password_verify($contrasena, $resultado['contrasena']);
    $isValid = ($comparar) ? 1 : 0;

    if ($isValid == 1) {
        $hashEdit = password_hash($contrasenaNueva, PASSWORD_DEFAULT);

        $stmtPwd = $pdo->prepare('UPDATE users SET contrasena = :contrasena WHERE cedula =:cedula');
        $stmtPwd->bindValue(':contrasena', $hashEdit, PDO::PARAM_STR);
        $stmtPwd->bindValue(':cedula', $cedula, PDO::PARAM_STR);
        $stmtPwd->execute();      

        //Prueba123.

        if ($stmtPwd->rowCount() > 0) {

          echo json_encode(["success" => 'Se actualizó la contraseña con éxito']);
        }
    } else {
        echo json_encode(["error" => 'La contraseña actual no coincide con la registrada. Verifique']);
    }
} else {
    echo json_encode(["error" => 'NO SE ENCONTRO']);
}
