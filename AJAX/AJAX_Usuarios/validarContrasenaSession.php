<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
include("../../Configuration/Configuration.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$input = json_decode(file_get_contents("php://input"), true);
$email = trim($input['email'] ?? '');
$pwd = trim($input['password'] ?? '');

if (!$pwd) {
    echo json_encode(["status" => ["error" => "El campo contraseña no puede estar vacío"]]);
    exit;
}
try {
    $stmtPwd = $pdo->prepare("SELECT contrasena, correo FROM users WHERE correo = :correo");
    $stmtPwd->bindValue(':correo', $email, PDO::PARAM_STR);
    $stmtPwd->execute();

    if ($stmtPwd->rowCount() > 0) {
        $resultPwd = $stmtPwd->fetch(PDO::FETCH_ASSOC);

        $compararHash = (password_verify($pwd, $resultPwd['contrasena'])) ? 1 : 0;

        if ($compararHash == 1) {
            echo json_encode(["status" => ["success" => "Coinciden las contraseñas"]]);
        } else {
            echo json_encode(["status" => ["error" => "No coinciden las contraseñas"]]);
        }
    } else {
        echo json_encode(["status" => ["error" => "No existe el correo ingresado"]]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => ["error" => $e->getMessage()]]);
}
